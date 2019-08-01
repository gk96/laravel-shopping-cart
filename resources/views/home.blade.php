@extends('layouts.app')

@section('content')
<div class="panel panel-default">
<div class="panel-heading">Dashboard</div>
<div class="panel-body">You are logged in! as <strong>{{ strtoupper(Auth::user()->type) }}</strong>
Admin Page: <a href="{{ url('/') }}/adminOnlyPage">{{ url('/') }}/adminOnlyPage/</a>

Member Page: <a href="{{ url('/') }}/memberOnlyPage">{{ url('/') }}/memberOnlyPage/</a></div></div>
@endsection
