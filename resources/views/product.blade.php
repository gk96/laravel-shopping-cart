<html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<style>
.img-hover-zoom--quick-zoom img {
  transform-origin: 0 0;
  transition: transform .25s, visibility .25s ease-in;
}

/* The Transformation */
.img-hover-zoom--quick-zoom:hover img {
  transform: scale(1.2);
}
</style>
</head>
<body>
<center>
@extends('layouts.app')

@section('content')


<div class="container-fixed">

<form action="/cart" method = "POST">
@csrf
<div class="row" style = "margin-left:20px;"> 
@foreach($data as $result)
<div class="card col-md-6" style = "margin-top: 30px;">
<div class="card-body">

<input type = "hidden" name = "userid" value = "{{ Auth::user()->id }}">

<h6 class="card-subtitle text-muted" style = "text-align: left;">{{$result->type}}</h6><input type = "hidden" name = "type" value = "{{$result->type}}">
<h5 class="card-title">{{$result->name}}</h5><input type = "hidden" name = "name" value = "{{$result->name}}">
</div>
<center>
    <div class="img-hover-zoom--quick-zoom">
<img style = "width: 550px; height: 300px;" src="{{ $result->img }}" alt = "image">
<input type = "hidden" name = "img" value = "{{$result->img}}">

</div>
</center>
<div class="card-body">
<input type = "hidden" name = "id" value = "{{$result->id}}">
<p class="card-text">{{$result->desc}}</p><input type = "hidden" name = "desc" value = "{{$result->desc}}">
@if($result->stock > 0)
<p class="card-text" style = "color: green;"><strong>In Stock.</strong></p><input type = "hidden" name = "stock" value = "{{$result->stock}}">
<input type="number" class="form-control" name="qty" min="1" max="{{$result->stock}}" value="1">
@else
<p class="card-text" style = "color: red;"><strong>Out of Stock.</strong></p><input type = "hidden" name = "stock" value = "{{$result->stock}}">
@endif
<p class="card-text"><h3><strong> Rs. {{$result->price}}</strong></h3></p><input type = "hidden" name = "price" value = "{{$result->price}}">

<input type = "submit" class="btn btn-primary" name = "btnaddtocart" value ="Add to Cart">

</form>
</div>
</div>
@endforeach
</div>
</div>
</center>

@endsection
</body>
</html>