<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Voter;
use App\Models\VoterInfos;
use App\Models\VoterService;
use App\Voters\ImportVoters;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Imports\VotersImport;

class Voters extends Component
{
    use WithFileUploads;
    public $updateMode,$importMode, $voterDetailMode = false;
    public $name, $description, $confirmingItemDeletion;
    public $show = true;
    public $batchId;
    public $importFile, $import_file;
    public $importing = false;
    public $importFilePath;
    public $importFinished = false;
    public $searchTerm;
    public $voterDetails, $voterProfile, $voterServices;


    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        return view('livewire.voters.list', [
            'voters' => Voter::where('epic_no','like', $searchTerm)->paginate(50),
        ]);
        
    }

    public function create(){
        $this->importMode = true;
        return view('livewire.voters.create');
    }

    public function view(){
        $this->importMode = false;
        $this->updateMode = false;
        $this->voterDetailMode = false;
        $this->resetInput();
    }

    public function importForm(){
        
        $this->importMode = true;
        return view('livewire.voters.create');
        
    }

    public function voterDetails($id){
        $this->importMode = false;
        $this->voterDetailMode = true;
        $this->voterDetails = Voter::where('id', $id)->first();
        $this->voterProfile = VoterInfos::where('voter_id', $id)->get();
        $this->voterServices = VoterService::with('user:id,name','service:id,name')->where('voter_id', $id)->get(); 
        
        
    }

    public function import(){

        
        $this->validate([
            'import_file' => 'required'
        ]);
        
       
        $this->importing = true;
        $this->importFilePath = $this->import_file->store('imports');
        
        $batch = Bus::batch([
            new ImportVoters($this->importFilePath),
        ])->dispatch();

        $this->batchId = $batch->id;
    }

    public function getImportBatchProperty()
    {
        if (!$this->batchId) {
            return null;
        }

        return Bus::findBatch($this->batchId);
    }


    public function updateImportProgress()
    {
       
        $this->importFinished = $this->importBatch->finished();

        $this->importFinished = true;
        if ($this->importFinished) {
            Storage::delete($this->importFilePath);
            $this->importing = false;
            return redirect(request()->header('Referer'));
        }
        
        

    }


    private function resetInput()
    {
        $this->name = null;
        $this->description = null;      
        $this->render();
    }
}
