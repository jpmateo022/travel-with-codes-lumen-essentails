<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class MyFirstAPIClass extends Model
{
    private $table = 'tuts_blog';
    
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

        $this->insert('posts',$data);
        
        return true;
        
    }
}
