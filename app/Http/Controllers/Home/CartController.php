<?php

namespace App\Http\Controllers\Home;

use App\Http\Models\Address;
use App\Http\Models\Orders;
use App\Http\Models\Orderstatu;
use App\Http\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $shop = session('shop');
        return view('home.cart.cart')->with('shop',$shop) ;
    }
    public function addCart(Request $request)
    {
        $data = session('shop')?session('shop'):array() ;
        $flag = 0 ;
        if ($data){
            foreach ($data as &$v){
                if ($v['id']==$_GET['id']){
                    $v['num'] = $v['num']+$_GET['num'] ;
                    $flag = 1 ;
                }
            }
        }
        if (!$flag){
            $data[] = array(
                "id"=>$_GET['id'] ,
                "num"=>$_GET['num'] ,
                "productInfo"=>Product::find($_GET['id']),
            ) ;
        }

        //session中追加数据
        $request->session()->put('shop',$data) ;

        return redirect("home/cart") ;
    }

    public function changeCartNum(Request $request)
    {
       $id =  $_GET['id'] ;
       $num = $_GET['num'] ;
       $shop = session('shop') ;
       foreach ($shop as $k=>$v){
           if ($v['id']==$id){
               $shop[$k]['num'] = $num ;
           }
       }
       $request->session()->put('shop',$shop) ;
        echo $num ;
    }

    public function delCartItem(Request $request)
    {
        $id = $request->input('id') ;
        $shop = session('shop') ;
        foreach ($shop as $k=>$v){
            if ($v['id']==$id){
                unset($shop[$k]) ;
            }
        }
        $request->session()->put('shop',$shop) ;
        echo 1 ;
    }
    public function delCartItems(Request $request)
    {
        $shop = session('shop') ;
        foreach ($shop as $k=>$v){
            foreach ($_GET['ids'] as $id){
                if ($v['id']==$id){
                    unset($shop[$k]) ;
                }
            }
        }
        $request->session()->put('shop',$shop) ;
        echo 1 ;
    }

    public function orderConfirm()
    {
        $uid = session('user')->id ;
        $address = Address::all()->where('uid',$uid)->where('status',1)->first() ;//找不到数据返回空
//        dd($address) ;
        $ids = $_GET['ids'] ;
        $idArr = explode(',',$ids) ;
        $shop = session('shop') ;
        $newArr = [] ;
        foreach ($idArr as $key=>$value){
            foreach ($shop as $k=>$v) {
                //判断是否是用户选择的商品
                if ($value==$v['id']){
                    $newArr[] = $v ;
                }
            }
        }
//        dd($newArr) ;
        return view('home.cart.orderConfirm')->with('newShop',$newArr)->with('address',$address) ;
    }

    public function myOrder()
    {
//        $data = Orderstatu::all()->whereIn('id',[1,7,8,6,9]) ;
        $status = $_GET['status']??0 ;
        $uid = session('user')->id ;
        $data = Orderstatu::all() ;
        $udataAll = Orders::all()->where('uid',$uid) ;
        //dd($udataAll) ;
        if ($status==0){
            return view('home.cart.myOrder')->with('data',$data)->with('udataAll',$udataAll) ;
        }else{
            $udata = Orders::all()->where('uid',$uid)->where('status',$status) ;
            return view('home.cart.myOrder')->with('data',$data)->with('udataAll',$udataAll)->with('udata',$udata) ;
        }
    }

    public function address()
    {
        $status = $_GET['status']??0 ;
        $uid = session('user')->id ;
        $data = Orderstatu::all() ;//订单状态数据
        $udataAll = Orders::all()->where('uid',$uid) ;//订单详情
        $address = Address::all()->where('uid',$uid) ;
       // dd($udataAll) ;
        if ($status==0){
            return view('home.cart.address')->with('data',$data)->with('udataAll',$udataAll)->with('address',$address) ;
        }else{
            $udata = Orders::all()->where('uid',$uid)->where('status',$status) ;
            return view('home.cart.address')->with('data',$data)->with('udataAll',$udataAll)->with('udata',$udata)->with('address',$address) ;
        }
    }

    public function addressUpdate()
    {
        $id = $_GET['id'] ; //设置为默认的地址的 id
        //echo $id ;
        $uid = session('user')->id ; //用户id
        DB::table('address')->where('uid',$uid)->update(['status'=>0]) ;
        DB::table('address')->where('id',$id)->update(['status'=>1]) ;
        echo 1 ;
    }
    public function addressSave(Request $request)
    {
        $data = $request->except('_token') ;
        $data['uid'] = session('user')->id ;
        DB::table('address')->insert($data) ;
        return redirect('home/address') ;
    }

    public function orderCreate()
    {

    }

    public function payment(Request $request)
    {
        //dd($request->input()) ;
        $aid = $request->input('aid') ;
        $ids = $request->input('ids') ;
        $numArr = $request->input('num') ;
        $salePriceArr = $request->input('salePrice') ;
        $totalPrice = $request->input('totalPrice') ;

        $uid = session('user')->id ;
        $code = 'YK'.time().rand() ;

        for ($i=0;$i<count($ids);$i++){
            $data = array() ;
            $data['aid'] = $aid ;
            $data['code'] = $code ;
            $data['uid'] = $uid ;
            $data['gid'] = $ids[$i] ;
            $data['num'] = $numArr[$i] ;
            $data['price'] = $salePriceArr[$i] ;
            DB::table('orders')->insert($data) ;
        }

        $shop = session('shop') ;
        foreach ($shop as $key=>$value){
            foreach ($ids as $v){
                if ($v==$value['id']){
                    //这里还需一层逻辑，可能用户并不想将这种都加入订单
                    unset($shop[$key]) ;
                }
            }
        }
        $request->session()->put('shop',$shop) ;
        return view('home.payment')->with('totalPrice',$totalPrice)->with('code',$code) ;
    }

    public function paySuccess(Request $request)
    {
        $code = $request->input('code') ;
        $totalPrice = $request->input('totalPrice') ;
        return view('home.pay_success')->with('totalPrice',$totalPrice)->with('code',$code) ;
    }
}
