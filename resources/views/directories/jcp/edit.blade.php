<x-app-layout>
    <div class="mt-6 max-w-lg mx-auto">
        <form action="{{ route('jcp.update', $jcp->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="position_title" class="block text-sm font-medium text-gray-700">Position Title</label>
                <input type="text" name="position_title" id="position_title" value="{{ $jcp->position_title }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="duty_station" class="block text-sm font-medium text-gray-700">Duty Station</label>
                <input type="text" name="duty_station" id="duty_station" value="{{ $jcp->duty_station }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="user_id" class="block text-sm font-medium text-gray-700">Employee</label>

                <select name="user_id" id="user_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    <option value="">Choose an employee to assign the JCP to.</option>
                    @foreach ($user as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $jcp->user_id ? 'selected' : '' }}>{{ $user->first_name }} {{ $user->last_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="job_grade" value="{{ __('Job Grade') }}" />
                <select id="job_grade" wire:model="job_grade" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-fuchsia-500 focus:border-fuchsia-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-fuchsia-500 dark:focus:border-fuchsia-500">
                  <option selected>Choose the job grade.</option>
                  <option value="a1">A1</option>
                  <option value="a2">A2</option>
                  <option value="a3">A3</option>
                  <option value="a4">A4</option>
                  <option value="b1">B1</option>
                  <option value="b2">B2</option>
                  <option value="b3">B3</option>
                  <option value="b4">B4</option>
                  <option value="bu">BU</option>
                  <option value="c1">C1</option>
                  <option value="c2">C2</option>
                  <option value="c3">C3</option>
                  <option value="c4">C4</option>
                  <option value="cu">CU</option>
                  <option value="d1">D1</option>
                  <option value="d2">D2</option>
                  <option value="d3">D3</option>
                  <option value="d4">D4</option>
                  <option value="du">DU</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="job_purpose" class="block text-sm font-medium text-gray-700">Job Purpose</label>
                <textarea name="job_purpose" id="job_purpose" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md h-40">{{ $jcp->job_purpose }}</textarea>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <label class="inline-flex items-center cursor-pointer">
                    <input type="checkbox" wire:model="is_active" value="" class="sr-only peer">
                    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-fuchsia-300 dark:peer-focus:ring-fuchsia-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-fuchsia-600"></div>
                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">JCP Active</span>
                  </label>
    
    
            </div>

            <div class="mt-4 flex justify-center">
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Update JCP
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
