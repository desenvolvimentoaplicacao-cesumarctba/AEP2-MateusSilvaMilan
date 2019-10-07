<?php
	require_once 'Pessoa.php';
	$p = new Pessoa("Mateus" , "10/10/2000" , 80.0 , 1.80 , 12345678912);
	$p->validaCpf(12345678912);
	$p->calculaImc();
	$p->calculaIdade();