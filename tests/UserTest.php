<?php

namespace tests ;

use PHPUnit\Framework\TestCase;
use src\Usuario;

class UserTest extends TestCase {
    
    //teste depositar
    public function testeDepositar()
    {
        $usuario = new Usuario('jonatan','34','2020');

        $deposito = 500;
        $usuario->depositar($deposito);

        $novoSaldo = 1500;
        $this->assertEquals($novoSaldo, $usuario->getSaldo());
    }

    //teste falhou au sacar (saldo_insuficiente)
    public function testeSacarSaldoInsufciente()
    {
        $user = new Usuario('jonathan', 34, '2020');
        //como por padrao o valor comeca com 1000;
        $valorSaque = 1200 ; 
        $sacar = $user->sacar($valorSaque);
        $this->assertFalse($sacar);
    }

    // teste da transferencia 
    public function test_do_valor_da_Transferir()
    {
        $usuario1 = new Usuario('onatan', 34, '2020');
        $usuario2 = new Usuario('drycka', 28, '2021');

        $valorTransferencia = 300;
        $usuario1->transferir($usuario2, $valorTransferencia);
        
        $this->assertEquals(700, $usuario1->getSaldo());
        $this->assertEquals(1300, $usuario2->getSaldo());
    }
}