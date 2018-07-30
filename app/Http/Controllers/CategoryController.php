<?php

namespace App\Http\Controllers;

use App\Category;
use App\Kategori;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $var["title"] = "Category List";

        $var["category"] = Category::all();

        return view("panel.category.list", compact("var"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $var["title"] = "Create New Category";
        $var["category"] = Category::all();
        return view("panel.category.create", compact("var"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();

        $category->name = request("name");
        $category->parent = request("parent");
        $category->sort_order = request("sort");
        $category->status = request("status") == "on" ? true : false;
        $category->slug = str_slug(request("slug"));
        $category->save();
        $category->product()->attach( 1);

        if($category){
            alert()
                ->success('Success', 'Created Category')
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
        $var["title"] = "Edit Category";
        $var["category"] = Category::find($id);
        $var["categoryAll"] = Category::all();
        return view("panel.category.edit", compact("var"));
    }

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

        $category = Category::find($id);

        $category->name = request("name");
        $category->parent = request("parent");
        $category->sort_order = request("sort");
        $category->status = request("status") == "on" ? true : false;
        $category->slug = str_slug(request("slug"));

        $category->save();

        if($category){
            alert()
                ->success('Success', 'Update Category')
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
        $category = Category::find($id)->delete();

        if($category){
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
