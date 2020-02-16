<?php

namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Item;
use App\Model\Masters\Unit;
use App\Model\Masters\Category;
use App\Model\Masters\SubCategory;
use Validator;
use Session;

class ItemController extends Controller
{
    //
	public function getItem()
	{
		$item_rs=DB::Table('item')
				->leftJoin('units','item.unit_id','=','units.id')
				->leftJoin('category','item.c_id','=','category.cat_code')
				->leftJoin('sub_categories','item.sc_id','=','sub_categories.sub_cat_code')
				->select('item.*','units.name as unit_name', 'category.cat_name', 'sub_categories.sub_cat_name')
				->get();

				// dd($item_rs);
		return view('masters/view-item',compact('item_rs'));
	}

	public function viewItem()
	{
		$unit_rs=Unit::where('unit_status','=','active')->get();

		$categories = Category::all();

		$subcategories = SubCategory::all();
		return view('masters/item', compact('unit_rs', 'categories', 'subcategories'));
	}

	public function getItemById($id)
	{
		$item=Item::findOrFail($id);
		// dd($item);
		$unit_rs=Unit::where('unit_status','=','active')->get();

		$categories = Category::all();
		$subcategories = SubCategory::all();

		return view('masters/item', compact('unit_rs', 'item', 'categories', 'subcategories'));
	}

	public function saveItem(Request $request)
	{
		if(empty($request->id))
		{
			// dd($request);
			$validator=Validator::make($request->all(),[
			'item_code'=>'required|unique:item',
			'name'=>'required',
			'type'=>'required',
			'unit_id'=>'required',
			'status'=>'required',
			'min_stock' => 'required|numeric',
			'max_stock' => 'required|numeric',
			'stockable' => 'required'

			],
			[
			'item_code.required'=>'Item Code Required',
			'item_code.unique'=>'Item Code already exists',
			'name.required'=>'Item Name Required',
			'type.required'=>'Item Type Required',
			'unit_id.required'=>'Item Unit Required',
			'status.required'=>'Item Status Required',
			'stockable.required'=>'Stockable Required'

			]);

			if($validator->fails())
			{
				return redirect('masters/item')->withErrors($validator)->withInput();

			}

			$item = new Item;
			// //print_r($request->all()); exit;
			// $data['item_code'] = $request->item_code;
			// $data['name'] = $request->name;
			// $data['type'] = $request->type;
			// $data['c_id'] = $request->category_id;
			// $data['min_stock'] = $request->min_stock;
			// $data['unit_id'] = $request->unit_id;
			// $data['status'] = $request->status;

			//$item->create($data);
			DB::table('item')->insert(
			    ['item_code' => $request->item_code, 'name' => $request->name, 'type' => $request->type, 'c_id' => $request->c_id, 'sc_id' => $request->sc_id, 'min_stock' => $request->min_stock, 'max_stock' => $request->max_stock, 'unit_id' => $request->unit_id, 'stockable' => $request->stockable, 'status' => $request->status, 'gst' => $request->gst, 'item_desc' => $request->item_desc, 'created_at' => time(), 'updated_at' =>time() ]
			);
			// DB::insert($data);

			Session::flash('message','Item Information Successfully Saved.');
		}
		else
		{
			$data2 = $request->all();
			$data2=request()->except(['_token']);

			// $data2['supplier_status'] = 'active';

			Item::where('id', $request->id)->update($data2);

			Session::flash('message','Item Information Successfully Updated.');
		}
		return redirect('masters/vw-item');
	}
}
