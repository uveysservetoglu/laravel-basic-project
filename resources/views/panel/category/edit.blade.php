@extends("panel.template")

@section("content")
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>{{$var["title"]}}</h5>
                </div>
                <div class="widget-content nopadding">

                    {!! Form::model($var["category"],['route'=>['category.update', $var["category"]->id], 'method'=>'PUT','class'=>'form-horizontal']) !!}

                    <div class="control-group">
                        <label class="control-label">Parent :</label>
                        <div class="controls">
                            <select name="parent" class="span11">
                                <option value="">Please Select Parent Category</option>
                                @foreach($var["categoryAll"] as $category)
                                    <option value="{{$category->id}}"
                                     {{$category->id == old('parent',$var["category"]->parent) ? "selected": ''}} >{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Name :</label>
                        <div class="controls">
                            <input type="text" class="span11" name="name" placeholder="Category Name" value="{{$var["category"]->name}}"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Sort:</label>
                        <div class="controls">
                            <input type="text" class="span11" name="sort" placeholder="Category Sort" value="{{$var["category"]->sort_order}}"/>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Status :</label>
                        <div class="controls">
                            <input type="checkbox"  data-toggle="toggle" name="status" {{$var["category"]->status == true ? "checked": ''}}>
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