@extends('layouts.master')
@section('title', 'Vehicle list')
@section('main-content')
<div class="height-100">
    <div class="container dashboard-container">
        <div class="row">
           <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb align-items-center">
                  <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                  <li class="breadcrumb-item" aria-current="page"><i class="bx bx-chevron-right"></i></li>
                  <li class="breadcrumb-item" aria-current="page">Vehicle</li>
                  <li class="breadcrumb-item" aria-current="page"><i class="bx bx-chevron-right"></i></li>
                  <li class="breadcrumb-item active" aria-current="page">Listings</li>
                </ol>
              </nav>
           </div>
        </div>
        <div class="row mt-0">
            <div class="col-lg-4">
                <div class="card d-flex flex-row justify-content-between align-items-center p-3">
                    <div class="card-left">
                        <h5 class="yellow-text mb-0">Total</h5>
                        <p><span>{{$vehicles->count()}}</span></p>
                    </div>
                    <div class="card-right">
                        <div class="card-image-wrapper yellow">
                            <img src="{{asset('assets/image/folder.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card d-flex flex-row justify-content-between align-items-center p-3">
                    <div class="card-left">
                        <h5 class="red-text mb-0">Total</h5>
                        <p><span>{{$activeVehicles}}</span></p>
                    </div>
                    <div class="card-right">
                        <div class="card-image-wrapper red">
                            <img src="{{asset('assets/image/folder.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card d-flex flex-row justify-content-between align-items-center p-3">
                    <div class="card-left">
                        <h5 class="blue-text mb-0">Total</h5>
                        <p><span>{{$inActiveVehicles}}</span></p>
                    </div>
                    <div class="card-right">
                        <div class="card-image-wrapper blue">
                            <img src="{{asset('assets/image/folder.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-2 text-center">
                        <a href="{{route('admin.vehicles.create')}}" class="primary-button">Add</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <select name="per-page" id="" class="select-heading">
                            <option value="10">10/page</option>
                            <option value="10">20/page</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                            <input type="text" placeholder="Search.....">
                            <button><i class='bx bx-search-alt-2'></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <th>Sl.</th>
                        <th>Driver</th>
                        {{-- <th>Image</th> --}}
                        <th>Maker</th>
                        <th>Engiene Model</th>
                        <th>Vehicle Model</th>
                        <th>Horse Power</th>
                        <th>Vehicle Type</th>
                        <th>Vin no</th>
                        <th>Registration No</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($vehicles as $key => $vehicle)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td><a href="{{route('admin.driver.list', ['id' => base64_encode($vehicle->driver->id)])}}">{{$vehicle->driver->name}}</a></td>
                            {{-- <td><img src="{{asset($vehicle->vehicle_image)}}" alt="driver image" width="70"></td> --}}
                            <td>{{$vehicle->maker_name}}</td>
                            <td>{{$vehicle->engine_model}}</td>
                            <td>{{$vehicle->vehicle_model}}</td>
                            <td>{{$vehicle->vehicle_hp}}</td>
                            <td><a href="{{route('admin.vehicle.type.list', ['id' => base64_encode($vehicle->vehicleType->id)])}}">{{$vehicle->vehicleType->name}}</a></td>
                            <td>{{$vehicle->vin_no}}</td>
                            <td>{{$vehicle->registration_no}}</td>
                            <td>
                                <span class="action-button m-1"><a href="{{route('admin.vehicles.edit', ['id' => base64_encode($vehicle->id)])}}"><i class='bx bxs-edit'></i></a></span>
                                <span class="action-button m-1"><a onclick="return confirm('are you sure?')" href="{{route('admin.vehicles.delete', ['id' => base64_encode($vehicle->id)])}}"><i class='bx bxs-trash'></i></a></span>
                            </td>
                        </tr>
                        @endforeach
                        @if (count($vehicles) === 0)
                            <tr>
                                <td colspan="10" class="text-center">No data</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection