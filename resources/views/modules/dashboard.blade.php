@extends('layouts.master')
@section('title', 'Dashboard')

@section('main-content')
<div class="height-100 bg-light">
    <div class="container dashboard-container">
        <div class="row">
           <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                </ol>
              </nav>
           </div>
        </div>

        {{-- admin dashboard --}}
        @if (auth()->user()->user_type === 1)
        <div class="row mt-5 card-container">
            <div class="col-lg-3">
                <div class="card">
                   <div class="card-upper">
                        <div class="card-image blue">
                            <img src="{{asset('assets/image/folder.png')}}" alt="">
                        </div>
                        <p>Total Vendor</p>
                        <h5 class="text-right"><span class="blue-text">{{$totalVendor}}</span></h5>
                   </div>
                   <div class="card-bottom">
                        <p class="text-muted"><i class='bx bxs-purchase-tag'></i> Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                   <div class="card-upper">
                        <div class="card-image yellow">
                            <img src="{{asset('assets/image/folder.png')}}" alt="">
                        </div>
                        <p>Total Vehicle</p>
                        <h5 class="text-right"><span class="yellow-text">{{$totalVehicle}}</span></h5>
                   </div>
                   <div class="card-bottom">
                       <p class="text-muted"><i class='bx bxs-purchase-tag'></i> Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                   </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                   <div class="card-upper">
                        <div class="card-image red">
                            <img src="{{asset('assets/image/folder.png')}}" alt="">
                        </div>
                        <p>Active Vehicles</p>
                        <h5 class="text-right"><span class="red-text">{{$activeVehicle}}</span></h5>
                   </div>
                   <div class="card-bottom">
                       <p class="text-muted"><i class='bx bxs-purchase-tag'></i> Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                   </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                   <div class="card-upper">
                        <div class="card-image green">
                            <img src="{{asset('assets/image/folder.png')}}" alt="">
                        </div>
                        <p>Total KMs Driven</p>
                        <h5 class="text-right"><span class="green-text">00.00</span></h5>
                   </div>
                   <div class="card-bottom">
                        <p class="text-muted"><i class='bx bxs-purchase-tag'></i> Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-3">
                <div class="card">
                   <div class="card-upper">
                        <div class="card-image green">
                            <img src="{{asset('assets/image/folder.png')}}" alt="">
                        </div>
                        <p>Today's KM</p>
                        <h5 class="text-right"><span class="green-text">00.00</span></h5>
                   </div>
                   <div class="card-bottom">
                        <p class="text-muted"><i class='bx bxs-purchase-tag'></i> Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
        </div>
        @endif

        {{-- vendor dashboard --}}
        @if (auth()->user()->user_type === 2)
        <div class="row mt-5 card-container">
            <div class="col-lg-3">
                <div class="card">
                   <div class="card-upper">
                        <div class="card-image yellow">
                            <img src="{{asset('assets/image/folder.png')}}" alt="">
                        </div>
                        <p>Total Vehicle</p>
                        <h5 class="text-right"><span class="yellow-text">{{$totalVehicle}}</span></h5>
                   </div>
                   <div class="card-bottom">
                       <p class="text-muted"><i class='bx bxs-purchase-tag'></i> Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                   </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                   <div class="card-upper">
                        <div class="card-image red">
                            <img src="{{asset('assets/image/folder.png')}}" alt="">
                        </div>
                        <p>Active Vehicles</p>
                        <h5 class="text-right"><span class="red-text">{{$activeVehicle}}</span></h5>
                   </div>
                   <div class="card-bottom">
                       <p class="text-muted"><i class='bx bxs-purchase-tag'></i> Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                   </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                   <div class="card-upper">
                        <div class="card-image green">
                            <img src="{{asset('assets/image/folder.png')}}" alt="">
                        </div>
                        <p>Total KMs Driven</p>
                        <h5 class="text-right"><span class="green-text">00.00</span></h5>
                   </div>
                   <div class="card-bottom">
                        <p class="text-muted"><i class='bx bxs-purchase-tag'></i> Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                   <div class="card-upper">
                        <div class="card-image blue">
                            <img src="{{asset('assets/image/folder.png')}}" alt="">
                        </div>
                        <p>Today's KM</p>
                        <h5 class="text-right"><span class="blue-text">00.00</span></h5>
                   </div>
                   <div class="card-bottom">
                        <p class="text-muted"><i class='bx bxs-purchase-tag'></i> Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
        </div>
        @endif
        
        {{-- <div class="row mt-5">
            <div class="col-lg-6">
                <div class="graph-container p-3">
                    <img src="{{asset('assets/image/graph.png')}}" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="graph-container p-3">
                    <img src="{{asset('assets/image/grafik.png')}}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="row mt-5">
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
                        <th>Serial No</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Field 4</th>
                        <th>Field 5</th>
                        <th>Field 6</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>John  Doe</td>
                            <td>Recent</td>
                            <td>Lorem ipsm</td>
                            <td>Lorem ipsm</td>
                            <td>Lorem ipsm</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>
                                <span class="action-button"><a><i class='bx bxs-trash'></i></a></span>
                                <span class="action-button"><a><i class='bx bxs-edit'></i></a></span>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>John  Doe</td>
                            <td>Recent</td>
                            <td>Lorem ipsm</td>
                            <td>Lorem ipsm</td>
                            <td>Lorem ipsm</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>
                                <span class="action-button"><a><i class='bx bxs-trash'></i></a></span>
                                <span class="action-button"><a><i class='bx bxs-edit'></i></a></span>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>John  Doe</td>
                            <td>Recent</td>
                            <td>Lorem ipsm</td>
                            <td>Lorem ipsm</td>
                            <td>Lorem ipsm</td>
                            <td><span class="badge bg-danger">Inactive</span></td>
                            <td>
                                <span class="action-button"><a><i class='bx bxs-trash'></i></a></span>
                                <span class="action-button"><a><i class='bx bxs-edit'></i></a></span>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>John  Doe</td>
                            <td>Recent</td>
                            <td>Lorem ipsm</td>
                            <td>Lorem ipsm</td>
                            <td>Lorem ipsm</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>
                                <span class="action-button"><a><i class='bx bxs-trash'></i></a></span>
                                <span class="action-button"><a><i class='bx bxs-edit'></i></a></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> --}}
    </div>
</div>
@endsection