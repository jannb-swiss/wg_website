<?php

namespace App\Http\Controllers;

use App\Models\CleaningPlan;
use App\Models\Finance;
use App\Models\User;
use App\Models\WgGroup;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CleaningPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Displays all users of the WG
        $allUsers = DB::table('users')
            ->select('name', 'users.id')
            ->join('wg_groups', 'users.wg_group_id', '=', 'wg_groups.id')
            ->where('wg_group_id', Auth::user()->wgGroup()->firstOrFail()->id)
            ->get();

        //Shows how many users are in the WG
        $allUsersCount = DB::table('users')
            ->select('name')
            ->join('wg_groups', 'users.wg_group_id', '=', 'wg_groups.id')
            /*->join('cleaning_plans', 'wg_groups.id', '=', 'cleaning_plans.wg_id')*/
            ->where('wg_group_id', Auth::user()->wgGroup()->firstOrFail()->id)
            ->get()->count();

        //Displays all entries of the WG sorted by updated_at
        $cleaningPlans = DB::table('cleaning_plans')
            ->select('cleaning_task', 'cleaning_plans.id', 'cleaning_plans.updated_at')
            ->join('wg_groups', 'cleaning_plans.wg_id', '=', 'wg_groups.id')
            ->where('wg_id', Auth::user()->wgGroup()->firstOrFail()->id)
            ->orderBy('cleaning_plans.updated_at', 'asc')
            ->get();

        //Displays all entries of the WG
        $cleaningPlansUnsort = DB::table('cleaning_plans')
            ->select('cleaning_task', 'cleaning_plans.id', 'cleaning_plans.updated_at')
            ->join('wg_groups', 'cleaning_plans.wg_id', '=', 'wg_groups.id')
            ->where('wg_id', Auth::user()->wgGroup()->firstOrFail()->id)
            ->get();

        //Shows how many entries the cleaning schedule has
        $cleaningPlansCount = DB::table('cleaning_plans')
            ->select('cleaning_task')
            ->join('wg_groups', 'cleaning_plans.wg_id', '=', 'wg_groups.id')
            ->where('wg_id', Auth::user()->wgGroup()->firstOrFail()->id)
            ->get()->count();


        $maxLength = $cleaningPlansCount > $allUsersCount ? $cleaningPlansCount : $allUsersCount;

        $merge = $allUsers->merge($cleaningPlans);

        $result = $merge->all();


        return view('cleaning_plan.indexCleaningPlan', compact(['cleaningPlans', 'maxLength', 'allUsers', 'cleaningPlansCount', 'allUsersCount', 'cleaningPlansUnsort']));

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the given request
        $data = $this->validate($request, [
            'cleaning_task' => 'required|string|max:255',
        ]);

        // create a new incomplete shoppingList with the given title
        $wg = Auth::user()->wgGroup()->firstOrFail()->id;

        $cleaningPlan = CleaningPlan::create([
            'cleaning_task' => $data['cleaning_task'],
        ]);
        $cleaningPlan->wgGroupCleaningPlan()->associate($wg);
        $cleaningPlan->save();

        // flash a success message to the session
        session()->flash('status', 'Das Item wurde hinzugefügt!');

        // redirect to shoppingLists index
        return redirect('/putzplan');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CleaningPlan $cleaningPlan)
    {
        $cleaningPlan->delete();
        return redirect('/putzplan');
    }
}
