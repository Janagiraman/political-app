<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\VoterService;
use Carbon\Carbon;
use Livewire\WithPagination;
use App\Models\UserRole;

class Activities extends Component
{
    public $activities;
    use WithPagination;

    public $from_date,$to_date, $userId;

    public function render()
    {
        // $this->from_date =  Carbon::now();

        // $this->updateMode = false;
        // $this->activityMode = true;

        // $this->to_date =  Carbon::now()->subDays(7);
        $userId = null;
        $from_date = null;
        $to_date = null;

        $this->users = UserRole::where('role_id','!=',1)->get();
        $curdate = date('Y-m-d');
        $this->user_id = isset($_GET['user_id'])!='' ? $_GET['user_id']:'';
        $this->to_date = isset($_GET['to_date']) ? $_GET['to_date']: Carbon::now()->format('Y-m-d');
        $this->from_date = isset($_GET['from_date']) ? $_GET['from_date']: Carbon::now()->subDays(7)->format('Y-m-d');

       
        $this->activities = VoterService::when($this->user_id, function($query, $user_id) {
            return $query->where('user_id' , $this->user_id);
        })
        ->when($this->from_date, function($query, $from_date){
            return $query->where('created_at','>=' , $this->from_date);
        })
        ->when($this->to_date, function($query, $to_date){
            return $query->where('created_at','<=' , $this->to_date);
        })
        ->get();
        
        return view('livewire.activities');
    }

    public function backToActivities(){
        return $this->redirect('/activities');
     }
}
