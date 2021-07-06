<?php

namespace App\Http\Controllers\Hospitality;

use App\DataTables\HospitalityDataTable;
use App\Http\Controllers\Controller;
use App\Models\Dog;
use App\Models\DogHospitality;
use Illuminate\Http\Request;

class HospitalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(HospitalityDataTable $dataTable)
    {
        return $dataTable->render('pages.hospitality.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $hosted_dogs_ids = DogHospitality::pluck('dog_id')->toArray();
            $dogs = Dog::whereNotIN('id',$hosted_dogs_ids)->get();
            return view('pages.hospitality.create',compact('dogs'));
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
            'dog_id' => 'required',
            'from' => 'required',
            'to' => 'required',
        ]);

        DogHospitality::create($request->all());

        return redirect('hospitalities');
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
        $dogs = Dog::all();
        $hospitality = DogHospitality::find($id);

        return view('pages.hospitality.edit',compact('hospitality','dogs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DogHospitality $hospitality)
    {
        $request->validate([
            'dog_id' => 'required',
            'from' => 'required',
            'to' => 'required'
        ]);

        $hospitality->update($request->all());

        return redirect('hospitalities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DogHospitality $hospitality)
    {
        $hospitality->delete();

       return redirect('hospitalities');

    }
}
