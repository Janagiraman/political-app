<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Voter Details') }}
        </h2>
</x-slot>

<div class="p-4">
        <x-jet-secondary-button wire:click="view()" class=" float-right bg-orange-500 hover:bg-gray-300 hover:text-white-100     -my-20 ">
             Voter Details
         </x-jet-button>

        <h2 class="py-2 pt-8">Voter Information</h2>

        <table class="table-fixed w-full">
                              <tr>
                                  <th class="px-4 py-2 border text-left">Booth No</th><td class=" px-4 py-2 border">{{ $voterDetails->booth_no }}</td>
                               </tr>
                               <tr>
                                  <th class="px-4 py-2 border text-left">Booth Name</th><td class=" px-4 py-2 border">{{ $voterDetails->booth_name }}</td>
                               </tr>
                               <tr>
                                  <th class="px-4 py-2 border text-left">Area Name</th><td class=" px-4 py-2 border">{{ $voterDetails->area_name }}</td>
                               </tr>
                               <tr>
                                  <th class="px-4 py-2 border text-left">Epic No</th><td class=" px-4 py-2 border">{{ $voterDetails->epic_no }}</td>
                               </tr>
                               <tr>
                                  <th class="px-4 py-2 border text-left">Name</th><td class=" px-4 py-2 border">{{ $voterDetails->voter_name }}</td>
                               </tr>
            </table>

            <h2 class="py-2 pt-8">Profile Information</h2>

            <table class="table-fixed w-full">
                              <tr class="bg-gray-100">
                                  <th class="px-4 py-2 text-left">Doc Name</th>
                                  <th class="px-4 py-2 text-left">Details</th>
                                  <th class="px-4 py-2 text-left">Image</th>
                                  <th class="px-4 py-2 text-left">Location</th>
                                  <th class="px-4 py-2 text-left">Updated By</th>
                                  <th class="px-4 py-2 text-left">Updated Date</th>
                               </tr>
                               @foreach($voterProfile as $key =>  $profile)
                                   <tr>
                                       <td class="px-4 py-2 border">{{ $profile->doc_type }}</td>
                                       <td class="px-4 py-2 border">{{ $profile->value }}</td>
                                       <td class="px-4 py-2 border">
                                            @if($profile->image!='')
                                                    <x-jet-button wire:click="profileImageView({{ $profile->id }})" wire:loading.attr="disabled" class="bg-blue-500 hover:bg-blue-700">
                                                        View
                                                    </x-jet-button>
                                            @endif
                                       </td>
                                       <td class="px-4 py-2 border"><button>View Location</button></td>
                                       <td class="px-4 py-2 border">{{ $profile->user->name }}</td>
                                       <td class="px-4 py-2 border">{{ date('d-m-Y', strtotime($profile->updated_at)) }} </td>
                                   </tr>
                               @endforeach
            </table>

            <h2 class="py-2 pt-8">Services Information</h2>
            <table class="table-fixed w-full">
                              <tr class="bg-gray-100">
                                  <th class="px-4 py-2 text-left">Service Type</th>
                                  <th class="px-4 py-2 text-left">Provided</th>
                                  <th class="px-4 py-2 text-left">Image</th>
                                  <th class="px-4 py-2 text-left">Comment</th>
                                  <th class="px-4 py-2 text-left">Location</th>
                                  <th class="px-4 py-2 text-left">Updated By</th>
                                  <th class="px-4 py-2 text-left">Updated Date</th>
                               </tr>
                               @foreach($voterServices as $key =>  $service)
                                   <tr>
                                       <td class="px-4 py-2 border">{{ $service->service->name }}</td>
                                       <td class="px-4 py-2 border">{{ $service->is_provide_service }}</td>
                                       <td class="px-4 py-2 border"> 
                                           @if($service->image!='')
                                             <x-jet-button wire:click="serviceImageView({{ $service->id }})" wire:loading.attr="disabled" class="bg-blue-500 hover:bg-blue-700">
                                                View
                                             </x-jet-button>
                                            @endif
                                        </td>
                                       <td class="px-4 py-2 border">{{ $service->comment }}</td>
                                       <td class="px-4 py-2 border"><button>View Location</button></td>
                                       <td class="px-4 py-2 border">{{ $service->user->name }}</td>
                                       <td class="px-4 py-2 border">{{ date('d-m-Y', strtotime($service->updated_at)) }}</td>
                                   </tr>
                               @endforeach
            </table>

            <x-jet-dialog-modal wire:model="serviceImageView">
                    <x-slot name="title">
                       Service Image
                    </x-slot>
 
                    <x-slot name="content">
                       @php 
                            $imageUrl =  url('').'/service_images/'.$service_image;
                       @endphp
                       <img src={{$imageUrl}} />
                    </x-slot>
 
                    <x-slot name="footer">
                        <x-jet-secondary-button wire:click="$set('serviceImageView', false)" wire:loading.attr="disabled">
                            {{ __('Close') }}
                        </x-jet-secondary-button>
            
                        
                    </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="profileImageView">
                    <x-slot name="title">
                       Profile Image
                    </x-slot>
 
                    <x-slot name="content">
                       @php 
                            $imageUrl =  url('').'/images/voters/'.$profile_image;
                       @endphp
                       <img src={{$imageUrl}} />
                    </x-slot>
 
                    <x-slot name="footer">
                        <x-jet-secondary-button wire:click="$set('profileImageView', false)" wire:loading.attr="disabled">
                            {{ __('Close') }}
                        </x-jet-secondary-button>
            
                        
                    </x-slot>
    </x-jet-dialog-modal>

