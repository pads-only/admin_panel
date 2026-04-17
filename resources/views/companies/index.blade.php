<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Companies') }}
            </h2>
            <a href="{{route('companies.create')}}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                + Create New Company
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
                <table class="min-w-full w-full dark:text-gray-200 rounded-lg p-4">
                    <thead class="dark:bg-gray-900">
                    <tr>
                        <th class="text-left py-3 px-4">Name</th>
                        <th class="text-left py-3 px-4">Email</th>
                        <th class="text-left py-3 px-4">Website</th>
                        <th class="py-3 px-4 text-right">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                            <tr class="border-t">
                                <td class="py-3 px-4">{{$company->name}}</td>
                                <td class="py-3 px-4">{{$company->email}}</td>
                                <td class="py-3 px-4">{{$company->website}}</td>
                                <td class="py-3 px-4 space-x-2 flex justify-end">
                                <a href="{{route('companies.show', $company->id)}}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                                    View
                                </a>
                                <form action="{{route('companies.destroy', $company->id)}}" method="post">
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
                    {{$companies->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>