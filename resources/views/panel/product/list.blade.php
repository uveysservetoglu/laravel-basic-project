@extends("panel.template")

@section("content")

    <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>  {{$var["title"]}} </h5>
            <p style="float: right; margin-top: 3px; margin-right: 3px"><a href="{{Route('product.create')}}" class="btn btn-success">New product</a></p>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>sku</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>

                @foreach($var["product"] as $product)
                <tr class="gradeX">
                    <td>{{$product->name}}</td>
                    <td>
                        @foreach($product->category as $category)
                            {{$category->name}}
                        @endforeach
                    </td>
                    <td>{{$product->sku}}</td>
                    <td><a href="{{Route("product.edit",$product->id)}}" class="btn btn-success"> Edit</a></td>
                    <td class="center">
                        <input type="submit" value="Sil" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete">

                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    Attention!
                </div>
                <div class="modal-body">
                    <h4>Are you sure you want to delete this recording?</h4>
                </div>
                <div class="modal-footer">
                    {{Form::model($product, ["route"=>["product.destroy",$product->id], "method"=>"delete"])}}
                    <input type="submit" value="Delete" class="btn btn-danger">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@endsection
