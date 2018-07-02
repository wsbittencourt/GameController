<?php
namespace src\controllers;

use src\models\Jogo;
use src\models\Usuario;
use src\models\Emprestimo;
use \DateTime;
use \ActiveRecord\RecordNotFound;

class EmprestimoController {
    public static function create(Emprestimo $e, Jogo $j, Usuario $u){
        $em = $e;
        $em->data_emprestimo = (new DateTime())->getTimestamp();
        $em->jogo = $j->titulo;
        $em->id_emprestado = $u->id;
        Emprestimo::create($em->to_array());
        
        return $em;
    }
    
    public static function red(){
        return Emprestimo::all();
    }
    
    public static function update(Emprestimo $e){
        Emprestimo::find(array("id_emprestado" => $e->id_emprestado,"jogo" => $e->jogo))->update_attributes($e->to_array());
    }
    
    public static function delete($e){
        Emprestimo::find(array(array("id_emprestado" => $e->id_emprestado,"jogo" => $e->jogo)))->delete();
    }
    
    public static function equals(Emprestimo $e1, Emprestimo $e2){
        if(($e1->data_emprestimo == $e2->data_emprestimo)&&($e1->jogo == $e2->jogo)){
            return true;
        }else{
            return false;
        }
    }
    
    public static function getEmprestimo($id_amigo,$id_jogo){
        try{
            return Emprestimo::find(array("id_emprestado" => $id_amigo,"jogo" => $id_jogo));
        } catch(RecordNotFound $ex) {
            return null;
        }
    }
    
    public static function finalizar(Emprestimo $e){
        $em = $e;
        $date = new DateTime(); 
        $em->data_devolucao = $date->getTimestamp();
        $em->status = 'D';
        Emprestimo::find(array('chave' => $e->chave))->update_attributes($em->to_array());
        
        
    }
}
