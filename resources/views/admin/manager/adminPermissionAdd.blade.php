<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
    @include('admin.public.meta')

    <title>添加权限节点</title>
    <meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
    <meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
    <!--<if condition="$pattern eq 0"> action="__MODULE__/Admin/adminPermissionSave/pattern/{$pattern}/id/{$arr.id}" <else/> action="__MODULE__/Admin/adminPermissionSave/pattern/{$pattern}" </if>-->
    <form  action="__MODULE__/Admin/adminPermissionSave/pattern/{$pattern}/id/{$arr.id}" method="post" class="form form-horizontal" id="form-member-add">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>权限名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="{$arr.name}" placeholder=""  name="name">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>权限说明：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="{$arr.description}" placeholder=""  name="description">
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" formtarget="_parent" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</article>


<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{asset("admin/lib/My97DatePicker/4.8/WdatePicker.js")}}"></script>
<script type="text/javascript" src="{{asset("admin/lib/jquery.validation/1.14.0/jquery.validate.js")}}"></script>
<script type="text/javascript" src="{{asset("admin/lib/jquery.validation/1.14.0/validate-methods.js")}}"></script>
<script type="text/javascript" src="{{asset("admin/lib/jquery.validation/1.14.0/messages_zh.js")}}"></script>
<script type="text/javascript">
    $(function(){
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });

//        $("#form-member-add").validate({
//            rules:{
//                username:{
//                    required:true,
//                    minlength:2,
//                    maxlength:16
//                },
//                sex:{
//                    required:true,
//                },
//                mobile:{
//                    required:true,
//                    isMobile:true,
//                },
//                email:{
//                    required:true,
//                    email:true,
//                },
//                uploadfile:{
//                    required:true,
//                },
//
//            },
//            onkeyup:false,
//            focusCleanup:true,
//            success:"valid",
//            submitHandler:function(form){
//                //$(form).ajaxSubmit();
//                var index = parent.layer.getFrameIndex(window.name);
//                //parent.$('.btn-refresh').click();
//                parent.layer.close(index);
//            }
//        });
    });
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>