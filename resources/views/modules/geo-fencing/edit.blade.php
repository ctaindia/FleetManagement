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
                  <li class="breadcrumb-item" aria-current="page">Geo Fencing edit</li>
                  <li class="breadcrumb-item" aria-current="page"><i class="bx bx-chevron-right"></i></li>
                  <li class="breadcrumb-item active" aria-current="page">Listings</li>
                </ol>
              </nav>
           </div>
        </div>
        <div class="row mt-0">
            <div class="sky-background">
                <h4 class="blue-text">Edit ({{$geoFence->area}})</h4>
            </div>
            <form action="{{route('admin.geo-fencing.update')}}" method="POST" class="add-form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8 pl-0">
                        <div class="form-group">
                            <label for="field1">Area Name</label>
                            <input type="text" class="form-control @error('area') is-invalid @enderror" placeholder="Area name" value="{{$geoFence->area}}" name="area">
                        </div>
                        @error('area')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 pl-0">
                        <h5>Set Geo Fencing</h5>
                    </div>
                </div>
                <input type="hidden" id="locations_number" value="{{count(explode(",", $geoFence->bounding))}}">
                <input type="hidden" name="geFenceId" value="{{ base64_encode($geoFence->id)}}">
                <div class="row geo-fencing" id="geo-fencing">
                    @foreach (explode(",", $geoFence->bounding) as $key => $item)
                    @php
                        $mainArr = explode("-", $item);
                    @endphp
                    <div class="row" id="geoFenceId{{$key+1}}">
                        <div class="col-lg-6 pl-0">
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" id="location{{$key+1}}" onfocus="initialize({{$key+1}})"  class="form-control col-lg-3" placeholder="Enter a location">
                            </div>
                        </div>
                        <div class="col-lg-5 pl-0">
                            <div class="form-group">
                                <label for="field1">Latitude</label>
                                <input type="text" id="lat{{$key+1}}" name="lat[]" value="{{$mainArr[0]}}" class="form-control" onkeypress="return isNumberKey(event)">
                            </div>
                        </div>
                        <div class="col-lg-6 pl-0">
                            <div class="form-group">
                                <label for="field1">Longitude</label>
                                <input type="text" id="lon{{$key+1}}" name="lon[]" value="{{$mainArr[1]}}" class="form-control" onkeypress="return isNumberKey(event)">
                            </div>
                        </div>
                        <div class="col-lg-6 pl-0">
                            <div class="form-group">
                                <label for="field1">Radius (Km)</label>
                                <input type="text" id="radius" name="radius" value="{{$geoFence->radius}}" class="form-control" onkeypress="return isNumberKey(event)">
                            </div>
                        </div>
                        {{-- <div class="col-lg-1">
                            <button type="button" onclick="removeGeoFencing({{$key+1}})" class="btn btn-danger btn-sm" style="margin-top:35px;">X</button>
                        </div> --}}
                    </div>
                    @endforeach
                </div>
                {{-- <div class="row mt-0">
                    <div class="col-3">
                        <button type="button" class="btn btn-sm btn-success" id="geoFencingAdd" data-id="abc" onclick="addGeoFencing(this.id)">Add more fencing +</button>
                    </div>
                </div> --}}
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

@section('script')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPuZ9AcP4PHUBgbUsT6PdCRUUkyczJ66I&libraries=places,geometry&callback=initMap&v=weekly"></script>
<script>
    google.maps.event.addDomListener(window,'load',initialize(1));

    // function addGeoFencing(buttonId) {
    //     $("#locations_number").val( parseInt($("#locations_number").val()) + 1 );
    //     // alert($("#locations_number").val());
    //     let num = $("#locations_number").val();
    //     let latLon = '';
    //     latLon += '<div class="row" id="geoFenceId'+num+'"><div class="col-lg-6 pl-0"><div class="form-group"><label for="location">Location</label><input type="text" id="location'+num+'"  class="form-control col-lg-3" placeholder="Enter a location"></div></div><div class="col-lg-5 pl-0 mb-2"><div class="form-group"><label for="field1">Latitude</label><input type="text" id="lat'+num+'" name="lat[]" class="form-control" onkeypress="return isNumberKey(event)"></div></div><div class="col-lg-5 pl-0"><div class="form-group"><label for="field1">Longitude</label><input type="text" id="lon'+num+'" name="lon[]" class="form-control" onkeypress="return isNumberKey(event)"></div></div><div class="col-lg-1"><button type="button" onclick="removeGeoFencing('+num+')" class="btn btn-danger btn-sm" style="margin-top:35px;">X</button></div></div>';

    //     $("#geo-fencing").append(latLon);
    //     initialize(num);
    // }
    // function removeGeoFencing(latLonNum) {
    //     $("#geoFenceId"+latLonNum).empty();
    // }

    function initialize(num){
        console.log(num);
        var autocomplete= new google.maps.places.Autocomplete(document.getElementById('location'+num));

        google.maps.event.addListener(autocomplete, 'place_changed', function(){

            var places = autocomplete.getPlace();
            // console.log(places);
            $('#location'+num).val(places.formatted_address);
            $('#lon'+num).val(places.geometry.location.lng());
            $('#lat'+num).val(places.geometry.location.lat());

        });
    }
</script>
@endsection