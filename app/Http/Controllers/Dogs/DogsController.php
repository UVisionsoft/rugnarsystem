<?php

namespace App\Http\Controllers\Dogs;

use App\DataTables\Dogs\DogsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\DogRequest;
use App\Models\Dog;
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
        $owners = User::where('type', 2)->get();
        $vaccines = Vaccine::pluck('name', 'id');

        return view('pages.dogs.create', compact('owners', 'vaccines'));
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
        ]);
        $data = $request->all();
        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('uploads/dogs/avatars');
        } else {
            unset($data['avatar']);
        }

        $dog = Dog::create($data);
        if (!array_key_exists('vaccines', $data))
            $data['vaccines'] = [];

        $dog->vaccines()->sync($data['vaccines']);

        return redirect('dogs');
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
        $vaccines = Vaccine::all();
        $dog = Dog::where('id', $id)->with('vaccines')->first();
        $owners = User::where('type', 2)->get();

        return view('pages.dogs.edit', compact('dog', 'owners', 'vaccines'));
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
}
