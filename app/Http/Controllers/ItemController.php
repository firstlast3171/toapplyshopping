<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemsAddRequest;
use App\Http\Requests\ItemsEditRequest;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index(){
        if(Auth::user()->role === "orderreceiver"){
            abort(403, 'Unauthorized action.');
        }
        $data = Item::all();
        $newData = [];
        foreach($data as $item){
            $item->image = explode(',',$item->image);
            // dd($item->image);
            $newData[]= $item;
        }
        // $data->image = explode(',',$data->image);
        // dd($newData);
        return view("Items.Item",compact('newData'));
    }

    public function add_itemPage(){
        $categories = Category::all();
        return view("Items.add_item", ['data' => $categories]);
    }
    public function add(ItemsAddRequest $request){
        $data = $request->all();
        $imageNames = '';
       
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $imageNames .= $imageName.',';
            }
        }

      
        $model = new Item();
        $model->name = $data['name'];
        $model->image = substr($imageNames,0,-1);
        $model->description = $data["description"];
        $model->price = $data['price'];
        $model->category_id = $data['category'];
        $model->amount = $data['amount'];
        $model->user_name = auth()->user()->username;

        if($model->save()){
            return redirect('/admin/items')->with("message","Add New Shop Item Successfully");
        }else{
            return redirect()->back()->with('error', 'Something went wrong during the process. Please try again.');
        }
    }

    public function editpage($id)
    {
        $item = Item::findOrFail($id);
        $item->image = explode(',',$item->image);
        $categories = Category::all();
    
        return view("Items.edit_item")->with('item', $item)->with('data', $categories);
    }

    public function edit($id,ItemsEditRequest $request){
        $data = $request->all();
        // dd($data);
        $imageNames = '';
       
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $imageNames .= $imageName.',';
            }
            $model = Item::find($id);
            $model->name = $data['name'];
            $model->image = substr($imageNames,0,-1) ?? $model->image;
            $model->description = $data["description"];
            $model->price = $data['price'];
            $model->category_id = $data['category'] ?? $model->category_id;
            $model->amount = $data['amount'];
            $model->user_name = auth()->user()->username;
        }else{

            $model = Item::find($id);
            $model->name = $data['name'];
            $model->description = $data["description"];
            $model->price = $data['price'];
            $model->category_id = $data['category'] ?? $model->category_id;
            $model->amount = $data['amount'];
            $model->user_name = auth()->user()->username;
        }

    //   dd(substr($imageNames,0,-1));
    

        if($model->save()){
            return redirect('/admin/items')->with("message","Edited Shop Item Successfully");
        }else{
            return redirect()->back()->with('error', 'Something went wrong during the process. Please try again.');
        }
    }
    



    public function delete($id){
        $item = Item::findOrFail($id);

    
        $item->delete();

        return redirect('/admin/items')->with('message', 'Category deleted successfully');
    }
}
