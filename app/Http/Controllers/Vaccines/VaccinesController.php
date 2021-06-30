<?php


namespace App\Http\Controllers\Vaccines;


use App\DataTables\VaccinesDataTable;
use App\Http\Controllers\Controller;
use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VaccinesController extends Controller
{
    public function index(VaccinesDataTable $dataTable)
    {
        return $dataTable->render('pages.vaccines.index');
    }

    public function create()
    {
        return view('pages.vaccines.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>['required', 'unique:vaccines,name']
        ]);
        Vaccine::create($request->all());

        return redirect('/vaccines');
    }

    public function edit(Vaccine $vaccine)
    {
        return view('pages.vaccines.edit', compact('vaccine'));
    }

    public function update(Vaccine $vaccine, Request $request)
    {
        $this->validate($request, [
            'name'=>['required',  Rule::unique('vaccines','name')->ignore($vaccine->id)]
        ]);

        $vaccine->update($request->all());

        return redirect('/vaccines');
    }

    public function destroy(Vaccine $vaccine)
    {
        return $vaccine->delete();
    }
}
