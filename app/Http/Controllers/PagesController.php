<?php

namespace App\Http\Controllers;

use App\Core\Adapters\Theme;
use App\Models\Dog;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Theme $theme)
    {
        // Get view file location from menu config
        $view = $theme->getOption('page', 'view');

        // Check if the page view file exist
        if (auth()->user()->type == 0) {
            if (view()->exists('pages.' . $view)) {
                return view('pages.' . $view);
            }
        } elseif (auth()->user()->type == 1) {

            $dogs = Dog::where('user_id',auth()->id())->get();
            return view('pages.dashboard.user',compact('dogs'));

        } elseif (auth()->user()->type == 2) {

            return view('pages.dashboard.trainer');

        }

        // Get the default inner page
        return view('inner');
    }
}
