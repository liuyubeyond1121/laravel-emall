<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{

    public function login()
    {
        if ($input = Input::all()){
            $username = $input['username'] ;
            $password = md5($input['password']) ;
            $result = DB::table('user')->where('username','=',$username)
                ->where('password','=',$password)->first() ;
            if (!count($result)){
                return back()->with('msg','用户名或密码错误！') ;
            }
            session(['user'=>$result]);
            if (session('shop')){
                for ($i=0;$i<count(session('shop'));$i++){
                    $data = array() ;
                    $data['gid'] = session('shop')[$i]['id'] ;
                    $data['uid'] = session('user')->id ;
                    $data['num'] = session('shop')[$i]['num'] ;
                    $data['price'] = session('shop')[$i]['productInfo']->salePrice ;
                    DB::table('cart')->insert($data) ;//将session中的数据插入cart表中
                }

            }
            return redirect('/');
        }else{
            return view('home.index.login') ;
        }
    }

    public function logout()
    {
        session(['user'=>null]) ;
        return redirect('/') ;
    }

    public function register()
    {
        return view('home.index.register') ;
    }

    public function lookforward()
    {
        return view('home.index.lookforward');
    }

    public function index()    {

        return view('home.index.index');
    }

    public function send()
    {
//        Mail::raw('我的邮件发送测试',function ($message){
//            $message->to('1070600924@qq.com') ;
//            $message->subject('恭喜您注册成功！') ;
//        }) ;
        Mail::send('mail.index',[],function ($message){
            $message->to('1070600924@qq.com') ;
            $message->subject('恭喜您注册成功！') ;
        }) ;
    }

}
