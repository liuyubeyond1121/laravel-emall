<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Address;
use App\Http\Models\Orders;
use App\Http\Models\Orderstatu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function index()
    {
//        $data = Orders::all()->groupBy('code') ;//分组后的形式不是想要的
//        $data = Orders::all()->groupBy('code',true) ;//分组后的形式不是想要的
//        dd($data) ;
        $data = Orders::all() ;
        $newArr = [] ;
        foreach ($data as $v){
            $newArr[$v->code] = $v ;
        }
        return view('admin.product.ordersList')->with('data',$newArr) ;
    }

    public function ordersDetail()
    {
        $code = $_GET['code'] ;
        $data = Orders::all()->where('code',$code) ;
        return view('admin.product.ordersDetail')->with('data',$data) ;
    }

    public function ordersAddress()
    {
        $id = $_GET['id'] ;
        $data = Address::all()->find($id) ;
        return view('admin.product.ordersAddress')->with('data',$data) ;
    }

    public function ordersEdit(Request $request)
    {
       if ($_POST){
           $status = $request->input('status') ;
           $code = $request->input('code') ;
           $bool = DB::table('orders')->where('code',$code)->update(['status'=>$status]) ;
           if ($bool){
               return redirect('admin/orders') ;
           }else{
               return back() ;
           }
       }else{
           $data = Orderstatu::all() ;
           return view('admin.product.ordersEdit')->with('data',$data) ;
       }
    }
}
