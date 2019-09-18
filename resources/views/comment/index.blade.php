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
    <h2> BẢNG COMMENT <a class="btn btn-primary" href="/category/create" role="button">thêm mới</a></h2>

    <TABLE class="table-bordered table-striped table-dark" width="100%;" style="text-align: center;">
        <tr>
            <th>
                ID
            </th>
            <th>
                Customer
            </th>

            <th>
                Product
            </th>
            <th>
                Content
            </th>


            <th>
                Action
            </th>

        </tr>

        @foreach ($comments as $comment)
        <tr>

            <td>
                {{$comment->id}}
            </td>
            <td>
                @if($comment->user)
                {{$comment->user->name}}
                @endif  
            </td>

            <td>  
                @if($comment->user)
                <a href="comment/detail/{{$comment->product_id}}">{{$comment->product->product_name}}</a>

                @endif  
            </td>
            
            <td>
                {{$comment->comment_content}}
            </td>
            
            <td>
                <form action="comment/destroy/{{$comment->id}}" method=post> 
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