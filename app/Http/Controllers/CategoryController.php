<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.category.category',compact('categories'));
    }
    public function store(Request $request)
    {
        $category = new Category();
        $category->category_name = $request->input('category_name');
        $category->user_id = Auth::id(); 

        $category->save();

        return redirect()->route('AllCat');
    }
}