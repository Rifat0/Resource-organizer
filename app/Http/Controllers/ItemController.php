<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ItemLocation;
use Illuminate\Support\Facades\Session ;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function addForm()
    {
        $categoryData = Category::all();
        return view('content.item.add')->with('categoryData',$categoryData);
    }

    public function getSubCategory($categoryId)
    {
        return SubCategory::where('category',$categoryId)->get();
    }

    public function store(Request $data, $item_id=false)
    {
        $data->validate([
            'header' => ['required'],
            'sub_header' => ['required'],
            'tittle' => ['required', 'max:50', 'min:6'],
            'description' => ['max:250'],
            'images' => ['required'],
            'purchase_by' => ['max:50'],
            'purchase_from' => ['max:50'],
            // 'purchase_date' => ['max:50'],
            'price' => ['numeric'],
            'unit' => ['numeric'],
            'current_location' => ['max:250']
        ]);

        $tr = DB::transaction(function() use ($data,  $item_id) {
            $item = Item::firstOrNew(['item_id' => $item_id]);
            $item->category  = $data->header;
            $item->sub_category = $data->sub_header;
            $item->author  = session()->get('auth_data')->user_id;
            $item->title  = $data->tittle;
            $item->description  = $data->description;
            $item->purchase_by  = $data->purchase_by;
            $item->purchase_from  = $data->purchase_from;
            $item->purchase_date  = date("Y-m-d", strtotime($data->purchase_date));
            $item->price  = $data->price;
            $item->unit  = $data->unit;
            $item->save();

            if(!empty($data->current_location)){
                $location = new ItemLocation();
                $location->item = $item->item_id;
                $location->location_name = $data->current_location;
                $location->save();
            }

            if($data->hasFile('images')){
                $all_photos=[];
                $photos = $data->file('images');
                foreach($photos as $key => $photo){
                    $filename = time().$key.'.'.$photo->getClientOriginalExtension();
                    $photo->move(public_path('item_images'), $filename);
                    $all_photos[] = $filename;
                }
                $item->photos  = json_encode($all_photos);
                $item->save();
            }
        });

        if($item_id){
            Session::flash('success', 'Item Updated Successfully!');
        }else{
            Session::flash('success', 'Item Created Successfully!');
        }

        return redirect()->route('item.list');
    }

    public function list($categoryId=false)
    {
        $items = Item::with('last_location','last_use');
        if($categoryId){
            $items = $items->where('category',$categoryId);
        }
        $items = $items->get();
        return view('content.item.list',compact('items'));
    }

    public function details($itemId)
    {
        $itemData = Item::with('header','subHeader','last_location','uses')->find($itemId);
        return view('content.item.details',compact('itemData'));
    }

    // public function edit($categoryId)
    // {
    //     $categoryData = Category::findOrFail($categoryId);
    //     Session::flash('success', 'Header Updated Successfully!');
    //     return view('content.category.add')->with('categoryData', $categoryData);
    // }

    // public function changeStatus($categoryId)
    // {
    //     $categoryData = Category::find($categoryId);
    //     if ($categoryData->status == 'active'){
    //         $categoryData->status = 'inactive';
    //     }else{
    //         $categoryData->status = 'active';
    //     }
    //     $categoryData->save();

    //     Session::flash('success', 'Header Status Changed Successfully!');
    //     return redirect()->route('category.list');
    // }

    // public function delete($categoryId)
    // {
    //     $categoryData = Category::destroy($categoryId);
    //     Session::flash('success', 'Header Deleted Successfully!');
    //     return redirect()->route('category.list');
    // }
}
