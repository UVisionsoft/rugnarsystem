<?php

namespace App\Http\Controllers\Dogs;

use App\DataTables\VaccinesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\DogRequest;
use App\Models\Activity;
use App\Models\Dog;
use App\Models\DogActivity;
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
        return view('pages.dogs.activities.index', compact('dog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Dog $dog)
    {
        $activities = Activity::pluck('name', 'id');
        return view('pages.dogs.activities.create', compact('dog', 'activities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Dog $dog, Request $request)
    {
        $this->validate($request,[
            'activity_id'=>'required',
            'duration'=>'int|min:1',
        ]);
        $request->merge(['dog_id'=> $dog->id]);
        DogActivity::create($request->all());

        return redirect(route('dogs.activities.index', $dog->id));
    }

    public function destroy(Dog $dog, DogActivity $activity)
    {
        $activity->delete();
        return back();
    }
}
