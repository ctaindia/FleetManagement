@extends('layouts.master')

@section('title', 'Battery details edit')

@section('main-content')
<div class="height-100">
    <div class="container dashboard-container">
        <div class="row">
           <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                  <li class="breadcrumb-item" aria-current="page"><i class="bx bx-chevron-right"></i></li>
                  <li class="breadcrumb-item" aria-current="page">Battery Details</li>
                  <li class="breadcrumb-item" aria-current="page"><i class="bx bx-chevron-right"></i></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
              </nav>
           </div>
        </div>
        <div class="row mt-0">
            <div class="sky-background">
                <h4 class="blue-text">Edit fuel</h4>
                {{$errors}}
            </div>
            <form action="{{route('admin.battery-status.update')}}" method="POST" class="add-form">
                <input type="hidden" name="batteryDetailsId" value="{{base64_encode($fuel->id)}}">
                @csrf
                <div class="row">
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Vehicle</label>
                            <select name="vehicle_id" id="vehicle_id" class="form-control @error('vehicle_id') is-invalid @enderror">
                                <option value="" hidden>-select-</option>
                                @foreach ($vehicles as $vehicle)
                                    <option value="{{$vehicle->id}}" {{($vehicle->id === $fuel->vehicle_id)? 'selected' : ''}}>{{$vehicle->vehicle_model}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('vehicle_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Start meter</label>
                            <input type="text" class="form-control @error('start_meter') is-invalid @enderror" placeholder="Start meter" value="{{$fuel->start_meter}}" name="start_meter">
                        </div>
                        @error('start_meter')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Refference</label>
                            <input type="text" class="form-control @error('refference') is-invalid @enderror" placeholder="Refference" value="{{$fuel->refference}}" name="refference">
                        </div>
                        @error('refference')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">qty</label>
                            <input type="number" class="form-control @error('qty') is-invalid @enderror" placeholder="Qty" value="{{$fuel->qty}}" name="qty">
                        </div>
                        @error('qty')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Type</label>
                            <input type="text" class="form-control @error('type') is-invalid @enderror" placeholder="type" value="{{$fuel->type}}" name="type">
                        </div>
                        @error('qty')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Capacity</label>
                            <input type="text" class="form-control @error('capacity') is-invalid @enderror" placeholder="capacity" value="{{$fuel->capacity}}" name="capacity">
                        </div>
                        @error('qty')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Brand</label>
                            <input type="text" class="form-control @error('brand') is-invalid @enderror" placeholder="brand" value="{{$fuel->brand}}" name="brand">
                        </div>
                        @error('brand')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Price</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" value="{{$fuel->price}}" name="price" placeholder="Price">
                        </div>
                        @error('price')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Date</label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror" value="{{$fuel->date}}" name="date">
                        </div>
                        @error('date')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">State</label>
                            <input type="text" class="form-control @error('state') is-invalid @enderror" value="{{$fuel->state}}" name="state" placeholder="State">
                        </div>
                        @error('state')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">note</label>
                            <input type="text" class="form-control @error('note') is-invalid @enderror" value="{{$fuel->note}}" name="note" placeholder="Note">
                        </div>
                        @error('note')
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