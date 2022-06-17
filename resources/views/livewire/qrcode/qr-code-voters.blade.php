<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Voters') }}
        </h2>

</x-slot>

<div class="py-12">
    <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
       
            <input type="text"  class="form-control" placeholder="Search Epic No" wire:model="searchTerm" />
            <div>
            {{ $voters->links() }}
            </div>
            <table class="table-fixed w-full">

                         
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2 w-20">Sl No</th>
                                    <th class="px-4 py-2 w-20">Booth No</th>
                                    <th class="px-4 py-2">Booth Name</th>
                                    <th class="px-4 py-2">Area Name</th>
                                    <th class="px-4 py-2">Epic No</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Relation Name</th>
                                    <th class="px-4 py-2 " style="width: 100px">QR Code</th>


                                </tr>
                            </thead>
                            <tbody>
                               @php 
                                      $index = 1;
                               @endphp 
                                @foreach($voters as $voter)
                                <tr>
                                    <td class="border px-4 py-2">{{ $index++ }}</td>
                                    <td class="border px-4 py-2">{{ $voter->booth_no }}</td>
                                    <td class="border px-4 py-2">{{ $voter->booth_name }}</td>
                                    <td class="border px-4 py-2">{{ $voter->area_name }}</td>
                                    <td class="border px-4 py-2">{{ $voter->epic_no }}</td>
                                    <td class="border px-4 py-2">{{ $voter->voter_name }}</td>
                                    <td class="border px-4 py-2">{{ $voter->relation_name }}</td>
                                    

                                    <td class="border px-4 py-2">
                                          <a href="{{ url('/qr-code-generate/'. $voter->id) }}" class="btn btn-xs btn-info pull-right">QR Code Generate</a>

                                            <!-- <x-jet-secondary-button wire:click="generateQr({{$voter->id}})" class=" float-right bg-orange-500 hover:bg-gray-300 hover:text-white-100 px-4 py-2 my-6">
                                                Generate QR
                                            </x-jet-button> -->
                                    </td>


                                </tr>
                                @endforeach
                            </tbody>
            </table>
            
           


           

</div>
</div>
</div>
