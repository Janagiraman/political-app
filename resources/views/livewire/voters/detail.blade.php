<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Voter Details') }}
        </h2>
</x-slot>

<div class="py-12">
        <x-jet-secondary-button wire:click="view()" class=" float-right bg-orange-500 hover:bg-gray-300 hover:text-white-100 px-4 py-2 -my-20 ">
             Voter Details
         </x-jet-button>

</div>