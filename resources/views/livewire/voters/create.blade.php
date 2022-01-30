<h2 class="font-semibold text-xl text-gray-800 leading-tight my-6 ml-10">
            {{ __('Import Voters From Excel') }}
</h2>
<x-jet-secondary-button wire:click="view()" class=" float-right bg-orange-500 hover:bg-gray-300 hover:text-white-100 px-4 py-2 -my-20 ">
           Voters
      </x-jet-button>

      <form wire:submit.prevent="import" enctype="multipart/form-data" class="w-full max-w-6xl ml-10 mr-10">
        @csrf
        <input type="file" name="import_file" wire:model="import_file" class="@error('import_file') is-invalid @enderror">
        <button type="submit" class="btn btn-outline-secondary">Import</button>
        @error('import_file')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
    </form>

    @if($importing && !$importFinished)
        <div wire:poll="updateImportProgress">Importing...please wait.</div>
    @endif

    @if($importFinished)
        Finished importing.
    @endif

     
            

</form>