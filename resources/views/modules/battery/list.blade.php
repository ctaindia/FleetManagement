@extends('layouts.master')
@section('title', 'Battery')
@section('main-content')
<div class="height-100">
    <div class="container dashboard-container">
        <div class="row">
           <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb align-items-center">
                  <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                  <li class="breadcrumb-item" aria-current="page"><i class="bx bx-chevron-right"></i></li>
                  <li class="breadcrumb-item" aria-current="page">Battery</li>
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
                        <h5 class="red-text mb-0">Total</h5>
                        {{-- <p><span>{{count($batteries)}}</span></p> --}}
                    </div>
                    <div class="card-right">
                        <div class="card-image-wrapper red">
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
                        <a href="{{route('admin.battery.create')}}" class="primary-button">Add</a>
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
                        <th>Date of Supply</th>
                        <th>Customer Name</th>
                        <th>Battery Type</th>
                        <th>Rating</th>
                        <th>Battery Supplier</th>
                        <th>Motor Rating</th>
                        <th>Motor Supplier</th>
                        <th>Controller Rating</th>
                        <th>Controller Supplier</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($batteries as $key => $battery)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$battery->date_of_supply}}</td>
                            <td>{{$battery->customer_name}}</td>
                            <td><a href="{{route('admin.battery-type.list', ['id' => base64_encode($battery->batteryTypeInfo->id)])}}">{{$battery->batteryTypeInfo->name}}</a></td>
                            <td>{{$battery->rating}}</td>
                            <td><a href="{{route('admin.battery-supplier.list', ['id' => base64_encode($battery->batterySupplierInfo->id)])}}">{{$battery->batterySupplierInfo->name}}</a></td>
                            <td>{{$battery->motor_rating}}</td>
                            <td>{{$battery->motor_supplier}}</td>
                            <td>{{$battery->controller_rating}}</td>
                            <td>{{$battery->controller_supplier}}</td>
                            <td>
                                <span class="action-button m-1"><a href="{{route('admin.battery.edit', ['id' => base64_encode($battery->id)])}}"><i class='bx bxs-edit'></i></a></span>
                                <span class="action-button m-1"><a onclick="return confirm('are you sure?')" href="{{route('admin.battery.delete', ['id' => base64_encode($battery->id)])}}"><i class='bx bxs-trash'></i></a></span>
                            </td>
                        </tr>
                        @endforeach
                        @if (count($batteries) === 0)
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