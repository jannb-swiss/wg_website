<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*return User::where('id', Auth::user()->id)->select('wg_group_id')->firstOrFail();*/
        /*return User::where(['wg_group_id' => $wg_group_id])->first();*/

        return View('invite.invite');
    }

    public function inviteUser(Request $request) {
        //gibt wg_group_id in der ich den User einladen will zurück
        $wg = User::where('id', Auth::user()->id)/*->select('wg_group_id')*/->firstOrFail();

        $userMail = $request->email;

        MailController::sendSignupEmail($wg->wg_name, $wg->wg_group_id, $userMail);

        return redirect()->route('login')->with(session()->flash('alert-danger', 'Something went wrong:('));
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
        //
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
