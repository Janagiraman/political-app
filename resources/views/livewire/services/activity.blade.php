<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Acitvities') }}
        </h2>
  
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
       
            <table class="table-fixed w-full">
                          
                            <x-jet-secondary-button wire:click="create()" class=" float-right bg-orange-500 hover:bg-gray-300 hover:text-white-100 px-4 py-2 my-6">
                                        Add New Service
                            </x-jet-button>
                    
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2 w-20">No.</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Description</th>                                   
                                    <th class="px-4 py-2">Action</th>
                                </tr>   
                            </thead>
                            <tbody>
                          
                            </tbody>
            </table>
           


           
</div>
</div>
</div>
