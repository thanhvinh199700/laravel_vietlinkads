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
    <h2> BẢNG CATEGORIES <a class="btn btn-primary" href="/category/create" role="button">thêm mới</a></h2>

    <TABLE class="table-bordered table-striped table-dark" width="100%;" style="text-align: center;">
        <tr>
            <th>
                ID
            </th>
            <th>
                Category_name
            </th>

            <th>
                Parent
            </th>
            <th>
                Action
            </th>

        </tr>

        @foreach ($categories as $category)
        <tr>

            <td>
                {{$category->id}}
            </td>
            <td>
                {{$category->category_name}}
            </td>

            <td>
                   @if($category->parentOne)
                   {{$category->parentOne->category_name}}
                   @else
                   Không có Cha
                   @endif
                
            </td>

            <td>
                <a class="btn btn-success"href="/category/edit/{{$category->id}}">Edit</a>
                <form action="/category/destroy/{{$category->id}}" method=post> 
                    @csrf 
                    @method('PUT')  
                    <input class="btn btn-danger"type=submit value=Delete onClick= "return confirm('Ban co chac la muon xoa ?');">
                </form> 
            </td>

        </tr>
        @endforeach   
    </table>
</div>
<script type="text/javascript">
    $("#example-basic-expandable").treetable({expandable: true});
</script>







@endsection 

@push('scripts')
<script src="{{ asset('js/jquery.treetable.js') }}"></script>
@endpush