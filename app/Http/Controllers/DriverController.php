<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DriverDetail;
use App\Models\VendorDetail;
use App\Models\User;
use Hash;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($driverId = '')
    {
        $drivers = User::where('user_type', 3);
        if (auth()->user()->user_type === 2 && $driverId == '') {
            $driverIds = DriverDetail::where('vendor_id', auth()->id())->pluck('user_id');
            $drivers = $drivers->whereIn('id', $driverIds);
        }
        if($driverId != '') {
            $drivers = $drivers->where('id', base64_decode($driverId))  ;
        }
        $drivers = $drivers->with('driverInfo')->get();
        $activeDrivers = $drivers->where('status',1)->count();
        $inActiveDrivers = $drivers->where('status',0)->count();
        // dd($drivers);
        return view('modules.driver.list', compact('drivers', 'activeDrivers', 'inActiveDrivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendors = User::where('user_type', 2)->get();
        return view('modules.driver.add', compact('vendors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        // dd($req-> all());
        $req->validate([
            'name' => 'required|max:200|string',
            'email' => 'required|email|unique:users',
            "phone" => 'required|numeric',
            "password" => 'required|min:6|confirmed',
            "pan_no" => 'required',
            "aadhar_no" => 'required',
            "driving_license" => 'required',
            "driver_image" => 'required|mimes:jpg,jpeg,png,svg,gif',
            "fb_profile" => 'string',
            "ig_profile" => 'string',
            "twitter_profile" => 'string'
        ]);
        $driver = new DriverDetail();
        $user = new User();
        $user->user_type = 3;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->mobile = $req->phone;
        $user->password = Hash::make($req->password);
        if($req->hasFile('driver_image')){
            $driverImage = $req->file('driver_image');
            $random = randomGenerator();
            $driverImage->move('upload/drivers/',$random.'.'.$driverImage->getClientOriginalExtension());
            $driverImageurl = 'upload/drivers/'.$random.'.'.$driverImage->getClientOriginalExtension();
            $user->image = $driverImageurl;
        }
        $user->save();

        $driver->user_id = $user->id;
        if (auth()->user()->user_type === 1) {
            $req->validate([
                "vendor_id" => 'required|numeric',
            ]);
            $driver->vendor_id = $req->vendor_id;
        }
        if (auth()->user()->user_type === 2) {
            $driver->vendor_id = auth()->user()->id;
        }
        $driver->pan_no = $req->pan_no;
        $driver->aadhar_no = $req->aadhar_no;
        $driver->driving_license = $req->driving_license;
        $driver->fb_profile = $req->fb_profile;
        $driver->ig_profile = $req->ig_profile;
        $driver->twitter_profile = $req->twitter_profile;
        $driver->save();

        return redirect()->route('admin.driver.list')
        ->with('Success','Driver Added SuccessFully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($driverId)
    {
        $vendors = User::where('user_type', 2)->get();
        $driver = User::find(base64_decode($driverId));
        return view('modules.driver.edit', compact('driver', 'vendors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $req->validate([
            'driverId' => 'required',
            'name' => 'required|max:200|string',
            "phone" => 'required|numeric',
            "pan_no" => 'required',
            "aadhar_no" => 'required',
            "driving_license" => 'required',
            "driver_image" => 'mimes:jpg,jpeg,png,svg,gif',
            "fb_profile" => 'string',
            "ig_profile" => 'string',
            "twitter_profile" => 'string'
        ]);
        
        $user = User::find(base64_decode($req->driverId));
        $user->name = $req->name;
        if($user->email != $req->email) {
            $req->validate([
                'email' => 'required|email|unique:users',
            ]);
            $user->email = $req->email;
        }
        $user->mobile = $req->phone;
        if($req->password != '') {
            $req->validate([
                "password" => 'min:6|confirmed',
            ]);
            $user->password = Hash::make($req->password);
        }
        if($req->hasFile('driver_image')){
            $driverImage = $req->file('driver_image');
            $random = randomGenerator();
            $driverImage->move('upload/drivers/',$random.'.'.$driverImage->getClientOriginalExtension());
            $driverImageurl = 'upload/drivers/'.$random.'.'.$driverImage->getClientOriginalExtension();
            $user->image = $driverImageurl;
        }
        $user->save();

        $driver = DriverDetail::where('user_id', base64_decode($req->driverId))->first();
        if (auth()->user()->user_type === 1) {
            $req->validate([
                "vendor_id" => 'required|numeric',
            ]);
            $driver->vendor_id = $req->vendor_id;
        }
        $driver->pan_no = $req->pan_no;
        $driver->aadhar_no = $req->aadhar_no;
        $driver->driving_license = $req->driving_license;
        $driver->fb_profile = $req->fb_profile;
        $driver->ig_profile = $req->ig_profile;
        $driver->twitter_profile = $req->twitter_profile;
        $driver->save();

        return redirect()->route('admin.driver.list')
        ->with('Success','Driver edited SuccessFully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($driverId)
    {
        $user = User::findOrFail(base64_decode($driverId));
        $driver = DriverDetail::where('user_id', base64_decode($driverId))->first();
        if($user && $driver){
            $user->delete();
            $driver->delete();
            return redirect()->route('admin.driver.list')
            ->with('Success','driver deleted SuccessFully');  
        } else {
            return redirect()->route('admin.driver.list')
            ->with('Error','Failed');
        }

    }
}
