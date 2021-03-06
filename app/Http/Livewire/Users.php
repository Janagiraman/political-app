<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use App\Models\City;
use App\Models\EmployeeDetail;
use App\Models\Api\Leave;
use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    public $updateMode,$createMode = false;
    public $show = true;
    public $users, $role, $roles, $name, $email, $mobile, $imei, $city, $address,
           $confirmingItemDeletion, $user_id, $role_id, $Password;
    public $emp_code, $designation, $date_of_join, $basic_pay,
           $hra,$conveyance,$gratuity_pay,$special_allowance,$variable_incentive, $city_id, 
           $emp_detail_id, $latitude, $longitude;

    protected $listeners = [
            'getLatLngForInput'
       ];
       //
    public function getLatLngForInput($address, $lat, $lng)
    {
            $this->address = $address;
            $this->latitude = $lat;
            $this->longitude = $lng;
    }

    public function render()
    {
        // $this->createMode = true;    
        $this->users = User::get();
        $this->cities = City::all();
        $this->roles = Role::all();
     
        return view('livewire.users.list');
    }

    public function create(){

        $this->createMode = true;
        $this->error = false;
        $this->resetValidation();
        $this->cities = City::all();
        $this->roles = Role::where('name', '!=', 'administrator')->get();
        return view('livewire.users.create');
    }

    public function view(){
        $this->createMode = false;
        $this->updateMode = false;
        $this->resetInput();
    }

    public function store(){
        
        $this->error =  true;
        $this->validate([
            'role' => 'required',
            'name' => 'required',
            'mobile' => 'required|unique:users',
            'email' => 'required|unique:users',
            'imei' => 'required',
            'emp_code' => 'required|unique:users',
           
            
        ]);

       
        $userId =  User::create([
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'imei' => $this->imei,
            'password' => Hash::make($this->mobile),
            'emp_code' => $this->emp_code
        ])->id;

       
        UserRole::create([
            'user_id' => $userId,
            'role_id' => $this->role
        ]);

       
        $this->createMode = false;
        $this->resetInput();
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $this->cities = City::all();
        $this->roles = Role::where('name', '!=', 'administrator')->get();
        $this->user_id = $id;
        $user = User::where('id',$this->user_id)->first();
        $this->name = $user->name;
        $this->mobile = $user->mobile;
        $this->email = $user->email;
        $this->imei = $user->imei;
        $this->emp_code = $user->emp_code;
        $this->role = $user->role->role->id;

        
        
    }

    public function update(){

        $this->error = true;

        $this->validate([
            'role' => 'required',
            'name' => 'required',
            'mobile' => 'required|unique:users,mobile,'.$this->user_id,
            'email' => 'required|unique:users,email,'.$this->user_id,
            'imei' => 'required',
            'emp_code' => 'required'
            
        ]);

        if ($this->user_id) {
            $user = User::find($this->user_id);
           
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'mobile' => $this->mobile,
                'imei' => $this->imei,
                'password' => Hash::make($this->mobile),
                'emp_code' =>  $this->emp_code
            ]);

            UserRole::where('user_id',$this->user_id)->update([            
                'role_id' => $this->role
            ]);

            
        
            $this->updateMode = false;
            //session()->flash('message', 'Users Updated Successfully.');
            $this->resetInput();

        }
        $this->createMode = false;
        $this->resetInput();
    }



    private function resetInput()
    {
        $this->name = null;
        $this->email = null;
        $this->mobile = null;
        $this->imei = null;
        $this->role = null;
        $this->emp_code = null;
        $this->designation = null;
        $this->date_of_join = null;
        $this->basic_pay = null;
        $this->hra = null;
        $this->conveyance = null;
        $this->gratuity_pay = null;
        $this->special_allowance = null;
        $this->variable_incentive = null;
        $this->address = null;
        $this->latitude = null;
        $this->longitude = null;
        $this->error = false;
        $this->render();
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
}
