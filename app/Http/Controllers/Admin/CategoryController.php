<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function subtree($data,$pid=0)
    {
        $newArr = array() ;
        foreach ($data as $k=>$v){
            if ($v->parentId == $pid){
                $newArr[$v->id] = $v ;
                $newArr[$v->id]->zi = $this->subtree($data,$v->id) ;
            }
        }
        return $newArr ;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('category')->select('category.*',DB::raw('concat_ws("_",parentIdPath,id) as p'))->orderBy('p')->get() ;
        return view('admin.category.categoryList')->with('data',$data) ;
    }
    public function productCategoryAdd()
    {
        return view('admin.category.productCategoryAdd') ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.categoryAdd') ;
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
        $data['level'] = count(explode('_',$data['parentIdPath'])) ;
//        dd(Category::insert($data)) ;//这种写法可行
        if (DB::table('category')->insert($data)) {
            return redirect('admin/category') ;
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
        $subtree = $this->subtree(DB::table('category')->get()) ;
        $subtree = json_encode($subtree) ;
        $data = Category::find($id) ;
        return view('admin.category.categoryEdit')->with('data',$data)->with('subtree',$subtree) ;
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
        //暂时对商品分类不作处理
        $filed = ['name','sort'] ;
        $data = $request->only($filed) ;
        $bool = Category::where('id',$id)->update($data) ;
        if ($bool){
            return redirect('admin/category') ;
        }else{
            return back() ;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo DB::delete("delete from category WHERE id=$id OR parentIdPath LIKE '%_{$id}_%' OR parentId=$id") ;
    }
}
