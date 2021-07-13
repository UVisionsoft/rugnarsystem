<?php

namespace App\Http\Controllers\Dogs;

use App\DataTables\Dogs\DogsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\DogRequest;
use App\Models\Activity;
use App\Models\Dog;
use App\Models\DogActivity;
use App\Models\DogVaccines;
use App\Models\Faction;
use App\Models\User;
use App\Models\Vaccine;
use Illuminate\Http\Request;

class DogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DogsDataTable $dataTable)
    {
//        return  $dogs = Dog::all();
        return $dataTable->render('pages.dogs.index');
//        return $dataTable->ofType('admin')->render('pages.dogs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $factions = Faction::all();
        $owners = User::where('type', 2)->get();
        $vaccines = Vaccine::pluck('name', 'id');

        return view('pages.dogs.create', compact('owners', 'vaccines','factions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'avatar' => ['image'],
            'age' => ['required', 'numeric'],
            'user_id' => ['required'],
            'faction_id' => ['required'],
        ]);
        $data = $request->all();
//        $data['activities'] = array_map(function ($activity) {
//            if ($activity['duration'] === null)
//                return ['duration' => 0];
//            return ['duration' => (int)$activity['duration']];
//        }, $data['activities']);


        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('uploads/dogs/avatars');
        } else {
            unset($data['avatar']);
        }

        $dog = Dog::create($data);
        if (!array_key_exists('vaccines', $data))
            $data['vaccines'] = [];

        $dog->vaccines()->sync($data['vaccines']);
//        $dog->activities()->sync($data['activities']);

        return redirect('dogs');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dog $dog)
    {
        $dog->load('user');
        $dog_activities = DogActivity::where('dog_id',$dog->id)->with('training')->with('sessions')->get();
//        return $dog_activities;
        $dog_vaccines = DogVaccines::where('dog_id',$dog->id)->with('vaccines')->get();
//        return $dog_vaccines;
        return view('pages.dogs.show',compact('dog','dog_activities','dog_vaccines'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $factions = Faction::all();
        $vaccines = Vaccine::all();
        $dog = Dog::where('id', $id)->with('vaccines')->first();
        $owners = User::where('type', 2)->get();
        $activities = Activity::pluck('name', 'id');

        return view('pages.dogs.edit', compact('dog', 'owners', 'vaccines', 'activities','factions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dog $dog)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'age' => ['required', 'numeric'],
            'user_id' => ['required'],
            'avatar' => 'image'
        ]);

        $data = $request->all();

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('uploads/dogs/avatars');
        } else {
            unset($data['avatar']);
        }
//        return $data;
        $dog->update($data);
        $dog->vaccines()->sync($data['vaccines']);
//        $dog->activities()->sync($data['activities']);

        return redirect('dogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dog $dog)
    {
        $dog->delete();
        return redirect('dogs');

    }

    public function profile($id){


    }
}
