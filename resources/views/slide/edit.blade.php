@extends("layouts.admin")
@section('content')
<h2>FROM UPDATE PRODUCT</h2>
@if(session()->has('message'))  
<div class="alert alert-success">          
    {{ session()->get('message') }}    
</div>  @endif 
<form method=post  action= "">
    @csrf 
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group row">
        <label for="inputProductname" class="col-sm-2 col-form-label">Tittle</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputProductname" name="tittle" value='{{$slide->tittle}}'>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputProductname" class="col-sm-2 col-form-label">Short_Description</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputProductname" name="short_description" value='{{$slide->short_description}}'>
        </div>
    </div>



    <div class="form-group row">
        <label for="inputImage" class="col-sm-2 col-form-label">avatar</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputImage" name="slide_image" value='{{$slide->slide_image}}'>
            <button id="ckfinder-popup-1" class="button-a button-a-background" type=button>Browse Server</button>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputDetail" class="col-sm-2 col-form-label">Detail</label>
        <div class="col-sm-10">
            <textarea name =content id=inputDetail rows=6 cols=80> {{$slide->content}}</textarea>
        </div>
    </div>







    <fieldset class="form-group">
        <div class="row">
            <label  class="col-sm-2 col-form-label">status</label>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioStatus" id="radioStatus1" value="1" <?php
                    $a = $slide->status;
                    if ($a == 1)
                        echo "checked"
                        ?>>
                    <label class="form-check-label" for="radioStatus1">
                        YES
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioStatus" id="radioStatus2" value="0"<?php
                    $a = $slide->status;
                    if ($a == 0)
                        echo "checked"
                        ?>>
                    <label class="form-check-label" for="radioStatus2">
                        NO
                    </label>
                </div>        
            </div>
        </div>
    </fieldset>

    <fieldset class="form-group">
        <div class="row">
            <label  class="col-sm-2 col-form-label">trash</label>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioTrash" id="radioTrash1" value="1" <?php
                    $a = $slide->trash;
                    if ($a == 1)
                        echo "checked"
                        ?>>
                    <label class="form-check-label" for="radioTrash1">
                        YES
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioTrash" id="radioTrash2" value="0"<?php
                    $a = $slide->trash;
                    if ($a == 0)
                        echo "checked"
                        ?>>
                    <label class="form-check-label" for="radioTrash2">
                        NO
                    </label>
                </div>

            </div>
        </div>
    </fieldset>







    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
        </div>
    </div>
</form>
@endsection


