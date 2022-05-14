<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use App\Models\ShoppingList;
use App\Models\User;
use App\Models\WgGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $finances = WgGroup::where('id', Auth::user()->wgGroup()->firstOrFail()->id)
            ->firstOrFail()
            ->financeWgGroup()
            ->orderBy('is_complete')
            ->orderByDesc('created_at')
            ->paginate(5);

        //Zeigtm alle User an wert:string
        $finances_users = User::select('name')->where('wg_group_id', Auth::user()->wgGroup()->firstOrFail()->id)->get();
        //Summe Items alle Users durch 3 wert:int
        $finances_sum = Finance::sum('item_price') / User::where('wg_group_id', Auth::user()->wgGroup()->firstOrFail()->id)->count();

        //show all users in same wg like logget user
        $a = User::where('wg_group_id', Auth::user()->wgGroup()->firstOrFail()->id)->get();

        //show sum from logget user items
        $b = Finance::where('user_id', Auth::user()->id)->sum('item_price');

        /*        $finances_sums = DB::table('finances')
                    ->selectRaw('sum(finances.item_price) as sum')
                    ->join('users', 'finances.user_id', '=', 'users.id')
                    ->where('wg_group_id', Auth::user()->wgGroup()->firstOrFail()->id)
                    ->groupBy('user_id')
                    ->get();*/

        $finances_sums = DB::table('finances')
            ->select('users.name', DB::raw('sum(finances.item_price) as sum'))
            ->join('users', 'finances.user_id', '=', 'users.id')
            ->where('wg_group_id', Auth::user()->wgGroup()->firstOrFail()->id)
            ->groupBy('users.name')
            ->get();


        /*return $finances_sums;*/

                return view('finance.indexFinance', ['finances' => $finances, 'finances_sums' => $finances_sums]);
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
            'finance_title' => 'required|string|max:255',
            'item_price' => 'required|numeric|max:255',
        ]);

        $wg_id = $this->validate($request, [User::select('wg_group_id')->where('id', Auth::id())->get()]);

        // create a new incomplete shoppingList with the given title
        $wg = Auth::user()->wgGroup()->firstOrFail()->id;
        $user = Auth::user();

        $finance = Finance::create([
            'finance_title' => $data['finance_title'],
            'item_price' => $data['item_price'],
            'is_complete' => false,
        ]);
        $finance->user()->associate($user);
        $finance->wgGroupFinance()->associate($wg);
        $finance->save();

        // flash a success message to the session
        session()->flash('status', 'Das Item wurde hinzugefügt!');

        // redirect to shoppingLists index
        return redirect('/finanzen');
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
    public function update(Finance $finance)
    {
        // check if the authenticated user can complete the shoppingList
        /*$this->authorize('complete', $shoppingList);*/

        // mark the shoppingList as complete and save it
        $finance->is_complete = true;
        $finance->save();

        // flash a success message to the session
        session()->flash('status', 'Produkt wurde hinzugefügt!');

        // redirect to shoppingLists index
        return redirect('/finanzen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Finance $finance)
    {
        $finance->delete();
        return redirect('/finanzen');
    }
}
