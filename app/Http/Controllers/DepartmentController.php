<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DepartmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.department.list', [
            'depertments' => Department::all(),
        ]);
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function departmentadd()
    {
        return view('backend.department.add');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:departments|max:55',
            'status' => 'required|integer',
        ]);

        Department::insert($request->except('_token') + [
            'created_at' => Carbon::now(),
        ]);

        return redirect('/department')->with('success_status', 'Department created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        return view('backend.department.edit', [
            'department' => $department,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cr  $cr
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
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:departments,name,' .$department->id,
            'status' => 'required|integer',
        ]);

        $department->update($request->except('_token', '_method'));
        return redirect('department')->with('update_status', 'Department updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Department::find($id)->delete();
        return redirect('department')->with('delete_status', 'Department deleted successfully!');
    }
}
