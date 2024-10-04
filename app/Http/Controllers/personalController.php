<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalController extends Controller
{
    public function personal()
    {
        // dd("hola");
        $user = User::find(1);
        $linksPersonal = $user->communityLinks()->paginate(15);
        // dd($linksPersonal);
        return view('personal', compact("linksPersonal"));
    }
}
