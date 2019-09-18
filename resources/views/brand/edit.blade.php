@extends("layouts.admin")
@section('content')
<h2>FROM UPDATE CATEGORY</h2>  
<form method=post  action= ""  >
    @csrf
    @include('error') 
    <input type="hidden" name="_method" value="PUT">

    <div class="form-group row">
        <label for="inputCatId" class="col-sm-2 col-form-label">Id</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="inputCatId" name="inputBrandId" value ="{{$brand->id}}" disabled="disabled">
        </div>
    </div>
    
    <div class="form-group row">
        <label for="inputCatname" class="col-sm-2 col-form-label">Category Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputCatname" name="inputBrandname" value ="{{$brand->brand_name}}">
        </div>
    </div>


    <fieldset class="form-group">
        <div class="row">
            <label  class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioStatus" id="radioStatus1" value="1"<?php if ($brand->status == 1) echo 'checked '; ?>>
                    <label class="form-check-label" for="radioPublic1">
                        YES
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioStatus" id="radioStatus2" value="0"<?php if ($brand->status == 0) echo 'checked '; ?>>
                    <label class="form-check-label" for="radioPublic2">
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
                    <input class="form-check-input" type="radio" name="radioTrash" id="radioTrash1" value="0" <?php if ($brand->trash == 0) echo 'checked '; ?>>>
                    <label class="form-check-label" for="radioHasChild1">
                        NO
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioTrash" id="radioTrash2" value="1"<?php if ($brand->trash == 1) echo 'checked '; ?>>>
                    <label class="form-check-label" for="radioHasChild2">
                        YES
                    </label>
                </div>

            </div>
        </div>
    </fieldset>




    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">cập nhật</button>
        </div>
    </div>
</form>
@endsection