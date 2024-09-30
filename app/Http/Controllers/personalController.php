<?php

namespace App\Http\Controllers;
use App\Models\user;

use Illuminate\Http\Request;

class personalController extends Controller
{
    public function personal()
    {
        $user = User::find(1);
        $linksPersonal = $user->communityLinks()->paginate(15);
        return view('personal', compact("linksPersonal"));
    }
}
