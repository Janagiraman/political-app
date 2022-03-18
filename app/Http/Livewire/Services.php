<?php

namespace App\Http\Livewire;

use App\Models\Service;
use App\Models\VoterService;
use Livewire\Component;
use Carbon\Carbon;


class Services extends Component
{
    public $updateMode,$createMode, $activityMode = false;
    public $roles, $name, $description, $confirmingItemDeletion, $activities;
    public $show = true;

    public function render()
    {
        $this->services = Service::all();
        return view('livewire.services.list');
    }

    public function create(){
        $this->createMode = true;
        return view('livewire.roles.create');
    }

    public function view(){
        $this->createMode = false;
        $this->updateMode = false;
        $this->resetInput();
    }

    public function store(){
        $this->validate([
            'name' => 'required',
            
        ]);
        Service::create([
            'name' => $this->name,
            'description' => $this->description          
        ]);
        $this->createMode = false;
        $this->resetInput();

    }

    public function edit($id){
        $this->updateMode = true;
        $this->service_id = $id;
        $service = Service::where('id', $id)->first();
        $this->name = $service->name;
        $this->description = $service->description;
    }

    public function update(){

        $this->error = true;

        $this->validate([
            'name' => 'required'
        ]);

        if ($this->service_id) {
            $role = Service::find($this->service_id);
           
            $role->update([
                'name' => $this->name,
                'description' => $this->description,
                
            ]);

            $this->updateMode = false;
            //session()->flash('message', 'Users Updated Successfully.');
            $this->resetInput();

        }
        $this->createMode = false;
        $this->resetInput();
    }

    public function serviceActivities(){

        $current_date =  Carbon::now();

        $this->updateMode = false;
        $this->activityMode = true;

        $one_weak =  Carbon::now()->subDays(7);

        $this->activities = VoterService::whereDate('created_at','<=', $current_date)
            ->whereDate('created_at','>=', $one_weak)->get();
        return view('livewire.services.list');
    }

    public function confirmItemDeletion( $id) 
    {
        $this->confirmingItemDeletion = $id;
    }
 
    public function deleteItem( Customer $customer) 
    {
        $customer->delete();
        $this->confirmingItemDeletion = false;
        session()->flash('message', 'Item Deleted Successfully');
    }

    private function resetInput()
    {
        $this->name = null;
        $this->description = null;      
        $this->render();
    }
}
