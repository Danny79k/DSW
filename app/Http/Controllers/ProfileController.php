<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        if ($request->hasFile('image')) {
            // Obtiene el archivo subido
            $image = $request->file('image');
            
            // Define el nombre único de la imagen (usando timestamp para evitar duplicados)
            $imageName = time() . '_' . $image->getClientOriginalName();
            
            // Define la ruta completa de destino para almacenar la imagen
            $destinationPath = public_path('profile-images');
            // Asegúrate de que la carpeta exista
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true); // Crea la carpeta con permisos de escritura
            }
            
            // Mueve el archivo a la carpeta especificada en public/profile-images
            $image->move($destinationPath, $imageName);
            
            // Obtén la ruta relativa (para almacenar en la base de datos o para mostrar la imagen)
            $path = 'profile-images/' . $imageName;
            
            // Guarda la ruta en el usuario
            $user = $request->user();
            $user->image = $path;
            // dd($user->$path);
            // $request->user()->save();

            $user->save();
            return Redirect::route('profile.edit')->with('status', 'profile-updated');
    
            
            // return redirect()->back()->with('success', 'Imagen guardada correctamente.');
            }
            
            return redirect()->back()->withErrors('No se ha subido ninguna imagen.');

       
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
