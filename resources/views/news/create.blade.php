@extends("layouts.admin")
@section('content')
<h2>FROM CREATE NEWS</h2>
@if(session()->has('message'))  
<div class="alert alert-success">          
    {{ session()->get('message') }}    
</div>  @endif 
<form method=post  action= "" >
    {{csrf_field()}} 
    <div class="form-group row">
        <label for="inputProductname" class="col-sm-2 col-form-label">Tittle</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputProductname" name="tittle"placeholder="Nhập vào Tittle">
        </div>
    </div>



    <div class="form-group row">
        <label for="selectCatid" class="col-sm-2 col-form-label">Short_Description</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputProductname" name="short_description"placeholder="Nhập vào Short_Description">
        </div>
    </div>
    

    <div class="form-group row">
        <label for="inputImage" class="col-sm-2 col-form-label">Avatar</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputImage" name="avatar"placeholder="inputAvatar">
            <button id="ckfinder-popup-1" class="button-a button-a-background" type=button>Browse Server</button>
        </div>
    </div>


    <div class="form-group row">
        <label for="inputDetail" class="col-sm-2 col-form-label">content</label>
        <div class="col-sm-10">
            <textarea name =content id=inputDetail rows=6 cols=80></textarea>
        </div>
    </div>


    <fieldset class="form-group">
        <div class="row">
            <label  class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioStatus" id="radioPublic1" value="1" checked>
                    <label class="form-check-label" for="radioPublic1">
                        YES
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioStatus" id="radioPublic2" value="0">
                    <label class="form-check-label" for="radioPublic2">
                        NO
                    </label>
                </div>

            </div>
        </div>


    </fieldset>
    <fieldset class="form-group">
        <div class="row">
            <label  class="col-sm-2 col-form-label">Trash</label>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioTrash" id="radioHasChild1" value="0" checked>
                    <label class="form-check-label" for="radioHasChild1">
                        NO
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioTrash" id="radioHasChild2" value="1">
                    <label class="form-check-label" for="radioHasChild2">
                        YES
                    </label>
                </div>

            </div>
        </div>
    </fieldset>






    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">thêm mới</button>
        </div>
    </div>
</form>
@endsection