<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\MyFirstAPIClass;
use Exception;

class MyFirstAPIController extends Controller
{
    private $my_firstapi;
    
    public function __construct(){
        $this->my_firstapi = new MyFirstAPIClass();
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function list_items(Request $r)
    {
        try{
            $items = $this->my_firstapi->list_items();
            
            return response()->json([
                'status_code'=>200,
                'status_message'=>'Success',
                'result'=>$items
            ],200);
        }
        catch(Exception $e){
            return response()->json([
                'status_code'=>400,
                'status_message'=>$e->getMessage();
            ],400);
        }
        //
    }
    
    public function get_item(Request $r)
    {
        try{
            $id = $r->get('id');
            $item = $this->my_firstapi->get_item($id);
            
            return response()->json([
                'status_code'=>200,
                'status_message'=>'Success',
                'result'=>$item
            ],200);
        }
        catch(Exception $e){
            return response()->json([
                'status_code'=>400,
                'status_message'=>$e->getMessage();
            ],400);
        }
        //
    }
    
    public function delete_item(Request $r)
    {
        try{
            $id = $r->get('id');
            $this->my_firstapi->delete_item($id);
            
            return response()->json([
                'status_code'=>200,
                'status_message'=>'Success',
            ],200);
        }
        catch(Exception $e){
            return response()->json([
                'status_code'=>400,
                'status_message'=>$e->getMessage();
            ],400);
        }
        //
    }

    public function update_item(Request $r)
    {
        try{
            $id = $r->get('id');
            $title = $r->get('id');
            $body = $r->get('id');
            $this->my_firstapi->update_item($id,$title,$body);
            
            return response()->json([
                'status_code'=>200,
                'status_message'=>'Success',
            ],200);
        }
        catch(Exception $e){
            return response()->json([
                'status_code'=>400,
                'status_message'=>$e->getMessage();
            ],400);
        }
        //
    }

    public function create_item(Request $r)
    {
        try{
            $title = $r->get('id');
            $body = $r->get('id');
            $this->my_firstapi->create_item($title,$body);
            
            return response()->json([
                'status_code'=>200,
                'status_message'=>'Success',
            ],200);
        }
        catch(Exception $e){
            return response()->json([
                'status_code'=>400,
                'status_message'=>$e->getMessage();
            ],400);
        }
        //
    }

    //
}
