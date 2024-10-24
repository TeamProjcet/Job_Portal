<?php

namespace App\Http\Controllers;

use App\Mail\SubscribeMail;
use App\Models\Newsletter;
use App\Supports\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SubscribeController extends Controller
{
    use Helper;
    public function __construct()
    {
        $this->model=new Newsletter();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'details' => 'required|string',
            'Url' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $subscribers = Newsletter::all();
        $emails = $subscribers->pluck('email')->toArray();
        Mail::to($emails)->queue(new SubscribeMail($request->input('details'), $request->input('Url')));

        return response()->json(['message' => 'Mail sent successfully!']);
    }


}
