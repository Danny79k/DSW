<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Community Contributions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <x-community-links :links="$links" :channels="$channels" />
    </div>
</x-app-layout>


<!-- 
PREGUNTAS

$channels = Channel::orderBy('title','asc')->get();
¿Qué hace el código anterior?

recoge y muestra los canales ordenados de manera ascendente por el titulo

<div class="mb-4">
<label for="Channel" class="block text-white font-medium">Channel:</label>
<select
class="@error('channel_id') is-invalid @enderror mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
name="channel_id">
<option selected disabled>Pick a Channel...</option>
@foreach ($channels as $channel)
<option value="{{ $channel->id }}">
{{ $channel->title }}
</option>
@endforeach
</select>
@error('channel_id')
<span class="text-red-500 mt-2">{{ $message }}</span>
@enderror
</div>

este codigo es una funcionalidad nueva de nuestro componente community-add-links es el campo de formulario tipo options donde tenemos que escoger el tipo de lenguaje de programacion para la publicacion del community link


<option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : '' }}>
{{ $channel->title }}
</option>
Explica qué es lo que hace la línea anterior.

esta linea de codigo hace que al darle a submit y al prducirse error se guarde la informacion producida en el campo correspondiente
-->