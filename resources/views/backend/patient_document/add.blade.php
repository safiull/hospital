@extends('layouts.dashboard')
@section('dashboard_content')
@section('patient_active')
    active
@endsection

@section('patient_document_add_active')
    active
@endsection

@section('top_css')
<link rel="stylesheet" href="{{ asset('dashboard') }}/assets/vendor/bootstrap-markdown/bootstrap-markdown.min.css">
<link rel="stylesheet" href="{{ asset('dashboard') }}/assets/vendor/dropify/css/dropify.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" href="{{ asset('dashboard') }}/assets/vendor/parsleyjs/css/parsley.css">
@endsection


    <div class="block-header">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Add Document</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="icon-home"></i></a></li>                            
                    <li class="breadcrumb-item">
                        <a href="{{ route('patient-document.index') }}">Documents</a>
                    </li>
                    <li class="breadcrumb-item active">Add Document</li>
                </ul>
            </div>            
            <div class="col-lg-6 col-md-4 col-sm-12 text-right">
                <div class="bh_chart hidden-xs">
                    <div class="float-left m-r-15">
                        <small>Visitors</small>
                        <h6 class="mb-0 mt-1"><i class="icon-user"></i> 1,784</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <a href="{{ route('patient-document.index') }}" class="btn btn-info btn-sm"><i class="fa fa-list"></i> Document List</a>  

                    @if (session('success_status'))
                        <div class="alert alert-success alert-dismissible fade show mt-2 mb-0" role="alert">
                          <strong class="text-primary">Success! &#128521;</strong> {{ session('success_status') }}
                        </div>
                    @endif        
                                    
                </div>
                <hr class="m-0 p-0">
                <div class="body clearfix">
                    <form action="{{ route('patient-document.store') }}" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>
                        @csrf

                        <div class="row">
                            <div class="col-sm-2">
                                <label for="patient_id">Patient ID <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input id="patient_id" type="text" class="form-control" placeholder="Patient ID" name="patient_id" value="{{ old('patient_id') }}" required data-parsley-minlength="2">
                                    @error('patient_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="document">Attach File <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="file" class="dropify" name="document">
                                    @error('document')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="doctor_id">Doctor name</label>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <select name="doctor_id" id="doctor_id" class="selectpicker form-control" data-live-search="true">
                                      <option value="">--SELECT--</option>
                                      @foreach ($doctors as $doctor)
                                          <option value="{{ $doctor->id }}">{{ $doctor->first_name }} {{ $doctor->last_name }}</option>
                                      @endforeach
                                    </select>

                                    @error('doctor_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="markdown-editor">Description</label>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <textarea id="markdown-editor" name="description" data-provide="markdown" rows="10"></textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 offset-sm-2">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                    <button type="reset" class="btn btn-outline-warning">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('footer_top_script')
<script src="{{ asset('dashboard') }}/assets/vendor/dropify/js/dropify.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="{{ asset('dashboard') }}/assets/vendor/parsleyjs/js/parsley.min.js"></script>
@endsection

@section('footer_bottom_script')
<script src="{{ asset('dashboard') }}/assets/vendor/markdown/markdown.js"></script>
<script src="{{ asset('dashboard') }}/assets/vendor/to-markdown/to-markdown.js"></script>
<script src="{{ asset('dashboard') }}/assets/vendor/bootstrap-markdown/bootstrap-markdown.js"></script>
<script src="{{ asset('dashboard') }}/light/assets/js/pages/forms/dropify.js"></script>
@endsection