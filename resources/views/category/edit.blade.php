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
            <input type="number" class="form-control" id="inputCatId" name="inputCatId" value ="{{$category->id}}" disabled="disabled">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputCatname" class="col-sm-2 col-form-label">Category Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputCatname" name="inputCatname" value ="{{$category->category_name}}">
        </div>
    </div>



    <div class="form-group row">
        <label for="selectParent" class="col-sm-2 col-form-label">Parent</label>
        <div class="col-sm-10">
            <select class="custom-select" required id="selectParent"name="selectParent">
                <option value="0">không có</option>
                @foreach($listCategory as $listCategory)
                @if($listCategory->id === $category->parent)
                <option value="{{$listCategory->id}}" selected="selected">{{$listCategory->category_name}}</option>
                @else
                <option value="{{$listCategory->id}}">{{$listCategory->category_name}}</option>
                @endif
                @endforeach

            </select>
        </div>
    </div>



    <fieldset class="form-group">
        <div class="row">
            <label  class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioStatus" id="radioStatus1" value="1"<?php if ($category->status == 1) echo 'checked '; ?>>
                    <label class="form-check-label" for="radioPublic1">
                        YES
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioStatus" id="radioStatus2" value="0"<?php if ($category->status == 0) echo 'checked '; ?>>
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
                    <input class="form-check-input" type="radio" name="radioTrash" id="radioTrash1" value="0" <?php if ($category->trash == 0) echo 'checked '; ?>>>
                    <label class="form-check-label" for="radioHasChild1">
                        NO
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioTrash" id="radioTrash2" value="1"<?php if ($category->trash == 1) echo 'checked '; ?>>>
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