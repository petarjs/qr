<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menus') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex-1 flex items-stretch overflow-hidden">
                    <main class="flex-1 overflow-y-auto p-8">
                        <div>
                            @if($isEditing)
                                Edit
                            @else
                                Create
                            @endif
                            Menu
                        </div>

                        <form method="POST" action="{{route('users.menus.save', $menu)}}">
                            @csrf

                            @if($errors->any())
                                <div class="px-4 mb-6">
                                    <x-form-errors :errors="$errors"/>
                                </div>
                            @endif

                            <x-input name="name" label="Name" :value="$menu->name"/>

                            <div class="mt-4 text-right">
                                <x-button icon="check">
                                    Save
                                </x-button>
                            </div>
                        </form>
                    </main>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
