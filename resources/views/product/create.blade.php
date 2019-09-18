@extends("layouts.admin")
@section('content')
<h2>FROM CREATE PRODUCT</h2>
@if(session()->has('message'))  
<div class="alert alert-success">          
    {{ session()->get('message') }}    
</div>  @endif 
<form method=post  action= "" >
    {{csrf_field()}} 
    <div class="form-group row">
        <label for="inputProductname" class="col-sm-2 col-form-label">Product Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputProductname" name="inputProductname"placeholder="Nhập vào product Name">
        </div>
    </div>



    <div class="form-group row">
        <label for="selectCatid" class="col-sm-2 col-form-label">Category Name</label>
        <div class="col-sm-10">
            <select class="custom-select" required name=selectCatid>
                @foreach($category as $category)
                <option value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    
      <div class="form-group row">
        <label for="selectCatid" class="col-sm-2 col-form-label">Brand Name</label>
        <div class="col-sm-10">
            <select class="custom-select" required name=selectBrand>
                 @foreach($brand as $brand)
                <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputImage" class="col-sm-2 col-form-label">Image</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputImage" name="inputImage"placeholder="inputImage">
            <button id="ckfinder-popup-1" class="button-a button-a-background" type=button>Browse Server</button>
        </div>
    </div>


    <div class="form-group row">
        <label for="inputDetail" class="col-sm-2 col-form-label">Detail</label>
        <div class="col-sm-10">
            <textarea name =inputDetail id=inputDetail rows=6 cols=80></textarea>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="inputPrice" name="inputPrice"placeholder="10">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPrice" class="col-sm-2 col-form-label">Quantyti</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="inputPrice" name="inputQuantyti"placeholder="10">
        </div>
    </div>

    <fieldset class="form-group">
        <div class="row">
            <label  class="col-sm-2 col-form-label">sale</label>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioSale" id="radioPublic1" value="1" checked>
                    <label class="form-check-label" for="radioPublic1">
                        YES
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioSale" id="radioPublic2" value="0">
                    <label class="form-check-label" for="radioPublic2">
                        NO
                    </label>
                </div>

            </div>
        </div>
    </fieldset>


    <div class="form-group row">
        <label for="inputSaleprice" class="col-sm-2 col-form-label">Sale Price</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="inputSaleprice" name="inputSaleprice" placeholder="10">
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