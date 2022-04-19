<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WgGroup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WGController extends Controller
{
    public function dashboard()
    {
        return view('verified.dashboard');
    }

    public function createWG(Request $request)
    {
        $wg = new WgGroup();
        $wg->wg_name = $request->wg_name;
        $wg->user_id = User::find($request['id']);
        $wg->save();

        if($wg != null){
            return redirect()->back()->with(session()->flash('alert-success', 'Your wg are createt'));
        }

        return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong!'));
    }
}
