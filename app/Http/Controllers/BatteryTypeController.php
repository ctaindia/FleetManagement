<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BatteryType;

class BatteryTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = '')
    {
        $batteryTypes = BatteryType::select('*');
        if($id != '') {
            $batteryTypes = $batteryTypes->where('id', base64_decode($id));
        }
        $batteryTypes = $batteryTypes->get();
        return view('modules.battery_type.list', compact('batteryTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.battery_type.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {   
        $req->validate([
            'name' => 'required|string|max:100'
        ]);
        $bt = new BatteryType;
        $bt->name = $req->name;
        $bt->save();
        return redirect()->route('admin.battery-type.list')
        ->with('Success','Battery type added SuccessFully');
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
    public function edit($id)
    {
        $bt = BatteryType::find(base64_decode($id));
        return view('modules.battery_type.edit', compact('bt'));

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
            'name' => 'required|string|max:100'
        ]);
        $bt = BatteryType::find(base64_decode($req->batteryTypeId));
        $bt->name = $req->name;
        $bt->save();
        return redirect()->route('admin.battery-type.list')
        ->with('Success','Battery type updated SuccessFully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $bt = BatteryType::findOrFail(base64_decode($id));
        if($bt){
            $bt->delete();
            return redirect()->route('admin.battery-type.list')
            ->with('Success','Battery type deleted SuccessFully');  
        } else {
            return redirect()->route('admin.battery-type.list')
            ->with('Error','Failed');
        }
    }
}
