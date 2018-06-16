<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $result = Product::find(413) ;
//        dd($result->defaultImage) ;
        $result = Product::where('cateId',6)->paginate(6) ;
        $total = Product::all()->count() ;
        return view('admin.product.productList')->with('result',$result)->with('total',$total) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subtree = (new CategoryController())->subtree(DB::table('category')->get()) ;
        $subtree = json_encode($subtree) ;
        return view('admin.product.productAdd')->with('subtree',$subtree) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = ['name','abstract','detail','salePrice','metaKeywords','metaDescription','cateId','isSale','isRecommend'] ;
        //先存入到数据库中然后得到对应的ID ，然后存图片，再得到的id再更新产品表默认图片id（其实可以直接将默认图片id换成路径）
        $images = $request->input('image') ;
        $imageId = [] ;
        $data = $request->only($fields) ;
        if ($id=DB::table('product')->insertGetId($data)){
            $arr = explode(',',$images) ;
            foreach ($arr as $value){
                $brr = [] ;
                $brr['imagePath'] = $value ;
                $brr['productId'] = $id ;
                $imageId[] = DB::table('product_images')->insertGetId($brr) ;
            }
            DB::table('product')->where('id',$id)->update(['imageId'=>$imageId[0]]) ;
            return redirect('admin/product') ;
        }else{
            return back() ;
        }

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
