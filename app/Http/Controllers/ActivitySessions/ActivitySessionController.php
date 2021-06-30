<?php

namespace App\Http\Controllers\ActivitySessions;

use App\DataTables\ActivitySessionsDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActivitySessionController extends Controller
{
    public function activitySessions(ActivitySessionsDataTable $dataTable){

        return $dataTable->render('pages.actvity_session.index');

    }
}
