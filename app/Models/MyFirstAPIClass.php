<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Exception;

class MyFirstAPIClass extends Model
{
    protected $table = 'post';
    
    public function create_item($title,$body){
        $data = [
            'title'=>$title,
            'body'=>$body,
        ];
        
        $rules = [
            'title'=>'required|max:255',
            'body'=>'required'
        ];
        
        $validator = Validator::make($data,$rules);
        
        if($validator->fails()){
            throw new Exception('Invalid request.');
        }

        $this->insert($data,'posts');
        
        return true;
        
    }
    
    
    public function update_item($id,$title,$body){
        
        $data = [
            'id'=>$id,
            'title'=>$title,
            'body'=>$body,
        ];
        
        $rules = [
            'id'=>'required|numeric',
            'title'=>'required|max:255',
            'body'=>'required'
        ];
        
        
        $validator = Validator::make($data,$rules);
        
        if($validator->fails()){
            throw new Exception('Invalid request.');
        }
        
        $item = $this->find($id);
        
        $item->title = $data['title'];
        $item->body = $data['body'];
        
        $item->save();
        
        return true;
        
    }
    
    public function delete_item($id){
        
        $data = [ 'id'=>$id ];
        
        $rules = [
            'id'=>'required|numeric'
        ];
        
        
        $validator = Validator::make($data,$rules);
        
        if($validator->fails()){
            throw new Exception('Invalid request.');
        }
        
        $this->where('id',$id)->delete();

        return true;
        
    }
    
    public function get_item($id){
        
        $data = [ 'id'=>$id ];
        
        $rules = [
            'id'=>'required|numeric'
        ];
        
        
        $validator = Validator::make($data,$rules);
        
        if($validator->fails()){
            throw new Exception('Invalid request.');
        }
        
        $item = $this->find($id);

        return $item;
        
    }
    
    public function list_items(){
        
        $items = $this->get();

        return $items;
        
    }
    
}
