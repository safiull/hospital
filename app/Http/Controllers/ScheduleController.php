<?php

namespace App\Http\Controllers;
use App\Doctor;
use App\Schedule;
use App\Department;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.schedule.list', [
            'schedules' => Schedule::with('doctor')->with('department')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.schedule.add', [
            'doctors' => Doctor::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|integer|min:1|max:5',
            'available_day' => 'required|string|min:3|max:10',
            'start_time' => 'required',
            'end_time' => 'required',
            'per_patient_time' => 'required',
        ]);

        // // print_r($request->except('_token'));
        Schedule::insert($request->except('_token') + [
            'created_at' => Carbon::now(),
            'depertment_id' => Doctor::find($request->doctor_id)->department_id
        ]);

        return redirect('/schedule')->with('success_status', 'Schedule created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        return view('backend.schedule.edit', [
            'doctors' => Doctor::all(),
            'schedule' => Schedule::find($id)
        ]);
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'doctor_id' => 'required|integer|min:1|max:5',
            'available_day' => 'required|string|min:3|max:10',
            'start_time' => 'required',
            'end_time' => 'required',
            'per_patient_time' => 'required',
        ]);

        // // print_r($request->except('_token'));
        Schedule::find($id)->update($request->except('_token') + [
            'created_at' => Carbon::now(),
            'depertment_id' => Doctor::find($request->doctor_id)->department_id
        ]);

        return redirect('/schedule')->with('success_status', 'Schedule updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Schedule::find($id)->delete();
        return redirect('schedule')->with('success_status', 'Schedule deleted successfully!');
    }
}
