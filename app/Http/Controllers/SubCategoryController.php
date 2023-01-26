<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Support\Facades\Session;

class SubCategoryController extends Controller
{
    public function addForm($categoryId=false)
    {
        $categoryData = Category::all();
        return view('content.subCategory.add')->with('categoryData',$categoryData)->with('categoryId',$categoryId);
    }

    public function store(Request $data, $subCategoryId=false)
    {
        $data->validate([
            'tittle' => ['required', 'max:50', 'min:6'],
            'category' => ['required']
        ]);

        $subCategory = SubCategory::firstOrNew(['sub_category_id' => $subCategoryId]);
        $subCategory->category = $data->category;
        $subCategory->sub_category_name = $data->tittle;
        $subCategory->save();

        if($subCategoryId){
            Session::flash('success', 'Sub Header Updated Successfully!');
        }else{
            Session::flash('success', 'Sub Header Created Successfully!');
        }

        return redirect()->route('sub.category.list',$subCategory->category);
    }

    public function list($categoryId)
    {
        $allSubCategory = SubCategory::with('categoryInfo')->where('category',$categoryId)->get();
        if(count($allSubCategory)>0){
            return view('content.subCategory.list')->with('allSubCategory', $allSubCategory);
        }
        Session::flash('success', 'This Header Has No Sub Header!');
        return redirect()->route('category.list');

    }

    public function edit($subCategoryId)
    {
        $subCategoryData = SubCategory::with('categoryInfo')->findOrFail($subCategoryId);
        $categoryData = Category::all();
        return view('content.subCategory.add')->with('subCategoryData', $subCategoryData)->with('categoryData', $categoryData);
    }

    public function changeStatus($subCategoryId)
    {
        $subCategoryData = SubCategory::find($subCategoryId);
        if ($subCategoryData->status == 'active'){
            $subCategoryData->status = 'inactive';
        }else{
            $subCategoryData->status = 'active';
        }
        $subCategoryData->save();

        Session::flash('success', 'Sub Header Status Changed Successfully!');
        return redirect()->route('sub.category.list',$subCategoryData->category);
    }

    public function delete($subCategoryId)
    {
        SubCategory::destroy($subCategoryId);
        Session::flash('success', 'Sub Header Deleted Successfully!');
        return redirect()->route('category.list');
    }
}
