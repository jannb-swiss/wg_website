<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        return view('verified.dashboard');
    }


    public function __invoke(Request $request)
    {
        $request->session()->reflash();

        $user = Auth::user();

/*        switch ($user->role) {
            case Role::Student:
                return redirect()->route('subscription.index');
            case Role::Advertiser:
                return redirect()->route('company.offers');
            case Role::Moderator:
            case Role::Admin:
                return redirect()->route('offer.overview');
        }*/
    }
}
