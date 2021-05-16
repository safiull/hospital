@extends('layouts.dashboard')
@section('dashboard_content')
@section('department_active')
    active
@endsection
@section('dpt_add_active')
    active
@endsection
@section('top_css')
<link rel="stylesheet" href="{{ asset('dashboard') }}/assets/vendor/parsleyjs/css/parsley.css">
@endsection


    <div class="block-header">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Edit Departments</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="icon-home"></i></a></li>                            
                    <li class="breadcrumb-item">
                        <a href="{{ url('departments') }}">Departments</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Departments</li>
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
                    <a href="{{ url('departments') }}" class="btn btn-info btn-sm"><i class="fa fa-list"></i> Department List</a>                            
                </div>
                <hr class="m-0 p-0">
                <div class="body clearfix">
                    <form action="{{ route('department.update', $department->id) }}" method="POST" data-parsley-validate novalidate>
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <div class="col-sm-2">
                                <label for="dep_name">Department Name <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input id="dep_name" type="text" class="form-control" placeholder="Departments Name" name="name" value="{{ $department->name }}" required data-parsley-minlength="3">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="dep_description">Description</label>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <textarea id="dep_description" rows="6" class="form-control no-resize" placeholder="Description..." name="description">
                                        {{ $department->description }}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="status">Description</label>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="radio" id="1" name="status" value="1" {{ $department->status == 1 ? 'checked':'' }}>&nbsp;
                                    <label for="1">Active</label>&nbsp;&nbsp;
                                    <input type="radio" id="0" name="status" value="0" {{ $department->status == 1 ? '':'checked' }}>&nbsp;
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
<script src="{{ asset('dashboard') }}/assets/vendor/parsleyjs/js/parsley.min.js"></script>
@endsection