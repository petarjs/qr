<x-layouts.app>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{$menu->company->name}} {{ __('Menu') }} {{$menu->name}}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex-1 flex items-stretch overflow-hidden">
                    <main class="flex-1 overflow-y-auto p-8">

                        <x-input name="name" label="Menu Name" :value="$menu->name"/>

                        <h2 class="text-xl mt-8 mb-3 font-semibold">Menu</h2>
                        <x-accordion>
                            @forelse($menu->menuItemGroups as $menuItemGroup)
                                <x-accordion-item>
                                    <x-slot name="header">
                                        <div class="px-4 py-4 bg-gray-100 hover:bg-gray-200 cursor-pointer">
                                            <x-menu-item-groups.list-item :menuItemGroup="$menuItemGroup"/>
                                        </div>
                                    </x-slot>
                                    <x-slot name="content">
                                        <ul role="list" class="divide-y divide-gray-200">
                                            @forelse($menuItemGroup->menuItems as $menuItem)
                                                <li class="py-4 px-4 hover:bg-gray-50 cursor-pointer">
                                                    <x-menu-items.list-item :menuItem="$menuItem"/>
                                                </li>
                                            @empty
                                                <x-empty-state>
                                                    <x-slot name="title">No menu items in this group :(</x-slot>
                                                    <x-slot name="message">There are no menus items yet</x-slot>
                                                    @can('manage menus')
                                                        <x-slot name="button">
                                                            <x-button as="a" href="#" icon="plus">
                                                                Add a menu item
                                                            </x-button>
                                                        </x-slot>
                                                    @endcan
                                                </x-empty-state>
                                            @endforelse
                                        </ul>
                                    </x-slot>
                                </x-accordion-item>
                            @empty
                                <x-empty-state>
                                    <x-slot name="title">No menu items :(</x-slot>
                                    <x-slot name="message">There are no menus items yet</x-slot>
                                    @can('manage menus')
                                        <x-slot name="button">
                                            <x-button as="a" href="#" icon="plus">
                                                Add your first menu item
                                            </x-button>
                                        </x-slot>
                                    @endcan
                                </x-empty-state>
                            @endforelse
                        </x-accordion>
                    </main>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
