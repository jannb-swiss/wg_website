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
        // paginate the authorized user's shoppingLists with 5 per page

        $shoppingLists = WgGroup::where('id', Auth::user()->wgGroup()->firstOrFail()->id)
            ->firstOrFail()
            ->shoppingListWgGroup()
            ->orderBy('is_complete')
            ->orderByDesc('created_at')
            ->paginate(5);

        // return shoppingList index view with paginated shoppingLists
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
        // validate the given request
        $data = $this->validate($request, [
            'shopping_list_title' => 'required|string|max:255',
        ]);

        $wg_id = $this->validate($request, [User::select('wg_group_id')->where('id', Auth::id())->get()]);

        // create a new incomplete shoppingList with the given title
        $wg = Auth::user()->wgGroup()->firstOrFail()->id;
        $user = Auth::user();

        $shoppingList = ShoppingList::create([
            'shopping_list_title' => $data['shopping_list_title'],
            'is_complete' => false,
        ]);
        $shoppingList->user()->associate($user);
        $shoppingList->wgGroupShoppingList()->associate($wg);
        $shoppingList->save();

        // flash a success message to the session
        session()->flash('status', 'shoppingList Created!');

        // redirect to shoppingLists index
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
        // check if the authenticated user can complete the shoppingList
        /*$this->authorize('complete', $shoppingList);*/

        // mark the shoppingList as complete and save it
        $shoppingList->is_complete = true;
        $shoppingList->save();

        // flash a success message to the session
        session()->flash('status', 'Produkt wurde hinzugefügt!');

        // redirect to shoppingLists index
        return redirect('/einkaufsliste');
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
