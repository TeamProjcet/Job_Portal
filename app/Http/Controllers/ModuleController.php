<?php
//
//namespace App\Http\Controllers;
//
//use App\Models\Module;
//use App\Supports\Helper;
//use Illuminate\Http\Request;
//
//class ModuleController extends Controller
//{
//    use Helper;
//    public function index()
//    {
//        $modules = Module::with('permissions')->get();
//        return $this->returnData(2000,$modules);
//    }
//
//    public function show($id)
//    {
////        $module = Module::with('permissions')->find($id);
////
////        if (!$module) {
////            return $this->returnData(3000 );
////        }
////
////        return $this->returnData(2000,$module);
//
//    }
//
//    public function store(Request $request)
//    {
//        $request->validate([
//            'name' => 'required|string|max:255',
//            'parent_id' => 'nullable|integer',
//            'link' => 'nullable|string|max:255',
//            'icon' => 'nullable|string|max:255',
//            'status' => 'required|boolean',
//        ]);
//
//        $module = Module::create($request->all());
//        return $this->returnData(2000,$module);
//
//    }
//
//    public function update(Request $request, $id)
//    {
//        $module = Module::find($id);
//
//        if (!$module) {
//            return response()->json(['message' => 'Module not found'], 404);
//        }
//
//        $request->validate([
//            'name' => 'required|string|max:255',
//            'parent_id' => 'nullable|integer',
//            'link' => 'nullable|string|max:255',
//            'icon' => 'nullable|string|max:255',
//            'status' => 'required|boolean',
//        ]);
//
//        $module->update($request->all());
//
//        return $this->returnData(2000,$module);
//
//    }
//
//    public function destroy($id)
//    {
//        $module = Module::find($id);
//
//        if (!$module) {
//            return $this->returnData(3000);
//
//        }
//
//        $module->delete();
//
//        return $this->returnData(2000,$module);
//
//    }
//}
