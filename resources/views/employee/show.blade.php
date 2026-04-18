<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employees') }}
            </h2>
            <a href="{{route('employees.create')}}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                + Create New Employee
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 dark:text-gray-200 overflow-hidden shadow-sm sm:rounded-lg p-4 space-y-10">
                <div class="flex justify-end space-x-4">
                    <a class="'inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'" href="{{route('employees.edit', $employee->id, '/edit')}}">Edit</a>
                    <a class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150" href="{{route('employees.index')}}">go back</a>
                </div>

                <div class="bg-gray-700 shadow-xl text-gray-200 mx-auto rounded-2xl p-8 max-w-md w-full">

                    <!-- Avatar Placeholder -->
                    <div class="flex justify-center mb-6">
                        <div class="w-20 h-20 rounded-full bg-gray-200 flex items-center uppercase justify-center text-gray-500 text-xl font-bold">
                            {{$employee->first_name[0] . $employee->last_name[0]}}
                        </div>
                    </div>

                    <!-- Employee Name -->
                    <h1 class="text-2xl font-bold text-center text-gray-200 mb-4">
                     {{$employee->first_name . ' ' . $employee->last_name}}
                    </h1>

                    <!-- Company Name -->
                    <p class="text-gray-300 text-center mb-2">
                    <span class="font-semibold">Company:</span>
                        {{$employee->companies->name}}
                    </p>

                    <!-- Email -->
                    <p class="text-gray-300 text-center mb-2">
                    <span class="font-semibold">Email:</span>
                        {{$employee->email}}
                    </p>

                    <!-- Phone -->
                    <p class="text-gray-300 text-center">
                    <span class="font-semibold">Phone:</span>
                        {{$employee->phone}}
                    </p>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>