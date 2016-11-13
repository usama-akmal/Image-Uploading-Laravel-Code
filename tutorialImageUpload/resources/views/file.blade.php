<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

@if(count($errors))
	<ul>
		@foreach($errors as $error)
			<li>{{$error}}</li>
		@endforeach
	</ul>
@endif


@if($message = Session::get('success'))
	<p>{{$message}}</p>
	<img src="/images/{{Session::get('path')}}"/>
@endif

<form method="POST" enctype="multipart/form-data" action="/upload">
	{{csrf_field()}}
	<input type="file" name="image">
	<input type="submit" value="upload image">
</form>
</body>
</html>