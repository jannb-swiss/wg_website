<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Finance;
use App\Models\User;
use App\Models\WgGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $b = WgGroup::where('id', Auth::user()->wgGroup()->firstOrFail()->id)
            ->get();

        $a = Auth::user();

        $c = Auth::user()->wgGroup()->firstOrFail()->id;
//das gibt null! vielleicht bei chat auch model funktion verwenden!?
/*        $d = WgGroup::where('id', Auth::user()->wgGroup()->firstOrFail()->id)
            ->firstOrFail()
            ->chatWgGroup()
            ->get();*/

/*        $userMessages = WgGroup::where('id', Auth::user()->wgGroup()->firstOrFail()->id)
            ->firstOrFail()
            ->chatWgGroup()
            ->get();*/

        $userMessages = DB::table('chats')
            ->select('users.name', 'chats.message', DB::raw('DATE_FORMAT(chats.created_at, "%d.%m.%Y %H:%i:%s") as created_at'))
            ->join('users', 'chats.user_id', '=', 'users.id')
            ->where('wg_group_id', Auth::user()->wgGroup()->firstOrFail()->id)
            ->orderBy('created_at', 'desc')
            ->get();

/*        $userMessages =  WgGroup::where('id', Auth::user()->wgGroup()->firstOrFail()->id)
            ->firstOrFail()
            ->chatWgGroup()
            ->orderByDesc('created_at')
            ->get();*/



        /*return $userMessages;*/

        return view ('chat.indexChat', ['userMessages' => $userMessages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the given request
        $data = $this->validate($request, [
            'message' => 'required|string|max:1000',
        ]);

        // create a new incomplete shoppingList with the given title
        $wg = Auth::user()->wgGroup()->firstOrFail()->id;
        $user = Auth::user();

        $chat = Chat::create([
            'message' => $data['message'],
        ]);
        $chat->user()->associate($user);
        $chat->wgGroupChat()->associate($wg);
        $chat->save();


        // redirect to shoppingLists index
        return redirect('/chat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
