<?php

namespace App\Http\Controllers\Users;

use App\DataTables\ActivitySessionsDataTable;
use App\Http\Controllers\Controller;
use App\Models\ActivityReport;
use App\Models\ActivitySession;
use App\Models\User;
use Illuminate\Http\Request;

class SessionsController extends Controller
{

    public function index(User $trainer, ActivitySessionsDataTable $dataTable)
    {

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

    public function create(User $trainer)
    {
    }



//    public function activitySessions(ActivitySessionsDataTable $dataTable){
//
//        return $dataTable->render('pages.activity_session.index');
//
//    }
}
