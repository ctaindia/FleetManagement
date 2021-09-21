@extends('layouts.master')
@section('title', 'Vendor add')

@section('main-content')
<div class="height-100 bg-light">
    <div class="container dashboard-container">
        <div class="row">
           <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                  <li class="breadcrumb-item" aria-current="page"><i class="bx bx-chevron-right"></i></li>
                  <li class="breadcrumb-item" aria-current="page">Vendor</li>
                  <li class="breadcrumb-item" aria-current="page"><i class="bx bx-chevron-right"></i></li>
                  <li class="breadcrumb-item active" aria-current="page">Add</li>
                </ol>
              </nav>
           </div>
        </div>
        <div class="row mt-0">
            <div class="sky-background">
                <h4 class="blue-text">Create New</h4>
            </div>
            <form action="{{route('admin.vendor.store')}}" method="POST" class="add-form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Vendor Name" value="{{old('name')}}" name="name">
                        </div>
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Vendor Email" value="{{old('email')}}" name="email">
                        </div>
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Vendor phone no" value="{{old('phone')}}" name="phone">
                        </div>
                        @error('phone')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
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
                            <input type="file" class="form-control @error('vendor_image') is-invalid @enderror" value="{{old('vendor_image')}}" name="vendor_image">
                        </div>
                        @error('vendor_image')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" value="{{old('address')}}" name="address" placeholder="Vendor address">
                        </div>
                        @error('address')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">country</label>
                            <input type="text" class="form-control @error('country') is-invalid @enderror" value="{{old('country')}}" name="country" placeholder="country">
                        </div>
                        @error('country')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">state</label>
                            <input type="text" class="form-control @error('state') is-invalid @enderror" value="{{old('state')}}" name="state" placeholder="state">
                        </div>
                        @error('state')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">city</label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror" value="{{old('city')}}" name="city" placeholder="city">
                        </div>
                        @error('city')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">pin</label>
                            <input type="text" class="form-control @error('pin') is-invalid @enderror" value="{{old('pin')}}" name="pin" placeholder="pin">
                        </div>
                        @error('pin')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">website</label>
                            <input type="text" class="form-control @error('website') is-invalid @enderror" value="{{old('website')}}" name="website" placeholder="Vendor website">
                        </div>
                        @error('website')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Contact person</label>
                            <input type="text" class="form-control @error('contact_person') is-invalid @enderror" value="{{old('contact_person')}}" name="contact_person" placeholder="Vendor contact person">
                        </div>
                        @error('contact_person')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Pan no</label>
                            <input type="text" class="form-control @error('pan_no') is-invalid @enderror" value="{{old('pan_no')}}" name="pan_no" placeholder="Vendor pan no">
                        </div>
                        @error('pan_no')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">gst no</label>
                            <input type="text" class="form-control @error('gst_no') is-invalid @enderror" value="{{old('gst_no')}}" name="gst_no" placeholder="Vendor gst no">
                        </div>
                        @error('gst_no')
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