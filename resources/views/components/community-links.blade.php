@props(['links','channels']);
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <x-community-add-link :channels="$channels" />
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100 grid grid-rows-4 grid-cols-4 gap-3">
            @if ($links->isEmpty())
                <div class="text-center text-gray-500 dark:text-gray-400">No links found</div>
            @endif
            @foreach ($links as $link)
                <a href="/personal" class="border-2 p-1 rounded-lg hover:bg-red-600 text-center">{{$link->title}}<span
                        class="inline-block px-2 py-1 text-white text-sm font-semibold rounded"
                        style="background-color: {{ $link->channel->color }}">
                        {{ $link->channel->title }}
                    </span><br><small class="text-slate-500">Contributed by: {{$link->creator->name}}</small><br><small
                        class="text-slate-500"> {{$link->updated_at->diffForHumans()}}</small></a>
            @endforeach
            {{$links->links()}}
        </div>
    </div>
</div>