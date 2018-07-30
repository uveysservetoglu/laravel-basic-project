@extends("panel.template")


@section("content")

<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>{{$var["title"]}}</h5>
            </div>
            <div class="widget-content nopadding">

                {!! Form::open(['route'=>['product.store'], 'method'=>'POST','files'=>'true','class'=>'form-horizontal']) !!}

                <div class="control-group">
                    <label class="control-label">Category :</label>
                    <div class="controls">
                        <select name="category" class="span11">
                            <option value="">Please Select Parent Category</option>
                            @foreach($var["category"] as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Name :</label>
                    <div class="controls">
                        <input type="text" class="span11" name="name" placeholder="Product Name"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Description :</label>
                    <div class="controls">
                        <textarea name="description" id="description" cols="10" rows="10" class="span9"></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Sku :</label>
                    <div class="controls">
                        <input type="text" class="span11" name="sku" placeholder="SKU"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Price:</label>
                    <div class="controls">
                        <input type="text" class="span11" name="price" placeholder="Product Price" value="1"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Sort:</label>
                    <div class="controls">
                        <input type="text" class="span11" name="sort" placeholder="Product Sort" value="1"/>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Status :</label>
                    <div class="controls">
                        <input type="checkbox"  data-toggle="toggle" name="status">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Image :</label>
                    <div class="controls">
                        <input type="file" class="span11" placeholder="Company name" name="image" value=""/>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">Güncelle</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

</div>
@endsection