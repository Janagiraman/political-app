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
    public $name, $description, $confirmingItemDeletion, $serviceImageView, $profileImageView, $locationView, $serviceLocationView;
    public $show = true;
    public $batchId;
    public $importFile, $import_file;
    public $importing = false;
    public $importFilePath;
    public $importFinished = false;
    public $searchTerm, $latitude, $longitude;
    public $voterDetails, $voterProfile, $voterServices, $service_image, $profile_image;


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

        ini_set('memory_limit','1024M');
        
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
    public function serviceImageView($id) 
    {
        $this->resetErrorBag();
       // echo 'cominii=='.$image;
       $voterService = VoterService::where('id', $id)->first();
        $this->service_image = $voterService->image;
        
        $this->serviceImageView = true;
    }

    public function profileImageView($id) 
    {
        $this->resetErrorBag();
       // echo 'cominii=='.$image;
       $voterInfo = VoterInfos::where('id', $id)->first();
        $this->profile_image = $voterInfo->image;
        
        $this->profileImageView = true;
    }

    public function locationView($id) 
    {
        $this->resetErrorBag();
       // echo 'cominii=='.$image;
        $voterInfo = VoterInfos::where('id', $id)->first();
        $this->latitude = $voterInfo->latitude;
        $this->longitude = $voterInfo->longitude;
        
        $this->locationView = true;
    }
    public function serviceLocationView($id) 
    {
        $this->resetErrorBag();
       // echo 'cominii=='.$image;
        $voterService = VoterService::where('id', $id)->first();
        $this->latitude = $voterService->latitude;
        $this->longitude = $voterService->longitude;
        
        $this->locationView = true;
    }
}
