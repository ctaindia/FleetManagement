@extends('layouts.master')

@section('title', 'Battery edit')

@section('main-content')
<div class="height-100">
    <div class="container dashboard-container">
        <div class="row">
           <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                  <li class="breadcrumb-item" aria-current="page"><i class="bx bx-chevron-right"></i></li>
                  <li class="breadcrumb-item" aria-current="page">Battery</li>
                  <li class="breadcrumb-item" aria-current="page"><i class="bx bx-chevron-right"></i></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
              </nav>
           </div>
        </div>
        <div class="row mt-0">
            <div class="sky-background">
                <h4 class="blue-text">Update battery</h4>
            </div>
            <form action="{{route('admin.battery.update')}}" method="POST" class="add-form">
                @csrf
                <input type="hidden" name="batteryId" value="{{base64_encode($battery->id)}}">
                <div class="row">
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Date of supply</label>
                            <input type="date" class="form-control @error('date_of_supply') is-invalid @enderror" value="{{$battery->date_of_supply}}" name="date_of_supply">
                        </div>
                        @error('date_of_supply')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Customer name</label>
                            <input type="text" class="form-control @error('customer_name') is-invalid @enderror" placeholder="Customer name" value="{{$battery->customer_name}}" name="customer name">
                        </div>
                        @error('customer_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Type</label>
                            <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                <option value="" hidden>-select-</option>
                                @foreach ($bt as $item)
                                    <option value="{{$item->id}}" {{($battery->type === $item->id)? 'selected' : ''}}>{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('type')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Rating</label>
                            <input rating="text" class="form-control @error('rating') is-invalid @enderror" placeholder="Rating" value="{{$battery->rating}}" name="rating">
                        </div>
                        @error('qty')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Supplier</label>
                            <select name="supplier" id="supplier" class="form-control @error('supplier') is-invalid @enderror">
                                <option value="" hidden>-select-</option>
                                @foreach ($bs as $item)
                                    <option value="{{$item->id}}" {{($battery->supplier === $item->id)? 'selected' : ''}}>{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('supplier')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Motor rating</label>
                            <input type="text" class="form-control @error('motor_rating') is-invalid @enderror" placeholder="Motor rating" value="{{$battery->motor_rating}}" name="motor_rating">
                        </div>
                        @error('motor_rating')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Motor supplier</label>
                            <input type="text" class="form-control @error('motor_supplier') is-invalid @enderror" placeholder="Motor supplier" value="{{$battery->motor_supplier}}" name="motor_supplier">
                        </div>
                        @error('motor_supplier')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Controller rating</label>
                            <input type="text" class="form-control @error('controller_rating') is-invalid @enderror" placeholder="Controller rating" value="{{$battery->controller_rating}}" name="controller_rating">
                        </div>
                        @error('controller_rating')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Controller supplier</label>
                            <input type="text" class="form-control @error('controller_supplier') is-invalid @enderror" placeholder="Controller supplier" value="{{$battery->controller_supplier}}" name="controller_supplier">
                        </div>
                        @error('controller_supplier')
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