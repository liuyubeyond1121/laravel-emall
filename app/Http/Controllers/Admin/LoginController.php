<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Admin\Manager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class LoginController extends Controller
{

    public function login()
    {
        if ($input = Input::all()){
           if (captcha_check($input['verify'])){
               $username = $input['username'] ;
               $password = md5($input['password']) ;
               $result = DB::table('manager')->where('username','=',$username)
                   ->where('password','=',$password)->first() ;
              if (!$result){
                  return back()->with('msg','用户名或密码错误！') ;
              }
               session(['manager'=>$result]);
              Manager::where('id',$result->id)->update(['count'=>++$result->count,'ipaddr'=>$_SERVER['SERVER_ADDR']]) ;
               return redirect('admin/index');

           }else{
               return back()->with('msg','验证码错误！') ;
           }
        }else{
            return view('admin.index.login') ;
        }
    }

    public function logout()
    {
        session(['manager'=>null]) ;
        return redirect('admin/login') ;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()    {

//        $result = Manager::where('id',session('user')[0]->id)->get() ;
        $result = Manager::find(session('manager')->id) ;
        return view('admin.index.index',['result'=>$result]) ;
    }

    public function welcome()
    {
        return view('admin.index.welcome') ;
    }


    public function delDir($path)
    {
        //读取路径
        $arr = scandir($path) ;

        foreach ($arr as $key=>$value){
            if ($value !='.' && $value!='..'){
                unlink($path.'/'.$value) ;
            }
        }
    }

    public function flush()
    {
        $this->delDir(storage_path('framework/cache'));
        $this->delDir(storage_path('framework/views'));
        return redirect('admin/index') ;
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
