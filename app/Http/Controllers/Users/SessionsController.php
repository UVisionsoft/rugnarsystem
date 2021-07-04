<?php

namespace App\Http\Controllers\Users;

use App\DataTables\ActivitySessionsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\ActivityReport;
use App\Models\ActivitySession;
use App\Models\DogActivity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SessionsController extends Controller
{

    public function index(User $trainer, ActivitySessionsDataTable $dataTable)
    {
        View::share('trainer', $trainer);
        return $dataTable->trainer($trainer)->render('pages.users.sessions.index');
    }

    public function update(User $trainer, Request $request)
    {
        return ActivitySession::where('trainer_id', $trainer->id)
            ->where('dog_activity_id', $request->get('activity_id'))
            ->update([
                'status' => $request->get('status')
            ]);
    }

    public function create(User $trainer, Request $request)
    {
        $activities = Activity::with('DogActivity.dog')->get();

        return View('pages.users.sessions.create', compact('trainer', 'activities'));
    }


    public function store(User $trainer, Request $request)
    {
        $dogs_activities = $request->get('dogs_activities');
        $sessions = [];
        foreach ($dogs_activities as $dogs_activity){
            $sessions[] = ActivitySession::create([
                'dog_activity_id'=>$dogs_activity['id'],
                'trainer_id'=> $trainer->id ?? auth()->id(),
                'duration'=> $request->get('hours'),
                'status'=> 0,
            ]);
        }
        return response()->json([
            'message'=> __('Sessions registered Successfully'),
            'data'=>$sessions,
            'to'=> route('accounts.trainers.sessions.index', $trainer->id)
        ]);
    }

//    public function activitySessions(ActivitySessionsDataTable $dataTable){
//
//        return $dataTable->render('pages.activity_session.index');
//
//    }
}
