<?php

namespace App\Http\Controllers\Dogs;

use App\DataTables\VaccinesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\DogRequest;
use App\Models\Dog;
use App\Models\User;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Dog $dog)
    {
        $activities = $dog->activities->groupBy('id')->map(function ($activities){
            $totalDuration = 0;
            foreach ($activities as $activity){
                $totalDuration += (int)$activity['pivot']['duration'];
            }
            $activities = $activities[0];
            $activities['total_duration'] = $totalDuration;
            return $activities;
        })->values();
        unset($dog['activities']);
        $dog->setAttribute('activities', $activities);

        return view('pages.dogs.activities.index', compact('dog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dog $dog)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dog $dog)
    {
    }
}
