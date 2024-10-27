<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Supports\Helper;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use Helper;
    public function index()
    {
        $contents = Setting::pluck('value', 'key');
        return $this->returnData(2000,$contents);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|string|unique:settings,key',
            'value' => 'required|string',
        ]);

        $setting = new Setting();
        $setting->key = $request->key;
        $setting->value = $request->value;
        $setting->save();

        return $this->returnData( 2000,  $setting,  'Setting created successfully');
    }

    public function show($key)
    {
        $setting = Setting::where('key', $key)->first();

        if ($setting) {
            return $this->returnData( 2000,  $setting,  'Setting created successfully');

        }
        return $this->returnData( 3000,  null,  'Setting not found');

    }

    public function edit($key)
    {
        //
    }

    public function update(Request $request, $key)
    {
        $request->validate([
            'value' => 'required|string',
        ]);

        $setting = Setting::where('key', $key)->first();

        if ($setting) {
            $setting->value = $request->value;
            $setting->save();
            return $this->returnData(2000, $setting->value,'Content updated successfully');

        }
        return $this->returnData( 3000,  null,  'Setting not found');

    }

    public function destroy($key)
    {
        $setting = Setting::where('key', $key)->first();

        if ($setting) {
            $setting->delete();

            return response()->json(['status' => 2000, 'data' => null, 'message' => 'Setting deleted successfully']);
        }

        return response()->json(['status' => 3000, 'data' => null, 'message' => 'Setting not found']);
    }
}
