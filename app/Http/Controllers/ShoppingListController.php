<?php

namespace App\Http\Controllers;

use App\Models\ShoppingList;
use App\Models\User;
use App\Models\WgGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $shoppingLists = WgGroup::where('id', Auth::user()->wgGroup()->firstOrFail()->id)
            ->firstOrFail()
            ->shoppingListWgGroup()
            ->orderBy('is_complete')
            ->orderByDesc('created_at')
            ->paginate(5);

        return view('shopping_list.indexShoppingList', ['shoppingLists' => $shoppingLists]);

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
        $data = $this->validate($request, [
            'shopping_list_title' => 'required|string|max:255',
        ]);

        $wg = Auth::user()->wgGroup()->firstOrFail()->id;
        $user = Auth::user();

        $shoppingList = ShoppingList::create([
            'shopping_list_title' => $data['shopping_list_title'],
            'is_complete' => false,
        ]);
        $shoppingList->user()->associate($user);
        $shoppingList->wgGroupShoppingList()->associate($wg);
        $shoppingList->save();

        session()->flash('status', 'Der Eintrag wurde hinzugefügt!');

        return redirect('/einkaufsliste');
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
    public function update(ShoppingList $shoppingList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShoppingList $shoppingList)
    {
        $shoppingList->delete();

        session()->flash('status_delete', 'Der Eintrag wurde gelöscht!');

        return redirect('/einkaufsliste');
    }
}
