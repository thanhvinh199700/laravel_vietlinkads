
@foreach($categories as $category)
<div class="col-lg-1 col-md-2 col-xs-6 col-sm-4" style="border: 1px solid #EEEEEE;width:153px;height:50px;background: #dc3545;">
    <a href="/cat/{{$category->id}}" style="text-decoration: none" class="category_smartphone" category_id="{{$category->id}}">
        <div class="text-center">
            <h4 style="font-family:Times New Roman, Times, serif;color:white">{{$category->category_name}}</h4>
        </div>
    </a>
    
</div>
@endforeach
