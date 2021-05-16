@extends('layouts.dashboard')
@section('dashboard_content')
@section('patient_active')
	active
@endsection

<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-12">
            <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> View Patient</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item">Patient</li>
                <li class="breadcrumb-item active">View Patient</li>
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
<div class="row">
	<div class="col-lg-12">
        <div class="card">
            <div class="header">
                <a href="{{ url('doctors/add') }}" class="btn btn-info btn-sm"><i class="fa fa-plus-circle"></i> Add Patient</a>                       
            </div>
            <div class="body">
                <div class="card">
                    <div class="row">
                        <div class="col-sm-4">
                            <img class="img-fluid" src="{{ asset('dashboard/photo/patient_image') }}/{{ $patient->image }}" alt="">
                        </div>
                        <div class="offset-sm-1 col-sm-6 table-responsive">
                            <table class="table table-striped table-hover">
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $patient->id }}</td>
                                </tr>
                                <tr>
                                    <th>First Name</th>
                                    <td>{{ $patient->first_name }}</td>
                                </tr>
                                <tr>
                                    <th>Last Name</th>
                                    <td>{{ $patient->last_name }}</td>
                                </tr>
                                <tr>
                                    <th>E-mail</th>
                                    <td>{{ $patient->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $patient->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Mobile</th>
                                    <td>{{ $patient->mobile }}</td>
                                </tr>
                                <tr>
                                    <th>Birth date</th>
                                    <td>{{ $patient->birth_date }}</td>
                                </tr>
                                <tr>
                                    <th>Sex</th>
                                    <td>{{ $patient->sex }}</td>
                                </tr>
                                <tr>
                                    <th>Blood group</th>
                                    <td>{{ $patient->blood_group }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ $patient->status == '1' ? 'Active':'Inactive' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection