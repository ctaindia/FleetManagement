@extends('layouts.master')
@section('title', 'Vendor list')

@section('main-content')
<div class="height-100">
    <div class="container dashboard-container">
        <div class="row">
           <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb align-items-center">
                  <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                  <li class="breadcrumb-item" aria-current="page"><i class="bx bx-chevron-right"></i></li>
                  <li class="breadcrumb-item" aria-current="page">Vendor</li>
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
                        <p><span>{{$vendors->count()}}</span></p>
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
                        <p><span>{{$activeVendors}}</span></p>
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
                        <p><span>{{$inActiveVendors}}</span></p>
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
                        <a href="{{route('admin.vendor.create')}}" class="primary-button">Add</a>
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
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Pan</th>
                        <th>GST</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($vendors as $key => $vendor)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td><img src="{{asset($vendor->image)}}" alt="vendor image" width="70"></td>
                            <td>{{$vendor->name}}</td>
                            <td>{{$vendor->email}}, {{$vendor->mobile}}<br/><b>Website: </b>{{$vendor->vendorInfo->website}}</td>
                            <td>{{$vendor->vendorInfo->address}}, {{$vendor->vendorInfo->city}}, {{$vendor->vendorInfo->state}}, {{$vendor->vendorInfo->country}}, pin-{{$vendor->vendorInfo->pin}}</td>
                            <td>{{$vendor->vendorInfo->pan_no}}</td>
                            <td>{{$vendor->vendorInfo->gst_no}}</td>
                            <td>
                                @if ($vendor->status === 1)
                                <span class="badge bg-success">Active</span>
                                @else
                                <span class="badge bg-danger">In Active</span>
                                @endif
                            </td>
                            @if (auth()->user()->user_type === 1)
                            <td>
                                <span class="action-button m-1"><a href="{{route('admin.vendor.edit', ['id' => base64_encode($vendor->id)])}}"><i class='bx bxs-edit'></i></a></span>
                                <span class="action-button m-1"><a onclick="return confirm('are you sure?')" href="{{route('admin.vendor.delete', ['id' => base64_encode($vendor->id)])}}"><i class='bx bxs-trash'></i></a></span>
                            </td>
                            @else
                            <td>Unauthenticated</td>
                            @endif
                        </tr>
                        @endforeach
                        @if (count($vendors) === 0)
                            <tr>
                                <td colspan="9" class="text-center">No data</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection