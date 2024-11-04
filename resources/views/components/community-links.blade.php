@props(['links', 'channels', 'linksPersonal']);
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <x-community-add-link :channels="$channels" />
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100 grid grid-rows-4 grid-cols-4 gap-3">
            @if ($links->isEmpty())
                <div class="text-center text-gray-500 dark:text-gray-400">No links found</div>
            @endif
            @foreach ($links as $link)
                    <div class="border-2 p-1 rounded-lg hover:bg-red-600 text-center">{{$link->title}}<a
                            href="/dashboard/{{$link->channel->slug}}"
                            class="inline-block px-2 py-1 text-white text-sm font-semibold rounded"
                            style="background-color: {{ $link->channel->color }}">
                            {{ $link->channel->title }}
                        </a><br><small class="text-slate-500">Contributed by: {{$link->creator->name}}</small><br><small
                            class="text-slate-500">
                            {{$link->updated_at->diffForHumans()}}</small>
                        <form method="POST" action="dashboard/votes/{{ $link->id }}">
                            @csrf
                            <button type="submit" class="rounded px-4 py-2 {{ Auth::check() && Auth::user()->votedFor($link) ?
                'bg-green-500 hover:bg-green-600 text-white' :
                'bg-gray-500 hover:bg-gray-600 text-white'
                        }} disabled:opacity-50" {{ !Auth::user()->isTrusted() ? 'disabled' : '' }}>
                                {{ $link->users()->count() }}
                            </button>
                        </form>
                    </div>
            @endforeach
            {{$links->links()}}
        </div>
    </div>
</div>