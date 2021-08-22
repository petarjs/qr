@props(['users'])

<div class="bg-white overflow-hidden">
    <ul class="divide-y divide-gray-200">
        @forelse($users as $user)
            <li>
                <x-company-users.list-item :user="$user"/>
            </li>
        @empty
            <li class="py-4">
                <x-empty-state>
                    <x-slot name="title">No users :(</x-slot>
                    <x-slot name="message">There are no users yet</x-slot>
                        <x-slot name="button">
                            <x-button as="a" href="#" icon="plus">
                                Invite a user
                            </x-button>
                        </x-slot>
                </x-empty-state>
            </li>
        @endforelse
    </ul>
    @if(!$users->isEmpty())
        <x-pagination :pagination="$users"/>
    @endif
</div>
