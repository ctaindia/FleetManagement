<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VendorDetail;
use App\Models\User;
use Hash;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($vendorId = '')
    {
        $vendors = User::where('user_type', 2);
        if($vendorId != '') {
            $vendors = $vendors->where('id', base64_decode($vendorId))  ;
        }
        $vendors = $vendors->with('vendorInfo')->get();
        $activeVendors = $vendors->where('status',1)->count();
        $inActiveVendors = $vendors->where('status',0)->count();
        // dd($vendors);
        return view('modules.vendor.list', compact('vendors','activeVendors', 'inActiveVendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.vendor.add');
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
            "address" => 'required',
            "country" => 'required',
            "state" => 'required',
            "city" => 'required',
            "pin" => 'required|numeric',
            "website" => 'required',
            "contact_person" => 'required',
            "pan_no" => 'required',
            "gst_no" => 'required',
            "vendor_image" => 'required'
        ]);
        $vendor = new VendorDetail();
        $user = new User();
        $user->user_type = 2;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->mobile = $req->phone;
        $user->password = Hash::make($req->password);
        if($req->hasFile('vendor_image')){
            $vendorImage = $req->file('vendor_image');
            $random = randomGenerator();
            $vendorImage->move('upload/vendors/',$random.'.'.$vendorImage->getClientOriginalExtension());
            $vendorImageurl = 'upload/vendors/'.$random.'.'.$vendorImage->getClientOriginalExtension();
            $user->image = $vendorImageurl;
        }
        $user->save();

        $vendor->user_id = $user->id;
        $vendor->address = $req->address;
        $vendor->country = $req->country;
        $vendor->state = $req->state;
        $vendor->city = $req->city;
        $vendor->pin = $req->pin;
        $vendor->website = $req->website;
        $vendor->contact_person = $req->contact_person;
        $vendor->pan_no = $req->pan_no;
        $vendor->gst_no = $req->gst_no;
        $vendor->save();

        return redirect()->route('admin.vendor.list')
        ->with('Success','Vendor Added SuccessFully');
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
    public function edit($vendorId)
    {
        $vendor = User::find(base64_decode($vendorId));
        // dd($vendor->userInfo);
        return view('modules.vendor.edit', compact('vendor'));
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
            'vendorId' => 'required',
            'name' => 'required|max:200|string',
            "phone" => 'required|numeric',
            
            "address" => 'required',
            "country" => 'required',
            "state" => 'required',
            "city" => 'required',
            "pin" => 'required|numeric',
            "website" => 'required',
            "contact_person" => 'required',
            "pan_no" => 'required',
            "gst_no" => 'required',
            "vendor_image" => ''
        ]);
        
        $user = User::find(base64_decode($req->vendorId));
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
        if($req->hasFile('vendor_image')){
            $vendorImage = $req->file('vendor_image');
            $random = randomGenerator();
            $vendorImage->move('upload/vendors/',$random.'.'.$vendorImage->getClientOriginalExtension());
            $vendorImageurl = 'upload/vendors/'.$random.'.'.$vendorImage->getClientOriginalExtension();
            $user->image = $vendorImageurl;
        }
        $user->save();

        $vendor = VendorDetail::where('user_id', base64_decode($req->vendorId))->first();
        $vendor->address = $req->address;
        $vendor->country = $req->country;
        $vendor->state = $req->state;
        $vendor->city = $req->city;
        $vendor->pin = $req->pin;
        $vendor->website = $req->website;
        $vendor->contact_person = $req->contact_person;
        $vendor->pan_no = $req->pan_no;
        $vendor->gst_no = $req->gst_no;
        $vendor->save();

        return redirect()->route('admin.vendor.list')
        ->with('Success','Vendor edited SuccessFully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($vendorId)
    {
        $user = User::findOrFail(base64_decode($vendorId));
        $vendor = VendorDetail::where('user_id', base64_decode($vendorId))->first();
        if($user && $vendor){
            $user->delete();
            $vendor->delete();
            return redirect()->route('admin.vendor.list')
            ->with('Success','Vendor deleted SuccessFully');  
        } else {
            return redirect()->route('admin.vendor.list')
            ->with('Error','Failed');
        }

    }
}
