<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

$userMessages = DB::table('chats')
    ->select('users.name', 'chats.message', DB::raw('DATE_FORMAT(chats.created_at, "%d.%m.%Y %H:%i:%s") as created_at'))
    ->join('users', 'chats.user_id', '=', 'users.id')
    ->where('wg_group_id', Auth::user()->wgGroup()->firstOrFail()->id)
    ->orderBy('created_at', 'desc')
    ->get();

return $userMessages;
