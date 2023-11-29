<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::latest()->paginate(10);
        $trashCat = Category::onlyTrashed()->latest()->paginate(5);
        return view('admin.category.category',compact('categories','trashCat'));
    }
    public function store(Request $request)
    {
        $category = new Category();
        $category->category_name = $request->input('category_name');
        $category->user_id = Auth::id(); 

        $category->save();

        return redirect()->route('AllCat');
    }

    public function edit($id){
        $update = Category::find($id);
        return view('admin.category.editCategory', compact('update'));
    }
    
    public function update(Request $request, $id){
        $category = Category::find($id);
        $category->category_name = $request->input('category_name');
        $category->save();
    
        return redirect()->route('AllCat');
    }

    
    public function remove($id){
        $category = Category::find($id)->delete();

        return redirect()->route('AllCat')->with('success', 'Category Removed successfully.');
    }

    public function restore($id){
        $restore = Category::withTrashed()->find($id)->restore();

        return redirect()->route('AllCat')->with('success', 'Category Restored successfully.');
    }

    public function delete($id){
        $restore = Category::withTrashed()->find($id)->forceDelete();

        return redirect()->route('AllCat')->with('success', 'Category Deleted successfully.');
    }
}