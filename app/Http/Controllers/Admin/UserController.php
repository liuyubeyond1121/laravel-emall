<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Admin\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\CommonController ;


class UserController extends CommonController
{
    private $field = ['username','nick','sex','email','phone','addr','signature'] ;


    /**
     * 会员列表userList
     * @return $this
     */
    public function index()
    {
        $result = User::where('status','<',9)->get();

       //var_dump($result) ;exit;

        return view('admin.user.userList')->with('result',$result) ;
    }

    /**
     * 会员详细信息展示userShow
     * @param $id
     * @return $this
     */
    public function show($id)
    {
        $result = User::find($id) ;
        return view('admin.user.userShow')->with('result',$result) ;
    }

    /**
     * 会员的逻辑删除userDel
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $result = User::find($id) ;
        $result->status = 9 ;
        echo $result->save() ; //return 一个布尔值得不到对应的效果
    }

    /**
     * 会员添加userAddDo
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $rules = [
            'password' => 'required|confirmed',
        ] ;
        $message = [
            'password.required' => '密码不能为空',
            'password.confirmed' => '确认密码和原密码不同',
        ] ;
        $validator = Validator::make($request->input(),$rules,$message) ;
        if ($validator){
           $data = $this->upload($request) ;
           if ($data){
               $result = $request->only($this->field) ;
               $result['image'] = $data['filename'] ;
               $result['password'] = md5($request->password) ;
               DB::table('user')->insert($result) ;
           }else{
               return back()->with('msg','图片上传失败')  ;
           }
        }else{
            return back()->with('msg','信息匹配不成功')  ;//msg存在session中
        }
        return redirect('admin/user') ;
    }

    /**
     * 会员添加视图显示userAdd
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.user.userAdd') ;
    }

    /**
     * 会员编辑（显示表单）
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $result = User::find($id) ;
        return view('admin.user.userEdit')->with('result',$result) ;
    }

    /**
     * 会员编辑的数据保存
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id)
    {
        //$request['password']和 $request->password一样的效果
       if(array_key_exists('image',$request->all())) { //重新上传了图像文件
           $data = $this->upload($request) ;
           if ($data){
               $result = $request->only($this->field) ;
               $result['image'] = $data['filename'] ;
               User::where('id',$id)->update($result) ;
           }else{
               return back()->with('msg','图片上传失败')  ;
           }
            User::where('id',$id)->update($request->only($this->field)) ;
       } else{//没有重新上传图片文件
           //$request->except('_token','_method','password_confirmation','province','city','town','image1')
            User::where('id',$id)->update($request->only($this->field)) ;
            User::where('id',$id)->update(['image'=>$request['image1']]) ;
       }
       return redirect('admin/user') ;
    }

    /**
     * 会员的停用
     * @param $id
     */
    public function userStop($id)
    {
        $result = User::find($id) ;
        $result->status = 8 ;
        echo $result->save() ; //return 一个布尔值得不到对应的效果
    }

    /**
     * 会员的启用
     * @param $id
     */
    public function userStart($id)
    {
        $result = User::find($id) ;
        $result->status = 1 ;
        echo $result->save() ; //return 一个布尔值得不到对应的效果
    }


    /**
     * 删除的会员列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userDelList()
    {
        $result = User::where('status',9)->get() ;
        return view('admin/user/userDelList',compact('result')) ;
    }

    /**
     * 会员的物理删除
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function userDeleteDo($id)
    {
        User::destroy($id) ;
        return redirect('admin/user/userDelList') ;
    }

    /**
     * 逻辑删除的会员恢复
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function userRestore($id)
    {
        $result = User::find($id) ;
        $result->status = 1 ;
        $result->save() ;
        return redirect('admin/user/userDelList') ;
    }

    /**
     * 会员密码更改视图
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function changePwd($id)
    {
        $result = User::find($id) ;
        return view('admin.user.changePwd')->with('result',$result) ;
    }

    /**
     * 会员密码更改执行
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function changePwdDo($id)
    {
//        dd(Input::only('newpassword')) ;//返回数组
        $password = md5(Input::get('newpassword'));
        $bool = User::where('id', $id)->update(['password' => $password]);
        if ($bool) {
            return redirect('admin/user');
        } else {
            return back()->with('msg', '密码更改失败！');
        }
    }
}
