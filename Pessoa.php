<?php

		class Pessoa {
	
			public $nome;
			public $data_nascimento;
			public $peso;
			public $altura;
			public $cpf;

	
			public function __construct($nome, $data, $peso, $altura, $cpf) 
			{
				$this->nome = $nome;
				$this->data_nascimento = $data;
				$this->peso = $peso;
				$this->altura = $altura;
				$this->cpf = $cpf;
			}

            public function validaCpf()
            {
                if (empty ($cpf))
                {
                    return false;
                }
                $cpf=preg_replace("/[^0-9]/","",$cpf);
                if (strlen($cpf) !=11)
                {
                    echo "Invalido, insira novamente \n";
                    return false;
                }
                elseif ($cpf=='00000000000'|| $cpf=='11111111111'|| $cpf=='22222222222'|| $cpf=='33333333333'|| $cpf=='44444444444'|| $cpf=='55555555555'|| $cpf=='66666666666'|| $cpf=='77777777777'|| $cpf=='88888888888'|| $cpf=='99999999999')
                {
                    return false;
                }
                else
                {
                    for($t=9;$t<11;$t++)
                    {
                        for ($d=0,$c=0;$c<$d;$c++)
                        {
                            $d+=$cpf{$c}*(($t+1)-$c);
                        }
                        $d=((10*$d)%11)%10;
                        if($cpf{$c}!=$d)
                        {
                            return false;
                        }
                    }
                    return true;
                    echo 'CPF valido.';
                } 
                return $this->cpf;
            }
            
        	public function calculaImc() 
        	{
			    $conta = ($this->altura * $this->altura)/$this->peso;
			        if ($conta < 18.5) 
			        {
				        echo "Valor IMC: " . $conta, "\n";
				        echo "Situação: Abaixo do peso. \n";
			        }
		        	if (($conta >= 18.5) && ($conta <= 24.9)) 
			        {
		        		echo "Valor IMC: " . $conta, "\n";
			        	echo "Situação: Peso normal. \n";
			        }
			        if (($conta >= 25) && ($conta <= 29.9)) 
			        {
				        echo "Valor IMC: " . $conta, "\n";
				        echo "Situação: Sobre peso. \n";
			        }
			        if (($conta >= 30) && ($conta <= 34.9)) 
			        {
				        echo "Valor IMC: " . $conta, "\n";
				        echo "Situação: Obesidade grau 1. \n";
			        }
			        if (($conta >= 35) && ($conta <= 39.9)) 
			        {
			        	echo "Valor IMC: " . $conta, "\n";
				        echo "Situação: Obesidade grau 2. \n";
			        }
			        if ($conta > 40) 
			        {
				        echo "Valor IMC: " . $conta, "\n";
				        echo "Situação: Obesidade grau 3. \n";
			        }
		    }
		    
            public function calculaIdade() 
            {
			    $data = $this->data_nascimentoa;
			    list($dia, $mes, $ano) = explode('/', $data);
			    $data_atual = mktime(0, 0, 0, date('d'), date('m'), date('y'));
			    $data_nasc = mktime(0, 0, 0, $dia, $mes, $ano);
			    $idade = floor((((($data_atual - $data_nasc)/60)/60)/24)/365.25);
			    echo "A sua idade é: \n" , $idade;
		}		
	}
