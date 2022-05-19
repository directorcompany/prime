<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageCategory()
    {
        $allCategories = Category::pluck('title','id')->all();
        $categories = Category::where('parent_id',0)->with('childs')->get();
        // return response()->json(['allCategories'=>$allCategories,'categories'=>$categories],200);
        return view('categoryTreeview',compact('categories','allCategories'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeCategory(Request $request)
    {
        $this->validate($request, [
        		'title' => 'required|unique:categories',
        	]);
        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];
        
        Category::create($input);
        return back()->with('success', 'New Category added successfully.');
    }
}
