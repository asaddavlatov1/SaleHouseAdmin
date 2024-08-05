@extends('layouts.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Company Edit</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">Company</a>
                            </li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Edit Company</h3>
                            </div>

                            <form class="form-horizontal" method="post" 
                            action="{{ route('admin.company.update', $company->id) }}" 
                            enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Name</label>
                                        <span style="color: red"> * </span>
                                        <div class="col-sm-8">
                                            <input type="text" name="name" class="form-control" 
                                            placeholder="Name" value="{{ old('name', $company->name) }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email</label>
                                        <span style="color: red"> * </span>
                                        <div class="col-sm-8">
                                            <input type="text" name="name" class="form-control" 
                                            placeholder="Email" value="{{ old('email', $company->email) }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Phone</label>
                                        <span style="color: red"> * </span>
                                        <div class="col-sm-8">
                                            <input type="text" name="phone" class="form-control" 
                                            placeholder="Phone" value="{{ old('phone', $company->phone) }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Address</label>
                                        <span style="color: red"> * </span>
                                        <div class="col-sm-8">
                                            <input type="text" name="address" class="form-control" 
                                            placeholder="Address" value="{{ old('address', $company->address) }}" required>
                                        </div>
                                    </div>
                                  
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="{{ route('admin.company.index') }}" class="btn btn-default float-right">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection