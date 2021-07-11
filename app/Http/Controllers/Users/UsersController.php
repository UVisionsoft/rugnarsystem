<?php

namespace App\Http\Controllers\Users;

use App\DataTables\SystemLogsDataTable;
use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Jackiedo\LogReader\LogReader;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        $type = Str::singular(request()->segment(2));
        return $dataTable->ofType($type)->render('pages.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = ['admins'=>'مدير', 'trainers'=>'مدرب', 'users'=>'عميل', 'doctors'=>'طبيب', 'vendors'=>'مورد'];
        $type = $types[request()->segment(2)];

        return view('pages.users.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);
        $types = ['admins', 'trainers', 'users', 'doctors', 'vendor'];
        $types = array_flip($types);
        $request->merge(['type' => $types[$request->segment(2)]]);
        $user = User::create($request->all());

        return redirect('accounts/' . $request->segment(2));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('pages.users.profile',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $types = ['admins'=>'مدير', 'trainers'=>'مدرب', 'users'=>'عميل', 'doctors'=>'طبيب', 'vendors'=>'مورد'];
        $type = $types[request()->segment(2)];

        return view('pages.users.edit', compact('user', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => ['required', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => 'nullable|min:6',
        ]);

        if($request->filled('password')){
            $request->merge(['password'=> Hash::make($request->get('password'))]);
        } else {
            $request->request->remove('password');
        }

        $user->update($request->all());

        return redirect('accounts/' . $request->segment(2));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        return $user->delete();
    }
}
