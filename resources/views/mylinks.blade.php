<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Community Contributions') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <x-community-mylinks :linksPersonal="$linksPersonal"/>
    </div>
</x-app-layout>