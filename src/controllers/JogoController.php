<?php

//namespace src\controllers;
use src\models\Jogo;
use src\models\Usuario;
use \ActiveRecord\RecordNotFound;

class JogoController {
    public static function create(Jogo $j){
        Jogo::create($j->to_array());
    }
    
    public static function red(){
        return Jogo::all();
    }
    
    public static function update(Jogo $j){
        Jogo::find(array($j->id))->update_attributes($j->to_array());
    }
    
    public static function delete($id){
        Jogo::find(array(array($id)))->delete();
    }
    
    public static function equals(Jogo $one, Jogo $two){
        if(($one->id_dono == $two->id_dono)&&($one->titulo == $two->titulo)){
            return true;
        }else{
            return false;
        }
    }
    
    public static function getGame($id){
        try{
            return Jogo::find(array($id));
        } catch(RecordNotFound $e) {
            return null;
        }
    }
    
    public static function criaDono(Usuario $u, Jogo $j){
        $j->id_dono = $u->id;
    }
}
