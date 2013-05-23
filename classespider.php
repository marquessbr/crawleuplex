<?php 

/*
 * 
1. Criar uma classe chamada Tradutor, com 2 métodos: portuguesParaIngles($palavra) e inglesParaPortugues($word). Implementar estes dois métodos, criando um spider que acesse o site acima.
2. Para implementar estes dois métodos, fazer uso da linguagem PHP, utilizando-a em modo puro ou com a ajuda de um framework à sua escolha (Zend, Symfony, Cake, etc). Pode-se utilizar libs ou dependências de terceiros para auxiliar na sua solução.
* 
*/
 
/*
 * 
 * referencia a classe tradutor * 
 * 
*/

class tradutor{  
	
	// metodo portuguesParaIngles('trauzir')
	// retorna o conteudo da pagina a ser verificada
	function portuguesParaIngles($palavra){
		$semente = null;
		$handle = null;
	   	$regexp = "<div name=\"div[0]\".*? <\/td>/i"; 
	   	//o fragmento html do texto traduzido na pagina referida

		$url = "http://www.bing.com/translator/default.aspx?to=en&text={$palavra}";
		// semente solicitada com o texto a ser traduzido passado como parametro
		
		// se algo der errado
		$matches = "erro ao traduzir!";

		if ($handle = fopen($url,'rb')) {
			do {
				$semente = fread($handle, 8192);
				if (strlen($semente) == 0)
					break;
				$conteudo .= $semente;
				} while(true);
			
			fclose($handle); //Fecha o handle aberto
		
			//Encontra o texto na string em $semente
			if ( $conteudo <> '') {
				if (preg_match_all($regexp,$conteudo,$matches) ) {$matches = strip_tags($matches);} 
			}
		} else {$matches = "erro ao traduzir!";}
		
		//retorna erro ou o texto encontrado
		return $matches;
	}
	
	// metodo inglesparaportugues($word)
	// retorna o texto traduzido na semente
	function inglesParaPortugues($word){
		// solicita a pagina semente
		return $this -> portuguesParaIngles($word);
	}
} // fim da classe

?>
