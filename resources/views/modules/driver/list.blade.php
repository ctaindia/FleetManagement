@extends('layouts.master')
@section('title', 'Driver list')
@section('main-content')
<div class="height-100">
    <div class="container dashboard-container">
        <div class="row">
           <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb align-items-center">
                  <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                  <li class="breadcrumb-item" aria-current="page"><i class="bx bx-chevron-right"></i></li>
                  <li class="breadcrumb-item" aria-current="page">Driver</li>
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
                        <p><span>{{$drivers->count()}}</span></p>
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
                        <h5 class="red-text mb-0">Active</h5>
                        <p><span>{{$activeDrivers}}</span></p>
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
                        <h5 class="blue-text mb-0">In-Active</h5>
                        <p><span>{{$inActiveDrivers}}</span></p>
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
                        <a href="{{route('admin.driver.create')}}" class="primary-button">Add</a>
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
                        <th>Image</th>
                        <th>Driver Name</th>
                        <th>Ph No.</th>
                        <th>Email</th>
                        <th>Pan</th>
                        <th>Aadhar</th>
                        <th>Driving license</th>
                        <th>Social Profiles</th>
                        <th>Vendor Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($drivers as $key => $driver)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td><img src="{{asset($driver->image)}}" alt="driver image" width="70"></td>
                            <td>{{$driver->name}}</td>
                            <td>{{$driver->mobile}}</td>
                            <td>{{$driver->email}}</td>
                            <td>{{$driver->driverInfo->pan_no}}</td>
                            <td>{{$driver->driverInfo->aadhar_no}}</td>
                            <td>{{$driver->driverInfo->driving_license}}</td>
                            <td>
                                <a href="{{($driver->driverInfo->fb_profile === '')? 'javascript:void(0);' : $driver->driverInfo->fb_profile}}">Facebook</a> <br>
                                <a href="{{($driver->driverInfo->ig_profile === '')?'javascript:void(0);' : $driver->driverInfo->ig_profile}}">Instagram</a> <br>
                                <a href="{{($driver->driverInfo->twitter_profile === '')?'javascript:void(0);' : $driver->driverInfo->twitter_profile}}">Twitter</a>
                            </td>
                            <td><a href="{{route('admin.vendor.list', ['id' => base64_encode($driver->driverInfo->selectedVendor->id)])}}">{{$driver->driverInfo->selectedVendor->name}}</a></td>
                            <td>
                                @if ($driver->status === 1)
                                <span class="badge bg-success">Active</span>
                                @else
                                <span class="badge bg-danger">In Active</span>
                                @endif
                            </td>
                            <td>
                                <span class="action-button m-1"><a href="{{route('admin.driver.edit', ['id' => base64_encode($driver->id)])}}"><i class='bx bxs-edit'></i></a></span>
                                <span class="action-button m-1"><a onclick="return confirm('are you sure?')" href="{{route('admin.driver.delete', ['id' => base64_encode($driver->id)])}}"><i class='bx bxs-trash'></i></a></span>
                            </td>
                        </tr>
                        @endforeach
                        @if (count($drivers) === 0)
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