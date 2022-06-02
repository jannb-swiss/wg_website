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

        $finances_sums = DB::table('finances')
            ->select('users.name', DB::raw('sum(finances.item_price) as sum'))
            ->join('users', 'finances.user_id', '=', 'users.id')
            ->where('wg_group_id', Auth::user()->wgGroup()->firstOrFail()->id)
            ->where('finances.wg_id', Auth::user()->wgGroup()->firstOrFail()->id)
            ->groupBy('users.name')
            ->get();

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
        $data = $this->validate($request, [
            'finance_title' => 'required|string|max:255',
            'item_price' => 'required|numeric|max:255',
        ]);

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

        session()->flash('status', 'Das Item wurde hinzugefügt!');
        session()->flash('statusError', 'Bitte trage das Produkt und für den Preis eine Zahl ein!');

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
        //
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
