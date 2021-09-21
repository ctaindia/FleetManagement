@extends('layouts.master')
@section('title', 'Vehicle type edit')

@section('main-content')
<div class="height-100 bg-light">
    <div class="container dashboard-container">
        <div class="row">
           <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">Profile</li>
                  <li class="breadcrumb-item" aria-current="page"><i class="bx bx-chevron-right"></i></li>
                  <li class="breadcrumb-item active" aria-current="page">edit</li>
                </ol>
              </nav>
           </div>
        </div>
        <div class="row mt-0">
            <div class="sky-background">
                <h4 class="blue-text">Edit</h4>
            </div>
            <form action="{{route('user.updateprofile')}}" method="POST" class="add-form">
                @csrf
                <div class="row">
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{auth()->user()->name}}" name="name">
                        </div>
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="email" value="{{auth()->user()->email}}" name="email">
                        </div>
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Mobile</label>
                            <input type="text" class="form-control @error('mobile') is-invalid @enderror" placeholder="mobile" value="{{auth()->user()->mobile}}" name="mobile">
                        </div>
                        @error('mobile')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <button class="primary-button">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection