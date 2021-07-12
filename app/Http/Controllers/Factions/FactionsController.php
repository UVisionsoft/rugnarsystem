<?php

namespace App\Http\Controllers\Factions;

use App\DataTables\FactionsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Faction;
use Illuminate\Http\Request;

class FactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FactionsDataTable $dataTable)
    {
        return $dataTable->render('pages.factions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.factions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Faction::create($request->all());
        return redirect('factions');
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
        $faction = Faction::find($id);

        return  view('pages.factions.edit',compact('faction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faction $faction)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $faction->update($request->all());
        return redirect('factions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faction $faction)
    {
        $faction->delete();

        return redirect('factions');
    }
}
