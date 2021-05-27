@extends('layouts.dashboard')
@section('dashboard_content')
@section('schedule_active')
    active
@endsection

@section('schedule_add_active')
    active
@endsection

@section('top_css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="{{ asset('dashboard') }}/assets/vendor/parsleyjs/css/parsley.css">
@endsection


    <div class="block-header">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Add Schedule</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="icon-home"></i></a></li>                            
                    <li class="breadcrumb-item">
                        <a href="{{ route('schedule.index') }}">Schedules</a>
                    </li>
                    <li class="breadcrumb-item active">Add Schedule</li>
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
                    <a href="{{ route('schedule.index') }}" class="btn btn-info btn-sm"><i class="fa fa-list"></i> Schedule List</a>  

                    @if (session('success_status'))
                        <div class="alert alert-success alert-dismissible fade show mt-2 mb-0" role="alert">
                          <strong class="text-primary">Success! &#128521;</strong> {{ session('success_status') }}
                        </div>
                    @endif        
                                    
                </div>
                <hr class="m-0 p-0">
                <div class="body clearfix">
                    <form action="{{ route('schedule.store') }}" method="POST" data-parsley-validate novalidate>
                        @csrf

                        <div class="row">
                            <div class="col-sm-2">
                                <label for="doctor_id">Doctor name <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group border rounded">
                                    <select name="doctor_id" id="doctor_id" class="selectpicker form-control" required data-live-search="true">
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
                                <label for="available_day">Available Days <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group border rounded">
                                    <select name="available_day" id="available_day" class="selectpicker form-control" required data-live-search="true">
                                      <option value="Saturday">Saturday</option>
                                      <option value="Sunday">Sunday</option>
                                      <option value="Monday">Monday</option>
                                      <option value="Tuesday">Tuesday</option>
                                      <option value="Wednesday">Wednesday</option>
                                      <option value="Thursday">Thursday</option>
                                      <option value="Friday">Friday</option>
                                    </select>

                                    @error('available_days')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="available_time">Available Time <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input id="available_time" type="time" class="form-control" placeholder="Start time" name="start_time" value="{{ old('start_time') }}" required data-parsley-minlength="2">

                                    @error('start_time')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="time" class="form-control" placeholder="End time" name="end_time" value="{{ old('end_time') }}" required data-parsley-minlength="2">

                                    @error('end_time')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="per_patient_time">Per Patient Time</label>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input id="per_patient_time" type="time" class="form-control" placeholder="Per patient time" name="per_patient_time" value="{{ old('per_patient_time') }}">

                                    @error('per_patient_time')
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
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="{{ asset('dashboard') }}/assets/vendor/parsleyjs/js/parsley.min.js"></script>
@endsection
