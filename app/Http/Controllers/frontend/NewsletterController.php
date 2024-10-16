<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use App\Supports\Helper;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
use Helper;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!$this->can(request()->route()->action['as'])){
                return $this->returnData(5000, null, 'You are not authorized to access this page');
            }
            return $next($request);
        });
    }

    public function index()
    {
        $data = Newsletter::all();
        return $this->returnData(2000, $data);

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletters,email',
        ]);

        $data = Newsletter::create([
            'email' => $request->email,
        ]);
        return $this->returnData(2000, $data);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        try {
            $newsletter = Newsletter::find($id);
            if ($newsletter) {
                $newsletter->delete();
                return response()->json(['message' => 'Newsletter subscription deleted successfully.'], 200);
            } else {
                return response()->json(['message' => 'Newsletter not found.'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Something went wrong, please try again later.'], 500);
        }
    }

}
