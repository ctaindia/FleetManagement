@extends('layouts.master')

@section('title', 'Profile detail')

@section('main-content')
<div class="height-100 bg-light">
    <div class="container dashboard-container">
        <div class="row">
           <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">Profile</li>
                  {{-- <li class="breadcrumb-item" aria-current="page"><i class="bx bx-chevron-right"></i></li>
                  <li class="breadcrumb-item" aria-current="page">Vehicles</li>
                  <li class="breadcrumb-item" aria-current="page"><i class="bx bx-chevron-right"></i></li>
                  <li class="breadcrumb-item active" aria-current="page">Add</li> --}}
                </ol>
              </nav>
           </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <img src="{{auth()->user()->image}}" alt="User image" width="200">
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 pb-4">
                        <h4>Basic Details</h4>
                        <p><b>Name: </b> {{auth()->user()->name}}</p>
                        <p><b>Email: </b> {{auth()->user()->email}}</p>
                        <p><b>Contact: </b> {{auth()->user()->mobile}}</p>
                    </div>
                    @if (auth()->user()->user_type === 2)
                    {{-- <div class="col-md-12">
                        <h4>Basic Details</h4>
                        <p><b>Name: </b> {{auth()->user()->name}}</p>
                        <p><b>Email: </b> {{auth()->user()->email}}</p>
                        <p><b>Contact: </b> {{auth()->user()->mobile}}</p>
                    </div> --}}
                    @endif
                    <div class="col-md-3">
                        <div class="col-12 text-center">
                            <a href="{{route('user.changeprofile')}}" class="primary-button">Edit Profile</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="col-12 text-center">
                            <a href="{{route('user.changepassword')}}" class="primary-button">Change Password</a>
                        </div>
                    </div>
                </div>
            </div>
                
        </div>
        
    </div>
</div>
@endsection