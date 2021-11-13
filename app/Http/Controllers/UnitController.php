<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use Auth;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(PackagePermission('Product')){
            $unit_list = Unit::active()->where('vendor_id', Auth::user()->v_id)->get();
            return view('unit.index', compact('unit_list'));
        }
        else
            return redirect()->back()->with(['error' => 'Sorry! You are not allowed to access this module']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(PackagePermission('Product')){
            try{
                $data = $request->except(['_token']);
                $data['is_active'] = true;
                if(!$data['base_unit']){
                    $data['operator'] = '*';
                    $data['operation_value'] = 1;
                }
                $data['vendor_id'] = Auth::user()->v_id;
                Unit::create($data);
                //makeNotification('One Category has created','fas fa-cog', 'categories.index',array(strval(Auth::user()->id)));
                return redirect('units')->with(['success'=> 'Unit Inserted Successfully']);
            }catch(\Exception $ex){
                return redirect('units')->with(['error' => 'Unit Inserted Failed']);
            }
        }
        else
            return redirect()->back()->with(['error' => 'Sorry! You are not allowed to access this module']);
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
        //
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
