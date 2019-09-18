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
    <h2> BẢNG MENU <a class="btn btn-primary" href="menu/create" role="button">thêm mới</a></h2>

    <TABLE class="table-bordered table-striped table-dark" width="100%;" style="text-align: center;">
        <tr>
            <th>
                ID
            </th>
            <th>
                MENU_NAME
            </th>
             <th>
                MENU_LINK
            </th>
            <th>
                Action
            </th>

        </tr>
        @foreach ($menus as $menu)
        <tr>

            <td>
                {{$menu->id}}
            </td>
            <td>
                {{$menu->menu_name}}
            </td>
            <td>
                {{$menu->menu_link}}
            </td>

            <td>
                <a class="btn btn-success"href="menu/edit/{{$menu->id}}">Edit</a>
                <form action="menu/destroy/{{$menu->id}}" method=post> 
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

