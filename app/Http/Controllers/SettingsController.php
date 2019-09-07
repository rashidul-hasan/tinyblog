<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use App\Models\Software;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingsController
{

    public function index()
    {

        $data =  Settings::all();
        $val = array();

        foreach ($data as $key => $value) {
            $val[$value->settings_key] = $value->settings_value;
        }

        return view('settings.index', [
            'title' => 'Settings',
            'data' => $val
        ]);
    }

    public function store(Request $request)
    {

        // TODO too much sql query is happeing, need to optimize
        $request =  $request->except('_token');

        foreach ($request as $key => $value) {
            $s = Settings::updateOrCreate(
                ['settings_key' => $key],
                ['settings_value' => $value]
            );
            // TODO handle exceptions

            // update cache
            Cache::put($key, $value);
        }

        return redirect(url('admin/settings'));
    }
}
