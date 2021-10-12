@extends('layouts.master')
@section('title', 'Vehicle edit')
@section('main-content')
<div class="height-100">
    <div class="container dashboard-container">
        <div class="row">
           <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                  <li class="breadcrumb-item" aria-current="page"><i class="bx bx-chevron-right"></i></li>
                  <li class="breadcrumb-item" aria-current="page">Vehicle</li>
                  <li class="breadcrumb-item" aria-current="page"><i class="bx bx-chevron-right"></i></li>
                  <li class="breadcrumb-item active" aria-current="page">edit</li>
                </ol>
              </nav>
           </div>
        </div>
        <div class="row mt-0">
            <div class="sky-background">
                <h4 class="blue-text">Edit </h4>
            </div>
            <form action="{{route('admin.vehicles.update')}}" method="POST" class="add-form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="vehicleId" value="{{base64_encode($vehicle->id)}}">
                {{-- <div class="row">
                    <div class="col-lg-6 pl-0">
                        <label for="field1">Existing Image</label>
                        <img src="{{asset($vehicle->vehicle_image)}}" alt="" width="100">
                    </div>
                </div> --}}
                <div class="row">
                    {{-- <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Image</label>
                            <input type="file" class="form-control @error('vehicle_image') is-invalid @enderror" value="{{old('vehicle_image')}}" name="vehicle_image">
                        </div>
                        @error('vehicle_image')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div> --}}
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Driver</label>
                            <select name="driver_id" id="driver_id" class="form-control @error('driver_id') is-invalid @enderror">
                                <option value="" hidden>-select-</option>
                                @foreach ($drivers as $driver)
                                    <option value="{{$driver->id}}" {{($driver->id === $vehicle->driver_id)? 'selected' : ''}}>{{$driver->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('driver_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Maker Name</label>
                            <input type="text" class="form-control @error('maker_name') is-invalid @enderror" placeholder="Maker name" value="{{$vehicle->maker_name}}" name="maker_name">
                        </div>
                        @error('maker_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Engine model</label>
                            <input type="text" class="form-control @error('engine_model') is-invalid @enderror" placeholder="Engine model" value="{{$vehicle->engine_model}}" name="engine_model">
                        </div>
                        @error('engine_model')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Vehicle model</label>
                            <input type="text" class="form-control @error('vehicle_model') is-invalid @enderror" placeholder="Vehicle model" value="{{$vehicle->vehicle_model}}" name="vehicle_model">
                        </div>
                        @error('vehicle_model')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Horse Power</label>
                            <input type="text" class="form-control @error('vehicle_hp') is-invalid @enderror" placeholder="Vehicle model" value="{{$vehicle->vehicle_hp}}" name="vehicle_hp">
                        </div>
                        @error('vehicle_hp')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Vehicle type</label>
                            <select name="vehicle_type_id" id="vehicle_type_id" class="form-control @error('vehicle_type_id') is-invalid @enderror">
                                <option value="" hidden>-select-</option>
                                @foreach ($vehicleTypes as $vehicleType)
                                    <option value="{{$vehicleType->id}}" {{($vehicleType->id === $vehicle->vehicle_type_id)? 'selected' : ''}}>{{$vehicleType->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('vehicle_type_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Vin no</label>
                            <input type="text" class="form-control @error('vin_no') is-invalid @enderror" value="{{$vehicle->vin_no}}" name="vin_no" placeholder="VIN number">
                        </div>
                        @error('vin_no')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Registration No</label>
                            <input type="text" class="form-control @error('registration_no') is-invalid @enderror" value="{{$vehicle->registration_no}}" name="registration_no" placeholder="Vehicle registration number">
                        </div>
                        @error('registration_no')
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