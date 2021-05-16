<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\User;
use Carbon\Carbon;
use Image;
use Hash;

class PatientController extends Controller
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
        return view('backend.patient.list',[
            'patients' => Patient::all()
        ]);
    }

    public function patientAdd()
    {
        return view('backend.patient.add');
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
            'first_name' => 'required|string|between:2,30',
            'last_name' => 'required|between:2,30',
            'email' => 'required|email|unique:doctors',
            'password' => 'required',
            'phone' => 'nullable|string',
            'mobile' => 'required|min:5|max:15|regex:/[0-9]{9}/|not_regex:/(([a-zA-z])(\d)?$)/u',
            'blood_group' => 'nullable|min:2|max:5',
            'sex' => 'required|string',
            'birth_date' => 'nullable|date',
            'image' => 'nullable|image',
            'address' => 'required',
            'status' => 'required|integer',
        ]);

        // print_r($request->except('_token'));
        $patient_id = Patient::insertGetId($request->except('_token','image') + [
            'created_at' => Carbon::now()
        ]);

        if ($request->hasFile('image')) {
            $uploaded_photo = $request->file('image');
            $photo_name = $patient_id.".".$uploaded_photo->getClientOriginalExtension($uploaded_photo);
            $new_photo_location = 'public/dashboard/photo/patient_image/'.$photo_name;

            Image::make($uploaded_photo)->resize(200,150)->save(base_path($new_photo_location), 50);
            Patient::find($patient_id)->update([
                'image' => $photo_name
            ]);
        }

        User::insert([
            'name' => $request->first_name,
            'email' => $request->email,
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);
        return redirect('/patient')->with('success_status', 'Patient created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.patient.edit', [
            'patient' => Patient::find($id),
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
        return view('backend.patient.view', [
            'patient' => Patient::find($id),
        ]);
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
        $validatedData = $request->validate([
            'first_name' => 'required|string|between:2,30',
            'last_name' => 'required|between:2,30',
            'phone' => 'nullable|string',
            'mobile' => 'required|min:5|max:15|regex:/[0-9]{9}/|not_regex:/(([a-zA-z])(\d)?$)/u',
            'blood_group' => 'nullable|min:2|max:5',
            'sex' => 'required|string',
            'birth_date' => 'nullable|date',
            'image' => 'nullable|image',
            'address' => 'required',
            'status' => 'required|integer',
        ]);

        $patient = Patient::find($id);

        $patient->update($request->except('_token', '_method','image'));

        if ($request->hasFile('image')) {
            if ($patient->image) {
                unlink(base_path('public/dashboard/photo/patient_image/'.Patient::find($id)->image));
            }

            $uploaded_photo = $request->file('image');
            $photo_name = $id.".".$uploaded_photo->getClientOriginalExtension($uploaded_photo);
            $new_photo_location = 'public/dashboard/photo/patient_image/'.$photo_name;

            Image::make($uploaded_photo)->resize(200,150)->save(base_path($new_photo_location), 50);
            $patient->update([
                'image' => $photo_name
            ]);
        }

        return redirect('/patient')->with('success_status', 'Patient updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Patient::find($id)->delete();
        return redirect('patient')->with('delete_status', 'Patient deleted successfully!');
    }
}
