<?php

namespace App\Http\Controllers\Admin;
use App\Models\Language;
use App\Models\KeyLang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LanguageRequest;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::get();
        return view('admin.language.index',compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguageRequest $request)
    {
        try{
            $data = $request->except(['_token']);
            if(!isset($data['status']))
                $data['status'] = false;
            $language = Language::create($data);
            new_lang($language->id,'en');
            //makeNotificationAdmin('One Language has created','fas fa-cog', 'languages.index',['2']);
            return redirect('languages')->with(['success'=> 'Language Inserted Successfully']);
        }catch(\Exception $ex){
            return redirect('languages')->with(['error' => 'Language Inserted Failed']);
        }
    }

    /*public function addLangTranslation(Request $request, $id)
    {
        try{
            $key = $request->key;
            for ($i=0; $i<count($key); $i++) { 
                $data=[
                    "key"         =>  $request->key[$i],
                    "value"       =>  $request->value[$i] ,
                    "lang_id"     =>  $id,
                ];
                $row = KeyLang::where('key',$data['key'])->where('lang_id',$id)->first();
                if($row)
                {
                    $row->value=$data['value'];
                    $row->save();
                }
                else
                {
                    KeyLang::create($data);
                }
            }
            return redirect('languages')->with(['success'=> 'Language Translated successfully']);
        }catch(\Exception $ex){
            return redirect('languages')->with(['error' => 'Language Translated failed']);
        }
    }*/

    public function addLangTranslationAjax(Request $request)
    {
        $langkey = KeyLang::where('key',$request->attr)->where('lang_id', $request->lang)->first();
        $langkey->value = $request->val;
        $langkey->save();
        if ($langkey)
                return response()->json([
                    'status' => true,
                    'msg'    => ' Successfully Added ',
                    'id'     => $langkey->id,
                ]);

            else
                return response()->json([
                    'status' => false,
                    'msg'    => ' Failed ',
                ]);   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lang = Language::find($id);
        if($lang)
        {
            $keys_lang = KeyLang::where('lang_id',$id)->get();
            return view('admin.language.show',compact('lang','keys_lang'));
        }
        else
             return redirect()->back();
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
        $language = Language::find($id);
        if(!$language)
             return redirect('languages')->with(['error' => 'This Language Not Exist']);
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
