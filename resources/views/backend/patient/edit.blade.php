@extends('layouts.dashboard')
@section('dashboard_content')
@section('patient_active')
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
                <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Edit Patient</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="icon-home"></i></a></li>                            
                    <li class="breadcrumb-item">
                        <a href="{{ route('patient.index') }}">Patients</a>
                    </li>
                    <li class="breadcrumb-item active"> Edit Patient</li>
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
                    <a href="{{ route('patient.index') }}" class="btn btn-info btn-sm"><i class="fa fa-list"></i> Patient List</a>        
                </div>
                <hr class="m-0 p-0">
                <div class="body clearfix">
                    <form action="{{ route('patient.update', $patient->id) }}" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <div class="col-sm-2">
                                <label for="first_name">First Name <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input id="first_name" type="text" class="form-control" placeholder="First Name" name="first_name" value="{{ $patient->first_name }}" required data-parsley-minlength="2">
                                    @error('first_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="last_name">Last Name <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input id="last_name" type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{ $patient->last_name }}" required data-parsley-minlength="3">
                                    @error('last_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="mobile">Phone No</label>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input id="phone" type="number" class="form-control" placeholder="Phone No" name="phone" value="{{ $patient->phone }}">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="mobile">Mobile No <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input id="mobile" type="number" class="form-control" placeholder="Mobile No" name="mobile" value="{{ $patient->mobile }}" required data-parsley-length="[5,15]">
                                    @error('mobile')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="mobile">Picture</label>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="file" class="dropify" name="image">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <img style="max-height: 200px;" src="{{ asset('dashboard/photo/patient_image') }}/{{ $patient->image }}" alt="Doctor photo" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="birth_date">Date of Birth</label>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input data-provide="datepicker" data-date-autoclose="true" id="birth_date" type="date" class="form-control" data-date-format="dd/mm/yyyy" name="birth_date" value="{{ $patient->birth_date }}">
                                    @error('birth_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                <label>Sex <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="radio" name="sex" value="Male" {{ $patient->sex == 'Male'?'checked':'' }} required data-parsley-errors-container="#error-radio">&nbsp;
                                    <label for="1">Male</label>&nbsp;&nbsp;
                                    <input type="radio" name="sex" value="Female" {{ $patient->sex == 'Male'?'':'checked' }}>&nbsp;
                                    <label for="0">Female</label>
                                    <input type="radio" name="sex" value="Other" {{ $patient->sex == 'Other'?'checked':'' }}>&nbsp;
                                    <label for="0">Other</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="blood_group">Blood Group</label>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <select name="blood_group" id="blood_group" class="selectpicker form-control" data-live-search="true">
                                      <option {{ $patient->blood_group == 'A+' ? "selected":"" }} value="A+">A+</option>
                                      <option {{ $patient->blood_group == 'A-' ? "selected":"" }} value="A-">A-</option>
                                      <option {{ ($patient->blood_group == 'B+' ? "selected":"") }} value="B+">B+</option>
                                      <option {{ ($patient->blood_group == 'B-' ? "selected":"") }} value="B-">B-</option>
                                      <option {{ ($patient->blood_group == 'O+' ? "selected":"") }} value="O+">O+</option>
                                      <option {{ ($patient->blood_group == 'O-' ? "selected":"") }} value="O-">O-</option>
                                      <option {{ ($patient->blood_group == 'AB+' ? "selected":"") }} value="AB+">AB+</option>
                                      <option {{ ($patient->blood_group == 'AB-' ? "selected":"") }} value="AB-">AB-</option>
                                    </select>

                                    @error('blood_group')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="address">Address <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <textarea class="form-control" rows="7" name="address" id="address" placeholder="Address" required data-parsley-minlength="4">{{ $patient->address }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="status">Status</label>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="radio" id="status" name="status" value="1" {{ $patient->status == 1 ? 'checked':'' }}>&nbsp;
                                    <label for="1">Active</label>&nbsp;&nbsp;
                                    <input type="radio" id="status" name="status" value="0" {{ $patient->status == 0 ? 'checked':'' }}>&nbsp;
                                    <label for="0">Inactive</label><br>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 offset-sm-2">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
<script src="{{ asset('dashboard') }}/assets/vendor/parsleyjs/js/parsley.min.js"></script>
@endsection

@section('footer_bottom_script')
<script src="{{ asset('dashboard') }}/assets/vendor/markdown/markdown.js"></script>
<script src="{{ asset('dashboard') }}/assets/vendor/to-markdown/to-markdown.js"></script>
<script src="{{ asset('dashboard') }}/assets/vendor/bootstrap-markdown/bootstrap-markdown.js"></script>
<script src="{{ asset('dashboard') }}/light/assets/js/pages/forms/dropify.js"></script>
@endsection