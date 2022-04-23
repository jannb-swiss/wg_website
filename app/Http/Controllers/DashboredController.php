<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use Illuminate\Http\Request;

class DashboredController extends Controller
{
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
