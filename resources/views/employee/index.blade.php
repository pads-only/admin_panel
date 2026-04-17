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
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
                <table class="min-w-full w-full dark:text-gray-200 rounded-lg p-4">
                    <thead class="dark:bg-gray-900">
                    <tr>
                        <th class="text-left py-3 px-4">First Name</th>
                        <th class="text-left py-3 px-4">Last Name</th>
                        <th class="text-left py-3 px-4">Company</th>
                        <th class="text-left py-3 px-4">Email</th>
                        <th class="text-left py-3 px-4">Phone Number</th>
                        <th class="py-3 px-4 text-right">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr class="border-t">
                                <td class="py-3 px-4">{{$employee->first_name}}</td>
                                <td class="py-3 px-4">{{$employee->last_name}}</td>
                                <td class="py-3 px-4">{{$employee->companies->name}}</td>
                                <td class="py-3 px-4">{{$employee->email}}</td>
                                <td class="py-3 px-4">{{$employee->phone}}</td>
                                <td class="py-3 px-4 space-x-2 flex justify-end">
                                <a href="{{route('employees.show', $employee->id)}}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                                    View
                                </a>
                                <form action="{{route('employees.destroy', $employee->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button>
                                        Delete
                                    </x-danger-button>
                                </form>
                                </td>
                            </tr>
                        @endforeach
                </table>
                <div class="dark:bg-gray-900 p-4 border-t border-gray-200">
                    {{$employees->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>