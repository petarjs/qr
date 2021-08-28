@props(['menuItem'])

<div class="flex space-x-3">
    <img class="h-12 w-12 rounded-lg"
         src="https://images.unsplash.com/photo-1494314671902-399b18174975?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NDR8fGNvZmZlZXxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60"
         alt="">
    <div class="flex-1 ml-2 space-y-1">
        <div class="flex items-center justify-between">
            <h3 class="text-sm font-bold">{{$menuItem->name}}</h3>
            <p class="text-sm text-gray-500 font-bold">{{$menuItem->price}} {{$menuItem->menuItemGroup->menu->company->currency}}</p>
        </div>
        <p class="text-sm text-gray-500">
            @isset($menuItem->description)
                {{$menuItem->description}}
            @else
                N/a
            @endisset
        </p>
    </div>
</div>
