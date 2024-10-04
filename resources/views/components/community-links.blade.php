@props(['links'])
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-community-add-link/>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 grid grid-rows-4 grid-cols-4 gap-3">
                    @foreach ($links as $link)
                    <a href="Personal" class="border-2 p-1 rounded-lg hover:bg-red-600 text-center">{{$link -> title}}<br><small class="text-slate-500">Contributed by: {{$link->creator->name}}</small><br><small class="text-slate-500"> {{$link->updated_at->diffForHumans()}}</small></a>
                    @endforeach
                    {{$links -> links()}}            
                </div>
            </div>
        </div>