<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\ImageTrait;
use App\Models\SuperAdmin;
use App\Models\category;
use App\Models\Package;
use Auth;

class CategoryController extends Controller
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
            $category_list = Category::where('vendor_id', Auth::user()->v_id)->get();
            return view('category.index', compact('category_list'));
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
        /*$package = Package::find(Auth::user()->package_id);
        $categoryCount= Category::where('vendor_id',Auth::user()->v_id)->count();*/
        if(PackagePermission('Product')){
            try{
                $data = $request->except(['_token', 'image']);
                $image = $request->image;
                if($image)
                    $data['image'] = $this->saveimage($image, 'public/images/category');
                if(!isset($data['is_active']))
                    $data['is_active'] = false;
                $data['vendor_id']= Auth::user()->v_id;
                Category::create($data);
                //makeNotification('One Category has created','fas fa-cog', 'categories.index',array(strval(Auth::user()->id)));
                return redirect('category')->with(['success'=> 'Category Inserted Successfully']);
            }catch(\Exception $ex){
                return redirect('category')->with(['error' => 'Category Inserted Failed']);
            }
        }
        else
            return redirect()->back()->with(['error' => 'Sorry! You are not allowed to access this module or Exceed the limit']);
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
        $lims_category_data = Category::find($id);
        if($lims_category_data)
            return $lims_category_data;
        else
            return redirect('category'); 

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
        $lims_category_data = Category::find($request->category_id);
        if($lims_category_data){
            $lims_category_data->name = $request->name;
            $image = $request->image;
            if ($image) {
                $lims_category_data->image = $this->saveimage($image,'public/images/category' );
            }
            $is_active = $request->is_active;
            if($is_active)
                    $lims_category_data->is_active = $request->is_active;
            else
                    $lims_category_data->is_active = false;
            $lims_category_data->save();
            return redirect('category')->with(['success' => 'Category Updated Successfully']);
        }
        else
            return redirect('category');
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
