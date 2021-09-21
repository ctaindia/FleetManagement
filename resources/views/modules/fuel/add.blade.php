@extends('layouts.master')

@section('title', 'Fuel add')

@section('main-content')
<div class="height-100 bg-light">
    <div class="container dashboard-container">
        <div class="row">
           <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                  <li class="breadcrumb-item" aria-current="page"><i class="bx bx-chevron-right"></i></li>
                  <li class="breadcrumb-item" aria-current="page">Fuel</li>
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
            <form action="{{route('admin.fuel.store')}}" method="POST" class="add-form">
                @csrf
                <div class="row">
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Vehicle</label>
                            <select name="vehicle_id" id="vehicle_id" class="form-control @error('vehicle_id') is-invalid @enderror">
                                <option value="" hidden>-select-</option>
                                @foreach ($vehicles as $vehicle)
                                    <option value="{{$vehicle->id}}">{{$vehicle->vehicle_model}}</option>
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
                            <input type="text" class="form-control @error('start_meter') is-invalid @enderror" placeholder="Start meter" value="{{old('start_meter')}}" name="start_meter">
                        </div>
                        @error('start_meter')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Refference</label>
                            <input type="text" class="form-control @error('refference') is-invalid @enderror" placeholder="Refference" value="{{old('refference')}}" name="refference">
                        </div>
                        @error('refference')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">qty</label>
                            <input type="text" class="form-control @error('qty') is-invalid @enderror" placeholder="Qty" value="{{old('qty')}}" name="qty">
                        </div>
                        @error('qty')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Price</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}" name="price" placeholder="Price">
                        </div>
                        @error('price')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">Date</label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror" value="{{old('date')}}" name="date">
                        </div>
                        @error('date')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">State</label>
                            <input type="text" class="form-control @error('state') is-invalid @enderror" value="{{old('state')}}" name="state" placeholder="State">
                        </div>
                        @error('state')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 pl-0">
                        <div class="form-group">
                            <label for="field1">note</label>
                            <input type="text" class="form-control @error('note') is-invalid @enderror" value="{{old('note')}}" name="note" placeholder="Note">
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