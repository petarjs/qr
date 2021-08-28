@props(['menuItemGroup'])

<div class="flex space-x-3">
    <img class="h-12 w-12 rounded-lg" src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NDl8fGNvZmZlZXxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60" alt="">
    <div class="flex-1 ml-2 space-y-1">
        <div class="flex items-center justify-between">
            <h3 class="text-sm font-bold">{{$menuItemGroup->name}}</h3>
        </div>
        <p class="text-sm text-gray-500">
            @isset($menuItemGroup->description)
                {{$menuItemGroup->description}}
            @else
                N/a
            @endisset
        </p>
    </div>
</div>
