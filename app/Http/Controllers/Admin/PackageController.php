<?php

namespace App\Http\Controllers\Admin;
use App\Models\Package;
use App\Models\Feature;
use App\Http\Requests\PackageRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::where('status', 1)->get();
        $features = Feature::where('status', 1)->get();
        return view('admin.Package.index', compact('packages', 'features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $features = Feature::where('status', 1)->get();
        return view('admin.Package.create',compact('features'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PackageRequest $request)
    {
        try{
            $data = $request->except(['_token','features']);
            if(!isset($data['status']))
                $data['status'] = false;
            $Package = Package::create($data);
            $Package->features()->attach($request->features);
            makeNotificationAdmin('One Package has created','fas fa-cog', 'packages.index',['2']);
            return redirect('languages')->with(['success'=> 'package Inserted Successfully']);
        }catch(\Exception $ex){
            return redirect('languages')->with(['error' => 'package Inserted Failed']);
        }
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
        $package = Package::find($id);
        $features = Feature::where('status', 1)->get();
        return view('admin.package.edit',compact('package','features'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
