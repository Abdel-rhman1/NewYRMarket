<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Brand;
use Auth;
use App\Traits\ImageTrait;

class BrandController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(PackagePermission('Product')){
            $brand_list = Brand::active()->where('vendor_id', Auth::user()->v_id)->get();
            return view('brand.index', compact('brand_list'));
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
                $data = $request->except(['_token','image']);
                $image = $request->image;
                if($image)
                    $data['image'] = $this->saveimage($image, 'public/images/brand');
                if(!isset($data['is_active']))
                    $data['is_active'] = false;
                $data['vendor_id'] = Auth::user()->v_id;
                Brand::create($data);
                //makeNotification('One Category has created','fas fa-cog', 'categories.index',array(strval(Auth::user()->id)));
                return redirect('brands')->with(['success'=> 'Brand Inserted Successfully']);
            }catch(\Exception $ex){
                return redirect('brands')->with(['error' => 'Brand Inserted Failed']);
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
