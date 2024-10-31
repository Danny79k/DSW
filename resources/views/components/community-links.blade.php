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
                    <div class="flex justify-end"><small>{{ $link->users()->count() }}&nbsplikes</small>&nbsp<a href="{{$link->alreadyLiked() ? '/dashboard/like/'.$link->id : 'dashboard/removeLike'.$link->id}}"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-heart" viewBox="0 0 16 16">
                                <path
                                    d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                            </svg></a></div>
                </div>
            @endforeach
            {{$links->links()}}
        </div>
    </div>
</div>