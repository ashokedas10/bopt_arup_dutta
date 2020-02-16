<?php

namespace App\Http\Controllers\Procurement\Stock;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ItemStockController extends Controller
{
    public function getItemStock()
    {

        return view('procurement/stock/get-stock-register', compact('stock_register_items'));
    }

    public function viewItemStockReport(Request $request)
    {
//        dd($request);

        $start = $request->start_date;
        $end = $request->to_date;

        $stock_register_items = DB::table('stock_masters')
            ->where(function($query) use ($start, $end){
                $query->wherebetween('rcv_date', [$start,$end])
                    ->orwherebetween('issue_date', [$start,$end]);
                })
            ->get();
//        dd($stock_register_items);

        return view('procurement/stock/stock-register', compact('stock_register_items', 'start', 'end'));
    }

    public function getStockItemWise()
    {
        $items = DB::table('stock_masters')
            ->leftjoin('item', 'stock_masters.item_id', '=', 'item.item_code')
            ->select('stock_masters.*', 'item.name as item_name')
            ->groupBy('stock_masters.item_id')
            ->get();
        return view('procurement/stock/get-stock-register-itemwise', compact('items'));
    }

    public function viewStockReportItemWise(Request $request)
    {
//        dd($request->all());
        $start = $request->start_date;
        $end = $request->to_date;

        $stock_register_items = DB::table('stock_masters')
            ->leftjoin('item', 'stock_masters.item_id', '=', 'item.item_code')
            ->select('stock_masters.*', 'item.name as item_name')
            ->where('stock_masters.item_id', '=', $request->item_name)
            ->where(function($query) use ($start, $end){
                $query->wherebetween('rcv_date', [$start,$end])
                    ->orwherebetween('issue_date', [$start,$end]);
            })
            ->orderBy('created_at', 'desc')
            ->groupBy('stock_masters.item_id')
            ->get();
//        dd($stock_register_items);
        return view('procurement/stock/stock-register-itemwise', compact('stock_register_items', 'start', 'end'));
    }
}
