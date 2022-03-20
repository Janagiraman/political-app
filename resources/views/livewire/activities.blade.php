<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Acitvities') }}
        </h2>
  
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

            <form  class="w-full max-w-6xl ml-10">
               
               <div class="flex flex-wrap -mx-3 mb-6">
                       <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                               <x-jet-label for="user_id" value="{{ __('Employee') }}" />
                               <select id="user_id" wire:model.defer="user_id"   class="block mt-1 w-4/5 p-2  bg-gray-200" name="user_id">
                               <option value="">Select Employee</option>
                               @foreach ($users as $user)
                                           <option value="{{ $user->user->id }}">
                                                   {{ ucfirst($user->user->name) }}  
                                           </option>
                                         
                               @endforeach
                              </select>
                              @error('user_id') <span class="font-mono text-xs text-red-700">{{ $message }}</span> @enderror
                       </div>
                       <div class="w-1/5">
                           <x-jet-label for="from_date" value="{{ __('From Date') }}" />
                           <x-datepicker wire:model.defer="from_date" id="from_date" :error="'from_date'" name="from_date" />
                       </div>
                       <div class="w-1/5">
                           <x-jet-label for="to_date" value="{{ __('To Date') }}" />
                           <x-datepicker wire:model.defer="to_date" id="from_date" :error="'to_date'" name="to_date" />
                       </div>
                     
                       <div class="w-1/5">
                            <x-jet-button  class="bg-orange-500 hover:bg-orange-700  mt-4" >
                                   Search
                            </x-jet-button>

                            <x-jet-button  class="bg-orange-500 hover:bg-orange-700  mt-4" wire:click="backToActivities()">
                                   Reset
                            </x-jet-button> 
                       </div>
                       
               </div>
          
            </form>
       
            <table class="table-fixed w-full">
                          
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2 w-20 text-left">No.</th>
                                    <th class="px-4 py-2 text-left">Epic No</th>
                                    <th class="px-4 py-2 text-left">Voter Name</th>                                   
                                    <th class="px-4 py-2 text-left">Service</th>
                                    <th class="px-4 py-2 text-left">Provided</th>
                                    <th class="px-4 py-2 text-left">Date</th>
                                    <th class="px-4 py-2 text-left">Employee Name</th>

                                </tr>   
                            </thead>
                            <tbody>
                               @php
                                  
                                     $i=1;
                                 @endphp
                               
                               @foreach($activities as $activity)

                                  <tr>
                                      <td class="px-4 py-2 text-left">
                                          {{ $i++ }}
                                      </td>
                                      <td class="px-4 py-2 text-left">
                                          {{ $activity->epic_no }}
                                      </td>
                                      <td class="px-4 py-2 text-left">
                                          {{ $activity->voter->voter_name }}
                                      </td>
                                      <td class="px-4 py-2 text-left">
                                          {{ $activity->service->name }}
                                      </td>
                                      <td class="px-4 py-2 text-left">
                                          {{ $activity->is_provide_service }}
                                      </td>
                                      <td class="px-4 py-2 text-left">
                                          {{ $activity->created_at }}
                                      </td>
                                      <td class="px-4 py-2 text-left">
                                          {{ $activity->user->name }}
                                      </td>
                                  </tr>

                               @endforeach


                          
                            </tbody>
            </table>
           


           
</div>
</div>
</div>
