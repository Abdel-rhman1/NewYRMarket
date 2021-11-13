<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warehouse;
use Auth;
class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(PackagePermission('Setting')){
            $warehouse_list = Warehouse::active()->where('vendor_id', Auth::user()->v_id)->get();
            return view('warehouse.index', compact('warehouse_list'));
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
        if(PackagePermission('Setting')){
            try{
                $data = $request->except(['_token']);
                $data['is_active'] = true;
                $data['vendor_id'] = Auth::user()->v_id;
                Warehouse::create($data);
                //makeNotification('One Category has created','fas fa-cog', 'categories.index',array(strval(Auth::user()->id)));
                return redirect('warehouses')->with(['success'=> 'Warehouse Inserted Successfully']);
            }catch(\Exception $ex){
                return redirect('warehouses')->with(['error' => 'Warehouse Inserted Failed']);
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
