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
                                  <th class="px-4 py-2 border">Booth No</th><td class=" px-4 py-2 border">{{ $voterDetails->booth_no }}</td>
                               </tr>
                               <tr>
                                  <th class="px-4 py-2 border">Booth Name</th><td class=" px-4 py-2 border">{{ $voterDetails->booth_name }}</td>
                               </tr>
                               <tr>
                                  <th class="px-4 py-2 border">Area Name</th><td class=" px-4 py-2 border">{{ $voterDetails->area_name }}</td>
                               </tr>
                               <tr>
                                  <th class="px-4 py-2 border">Epic No</th><td class=" px-4 py-2 border">{{ $voterDetails->epic_no }}</td>
                               </tr>
                               <tr>
                                  <th class="px-4 py-2 border">Name</th><td class=" px-4 py-2 border">{{ $voterDetails->voter_name }}</td>
                               </tr>
            </table>

            <h2 class="py-2 pt-8">Profile Information</h2>

            <table class="table-fixed w-full">
                              <tr class="bg-gray-100">
                                  <th>Doc Name</th>
                                  <th>Details</th>
                                  <th>Image</th>
                                  <th>Latitude</th>
                                  <th>longitude</th>
                                  <th>Updated By</th>
                               </tr>
                               @foreach($voterProfile as $key =>  $profile)
                                   <tr>
                                       <td class="px-4 py-2 border">{{ $profile->doc_type }}</td>
                                       <td class="px-4 py-2 border">{{ $profile->value }}</td>
                                       <td class="px-4 py-2 border"><button>View</button></td>
                                       <td class="px-4 py-2 border">{{ $profile->latitude }}</td>
                                       <td class="px-4 py-2 border">{{ $profile->longitude }}</td>
                                       <td class="px-4 py-2 border">{{ $profile->user_id }}</td>
                                   </tr>
                               @endforeach
            </table>

            <h2 class="py-2 pt-8">Services Information</h2>
            <table class="table-fixed w-full">
                              <tr class="bg-gray-100">
                                  <th>Service Type</th>
                                  <th>Provided</th>
                                  <th>Image</th>
                                  <th>Comment</th>
                                  <th>Location</th>
                                  <th>Updated By</th>
                               </tr>
                               @foreach($voterServices as $key =>  $service)
                                   <tr>
                                       <td class="px-4 py-2 border">{{ $service->service->name }}</td>
                                       <td class="px-4 py-2 border">{{ $service->is_provide_service }}</td>
                                       <td class="px-4 py-2 border"><button>View</button></td>
                                       <td class="px-4 py-2 border">{{ $service->comment }}</td>
                                       <td class="px-4 py-2 border"><button>View Location</button></td>
                                       <td class="px-4 py-2 border">{{ $service->user->name }}</td>
                                   </tr>
                               @endforeach
            </table>

            </div>

            
