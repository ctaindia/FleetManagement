@extends('layouts.master')
@section('title', 'Geo Fencing')
@section('main-content')
<div class="height-100">
    <div class="container dashboard-container">
        <div class="row">
           <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb align-items-center">
                  <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                  <li class="breadcrumb-item" aria-current="page"><i class="bx bx-chevron-right"></i></li>
                  <li class="breadcrumb-item" aria-current="page">Geo Fencing</li>
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
                        <p>
                            <span>{{$geoFences->count()}}</span>
                        </p>
                    </div>
                    <div class="card-right">
                        <div class="card-image-wrapper yellow">
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
                        <a href="{{route('admin.geo-fencing.create')}}" class="primary-button">Add</a>
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
                        <th>Area</th>
                        <th>location</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($geoFences as $key => $geoFence)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$geoFence->area}}</td>
                                <td>
                                @foreach (explode(",", $geoFence->bounding) as $item)
                                    <?php
                                        $latLng = explode("-", $item);
                                        echo "Lat: ".$latLng[0].", Lon: ".$latLng[1]."<br>";
                                    ?>
                                @endforeach
                                </td>
                                <td>
                                    <span class="action-button m-1"><a href="{{route('admin.geo-fencing.detail', base64_encode($geoFence->id))}}"><i class='bx bxs-map-pin'></i></a></span>
                                    <span class="action-button m-1"><a href="{{route('admin.geo-fencing.edit', base64_encode($geoFence->id))}}"><i class='bx bxs-edit'></i></a></span>
                                    <span class="action-button m-1"><a onclick="return confirm('are you sure?')" href="{{route('admin.geo-fencing.delete', base64_encode($geoFence->id))}}"><i class='bx bxs-trash'></i></a></span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection