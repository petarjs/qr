<x-layouts.app>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{$company->name}}
            </h2>

            @can('manage company')
                <x-button as="a" href="{{route('users.companies.edit')}}">Edit</x-button>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex-1 flex items-stretch overflow-hidden">
                    <main class="flex-1 overflow-y-auto p-8">

                        {{$company->name}}

                        <div class="max-w-sm">
                            {{$company->getFirstMedia('logo')}}
                        </div>

                    </main>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
