<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<title></title>
	<link href="{{asset("css/header.css")}}" rel="Stylesheet">
	<link rel="stylesheet" href="{{asset("css/footer.css")}}">
	<link href="{{asset("css/studyarticle.css")}}" rel="stylesheet">
	<link href="{{asset("css/bootstrap.css")}}" rel="stylesheet">
</head>
<body>
@include('includes.header')
<div id="studyarticle-wrapper">
	<ul class="studyarticle-container clear">	
		@foreach($records as $record)
		<li class="gl-item">
			
			<div class="gl-i-wrap">
				<div class="p-img"><a href="{{asset('home/study/studyarticle-details-' . $record->id)}}" target="_blank"><img @if($record->defaultImage) src="{{asset('emall/n7/'.$record->defaultImage->imagePath)}}" @else src="{{asset('emall/notImage.png')}}" @endif alt=""></a></div>
				<div class="p-price"><span>￥</span><i>{{$record->salePrice}}</i></div>
				<div class="p-name"><a href="{{asset('home/study/studyarticle-details-' . $record->id)}}" target="_blank">{{$record->name}}</a></div>
			</div>
		</li>
		@endforeach		
	</ul>
	<div class="pagination" style="clear: both">{{$records->links()}}</div>
</div>
@include('includes.footer')
</body>