<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Voter;
use App\Models\VoterInfos;
use App\Models\VoterService;
use App\Http\Livewire\QrCode;
// use QrCode;

class QrCode extends Component
{
    public $searchTerm, $latitude, $longitude;
    public $updateMode,$importMode, $voterDetailMode = false;
    // public $voters = [];

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        return view('livewire.qrcode.qr-code-voters', [ 
            'voters' => Voter::join('voter_services', 'voters.id', '=', 'voter_services.voter_id')
                    ->where('voter_services.service_type', '=', 2)
                    ->where('voters.epic_no','like', $searchTerm)
                   ->paginate(200),
         ]);
       
    }
    public function generateQr($id){
        $this->importMode = false;
        $this->voterDetailMode = true;
        $this->voterDetails = Voter::where('id', $id)->first();
        $this->voterProfile = VoterInfos::where('voter_id', $id)->get();
        $this->voterServices = VoterService::with('user:id,name','service:id,name')->where('voter_id', $id)->get(); 
        // QrCode::format('png')
        //     ->generate($id, public_path('images/qr-code.png'));
    
                 QrCode::size(300)->backgroundColor(255,90,0)->generate('RemoteStack');
         
        
        
    }
}
