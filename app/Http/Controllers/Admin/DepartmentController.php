<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Models\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        // $product = Product::paginate(15);
        $department=Department::all();

        return view('admin.department.home')->with('department', $department);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDepartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartmentRequest $request)
    {
        $name= $request->input('name');




        $department =new Department();
        $department->name = $name;
        $department->save();
        // dd($request);
        $request->session()->flash('success', 'Department Add Successfully.');

        return redirect('admin/department');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit( $department)
    {
        $department = Department::findOrFail($department);

        return view('admin.department.edit' , compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDepartmentRequest  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepartmentRequest $request,  $id)
    {
        $name= $request->input('name');

        $department=Department::find($id);
        $department->name = $name;


        $department->update();
        $request->session()->flash('success', 'Department Updated Successfully.');
        return redirect('admin/department');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $department = Department::find($id);
        $department->delete();
        return redirect('admin/department')->with('success' , 'Department Delete Successfully');
    }
}
