<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\categories;
use Illuminate\Http\Request;

class categoriesControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //$categories=Category::all();
      // $categories=Category::included()->get();
    // $categories=Category::included()->filter();
    //  $categories=Category::included()->filter()->sort()->get();
      $categoriesControllers=categoriesControllers::included()->filter()->sort()->getOrPaginate();
       return $categoriesControllers;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:categories',

        ]);

        $categoriesControllers=categoriesControllers::create($request->all());

        return $categoriesControllers;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categoriesControllers  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)//si se pasa $id se utiliza la comentada
    {
      // $category = Category::findOrFail($id);
     // $category = Category::with(['posts.user'])->findOrFail($id);
     // $category = Category::with(['posts'])->findOrFail($id);

     // $category = Category::included();
       $categoriesControllers = categoriesControllers::included()->findOrFail($id);
       return $categoriesControllers;
//http://api.codersfree1.test/v1/categories/1/?included=posts.user

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categoriesControllers  $categoriesControllers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categoriesControllers $categoriesControllers)
    {
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:categories,slug,'.$categoriesControllers->id,

        ]);

        $categoriesControllers->update($request->all());

        return $categoriesControllers;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categoriesControllers  $categoriesControllers
     * @return \Illuminate\Http\Response
     */
    public function destroy(categoriesControllers $categoriesControllers)
    {
        $categoriesControllers->delete();
        return $categoriesControllers;
    }
}
