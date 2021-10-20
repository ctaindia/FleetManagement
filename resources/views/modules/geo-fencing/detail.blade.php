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
        <div class="row mt-5">
            <div class="col-lg-12">
                <div id="map" style="height: 400px;"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPuZ9AcP4PHUBgbUsT6PdCRUUkyczJ66I&libraries=places,geometry&callback=initMap&v=weekly" async></script>
<script type="text/javascript">
   // This example creates a simple polygon representing the Bermuda Triangle.
function initMap() {
    var coords = {!! json_encode($boundingCoords) !!};
    console.log(coords);

    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 12,
        center: {lat: coords[0]["lat"], lng: coords[0]["lng"]},
    });
//   // Define the LatLng coordinates for the polygon's path.
    
//     const boundingCoords = coords;
//   // Construct the polygon.
//     const boundingArea = new google.maps.Polygon({
//         paths: boundingCoords,
//         strokeColor: "#4723d9",
//         strokeOpacity: 0.8,
//         strokeWeight: 2,
//         fillColor: "#4723d9",
//         fillOpacity: 0.35,
//     });

//     boundingArea.setMap(map);

    //adding marker
    new google.maps.Marker({
        position: {lat: coords[0]["lat"], lng: coords[0]["lng"]},
        map,
        title: "Hello World!",
    });

    // Add the circle for this city to the map.
    const cityCircle = new google.maps.Circle({
        strokeColor: "#4723d9",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "#4723d9",
        fillOpacity: 0.35,
        map,
        center: {lat: coords[0]["lat"], lng: coords[0]["lng"]},
        radius: coords[0]["radius"]*1000,
    });
}
</script>
@endsection