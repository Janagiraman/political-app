      <h2 class="font-semibold text-xl text-gray-800 leading-tight my-6 ml-10">
          @if($createMode)  {{ __('Add New User') }}
          @elseif($updateMode) {{ __('Edit User') }}
          @endif
      </h2>
      <br>


      <x-jet-secondary-button wire:click="view()" class=" float-right bg-orange-500 hover:bg-gray-300 hover:text-white-100 px-4 py-2 -my-20">
           Users
      </x-jet-button>

      <form  class="w-full max-w-6xl ml-10 mr-10">

            <div class="flex">
                  <div class="md:w-1/2 m-2">
                           <x-jet-label for="role" value="{{ __('Role') }} " />
                            <select id="role" wire:model.defer="role"  class="block mt-1 w-4/5 p-2  bg-gray-200" name="role">
                              <option value="">Select Role</option>
                              @foreach ($roles as $role)
                                          <option value="{{ $role->id }}">
                                                {{ ucfirst($role->name) }}
                                          </option>
                              @endforeach

                           </select>
                             @error('role') <span class="font-mono text-xs text-red-700">{{ $message }}</span> @enderror
                 </div>
                 <div class="md:w-1/2 m-2">
                            <x-jet-label for="emp_code" value="{{ __('Emp Code') }}" />
                            <input class="appearance-none block w-4/5 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4   leading-tight focus:outline-none focus:bg-white" id="grid-first-name"
                              name="emp_code" type="text" placeholder="" wire:model.defer="emp_code">
                             @error('emp_code') <span class="font-mono text-xs text-red-700">{{ $message }}</span> @enderror
                  </div>

            </div>
            <div class="flex">

                  <div class="md:w-1/2 m-2">
                            <x-jet-label for="name" value="{{ __('Full Name') }}" />
                            <input class="appearance-none block w-4/5 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4   leading-tight focus:outline-none focus:bg-white" id="grid-first-name"
                              name="name" type="text" placeholder="" wire:model.defer="name">
                             @error('name') <span class="font-mono text-xs text-red-700">{{ $message }}</span> @enderror
                  </div>
                  <div class="md:w-1/2 m-2">
                            <x-jet-label for="mobile" value="{{ __('Mobile') }}" />
                            <input class="appearance-none block w-4/5 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4   leading-tight focus:outline-none focus:bg-white" id="grid-first-name"
                              name="mobile" type="text" placeholder="" wire:model.defer="mobile">
                             @error('mobile') <span class="font-mono text-xs text-red-700">{{ $message }}</span> @enderror
                 </div>
            </div>
            <div class="flex">

                 <div class="md:w-1/2 m-2">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <input class="appearance-none block w-4/5 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4   leading-tight focus:outline-none focus:bg-white" id="grid-first-name"
                              name="email" type="text" placeholder="" wire:model.defer="email">
                             @error('email') <span class="font-mono text-xs text-red-700">{{ $message }}</span> @enderror
                 </div>
                 <div class="md:w-1/2 m-2">
                            <x-jet-label for="imei" value="{{ __('IMEI') }}" />
                            <input class="appearance-none block w-4/5 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4   leading-tight focus:outline-none focus:bg-white" id="grid-first-name"
                              name="imei" type="text" placeholder="" wire:model.defer="imei">
                             @error('imei') <span class="font-mono text-xs text-red-700">{{ $message }}</span> @enderror
                 </div>
            </div>
            @if($createMode)
                  <x-jet-button wire:click.prevent="store()" class="bg-orange-500 hover:bg-orange-700 ml-2">
                        Save
                  </x-jet-button>
            @elseif($updateMode)
                  <x-jet-button wire:click.prevent="update()" class="bg-orange-500 hover:bg-orange-700 ml-2">
                        Update
                  </x-jet-button>
            @endif


      </form>


      <style>
            #map{
                  height: 400px;
            }
      </style>










