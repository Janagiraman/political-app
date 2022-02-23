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
                                       <td class="px-4 py-2 border"><button>View</button></td>
                                       <td class="px-4 py-2 border"><button>View Location</button></td>
                                       <td class="px-4 py-2 border">{{ $profile->user_id }}</td>
                                       <td class="px-4 py-2 border">12/12/1009</td>
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
                                       <td class="px-4 py-2 border"><button>View</button></td>
                                       <td class="px-4 py-2 border">{{ $service->comment }}</td>
                                       <td class="px-4 py-2 border"><button>View Location</button></td>
                                       <td class="px-4 py-2 border">{{ $service->user->name }}</td>
                                       <td class="px-4 py-2 border">12/12/1009</td>
                                   </tr>
                               @endforeach
            </table>

            </div>


