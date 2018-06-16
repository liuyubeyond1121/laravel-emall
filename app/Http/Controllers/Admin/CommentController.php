<?php

namespace App\Http\Controllers\Admin;


use App\Http\Models\Admin\User;
use App\Http\Models\Category;
use App\Http\Models\Comment;
use App\Http\Models\Product;
use App\Http\Models\ProductImages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Comment::all() ;
        $product = array() ;
        $imagePath = array() ;
       foreach ($data as $v){
           $product[] = DB::table('product')->select('id','imageId')->where('id',$v->gid)->first() ;
       }

       foreach ($product as $v){
           $imagePath[] = DB::table('product_images')->select('id','imagePath')->where('id',$v->imageId)->first() ;
       }
        return view('admin.comment.commentList')->with('data',$data)->with('imagePath',$imagePath) ;
    }

    /**
     * Show the form for creating a new resource
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all() ;
//        $product = Product::orderBy('id','desc')->take(20)->get() ;//也可以
        $product = Product::select("id",'name')->orderBy('id','asc')->limit(20)->get() ;
//        dd($product) ;
        return view('admin.comment.commentAdd')->with('user',$user)->with('product',$product) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token') ;
        $bool = DB::table('comment')->insert($data) ;
        if ($bool){
            return redirect('admin/comment') ;
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
        $user = User::all() ;
        $product = Product::select("id",'name')->orderBy('id','asc')->limit(20)->get() ;
        $data = DB::table('comment')->find($id) ;
        return view('admin.comment.commentEdit')->with('data',$data)->with('user',$user)->with('product',$product);
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
        $bool = DB::table('comment')->delete($id) ;
        echo $bool ;
    }
}
