@extends('layouts.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Users Edit</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">Users</a>
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
                                <h3 class="card-title">Edit Users</h3>
                            </div>

                            <form action="{{ route('admin.user.update', $user) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-2 col-form-label for="surname">Surname</label>
                                    <input type="text" id="surname" name="surname" class="form-control" value="{{ old('surname', $user->surname) }}">
                                    @error('surname')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="middle_name">Middle Name</label>
                                    <input type="text" id="middle_name" name="middle_name" class="form-control" value="{{ old('middle_name', $user->middle_name) }}">
                                    @error('middle_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}" required>
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="password">Password (leave blank to keep current password)</label>
                                    <input type="password" id="password" name="password" class="form-control">
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label for="is_active">Active</label>
                                    <input type="checkbox" id="is_active" name="is_active" {{ old('is_active', $user->is_active) ? 'checked' : '' }}>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Update User</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection