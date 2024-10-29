<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\Models\Contact;
use App\Models\Newsletter;
use App\Supports\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    use Helper;
    public function __construct()
    {
        $this->model=new Contact();
    }

    public function index()
    {
        if (!$this->can('contact.index')) {
            return $this->returnData(5000, null, 'You are not authorized to access this page');
        }
        $data = Contact::orderBy('id','DESC')->paginate(12);
        return $this->returnData(2000, $data);

    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validator = $this->model->Validator($request->all());

        if ($validator->fails()) {
            return $this->returnData(3000,$validator->errors());
        }
        $this->model->fill($request->all());
//        Mail::to($this->model->email)->queue(new WelcomeMail($this->model));


        $this->model->save();
        return $this->returnData(2000, $this->model);

    }


    public function show(Contact $contact)
    {
        //
    }


    public function edit(Contact $contact)
    {
        //
    }



    public function update(Request $request, Contact $contact)
    {
        //
    }


    public function destroy($id)
    {
        if (!$this->can('contact.destroy')) {
            return $this->returnData(5000, null, 'You are not authorized to access this page');
        }
        try {
            $data = Contact::find($id);
            if ($data) {
                $data->delete();
                return response()->json(['message' => 'Newsletter subscription deleted successfully.'], 200);
            } else {
                return response()->json(['message' => 'Newsletter not found.'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Something went wrong, please try again later.'], 500);
        }
    }
}
