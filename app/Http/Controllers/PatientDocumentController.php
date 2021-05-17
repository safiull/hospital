<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\PatientDocument;
use Carbon\Carbon;
use Auth;

class PatientDocumentController extends Controller
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
        return view('backend.patient_document.list', [
            'documents' => PatientDocument::with('doctor')->with('user')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.patient_document.add', [
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
        $validatedData = $request->validate([
            'patient_id' => 'required|integer|min:3',
            'document' => 'required|file|max:1024|mimes:jpg,bmp,png,pdf,svg,csv,JPEG,txt',
            'doctor_id' => 'nullable|integer',
            'description' => 'max:1000',
            // 'upload_by' => 'required|integer|min:1|max:10',
        ]);

        $document_id = PatientDocument::insertGetId($request->except('_token','document') + [
            'created_at' => Carbon::now(),
            'upload_by' => Auth::id()
        ]);

        if ($request->hasFile('document')) {
            $path = $request->file('document')->store('document');
            PatientDocument::find($document_id)->update([
                'document' => $path
            ]);
        }

        return redirect('/patient-document')->with('success_status', 'Document added successfully!');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
