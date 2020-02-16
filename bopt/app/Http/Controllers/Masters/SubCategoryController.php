<?php

namespace App\Http\Controllers\Masters;

use App\Model\Masters\AccountMaster;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Masters\SubCategory;
use App\Model\Masters\Category;
use Validator;
use Session;
use DB;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = DB::table('sub_categories')
                    ->leftjoin('category', 'sub_categories.cat_name', '=', 'category.cat_code' )
                    ->select('sub_categories.*','category.cat_name as cate_name')
                    ->get();

        return view('masters/sub-categories', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $accounts = AccountMaster::all();

        return view('masters/add-new-sub-category', compact('categories', 'accounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        if(empty($request->id))
        {
            $validator=Validator::make($request->all(),[
                'sub_cat_code'=>'required',
                'cat_name'=>'required',
                'sub_cat_name' => 'required',
                'coa_code' => 'required',
                ],
                [
                'sub_cat_code.required'=>'Sub Category Code Required',
                'cat_name.required'=>'Category Name Required',
                'sub_cat_name.required'=>'Sub Category Name Required',
                'coa_code.required'=>'Account Code Required',
                ]);

                if($validator->fails())
                {
                    return redirect('masters/sub-category')->withErrors($validator)->withInput();

                }

                $category = new SubCategory;

                $data['sub_cat_code'] = $request->sub_cat_code;
                $data['cat_name'] = $request->cat_name;
                $data['sub_cat_name'] = $request->sub_cat_name;
                $data['coa_code'] = $request->coa_code;
                $category->create($data);

                Session::flash('message', 'Successfully created Sub-Category!');

        } else {

            $data2 = $request->all();
            // dd($data2);
            $data2=request()->except(['_token']);

            $data2['sub_cat_code'] = $request->sub_cat_code;
            $data2['cat_name'] = $request->cat_name;
            $data2['sub_cat_name'] = $request->sub_cat_name;
            $data2['coa_code'] = $request->coa_code;

            SubCategory::where('id', $request->id)->update($data2);

            Session::flash('message','Sub-Category Successfully Updated.');

        }
             return redirect('masters/vw-sub-category');
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
        $subcategory = SubCategory::findOrFail($id);
        $categories = Category::all();
        $accounts = AccountMaster::all();

        return view('masters/add-new-sub-category', compact('categories', 'subcategory', 'accounts'));
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
