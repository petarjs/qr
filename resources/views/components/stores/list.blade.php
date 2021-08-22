@props(['stores'])

<div class="bg-white overflow-hidden">
    <ul class="divide-y divide-gray-200">
        @forelse($stores as $store)
            <li>
                <x-stores.list-item :store="$store"/>
            </li>
        @empty
            <li class="py-4">
                <x-empty-state>
                    <x-slot name="title">No stores :(</x-slot>
                    <x-slot name="message">There are no stores yet</x-slot>
                    @can('manage stores')
                        <x-slot name="button">
                            <x-button as="a" :href="route('users.stores.create')" icon="plus">
                                Add your first store
                            </x-button>
                        </x-slot>
                    @endcan
                </x-empty-state>
            </li>
        @endforelse
    </ul>
    @if(!$stores->isEmpty())
        <x-pagination :pagination="$stores"/>
    @endif
</div>
