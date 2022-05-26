<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
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
        return view ('chat.indexChat');
    }

    public function fetchMessages()
    {
        return WgGroup::where('id', Auth::user()->wgGroup()->firstOrFail()->id)
            ->firstOrFail()
            ->chatWgGroup()
            ->with('user')
            ->get();
    }

    public function sendMessage(Request $request)
    {
        $user = Auth::user();

        $message = $user->chat()->create([
            'message' => $request->input('message'),
            'wg_id' => Auth::user()->wgGroup()->firstOrFail()->id
        ]);

        broadcast(new MessageSent($user, $message))->toOthers();

        return ['status' => 'Message Sent!'];
    }
}
