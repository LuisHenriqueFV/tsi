<?php 

class Pessoa {
	public $nome, $idade, $altura, $peso;
	private $imc;

	function __construct($nome, $idade, $altura=0, $peso=0)
	{
		$this->nome = $nome;
		$this->idade = $idade;
		$this->altura = $altura;
		$this->peso = $peso;
		
	}

	function __destruct()
	{
		echo "\n$this->nome será removido da memória\n";
	}

	function calcImc(){
		if(!$this->peso && !$this->altura){
			return "Erro: configura o peso e altura primeiro!!!";
		}
		
		$this->imc = $this->peso/$this->altura**2;
		return number_format($this->imc,2);
	}

}

$pessoaUm = new Pessoa("Gill",34);
$pessoaDois = new Pessoa("Vera",60,1.55,89);

echo "\nImc do $pessoaUm->nome eh ".$pessoaUm->calcImc()."\n";
echo "\nImc do $pessoaDois->nome eh ".$pessoaDois->calcImc()."\n";

echo "Script será encerrado!!!";