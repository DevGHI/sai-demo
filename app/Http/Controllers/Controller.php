<?php

namespace App\Http\Controllers;

use App\Http\Resources\DepartmentResource;
use App\Models\Position;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function storePosition(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'salary' => 'required|integer',
            'department_id' => 'required|exists:departments,id',
        ]);
        $position = new Position();
        $position->name = $request->name;
        $position->salary = $request->salary;
        $position->department_id = $request->department_id;
        $position->save();
        return response()->json($position);
    }
    public function storeDepartment(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        // $department = Department::create($request->all());
        $name=$request->name;
        $department=new Department();
        $department->name=$name;
        $department->save();
        return response()->json(['message'=>'Department created successfully']);
    }

    public function getDepartments(){
        // $departments=Department::all();
        // $departments=Department::orderBy('name','desc')->get();
        // $departments=Department::where('name','UUU')->get();
        // $departments=Department::where([
        //     'name'=>'IT',
        //     'phone'=>'089898'
        // ])->get();
        // $departments=Department::find(1);
        // $psotions=Position::where('department_id',1)->get();
        // $departments['position']=$psotions;
        // $departments['position']=$departments->positions;
        $departments=Department::with('positions')->get();
       $data=DepartmentResource::collection($departments);
        return response()->json($departments);
    }

    public function changeDept(Request $request,$id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $department=Department::find($id);
        $department->name=$request->name;
        $department->save();
        return response()->json(['message'=>'Department updated successfully']);
    }

    public function deleteDept($id){
        $department=Department::find($id);
        $department->delete();
        return response()->json(['message'=>'Department deleted successfully']);
    }
}
