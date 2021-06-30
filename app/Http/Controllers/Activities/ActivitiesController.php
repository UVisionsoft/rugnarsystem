<?php


namespace App\Http\Controllers\Activities;

use App\DataTables\ActivitiesDataTable;
use App\DataTables\DogsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    public function index(ActivitiesDataTable $dataTable)
    {
        return $dataTable->render('pages.activities.index');
    }

    public function create()
    {
        return view('pages.activities.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'url' => 'nullable|url',
        ]);

        Activity::create($request->all());

        return redirect('activities');
    }

    public function edit(Activity $activity)
    {
        return view('pages.activities.edit', compact('activity'));
    }

    public function update(Request $request, Activity $activity)
    {
        $this->validate($request, [
            'name' => 'required',
            'url' => 'nullable|url',
        ]);

        $activity->update($request->all());

        return redirect('activities');
    }

    public function destroy(Activity $activity)
    {
        return $activity->delete();
    }
}
