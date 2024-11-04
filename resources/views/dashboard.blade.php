<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Community Contributions') }}
        </h2>
    </x-slot>
    <x-flash-message />
    <div class="py-12">
        <x-community-links :links="$links" :channels="$channels" />
    </div>
</x-app-layout>



<!-- 
PREGUNTAS

@csrf

esta directiva se utiliza para prevenir los cross-site forgery request, es decir formulario externos apuntando a nuestra pagina para insertar y resuperar informacion, la directiva crea un token que se utiliza siempre para permitir la enviar los formularios de nuestra app laravel

¿Qué sucedería si no incluyes la opción --model al crear el controlador?
el controlador se creará vacio

explica esto:
$vote = CommunityLinkUser::firstOrNew(['user_id' => Auth::id(), 'community_link_id' => $link->id]) guardamos en una variable $vote el primer registro con los valores busquedo si existe y si no guardamos uno nuevo;
if ($vote->id) comprobamos que el id del registro existe
$vote->delete(); si existe borramos el registro creado
else si no
$vote->save(); lo insertamos en la BD
return back(); volvemos a la anterior vista
-->