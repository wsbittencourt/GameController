<?php

namespace tests\controllersTests;

use PHPUnit\Framework\TestCase;
use src\models\Jogo;
use src\controllers\UsuarioController;
use src\controllers\JogoController;

require_once __DIR__ . '/../../config.php';

class JogoControllerTest extends TestCase{
    
    /**
     * @test
     */
    public function insereERemoveNovoJogo(){
        $j = new Jogo();
        $j->titulo = "Far cry 3";
        $j->genero= "Tiro em primeira pessoa";
        $j->desenvolvedora = "Ubisoft";
        
        $u = UsuarioController::getUser('wagner');
        
        JogoController::criaDono($u,$j);
        
        JogoController::create($j);
        
        $game = JogoController::getGame('Far cry 3');
        //Teste de inserção
        $this->assertNotNull($game); 
        
        $game_u = UsuarioController::getUser($game->id_dono);
        $this->assertEquals($game_u->nome, 'Wagner Bittencourt');
        //Teste de remoção
        JogoController::delete($j->id);
        
        $this->assertNull(JogoController::getGame($j->id));
        
        return $game;
    }
    
    /**
     * @test
     */
    public function atualizaJogo(){      
        
        $j = new Jogo();
        $j->titulo = "Far cry 3";
        $j->genero= "Tiro em primeira pessoa";
        $j->desenvolvedora = "Ubisoft";
        
        $u = UsuarioController::getUser('wagner');
        
        JogoController::criaDono($u,$j);
        
        JogoController::create($j);
        
        $j->genero = "Tiro em primeira pessoa";
        
        JogoController::update($j);
        
        $j->genero = "Jogo eletrônico de ação e aventura";
        
        $result = JogoController::getGame($j->titulo);
        
        $this->assertNotEquals($j->to_array(),$result->to_array());
        
        JogoController::delete($result->id);
    }
    
    /**
     * @test
     */   
    public function leituraDeTodosOsJogos(){
        $todos = JogoController::red();
        
        $this->assertEquals(0,count($todos));
     
    }
}
