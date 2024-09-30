<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\blog;
use App\Supports\Helper;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use Helper;

    public function __construct()
    {
        $this->model = new blog();
    }

    public function index()
    {
        $data = $this->model->get();
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
            return response()->json(['result' => $validator->errors(), 'status' => 3000], 100);
        }
        $this->model->fill($request->all());
        $this->model->save();
        return $this->returnData(2000, $this->model);

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = blog::findOrFail($id);
        return response()->json(['result' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        try {
            $validator = $this->model->Validator($request->all());

            if ($validator->fails()) {
                return response()->json(['result' => $validator->errors(), 'status' => 3000], 200);
            }
            $data = $this->model->where('id', $request->input('id'))->first();
            if ($data) {
                $data->fill($request->all());
                $data->update();

                return $this->returnData(2000, $data);
            }
            return $this->returnData(3000, null, 'Blog not found');

        } catch (\Exception $e) {
            return response()->json(['result' => null, 'message' => $e->getMessage(), 'status' => 5000]);
        }
    }
    public function destroy($id)
    {
        try {
            $data = $this->model->where('id',$id)->first();
            if ($data){
                $data->delete();

                return $this->returnData(2000, null, 'Blog deleted successfully');
            }
            return $this->returnData(3000, null, 'Blog not found');

        }catch (\Exception $exception){
            return $this->returnData(5000, $exception->getMessage(), 'Something Wrong');
        }
    }
}
<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\blog;
use App\Supports\Helper;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use Helper;

    public function __construct()
    {
        $this->model = new blog();
    }

    public function index()
    {
        $data = $this->model->get();
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
            return response()->json(['result' => $validator->errors(), 'status' => 3000], 100);
        }
        $this->model->fill($request->all());
        $this->model->save();
        return $this->returnData(2000, $this->model);

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        try {
            $validator = $this->model->Validator($request->all());

            if ($validator->fails()) {
                return response()->json(['result' => $validator->errors(), 'status' => 3000], 200);
            }
            $category = $this->model->where('id', $request->input('id'))->first();
            if ($category) {
                $category->fill($request->all());
                $category->update();

                return $this->returnData(2000, $category);
            }
            return $this->returnData(3000, null, 'Blog not found');

        } catch (\Exception $e) {
            return response()->json(['result' => null, 'message' => $e->getMessage(), 'status' => 5000]);
        }
    }
    public function destroy($id)
    {
        try {
            $data = $this->model->where('id',$id)->first();
            if ($data){
                $data->delete();

                return $this->returnData(2000, null, 'Blog deleted successfully');
            }
            return $this->returnData(3000, null, 'Blog not found');

        }catch (\Exception $exception){
            return $this->returnData(5000, $exception->getMessage(), 'Something Wrong');
        }
    }
}
