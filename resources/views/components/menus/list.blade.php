@props(['menus'])

<div class="bg-white overflow-hidden">
    <ul class="divide-y divide-gray-200">
        @forelse($menus as $menu)
            <li>
                <x-menus.list-item :menu="$menu"/>
            </li>
        @empty
            <li class="py-4">
                <x-empty-state>
                    <x-slot name="title">No menus :(</x-slot>
                    <x-slot name="message">There are no menus yet</x-slot>
                    @can('manage menus')
                        <x-slot name="button">
                            <x-button as="a" href="#" icon="plus">
                                Add your first menu
                            </x-button>
                        </x-slot>
                    @endcan
                </x-empty-state>
            </li>
        @endforelse
    </ul>
    @if(!$menus->isEmpty())
        <x-pagination :pagination="$menus"/>
    @endif
</div>
