<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Community Contributions') }}
        </h2>
    </x-slot>
    @if (session('approved'))
        <div class="bg-green-400 text-green-900 text-center">
            {{session('approved')}}
        </div>
    @elseif (session('notApproved'))
        <div class="bg-yellow-400 text-orange-900 text-center">
            {{session('notApproved')}}
        </div>
    @endif
    <div class="py-12">
        <x-community-links :links="$links" :channels="$channels" />
    </div>
</x-app-layout>



<!-- 
PREGUNTAS


-->
