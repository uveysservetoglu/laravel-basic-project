<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $var["title"] = "Product List";

        $var["product"] = Product::all();
        $var["category"] = Category::all();

        return view("panel.product.list", compact("var"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $var["title"] = "Create New Product";
        $var["product"] = Product::all();
        $var["category"] = Category::all();

        return view("panel.product.create", compact("var"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), array(
            "name"=>"required"
        ));

        $product = new Product();

        $product->name = request("name");
        $product->description = request("description");
        $product->sku = request("sku");
        $product->price = request("price");
        $product->sort_order = request("sort");
        $product->status = request("status") == "on" ? true : false;

        if (request()->hasFile('image')) {

            $this->validate(request(), array('image' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));

            $resim = request()->file('image');
            $dosya_adi = md5(microtime()) . '.' . $resim->extension();

            if ($resim->isValid()) {

                $hedef_klasor = 'uplaods/';
                $dosya_yolu = $hedef_klasor . '/' . $dosya_adi;
                $resim->move($hedef_klasor, $dosya_adi);
                $product->image = $dosya_yolu;
            }
        }


        $product->save();

        $product->category()->attach(request("category"));
        if($product){
            alert()
                ->success('Success', 'Create Product')
                ->autoClose(2000);
            return back();
        }else{
            alert()
                ->error('Error', 'An error occurred')
                ->autoClose(2000);
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $var["title"] = "Edit Product";
        $var["product"] = Product::find($id);
        $var["category"] = Category::all();
        return view("panel.product.edit", compact("var"));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate(request(), array(
            "name"=>"required"
        ));

        $product = Product::find($id);

        $product->name = request("name");
        $product->description = request("description");
        $product->sku = request("sku");
        $product->price = request("price");
        $product->sort_order = request("sort");
        $product->status = request("status") == "on" ? true : false;

        if (request()->hasFile('image')) {

            $this->validate(request(), array('image' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));

            $resim = request()->file('image');
            $dosya_adi = md5(microtime()) . '.' . $resim->extension();

            if ($resim->isValid()) {

                $hedef_klasor = 'uplaods/';
                $dosya_yolu = $hedef_klasor . '/' . $dosya_adi;
                $resim->move($hedef_klasor, $dosya_adi);
                $product->image = $dosya_yolu;
            }
        }



        $product->save();

        $product->category()->attach(request("category"));
        if($product){
            alert()
                ->success('Success', 'Create Product')
                ->autoClose(2000);
            return back();
        }else{
            alert()
                ->error('Error', 'An error occurred')
                ->autoClose(2000);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id)->delete();

        if($product){
            alert()
                ->success('Success', 'Delete Category')
                ->autoClose(2000);
            return back();
        }else{
            alert()
                ->error('Error', 'An error occurred')
                ->autoClose(2000);
            return back();
        }
    }
}
