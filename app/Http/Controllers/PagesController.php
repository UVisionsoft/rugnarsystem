<?php

namespace App\Http\Controllers;

use App\Core\Adapters\Theme;
use App\DataTables\ActivitySessionsDataTable;
use App\DataTables\DoctorVisitsDataTable;
use App\Models\ActivitySession;
use App\Models\Dog;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Theme $theme,ActivitySessionsDataTable $dataTable,DoctorVisitsDataTable $doctorVisitsDataTable)
    {
        // Get view file location from menu config
        $view = $theme->getOption('page', 'view');

        // Check if the page view file exist
        if (auth()->user()->type == 0) {
            if (view()->exists('pages.' . $view)) {
                return view('pages.' . $view);
            }
        } elseif (auth()->user()->type == 2) { // USER

            $dogs = Dog::where('user_id',auth()->id())->get();
            return view('pages.dashboard.user',compact('dogs'));

        } elseif (auth()->user()->type == 1) { // TRAINER

            return $dataTable->trainer(auth()->id())->render('pages.users.sessions.index');
//            return view('pages.dashboard.trainer');
        }
        elseif(auth()->user()->type == 3){ // Doctor

            return $doctorVisitsDataTable->render('pages.dashboard.doctor.index');

        }

        // Get the default inner page
        return view('inner');
    }
}
