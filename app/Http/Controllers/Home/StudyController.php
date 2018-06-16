<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Category;
use App\Http\Models\Product;
class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$records = Category::where('parentId','=',0)->select(['id','name'])->get();
        $cateModel = new Category();
        $electricrecords = $cateModel->find(1);
        $computerecords = $cateModel->find(2);
        return view('home.study.studyarticle')->with('electricrecords',$electricrecords)
            ->with('computerecords',$computerecords);
    }

    public function list($id){
        $records = \App\Http\Models\Product::where('cateId','=',$id)->paginate(config('pagination.perpage'));
        return view('home.study.studyarticle-list')->with('records',$records);
    }

    public function show($id)
    {

        $record = Product::find($id);
        return view('home.study.studyarticle-details')->with('record',$record);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


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

