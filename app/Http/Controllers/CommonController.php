<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommonController extends Controller
{
    //图片上传
//    public function upload(Request $request)
//    {
//        $file = $request->file('file_upload') ;
//        if($file->isValid()){
//            $ext = $file->getClientOriginalExtension(); //上传文件的后缀.
///*            $newName = date('YmdHis').mt_rand(100,999).'.'.$entension;
//            $path = $file -> move(base_path().'/uploads',$newName);
//            $filepath = 'uploads/'.$newName;*/
//            $filename = date('YmdHis') . '-' . uniqid() . '.' . $ext;
//            $realPath = $file->getRealPath();   //临时文件的绝对路径
//            // 使用我们新建的uploads本地存储空间（目录）
//            $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
//            $data['filename'] = $filename ;
//            $data['url'] = Storage::disk('uploads')->path($filename);
//            return $data;
//        }
//    }

    public function upload(Request $request)
    {
        //$path = $request->file('image')->store('admin/my/images/user') ;//文件存放在了storage
        $file = $request->file('image') ;
        // 文件是否上传成功
        if ($file->isValid()) {
            // 获取文件相关信息
//          $originalName = $file->getClientOriginalName(); // 文件原名
            $ext = $file->getClientOriginalExtension();     // 扩展名
            $realPath = $file->getRealPath();   //临时文件的绝对路径
//          $type = $file->getClientMimeType();     // image/jpeg
            // 上传文件
            $filename = date('YmdHis') . '-' . uniqid() . '.' . $ext;
            // 使用我们新建的uploads本地存储空间（目录）
            $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
            if ($bool){
                $data['filename'] = $filename ;
                $data['url'] = Storage::disk('uploads')->path($filename);
                return $data ;
            }else{
                return false ;
            }
        }else{
           return false ;
        }
    }

    public function myUpload(Request $request){
        $file = $request->file('Filedata') ;

        $dir = $request->input('files') ;
        if (file_exists("./emall/uploads/{$dir}")){

        }else{
            mkdir("./emall/uploads/{$dir}") ;
        }

        if ($file->isValid()) {
            $ext = $file->getClientOriginalExtension() ;
            $newFile = time().rand().''.$ext ;

            $request->file('Filedata')->move('./emall/uploads/'.$dir,$newFile) ;
            echo $newFile ;
        }
    }
}
