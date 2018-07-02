<?php

namespace tests\controllersTests;

use PHPUnit\Framework\TestCase;
use src\models\Usuario;
use src\models\Jogo;
use src\models\Emprestimo;
use src\controllers\UsuarioController;
use src\controllers\JogoController;
use src\controllers\EmprestimoController;

require_once __DIR__ . '/../../config.php';

class EmprestimoControllerTest extends TestCase{
    
    /**
     * @test
     */
    public function insereDevolveERemoveEmprestimo(){
        //Cria novo jogo e cadastra
        $j = new Jogo();
        $j->titulo = "Grand Theft Auto V";
        $j->genero= "Jogo eletrônico de ação e aventura";
        $j->desenvolvedora = "Rockstar";
        
        $u = UsuarioController::getUser('wagner');
        
        JogoController::criaDono($u,$j);
        
        JogoController::create($j);
        
        //Novo amigo
        $u = new Usuario();
        $u->id = "david";
        $u->password = "123";
        $u->nome = "David";
        $u->nascimento = "2000-01-01";
        $u->sexo = 'M';
        $u->telefone = "2222-0101";
        $u->email = "david@teste.com.br";
        
        UsuarioController::create($u);
        
        //Novo emprestimo
        $e = new Emprestimo();
        $en = EmprestimoController::create($e, $j, $u);
        
        //Testes
        $em = EmprestimoController::getEmprestimo($u->id,$j->titulo);
        $this->assertNotNull($em); 
        
        $this->assertTrue(EmprestimoController::equals($en,$em));
        
        //Teste de remoção
        EmprestimoController::finalizar($en);
        
        $e = EmprestimoController::getEmprestimo($u->id,$j->titulo);
        
        $status = $e->status;
        
        $this->assertEquals('D', $status);
        
        EmprestimoController::delete($e);
    }
    
    /**
     * @test
     */
    public function leituraDeTodosOsEmprestimos(){
        $todos = EmprestimoController::red();
        
        $this->assertEquals(0,count($todos));
    }
}
