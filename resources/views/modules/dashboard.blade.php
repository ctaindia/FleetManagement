@extends('layouts.master')
@section('title', 'Dashboard')

@section('main-content')
<div class="height-100">
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
                            <i class="bx bx-user display-6 text-white"></i>
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
                            <i class="bx bx-car display-6 text-white"></i>
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
                            <i class="bx bx-car display-6 text-white"></i>
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
                            <i class="bx bx-map display-6 text-white"></i>
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
                            <i class="bx bx-map display-6 text-white"></i>
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
                            <i class="bx bx-car display-6 text-white"></i>
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
                            <i class="bx bx-car display-6 text-white"></i>
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
                            <i class="bx bx-map display-6 text-white"></i>
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
                            <i class="bx bx-map display-6 text-white"></i>
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
        
         
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12 text-right mb-3">
                        <label for=""><i class='bx bx-filter-alt nav_icon'></i>Filter</label>
                        <select name="per-page" id="vehicleSelcet" class="select-heading" onchange="loadMap(this.value)">
                            <option value="">All Vehicles</option>
                            @foreach ($vehicles as $vehicle)
                                <option value="{{$vehicle->id}}">{{$vehicle->vehicle_model}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div id="map" style="height: 400px; width: 100%; overflow: hidden;"></div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-12">
            
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function initMap() {
      const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 11,
        center: { lat: 22.60807709934321, lng: 88.36398185737436 }
      });
      setMarkers(map);
      function setMarkers(map) {
        for (let i = 0; i < locations.length; i++) {
            const location = locations[i];
            console.log(location);
            const infowindow = new google.maps.InfoWindow({
                content: "<p>"+location['vn']+"</p><p>Driver: "+location['driver']+"</p>",
            });
            const marker = new google.maps.Marker({
                position: { lat: location['lat'], lng: location['lng'] },
                map,
                icon: "{{asset('assets/image/car2.png')}}",
                // label: location['vn'],
            });
            marker.addListener("click", () => {
                infowindow.open({
                    anchor: marker,
                    map,
                    shouldFocus: false,
                });
            });
        }
      }
    }
    let locations = [];
    
    function loadMap(vehicleId = '') {
        // alert(vehicleId)
        $.ajax({
            type:"POST",
            url:"{{route('get.vehicle.location')}}",
            data:{_token: "{{csrf_token()}}", vehicleId: vehicleId},
            success:function(data) {
                if(data.error == false){
                    if(data.data.length > 0) {
                    locations = [];
                    $.each(data.data, function(index, value){
                        // map view
                        let lat = Number(value?.lat || 0);
                        let lng = Number(value?.lon || 0);
                        let vn = value.vehicle_model;
                        locations.push({ lat : lat, lng : lng , vn: vn, driver: value.driver.name });
                        initMap();
                    })
                    }
                }
            }
        });
    }

    window.onload = function () {
      // Initial function call
      loadMap();
      setInterval(function () {
        // Invoke function every 10 minutes
        loadMap();
      }, 600000);
    }
</script>
@endsection