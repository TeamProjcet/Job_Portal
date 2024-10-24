<?php

namespace App\Http\Controllers;

use App\Models\FrontendStaticContent;
use App\Supports\Helper;
use Illuminate\Http\Request;

class FrontendStaticContentController extends Controller
{
  use Helper;
    public function index()
    {
        $contents = FrontendStaticContent::pluck('value', 'key');
        return $this->returnData(2000,$contents);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|string|unique:frontend_static_content_controllers',
            'value' => 'required|string',
        ]);

        $content = FrontendStaticContent::create([
            'key' => $request->key,
            'value' => $request->value,
        ]);
        return $this->returnData(2000,$content,'Content created successfully');
    }


    public function show(FrontendStaticContent $frontendStaticContentController)
    {
        //
    }


    public function edit(FrontendStaticContent $frontendStaticContentController)
    {
        //
    }


  public function update(Request $request, $key)
    {
        $request->validate([
            'value' => 'required|string',
        ]);

        $content = FrontendStaticContent::where('key', $key)->first();

        if ($content) {
            $content->value = $request->value;
            $content->save();

            return $this->returnData(2000, $content->value,'Content updated successfully');
        }

        return $this->returnData(3000,null,'Not Found');
    }


    public function destroy(FrontendStaticContent $frontendStaticContentController)
    {
        //
    }
}
