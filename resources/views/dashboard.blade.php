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
EXPLICAMOS EL METODO

public function hasAlreadyBeenSubmitted() // declaramos la funcion como publica y el asginamos un nombre claro y coinciso sobre el uso que se le va a dar
{
$existing = static::where('link', $this->link)->first(); // asignamos a la variable $existing el link que vamos a modificar
if ($existing) { // abrimos el condicional para cambiar el timestamp, en este caso verificamos si existe el link
if (Auth::user()->isTrusted()) { // verificamos si el usuario esta verificado
$existing->touch(); // en caso positivo cambiamos el timestamp con el metodo touch() que es un metodo proprio de Model
if ($existing->approved == 0) // en caso de que el enlace no este aprobado
$existing->approved = 1; // lo aprobamos
$existing->save(); // guardamos los cambios en la BD
session()->flash('success', 'The link already exists and its timestamp has been updated.'); // mostramos el mensaje flash que el mensaje ya existe y que hemos modificado el timestamp
return true; // cerramos el bloque
} else { // comporbamos la inversa, si el usuario no esta verificado
if ($existing->approved) // en caso de que el link este aprobado
session()->flash('info', 'The link already exists and it is already approved but you are not a trusted user, so it will not be updated in the list.'); // mostramos el mensaje de que el link esta aprobado pero el usuario no y por lo tanto no se puede modificar el enlace
else // la inversa
session()->flash('info', 'The link already exists and it is pending for approval but you are not a trusted user, so it will not be updated in the list.'); // el mensaje no esta aprobado y el usuario tampoco
}
return true;
}
return false; // si el mensaje no existe retornamos False y no cambiamos nada
}

-->