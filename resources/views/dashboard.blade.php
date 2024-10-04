<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Community Contributions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <x-community-links :links="$links"/>
    </div>
</x-app-layout>


<!-- 
PREGUNTAS

¿Qué hace la directiva @csrf?

esta directiva genera un token oculto para cada sesion activa y se utiliza para porteger los formularios y la informacion introducida en ellos, por ejemplo un maalintencionado podria crear un formulario apuntando a la ruta de post o get de nuestra aplicacion y enviar informacion maliciosa, esta practica se conoce como 'cross-site request forgery'

¿Qué método se llamará en el controlador CommunityController al enviar el formulario?

se enviaran datos por el metodo post al controlador desde mi formulario, para que no esten a la vista de malintencionados

Intenta enviar un enlace. ¿Qué ocurre? Resuélvelo.

The POST method is not supported for route dashboard. Supported methods: GET, HEAD. 
aparece este mensaje de error, en cuanto el metodo POST no esta suportado, que la ruta de dashboard Route::post no esta definida, tenemos que definir la ruta que devuelve su vista y luego tenemos que definir en el controlador el metodo store que usaremos en la ruta Route::post
-->
