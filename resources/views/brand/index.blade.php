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
    <h2> BẢNG BRANDS <a class="btn btn-primary" href="/brand/create" role="button">thêm mới</a></h2>

    <TABLE class="table-bordered table-striped table-dark" width="100%;" style="text-align: center;">
        <tr>
            <th>
                ID
            </th>
            <th>
                Brand_name
            </th>
            <th>
                Action
            </th>

        </tr>
        @foreach ($brands as $brand)
        <tr>

            <td>
                {{$brand->id}}
            </td>
            <td>
                {{$brand->brand_name}}
            </td>
            <td>
                <a class="btn btn-success"href="/brand/edit/{{$brand->id}}">Edit</a>
                <form action="/brand/delete/{{$brand->id}}" method=post> 
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

