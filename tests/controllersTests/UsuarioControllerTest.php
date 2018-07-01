<?php

namespace tests\controllersTests;

use PHPUnit\Framework\TestCase;
use src\models\Usuario;
use src\controllers\UsuarioController;

require_once __DIR__ . '/../../config.php';

class UsuarioControllerTest extends TestCase{
    
    /**
     * @test
     */
    public function loginNoSitema(){
        $u = new Usuario();
        $u->id = "wagner";
        $u->password = "123";
        $u->nome = "Wagner Bittencourt";
        $u->nascimento = "1900-01-01";
        $u->sexo = 'M';
        $u->telefone = "0000-0000";
        $u->email = "wagner@teste.com.br";
        
        $consulta = UsuarioController::login($u->id, $u->password);
        
        $this->assertNotNull($consulta); 
    }
    
    /**
     * @test
     */
    public function insereERemoveNovoUsuario(){
        $u = new Usuario();
        $u->id = "ze";
        $u->password = "123";
        $u->nome = "Sr. Zé";
        $u->nascimento = "1800-01-01";
        $u->sexo = 'M';
        $u->telefone = "0101-0101";
        $u->email = "ze@teste.com.br";
        
        UsuarioController::create($u);
        
        $cn = UsuarioController::login($u->id, $u->password);
        
        //Teste de inserção
        $this->assertNotNull($cn); 
        
        $this->assertTrue(UsuarioController::equals($u,$cn));
        
        //Teste de remoção
        UsuarioController::delete(array($u->id));
        
        $this->assertFalse(UsuarioController::login($u->id, $u->password));
        
    }
    
    /**
     * @test
     */
    public function atualizaUsuario(){
        $u = new Usuario();
        $u->id = "maria";
        $u->password = "123";
        $u->nome = "Sra. Maria";
        $u->nascimento = "1705-02-01";
        $u->sexo = 'F';
        $u->telefone = "1111-1111";
        $u->email = "maria@teste.com.br";
        
        UsuarioController::create($u);
        
        $u->nome = "Sra. Dalva";
        
        UsuarioController::update($u);
        
        $result = UsuarioController::getUser($u->id);
        
        $this->assertNotEquals($u->to_array(),$result->to_array());
        
        UsuarioController::delete($result->id);
    }
    
    /**
     * @test
     */
    public function leituraDeTodosOsUsuarios(){
        $todos = UsuarioController::red();
        
        $this->assertEquals(1,count($todos));
    }
}
