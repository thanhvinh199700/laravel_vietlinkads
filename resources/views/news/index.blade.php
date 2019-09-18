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
    <h2> BẢNG PRORUCTS <a class="btn btn-primary" href="/news/create" role="button">thêm mới</a></h2>

    <TABLE class="table-bordered table-striped table-dark" width="100%;" style="text-align: center;">

        <tr>
            <th>
                ID
            </th>
            <th>
                Tittle
            </th>

            <th>
                Short_Description
            </th>
            <th>
                Avatar
            </th>
            <th>
                Action
            </th>

        </tr>

        @foreach ($news as $news)
        <tr>

            <td>
                {{$news->id}}
            </td>

            <td>
                {{$news->tittle}}
            </td>

            <td>
                {{$news->short_description}}
            </td>

            <td>
                <img src="{{{$news->avatar}}}" style="width: 50px;">
            </td>
            <td>
                <a class="btn btn-success"href='news/edit/{{$news->id}}'>Edit</a>
                <form action="news/destroy/{{$news->id}}" method=post> 
                   @csrf
                   {{ method_field('put') }}
                    <input class="btn btn-danger"type=submit value=Delete onClick= "return confirm('Ban co chac la muon xoa ?');">
                </form> 
            </td>

        </tr>

        @endforeach

    </table>
</div>
@endsection

