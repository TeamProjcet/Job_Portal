<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\Models\Newsletter;
use App\Supports\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
use Helper;
    public function __construct()
    {
//        $this->middleware(function ($request, $next) {
//            if (!$this->can(request()->route()->action['as'])){
//                return $this->returnData(5000, null, 'You are not authorized to access this page');
//            }
//            return $next($request);
//        });
        $this->model=new Newsletter();
    }

    public function index()
    {
        if (!$this->can('newsletter.index')) {
            return $this->returnData(5000, null, 'You are not authorized to access this page');
        }
        $data = Newsletter::all();
        return $this->returnData(2000, $data);

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validator = $this->model->validator($request->all());

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'You have already subscribed with this email address.',
            ], 422);
        }
        Newsletter::create($request->only('email'));
        Mail::to($request->email)->queue(new WelcomeMail($request->email));

        return response()->json([
            'success' => true,
            'message' => 'Thank you for subscribing!',
        ], 200);
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
        if (!$this->can('newsletter.destroy')) {
            return $this->returnData(5000, null, 'You are not authorized to access this page');
        }
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
