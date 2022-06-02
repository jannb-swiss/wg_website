<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WgGroup;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Symfony\Component\Console\Input\Input;
use function PHPUnit\Framework\isEmpty;

class WgGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wgGroup = Auth::user()->wgGroup()->get();
        $User = Auth::user();

        if($wgGroup->isEmpty()){
            return view('verified.createWgGroupe');
        }else{
            $wgName = Auth::user()->wgGroup()->firstOrFail()->wg_name;
            return View::make('verified.indexWgGroupe', ['wgName' => $wgName, 'User' => $User]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Data $data)
    {
        return view('verified.createWgGroupe');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
            $wg = WgGroup::create([
                'wg_name' => $request->wg_name
            ]);
            $wg->users()->save(Auth::user());

            return redirect('/indexWG');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wgGroup = WgGroup::where('id', Auth::id())->findOrFail();
        return view ('verified.indexWgGroupe', ['wgGroup' => $wgGroup]);
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
    public function update()
    {
        $userAuth = Auth::user();

        if($userAuth){
            $userAuth->wg_group_id = null;
            $userAuth->save();
        }

        return redirect('/indexWG');
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
