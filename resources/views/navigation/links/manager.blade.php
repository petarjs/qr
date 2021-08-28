@section('links')
    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-jet-nav-link>

    <x-jet-nav-link href="{{ route('users.companies.show') }}" :active="request()->routeIs('users.companies.show')">
        {{ __('Company') }}
    </x-jet-nav-link>

    <x-jet-nav-link href="{{ route('users.stores.index') }}" :active="request()->routeIs('users.stores.index')">
        {{ __('Stores') }}
    </x-jet-nav-link>

    <x-jet-nav-link href="{{ route('users.menus.index') }}" :active="request()->routeIs('users.menus.index')">
        {{ __('Menus') }}
    </x-jet-nav-link>

    <x-jet-nav-link href="{{ route('users.company-users.index') }}"
                    :active="request()->routeIs('users.company-users.index')">
        {{ __('Users') }}
    </x-jet-nav-link>
@endsection

@section('responsive-links')
    <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-jet-responsive-nav-link>

    <x-jet-responsive-nav-link href="{{ route('users.companies.show') }}"
                               :active="request()->routeIs('users.companies.show')">
        {{ __('Company') }}
    </x-jet-responsive-nav-link>

    <x-jet-responsive-nav-link href="{{ route('users.stores.index') }}"
                               :active="request()->routeIs('users.stores.index')">
        {{ __('Stores') }}
    </x-jet-responsive-nav-link>

    <x-jet-responsive-nav-link href="{{ route('users.menus.index') }}"
                               :active="request()->routeIs('users.menus.index')">
        {{ __('Menus') }}
    </x-jet-responsive-nav-link>

    <x-jet-responsive-nav-link href="{{ route('users.company-users.index') }}"
                               :active="request()->routeIs('users.company-users.index')">
        {{ __('Users') }}
    </x-jet-responsive-nav-link>
@endsection
