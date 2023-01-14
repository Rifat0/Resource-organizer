<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Session;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.list');
    }

    public function addForm()
    {
        return view('content.category.add');
    }

    public function store(Request $data, $categoryId=false)
    {
        $data->validate([
            'tittle' => ['required', 'max:50', 'min:6']
        ]);

        $category = Category::firstOrNew(['category_id' => $categoryId]);
        $category->category_name = $data->tittle;
        $category->author = session()->get('auth_data')->user_id;
        $category->save();

        if($categoryId){
            Session::flash('success', 'Header Updated Successfully!');
        }else{
            Session::flash('success', 'Header Created Successfully!');
        }

        return redirect()->route('category.list');
    }

    public function list()
    {
        $allCategory = Category::all();
        return view('content.category.list')->with('allCategory', $allCategory);
    }

    public function edit($categoryId)
    {
        $categoryData = Category::findOrFail($categoryId);
        Session::flash('success', 'Header Updated Successfully!');
        return view('content.category.add')->with('categoryData', $categoryData);
    }

    public function changeStatus($categoryId)
    {
        $categoryData = Category::find($categoryId);
        if ($categoryData->status == 'active'){
            $categoryData->status = 'inactive';
        }else{
            $categoryData->status = 'active';
        }
        $categoryData->save();

        Session::flash('success', 'Header Status Changed Successfully!');
        return redirect()->route('category.list');
    }

    public function delete($categoryId)
    {
        $categoryData = Category::destroy($categoryId);
        Session::flash('success', 'Header Deleted Successfully!');
        return redirect()->route('category.list');
    }
}
