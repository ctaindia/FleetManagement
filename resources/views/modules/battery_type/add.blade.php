@extends('layouts.master')

@section('title', 'Battery type add')

@section('main-content')
<div class="height-100">
    <div class="container dashboard-container">
        <div class="row">
           <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                  <li class="breadcrumb-item" aria-current="page"><i class="bx bx-chevron-right"></i></li>
                  <li class="breadcrumb-item" aria-current="page">Battery Type</li>
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
            <form action="{{route('admin.battery-type.store')}}" method="POST" class="add-form">
                @csrf
                <div class="row">
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" name="name" placeholder="Battery type">
                        </div>
                        @error('name')
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