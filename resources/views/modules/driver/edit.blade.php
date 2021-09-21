@extends('layouts.master')
@section('title', 'Driver edit')
@section('main-content')
<div class="height-100 bg-light">
    <div class="container dashboard-container">
        <div class="row">
           <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                  <li class="breadcrumb-item" aria-current="page"><i class="bx bx-chevron-right"></i></li>
                  <li class="breadcrumb-item" aria-current="page">Driver({{$driver->name}})</li>
                  <li class="breadcrumb-item" aria-current="page"><i class="bx bx-chevron-right"></i></li>
                  <li class="breadcrumb-item active" aria-current="page">edit</li>
                </ol>
              </nav>
           </div>
        </div>
        <div class="row mt-0">
            <div class="sky-background">
                <h4 class="blue-text">Create New</h4>
            </div>
            <form action="{{route('admin.driver.update')}}" method="POST" class="add-form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="driverId" value="{{base64_encode($driver->id)}}">
                <div class="row">
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="driver Name" value="{{$driver->name}}" name="name">
                        </div>
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="driver Email" value="{{$driver->email}}" name="email">
                        </div>
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="driver phone no" value="{{$driver->mobile}}" name="phone">
                        </div>
                        @error('phone')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    @if (auth()->user()->user_type === 1)
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Choose Vendor</label>
                            <select name="vendor_id" id="vendor_id" class="form-control @error('vendor_id') is-invalid @enderror">
                                <option value="" hidden>-select-</option>
                                @foreach ($vendors as $vendor)
                                    <option value="{{$vendor->id}}" {{($vendor->id === $driver->driverInfo->vendor_id)? 'selected' : ''}}>{{$vendor->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('vendor_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="******" name="password">
                        </div>
                        @error('password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Confirm Password</label>
                            <input type="password" class="form-control" placeholder="******" name="password_confirmation">
                        </div>
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Image</label>
                            <input type="file" class="form-control @error('driver_image') is-invalid @enderror" value="{{old('driver_image')}}" name="driver_image">
                        </div>
                        @error('driver_image')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Pan no</label>
                            <input type="text" class="form-control @error('pan_no') is-invalid @enderror" value="{{$driver->driverInfo->pan_no}}" name="pan_no" placeholder="driver pan no">
                        </div>
                        @error('pan_no')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Aadhar no</label>
                            <input type="text" class="form-control @error('aadhar_no') is-invalid @enderror" value="{{$driver->driverInfo->aadhar_no}}" name="aadhar_no" placeholder="driver gst no">
                        </div>
                        @error('aadhar_no')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Driving license</label>
                            <input type="text" class="form-control @error('driving_license') is-invalid @enderror" value="{{$driver->driverInfo->driving_license}}" name="driving_license" placeholder="driving license no">
                        </div>
                        @error('driving_license')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <button class="primary-button">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection