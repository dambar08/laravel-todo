@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <div class="col-10"></div>
    <div class="card">

        <div class="card-header bg-dark text-white d-flex align-items-center justify-content-between">
            <div class="col-11">
                Things to do
            </div>
            <div class="col-1">

                <a href="/todos/create">
                    <button type="button" class="btn btn-primary d-flex align-items-center">
                        <i class="fas fa-plus text-white mr-1"></i>
                        Add</button></a>
            </div>
        </div>

        @if(count($todos)>0)
        <table class="table table-sm mb-0 penultimate-column-right">
            <thead>
                <tr>
                    <th scope="col" style="width:80%"></th>
                    <th scope="col" colspan="2" style="width:20%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($todos as $todo)
                <tr>
                    <td>
                        @if ($todo->completed)
                        <del>
                            {{$todo->title}}
                        </del>
                        @else
                        {{$todo->title}}
                        @endif
                    </td>
                    <td>
                        <a href="/todos/{{$todo->id}}/edit" class="btn btn-success"><i class="far fa-edit text-white">
                                Edit</a></i>
                    </td>
                    <td>
                        <form action="/todos/{{$todo->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

    </div>
</div>
@endsection