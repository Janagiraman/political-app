<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Voters') }}
        </h2>

</x-slot>

<div class="py-12">
    <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
        @if($updateMode)
            @include('livewire.voters.create')
        @elseif($importMode)
            @include('livewire.voters.create')
        @elseif($voterDetailMode)
            @include('livewire.voters.detail')
        @else

            <input type="text"  class="form-control" placeholder="Search Epic No" wire:model="searchTerm" />
            <div>
            {{ $voters->links() }}
            </div>
            <table class="table-fixed w-full">

                            <x-jet-secondary-button wire:click="importForm()" class=" float-right bg-orange-500 hover:bg-gray-300 hover:text-white-100 px-4 py-2 my-6">
                                        Import Voters
                            </x-jet-button>

                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2 w-20">Sl No</th>
                                    <th class="px-4 py-2 w-20">Booth No</th>
                                    <th class="px-4 py-2">Booth Name</th>
                                    <th class="px-4 py-2">Area Name</th>
                                    <th class="px-4 py-2">Epic No</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2" style="width: 72px">Age</th>
                                    <th class="px-4 py-2" style="width: 72px">Gender</th>
                                    <th class="px-4 py-2">Relation Name</th>
                                    <th class="px-4 py-2 " style="width: 100px">View</th>


                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $index = $voters->firstItem()
                                @endphp
                                @foreach($voters as $voter)
                                <tr>
                                    <td class="border px-4 py-2">{{ $index++ }}</td>
                                    <td class="border px-4 py-2">{{ $voter->booth_no }}</td>
                                    <td class="border px-4 py-2">{{ $voter->booth_name }}</td>
                                    <td class="border px-4 py-2">{{ $voter->area_name }}</td>
                                    <td class="border px-4 py-2">{{ $voter->epic_no }}</td>
                                    <td class="border px-4 py-2">{{ $voter->voter_name }}</td>
                                    <td class="border px-4 py-2">{{ $voter->age }}</td>
                                    <td class="border px-4 py-2">{{ $voter->gender }}</td>
                                    <td class="border px-4 py-2">{{ $voter->relation_name }}</td>
                                    <td class="border px-4 py-2">
                                            <x-jet-secondary-button wire:click="voterDetails({{$voter->id}})" class=" float-right bg-orange-500 hover:bg-gray-300 hover:text-white-100 px-4 py-2 my-6">
                                                View
                                            </x-jet-button>
                                    </td>


                                </tr>
                                @endforeach
                            </tbody>
            </table>
            {{ $voters->links() }}
            @endif


            <x-jet-confirmation-modal wire:model="confirmingItemDeletion">
                    <x-slot name="title">
                        {{ __('Delete Item') }}`
                    </x-slot>

                    <x-slot name="content">
                        {{ __('Are you sure you want to delete Item? ') }}
                    </x-slot>

                    <x-slot name="footer">
                        <x-jet-secondary-button wire:click="$set('confirmingItemDeletion', false)" wire:loading.attr="disabled">
                            {{ __('Cancel') }}
                        </x-jet-secondary-button>

                        <x-jet-danger-button class="ml-2" wire:click="deleteItem({{ $confirmingItemDeletion }})" wire:loading.attr="disabled">
                            {{ __('Delete') }}
                        </x-jet-danger-button>
                    </x-slot>
            </x-jet-confirmation-modal>

</div>
</div>
</div>
