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
                Fullname
            </th>

            <th>
                Phone
            </th>
            <th>
                Email
            </th>
            <th>
                Tittle
            </th>
            <th>
                Detail
            </th>
            <th>
                Action
            </th>


        </tr>

        @foreach ($contacts as $contact)
        <tr>

            <td>
                {{$contact->id}}
            </td>
            <td>
                {{$contact->contract_fullname}}
            </td>

            <td>
                {{$contact->contract_phone}}
                
            </td>
            
            <td>
                {{$contact->contract_email}}
            </td>
            <td>
                {{$contact->contract_tittle}}
            </td>

            <td>
               {{$contact->product_detail}}
            </td>

            <td>
                <form action="contacts/delete/{{$contact->id}}" method=post> 
                    @csrf 
                    @method('PUT')  
                    <input class="btn btn-danger"type=submit value=Delete onClick= "return confirm('Ban co chac la muon xoa ?');">
                </form> 
            </td>

        </tr>
        @endforeach   
    </table>
</div>
@endsection 
