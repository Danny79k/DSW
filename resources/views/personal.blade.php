<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Community Contributions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 grid grid-rows-4 grid-cols-4 gap-3">
                    @foreach ($linksPersonal as $link)
                    <div href="personal" class="border-2 p-1 rounded-lg hover:bg-red-600 text-center">{{$link -> title}}</div>
                    @endforeach
                    {{$linksPersonal -> links()}}            
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
