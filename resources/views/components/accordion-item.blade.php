@props(['header', 'content'])

<li class="divide-y divide-gray-200" x-data="{ open: false }">
    <div @click="open = !open">
        {{$header}}
    </div>

    <div class="ml-4" x-show="open">
        {{$content}}
    </div>
</li>
