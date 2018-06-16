<!DOCTYPE HTML>
<html>
<head>
<include file="Public/meta"/>
<title>位置图片添加</title>
</head>
<body>
<div class="pd-20">
  <div class="page-container">
    <form action="__MODULE__/Picture/picturePosiAddDo" method="post" class="form form-horizontal" id="form-article-add" enctype="multipart/form-data">
      <div class="row cl">
        <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>对应产品：</label>
        <div class="formControls col-xs-8 col-sm-9">
          <span class="select-box">
				<select name="prodid" class="select">
					<foreach name="arr" item="v">
						<option value="{$v.id}"><if condition="$v['lev'] eq 1">{$v.typename}
						<elseif condition="$v['lev'] eq 2"/>　　{$v.typename}
						<elseif condition="$v['lev'] eq 3"/>　　　　{$v.typename}
						<elseif condition="$v['lev'] eq 4"/>　　　　　{$v.typename}
						<else/>　　　　　　{$v.typename}</if></option>
					</foreach>
				</select>
				</span>
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-4 col-sm-2">图片位置：</label>
        <div class="formControls col-xs-8 col-sm-9">
         <span class="select-box">
				<select name="position" class="select">
					<foreach name="position" item="v">
                      <option value="{$v.id}">{$v.position}</option>
					</foreach>
				</select>
				</span>
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-4 col-sm-2">图片：</label>
        <div class="formControls col-xs-8 col-sm-9">
          <input type="file"  id="" name="image">
        </div>
      </div>
      <div class="row cl" align="center">
        <input type="submit" formtarget="_parent" value="提交"/>
      </div>
    </form>
  </div>

  <!--请在下方写此页面业务相关的脚本-->
  <script type="text/javascript" src="{{asset("admin/lib/jquery.validation/1.14.0/jquery.validate.js")}}"></script>
  <script type="text/javascript" src="{{asset("admin/lib/jquery.validation/1.14.0/validate-methods.js")}}"></script>
  <script type="text/javascript" src="{{asset("admin/lib/jquery.validation/1.14.0/messages_zh.js")}}"></script>
  <script type="text/javascript" src="{{asset("admin/lib/webuploader/0.1.5/webuploader.min.js")}}"></script>

</div>

</body>
</html>