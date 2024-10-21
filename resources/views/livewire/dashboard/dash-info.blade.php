<!-- User Profile Section -->
<div class="">
    <div class="rounded-3xl">
        <div class="container mx-auto p-4 grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Section -->
            <div class="lg:col-span-2 space-y-6">

                <!-- Address and Payment Method Section -->
                <div class="">
                    <div class="grid grid-cols-2 md:grid-cols-2 gap-6 mt-4">
                        <div class="flex flex-col w-full text-gray-900">
                            <!-- Profile Header Image -->
                            <div class="w-full text-gray-900">
                                <!-- Profile Header Image -->
                                <div class="h-32 overflow-hidden border rounded-t-3xl">
                                    <img class="object-cover w-full h-full" src="{{ asset('assets/images/bg.png') }}"
                                        alt="Mountain">
                                </div>
                                <!-- User Profile Card -->
                                <div class="bg-white rounded-b-3xl shadow-md border p-6 -mt-16">
                                    <!-- User Competency Rating -->
                                    <div class="flex justify-center mb-4">
                                        <div class="bg-sky-200 text-sky-700 rounded-full p-4 border-4 border-white">
                                            <h1 class="text-3xl font-bold">{{ $user->competency_rating }}</h1>
                                        </div>
                                    </div>
                                    <!-- User Information -->
                                    <div class="text-center bg-white">
                                        <h2 class="text-2xl ">{{ $user->first_name }}
                                            {{ $user->last_name }}</h2>
                                        <p class="text-gray-500">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="flex flex-col shadow-md border bg-white rounded-3xl dark:bg-gray-800">
                            <div class="flex flex-row  justify-between items-center px-6 py-6">
                                <h3 class="leading-none text-gray-900 dark:text-white">My Qualifications</h3>
                                <button wire:click="addQualification" wire:loading.attr="disabled"
                                    class="ml-auto hover:bg-sky-100  rounded-xl p-1 px-2 focus:outline-none focus:shadow-outline-sky">
                                    <div class="flex flex-row items-center justify-center ">
                                        <x-iconoir-plus class="text-sky-500 rounded-3xl" />
                                        <h1 class="text-sm text-sky-500">Add Qualification</h1>

                                    </div>
                                </button>
                            </div>
                            <ul class="divide-y divide-gray-200 overflow-auto">
                                @forelse ($qualifications as $qualification)
                                    <li class="p-3 sm:py-4 px-6 dark:hover:bg-gray-700">
                                        <div class="flex items-center justify-between">
                                            <p class="text-sm text-gray-900 dark:text-white truncate">
                                                {{ $qualification->qualification_title }}
                                            </p>
                                            <button
                                                class="text-red-500 text-xs hover:text-red-700 focus:outline-none focus:shadow-outline-red"
                                                wire:click="deleteQualification({{ $qualification->id }})">
                                                <x-iconoir-xmark-circle />
                                            </button>
                                        </div>
                                    </li>
                                @empty
                                    <div class="text-base items-center flex justify-center text-sky-900">
                                        <div class="self-center">
                                            <h1 class="">You have not added any qualifications
                                            </h1>
                                        </div>
                                    </div>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 border rounded-3xl shadow-md overflow-hidden">
                    <div class="flex flex-col h-full">
                        <div class="px-6 py-6 shadow-md-b shadow-md-gray-200 dark:shadow-md-gray-700">
                            <h3 class="text-gray-900 dark:text-white">My Skill Gap</h3>
                        </div>
                        <div class="flex-grow p-6">
                            <canvas id="myChart" class="w-full h-full"></canvas>
                        </div>
                    </div>
                </div>
                <!-- Cart Section -->
                <div class="shadow-md bg-white border w-auto rounded-3xl dark:bg-gray-800 overflow-auto">
                    <div class="flex flex-row justify-between items-center px-6 py-6">
                        <div class="title">
                            <h3 class="leading-none text-gray-900 dark:text-white">Top Skills</h3>
                        </div>
                    </div>
                    <div class="flow-root">
                        <div class="overflow-y-auto sm:rounded-3xl">
                            <table class="w-full text-sm mt-3 text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-900/50 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left">
                                            Skill Title
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">

                                            User Rating
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Supervisor Rating
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($skills as $skill)
                                        <tr
                                            class="shadow-md-b dark:bg-gray-800 dark:shadow-md-gray-700 ">
                                            <td scope="row"
                                                class="px-6 py-6 text-gray-900 whitespace-nowrap dark:text-white text-left">
                                                {{ Str::limit($skill->skill_title, 30) }}
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <div
                                                    class="text-xs text-center inline-block py-1 px-2 my-auto leading-none text-center whitespace-nowrap align-baseline font-bold bg-sky-300 text-sky-900 rounded-3xl">
                                                    {{ $skill->pivot->user_rating }}.00
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <div
                                                    class="text-xs inline-block py-1 px-2 my-auto leading-none text-center whitespace-nowrap align-baseline font-bold bg-sky-300 text-sky-900 rounded-3xl">
                                                    {{ $skill->pivot->supervisor_rating }}.00
                                                </div>
                                            </td>

                                        </tr>
                                    @empty
                                        <div class="container flex-auto justify-center text-center">
                                            <p class="text-gray-400 text-base m-4">
                                                You have not completed any assessment.
                                            </p>
                                        </div>
                                    @endforelse


                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>


                <!-- Add more items similarly as needed -->

            </div>

            <!-- Right Section -->
            <div class="bg-white p-6 mt-4 rounded-3xl shadow-md space-y-6 h-auto overflow-auto grow-0 border">
                <div>
                    <h2 class="leading-none text-gray-900">My Development Plans</h2>
                    <div class="flex flex-col divide-y divide-gray-200 items-start mt-4">
                        @foreach ($developmentPlans as $plan)
                <div class="flex flex-row items-center  justify-between w-full mb-4 p-2 bg-sky-50 rounded-lg border">
                    <div>
                        <h2 class="text-sm text-sky-800">{{ $plan['name'] }}</h2>
                    </div>
                    <div>
                        <a href="#" class="text-xs bg-sky-200 text-sky-700 rounded-full">
                            <x-iconoir-google-docs class="h-4 w-4" />

                        </a>
                    </div>
                </div>
            @endforeach
                    </div>
                </div>



            </div>
        </div>


    </div>
    <div>
        <!-- Add Qualification Modal -->
        <x-dialog-modal wire:model="confirmingAddQualification">
            <x-slot name="title">
                {{ __('New Qualification') }}
            </x-slot>

            <x-slot name="content">
                <!-- Dropdown for Selecting Qualification -->
                <div class="mt-4">
                    <label for="qualification" class="block text-sm font-medium text-gray-700">Select
                        Qualification</label>
                    <select id="qualification" wire:model="qualification_id"
                        class="block w-full pl-3 pr-10 py-2 text-base shadow-md-gray-300 focus:outline-none focus:ring-indigo-500 focus:shadow-md-indigo-500 sm:text-sm rounded-md">
                        <option value="">-- Select Qualification --</option>
                        @foreach ($dbQual as $qual)
                            <option value="{{ $qual->id }}">{{ $qual->qualification_title }}</option>
                        @endforeach
                    </select>

                    @error('qualification_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button class="m-2" wire:click="$set('confirmingAddQualification', false)">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-button class="m-2" wire:click="addQualificationToUser" wire:loading.attr="disabled">
                    {{ __('Add Qualification') }}
                </x-button>
            </x-slot>
        </x-dialog-modal>


    </div>


    @script
        <script>
            const ctx = document.getElementById('skillGapChart');

            const jcpRating = $wire.jcpRating;
            const myRating = $wire.myRating;
            const supervisorRating = $wire.supervisorRating;

            const labels = jcpRating.map(item => item.category);
            const values = jcpRating.map(item => item.value);
            const values2 = myRating.map(item => item.value);
            const values3 = supervisorRating.map(item => item.value);

            console.log(labels, values);
            // Radar Chart
new Chart(ctx, {
    type: 'radar',
    data: {
        labels: labels,
        datasets: [{
                label: 'JCP Requirement',
                data: values,
                borderWidth: 3,
                fill: true,
                backgroundColor: 'rgba(86, 203, 249, 0.2)',  // Dark blue with opacity
                borderColor: 'rgb(86, 203, 249)',  // Dark blue
                pointBackgroundColor: 'rgb(86, 203, 249)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(86, 203, 249)'
            },
            {
                label: 'My Skill Level',
                data: values2,
                fill: true,
                backgroundColor: 'rgba(139, 135, 244, 0.2)',  // Turquoise with opacity
                borderColor: 'rgb(139, 135, 244)',  // Turquoise
                pointBackgroundColor: 'rgb(139, 135, 244)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(139, 135, 244)'
            },
            {
                label: 'Supervisor Rating',
                data: values3,
                fill: true,
                backgroundColor: 'rgba(0, 102, 204, 0.2)',  // Darker blue with opacity
                borderColor: 'rgb(0, 102, 204)',  // Darker blue
                pointBackgroundColor: 'rgb(0, 102, 204)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(0, 102, 204)'
            }
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        scales: {
            r: {
                beginAtZero: true
            }
        }
    }
});

// Bar and Line Chart Combo
const cty = document.getElementById('myChart');
new Chart(cty, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            type: 'line',
            label: 'My Level',
            data: values2,
            backgroundColor: 'rgba(139, 135, 244, 0.2)',  // Turquoise with opacity
            borderColor: 'rgb(139, 135, 244)',  // Turquoise
            borderWidth: 1
        }, {
            type: 'line',
            label: 'Supervisor Rating',
            data: values3,
            backgroundColor: 'rgba(0, 102, 204, 0.2)',  // Darker blue with opacity
            borderColor: 'rgb(0, 102, 204)',  // Darker blue
            borderWidth: 1
        }, {
            type: 'bar',
            label: 'JCP Requirement',
            data: values,
            fill: false,
            backgroundColor: 'rgba(86, 203, 249,0.2)',  // Dark blue with opacity
            borderColor: 'rgb(86, 203, 249)',  // Dark blue
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

        </script>
    @endscript

</div>
</div>
</div>
