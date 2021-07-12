<?php


namespace App\Http\Controllers\Settings;


use App\Http\Controllers\Controller;
use App\Models\AppSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AppSettingsController extends Controller
{
    public function index()
    {
        $settings = AppSetting::pluck('value', 'key');
        return view('pages.settings.app', compact('settings'));
    }

//    public function create(){}
    public function store(Request $request)
    {
        $group = $request->segment(2);
        $data = $request->all();
        unset($data['_token']);

        foreach ($data as $key => $value) {
            AppSetting::updateOrCreate([
                'key' => $key,
                'group' => $group,
            ], [
                'value' => $value,
            ]);
        }
        return back();
    }
}
