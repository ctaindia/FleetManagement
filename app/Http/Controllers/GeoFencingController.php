<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeoFencing;

class GeoFencingController extends Controller
{
    public function index(Request $req)
    {
        $geoFences = GeoFencing::get();
        return view("modules.geo-fencing.index", compact('geoFences'));
    }

    public function create(Request $req)
    {
        return view("modules.geo-fencing.add");
    }
    
    public function store(Request $req)
    {
        // dd($req->all());
        $req->validate([
            "area" => "required",
            "lat" => "required",
            "lon" => "required"
        ]);
        $geoFence = new GeoFencing;
        $geoFence->area = $req->area;
        $locationArr = array();
        foreach ($req->lat as $key => $value) {
            array_push($locationArr, $req->lat[$key].'-'.$req->lon[$key]);
        }
        $geoFence->bounding = implode(",", $locationArr);
        $geoFence->save();
        return redirect()->route('admin.geo-fencing.index')
        ->with('Success','Geo Fencing added SuccessFully');
    }

    public function detail(Request $req, $id)
    {
        $geoFence = GeoFencing::find(base64_decode($id));
        $fences = explode(",", $geoFence->bounding);
        $boundingCoords = array();
        foreach ($fences as $key => $val) {
            $latLon = explode("-", $val);
            // dd($latLon);
            $arrayVal = (object)[];
            $arrayVal->lat =  (float)$latLon[0];
            $arrayVal->lng =  (float)$latLon[1];
            array_push($boundingCoords,$arrayVal);
        }
        // dd($boundingCoords);
        return view("modules.geo-fencing.detail", compact('geoFence', 'boundingCoords'));
    }
    
    public function edit(Request $req, $id)
    {
        // dd(base64_decode($id));
        $geoFence = GeoFencing::find(base64_decode($id));
        return view("modules.geo-fencing.edit", compact('geoFence'));
    }

    public function update(Request $req)
    {
        // dd($req->all());
        $req->validate([
            "geFenceId" => "required",
            "area" => "required",
            "lat" => "required",
            "lon" => "required"
        ]);
        $geoFence = GeoFencing::findOrFail(base64_decode($req->geFenceId));
        $geoFence->area = $req->area;
        $locationArr = array();
        foreach ($req->lat as $key => $value) {
            array_push($locationArr, $req->lat[$key].'-'.$req->lon[$key]);
        }
        $geoFence->bounding = implode(",", $locationArr);
        $geoFence->save();
        return redirect()->route('admin.geo-fencing.index')
        ->with('Success','Geo Fencing updated SuccessFully');
    }

    public function delete(Request $req, $GeoFencingId)
    {
        $GeoFencing = GeoFencing::findOrFail(base64_decode($GeoFencingId));
        if($GeoFencing){
            $GeoFencing->delete();
            return redirect()->route('admin.geo-fencing.index')
            ->with('Success','GeoFencing deleted SuccessFully');  
        } else {
            return redirect()->route('admin.geo-fencing.index')
            ->with('Error','Failed');
        }
    }
}
