<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
class ListController extends Controller
{
    public function index(){
        return response()->json(Item::getList());
    }

    public function getItem($id){

        if(!$id){
            return response()->json([
                'status' => 'noid'
            ]);
        }

        $item = Item::find($id);
        if($item){
            return response()->json([
                'item' => $item
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }


    }
    public function deleteItem($id){

        if(!$id){
            return response()->json([
                'status' => 'noid'
            ]);
        }

        $item = Item::destroy($id);

        if($item){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }

    }
    public function updateItem(Request $request){

        $id = $request->input('id');
        $content = $request->input('content');
        $title = $request->input('title');

        if(!$request->input('id')){
            return response()->json([
                'status' => 'noid'
            ]);
        }

        $item = Item::find($id);
        $item->content = $content;
        $item->title = $title;
        
        if($item->save()){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }

    }

    public function createItem(Request $request){

        $content = $request->input('content');
        $title = $request->input('title');

        $item = new Item;
        $item->content = $content;
        $item->title = $title;

        if($item->save()){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }

    }
}
