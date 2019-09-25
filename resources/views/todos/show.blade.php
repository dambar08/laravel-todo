@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <div class="col-10"></div>
    <div class="card">
        <h1>{{$todo->title}}</h1>
        <p>{{$todo->description}}</p>
    </div>
</div>
@endsection