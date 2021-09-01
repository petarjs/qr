<x-layouts.guest>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex-1 flex items-stretch overflow-hidden">
                    <main class="flex-1 overflow-y-auto p-8">
                        <div class="max-w-sm">
                            {{$company->getFirstMedia('logo')}}
                        </div>

                        <h1 class="text-2xl font-bold my-12">{{$company->name}} {{$menu->name}}</h1>

                        @foreach($menu->menuItemGroups as $menuItemGroup)
                            <h2 class="text-xl font-bold mt-8 mb-4">{{$menuItemGroup->name}}</h2>
                            @foreach($menuItemGroup->menuItems as $menuItem)
                                <div class="mb-2 hover:bg-gray-50 p-4 rounded-lg">
                                    <div class="flex justify-between">
                                        <h3 class="font-semibold">{{$menuItem->name}}</h3>
                                        <div>{{$menuItem->price}} {{$company->currency}}</div>
                                    </div>
                                    @if($menuItem->description)
                                        <div class="text-gray-400">
                                            {{$menuItem->description}}
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        @endforeach
                    </main>
                </div>
            </div>
        </div>
    </div>
</x-layouts.guest>
