<html>

<head>
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

<style>

</style>

</head>

<body>

@extends('layouts.admin')
@section('content')

<center>

	@foreach($data as $r)
    <div class="col-md-8">
    <form action="/update" method = "POST" >
<input type="hidden" name="id" value="{{$r->id}}">
@csrf
<div class="form-group" style = "text-align: left;">
<label for="name">Name</label>
<input type="text" class="form-control" name="name" value = "{{$r->name}}">
</div>
<div class="form-group" style = "text-align: left;">
<label for="brand">Type</label>
<input type="text" class="form-control" name="type" value = "{{$r->type}}">
</div>
<div class="form-group" style = "text-align: left;">
<label for="brand">Code</label>
<input type="text" class="form-control" name="code" value = "{{$r->code}}">
</div>
<div class="form-group" style = "text-align: left;">
<label for="Image">Image</label>
<input type="text" class="form-control" name="imgt" value = "{{$r->img}}">
<input type="file" class="form-control" name="imgf" >
</div>
<div class="form-group" style = "text-align: left;">
<label for="name">Description</label>
<textarea class="form-control" name="desc">{{$r->desc}}</textarea>
</div>
<div class="form-group" style = "text-align: left;">
<label for="price">Price</label>
<input type="text" class="form-control" name="price" value = "{{$r->price}}">
</div>
<div class="form-group" style = "text-align: left;">
<label for="stock">Stock</label>
<input type="text" class="form-control" name="stock" value = "{{$r->stock}}">
</div>
<input type="submit" name="btnupdate" value="Update" class = "btn btn-success">
</form>
					
</div>				
				
			
		
@endforeach
</center>
@endsection
</body>


</html>