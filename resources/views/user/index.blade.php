@extends('layouts.admin')
@section('content')
<style>
    th{
        text-align: center;
    }
</style>
@if (session('success_message') || session('message'))
<div class="alert alert-success">
    @if(session('success_message'))
    {{ session('success_message')}}
    @else
    {{session('message')}}
    @endif
</div>
@endif

@if (session('error_message'))
<div class="alert alert-danger">
    {{ session('error_message')}}
</div>
@endif
<!--    {{    @$errors->first('parent')}}-->
@if($errors->any())
@foreach($errors->all() as $error)
<div class="alert alert-success">
    {{$error}}
</div>
@endforeach
@endif
<div class='panel'>
    <h2> BẢNG USERS</h2>

    <TABLE class="table-bordered table-striped table-dark" width="100%;" style="text-align: center;">
        <tr>
            <th>
                ID
            </th>
            <th>
                NAME
            </th>

            <th>
                EMAIL
            </th>
            <th>
                ROLE
            </th>
            <th>
                Action
            </th>

        </tr>
        @foreach ($users as $user)
        <tr>

            <td>
                {{$user->id}}
            </td>
            <td>
                {{$user->name}}
            </td>
            <td>
                {{$user->email}}
            </td>
            
            <td>
                {{$user->role}}
            </td>

            <td>
<!--                <a class="btn btn-success"href="">Edit</a>-->
                <form action="/users/destroy/{{$user->id}}" method=post> 
                    @csrf 
                    @method('PUT')  
                    <input class="btn btn-danger"type=submit value=Delete onClick= "return confirm('Ban co chac la muon xoa ?');">
                </form> 
            </td>

        </tr>
        @endforeach
    </TABLE>
</div>
@endsection

