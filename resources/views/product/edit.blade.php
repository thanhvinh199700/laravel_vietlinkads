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
        <label for="inputProductname" class="col-sm-2 col-form-label">Product Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputProductname" name="inputProductname" value='{{$product->product_name}}'>
        </div>
    </div>


    <div class="form-group row">
        <label for="selectCatid" class="col-sm-2 col-form-label">Category Name</label>
        <div class="col-sm-10">
            <select class="custom-select" required name=selectCatid>
                @foreach($category as $category)
                @if($category->id == $product->product_category)
                <option value="{{$category->id}}" selected="selected">{{$category->category_name}}</option>
                @else
                <option value="{{$category->id}}">{{$category->category_name}}</option>
                @endif
                @endforeach


            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="selectCatid" class="col-sm-2 col-form-label">Brand Name</label>
        <div class="col-sm-10">
            <select class="custom-select" required name=selectBrand>
                @foreach($brand as $brand)
                @if($brand->id == $product->brand_id)
                <option value="{{$brand->id}}" selected="selected">{{$brand->brand_name}}</option>
                @else
                <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                @endif
                @endforeach


            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputImage" class="col-sm-2 col-form-label">Image</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputImage" name="inputImage" value='{{$product->image}}'>
            <button id="ckfinder-popup-1" class="button-a button-a-background" type=button>Browse Server</button>
        </div>
    </div>
    
    <div class="form-group row">
        <label for="inputDetail" class="col-sm-2 col-form-label">Detail</label>
        <div class="col-sm-10">
            <textarea name =inputDetail id=inputDetail rows=6 cols=80> {{$product->product_detail}}</textarea>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="inputPrice" name="inputPrice"value='{{$product->price}}'>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputPrice" class="col-sm-2 col-form-label">Quantity</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="inputQuantity" name="inputQuantyti"value='{{$product->quantity}}'>
        </div>
    </div>

    <fieldset class="form-group">
        <div class="row">
            <label  class="col-sm-2 col-form-label">Sale</label>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioSale" id="radioSale1" value="1" <?php
                    $a = $product->sale;
                    if ($a == 1)
                        echo "checked"
                        ?>>
                    <label class="form-check-label" for="radioSale1">
                        YES
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioSale" id="radioSale2" value="0"<?php
                    $a = $product->sale;
                    if ($a == 0)
                        echo "checked"
                        ?>>
                    <label class="form-check-label" for="radioSale2">
                        NO
                    </label>
                </div>

            </div>
        </div>
    </fieldset>


    <div class="form-group row">
        <label for="inputSaleprice" class="col-sm-2 col-form-label">Sale Price</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="inputSaleprice" name="inputSaleprice"value='{{$product->saleprice}}'>
        </div>
    </div>

    <fieldset class="form-group">
        <div class="row">
            <label  class="col-sm-2 col-form-label">status</label>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioStatus" id="radioStatus1" value="1" <?php
                    $a = $product->status;
                    if ($a == 1)
                        echo "checked"
                        ?>>
                    <label class="form-check-label" for="radioStatus1">
                        YES
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioStatus" id="radioStatus2" value="0"<?php
                    $a = $product->status;
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
                    $a = $product->trash;
                    if ($a == 1)
                        echo "checked"
                        ?>>
                    <label class="form-check-label" for="radioTrash1">
                        YES
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioTrash" id="radioTrash2" value="0"<?php
                    $a = $product->trash;
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


