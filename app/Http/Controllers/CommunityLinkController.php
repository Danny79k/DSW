<?php

namespace App\Http\Controllers;

use App\Models\CommunityLink;
// use App\Models\User;
use App\Models\CommunityLinkUsers;
use App\Queries\CommunityLinkQuery;
use Database\Factories\CommunityLinkFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Channel;
use App\Http\Requests\CommunityLinkForm;


class CommunityLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Channel $channel = null)
    {
        if ($channel != null) {
            $links = (new CommunityLinkQuery())->getByChannel($channel);

        } else {
            if (request()->exists('popular')) {
                $links = (new CommunityLinkQuery())->getMostPopular();
            } else if (request()->exists("search")) {
                $search = request("search");
                $links = (new CommunityLinkQuery())->getSearch($search);
            } else {
                $links = (new CommunityLinkQuery())->getAll();
            }
        }
        $channels = Channel::orderBy('title', 'asc')->get();
        return view('dashboard', compact("links", "channels"));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function hasLiked($communityLink)
    {
        $link = CommunityLink::findOrFail($communityLink);
        $existingLike = $link->likes()->where('user_id', auth()->id())->first();
        if ($existingLike) {
            return back();
        } else {
            $link->likes()->create([
                'user_id' => auth()->id(),
            ]);
            return back();
        }
    }

    public function personal()
    {

        $user = Auth::user(); // el metodo Auth::id() devuelve el id de usuario autentificado 
        $linksPersonal = $user->communityLinks()->paginate(10);
        return view('mylinks', compact("linksPersonal"));
    }
    public function store(CommunityLinkForm $request)
    {
        $data = $request->validated();
        $link = new CommunityLink($data);

        if ($link->hasAlreadyBeenSubmitted()) {
            return back();
        } else {
            $link->user_id = Auth::id();
            $link->approved = Auth::user()->trusted ?? false;
            $link->save();
            if (Auth::user()->trusted) {
                return back()->with('success', 'Link Approved!!');
            } else {
                return back()->with('info', 'Pending Approval');
            }
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(CommunityLink $communityLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommunityLink $communityLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommunityLink $communityLink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommunityLink $communityLink)
    {
        //
    }
}
