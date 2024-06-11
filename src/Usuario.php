<?php
namespace src;

class Usuario {
    private $nome;
    private $idade;
    private $numero_conta;
    private $saldo;

    public function __construct($nome, $idade, $numero_conta)
    {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->numero_conta = $numero_conta;
        $this->saldo = 1000; // Inicializa com saldo de 1000
    }

    public function depositar($quantia)
    {
        $this->saldo += $quantia;
    }

    public function sacar($quantia)
    {
        if ($this->saldo >= $quantia) {
            $this->saldo -= $quantia;
            return true;
        }
        return false;
    }

    public function transferir($destino, $valor)
    {
        if ($this->sacar($valor)) {
            $destino->depositar($valor);
            return "Transferência de R$ " . number_format($valor, 2) . " realizada com sucesso.";
        } else {
            return "Saldo insuficiente para realizar a transferência.";
        }
    }

    public function getSaldo()
    {
        return $this->saldo;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getIdade()
    {
        return $this->idade;
    }

    public function getNumeroConta()
    {
        return $this->numero_conta;
    }
}
?>
