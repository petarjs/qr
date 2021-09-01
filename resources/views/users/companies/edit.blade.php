<x-layouts.app>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{$company->name}}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex-1 flex items-stretch overflow-hidden">
                    <main class="flex-1 overflow-y-auto p-8">

                        <form
                            action="{{route('users.companies.update')}}"
                            method="POST"
                            enctype="multipart/form-data"
                        >
                            @csrf
                            <x-input name="name" label="Name" :value="$company->name"/>
                            <x-input name="currency" label="Currency" :value="$company->currency"/>

                            <div class="flex">
                                <x-input name="logo" label="Logo" type="file" value=""/>

                                <div class="max-w-sm">
                                    {{$company->getFirstMedia('logo')}}
                                </div>
                            </div>

                            <x-button>Save</x-button>

                        </form>

                    </main>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
