<?php

namespace src\controllers;
use src\models\Usuario;
use \ActiveRecord\RecordNotFound;

class UsuarioController{
    public static function create(Usuario $u){
        Usuario::create($u->to_array());
    }
    
    public static function red(){
        return Usuario::all();
    }
    
    public static function update(Usuario $u){
        Usuario::find(array($u->id))->update_attributes($u->to_array());
    }
    
    public static function delete($id){
        Usuario::find(array($id))->delete();
    }
    
    public static function login($id,$pw){
        try{
            $u = Usuario::find(array($id));
            if($u->password == $pw){
                return $u;
            }        
        }catch(RecordNotFound $e){
            return false;
        }
    }
    
    public static function equals(Usuario $one, Usuario $two){
        if($one->id == $two->id){
            return true;
        }else{
            return false;
        }
    }
    
    public static function getUser($id){
        try{
            return Usuario::find(array($id));
        } catch(RecordNotFound $e) {
            return null;
        }
    }
}
