<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Voter Details') }}
        </h2>
</x-slot>

<div class="py-12">
        <x-jet-secondary-button wire:click="view()" class=" float-right bg-orange-500 hover:bg-gray-300 hover:text-white-100     -my-20 ">
             Voter Details
         </x-jet-button>

        s

        <div>Voter Information</div>
        <table class="table-fixed w-full">
                              <tr class="bg-gray-100">

                                  <th class="   ">Booth No</th><td>{{ $voterDetails->booth_no }}</td>
                               </tr>
                               <tr class="bg-gray-100">

                                  <th class="   ">Booth Name</th><td>{{ $voterDetails->booth_name }}</td>
                               </tr>
                               <tr class="bg-gray-100">

                                  <th class="   ">Area Name</th><td>{{ $voterDetails->area_name }}</td>
                               </tr>
                               <tr class="bg-gray-100">

                                  <th class="   ">Epic No</th><td>{{ $voterDetails->epic_no }}</td>
                               </tr>
                               <tr class="bg-gray-100">

                                  <th class="   ">Name</th><td>{{ $voterDetails->voter_name }}</td>
                               </tr>
            </table>

            <div>Profile Inforamtion</div>
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
                                       <td>{{ $profile->doc_type }}</td>
                                       <td>{{ $profile->value }}</td>
                                       <td><button>View</button></td>
                                       <td>{{ $profile->latitude }}</td>
                                       <td>{{ $profile->longitude }}</td>
                                       <td>{{ $profile->user_id }}</td>
                                   </tr>
                               @endforeach
            </table>

            <div>Services Inforamtion</div>
            <table class="table-fixed w-full">
                              <tr class="bg-gray-100">
                                  <th>Service Type</th>
                                  <th>Provided</th>
                                  <th>Image</th>
                                  <th>Comment</th>
                                  <th>Latitude</th>
                                  <th>longitude</th>
                                  <th>Updated By</th>
                               </tr>
                               @foreach($voterServices as $key =>  $service)
                                   <tr>
                                       <td>{{ $service->service_type }}</td>
                                       <td>{{ $service->is_provide_service }}</td>
                                       <td><button>View</button></td>
                                       <td>{{ $service->comment }}</td>
                                       <td>{{ $service->latitude }}</td>
                                       <td>{{ $service->longitude }}</td>
                                       <td>{{ $service->user_id }}</td>
                                   </tr>
                               @endforeach
            </table>

            </div>
