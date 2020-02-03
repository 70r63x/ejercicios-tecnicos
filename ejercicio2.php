<?php

	//$string = "Hello world";
	$string = "2 + 10 / 2 - 20";
	//$string = "(2 + 10) / 2 - 20";
	//$string = "(2 + 10 / 2 - 20";

	$operation = operation($string);

	function operation($string){

    	if(strpos($string, "(") !== false && strpos($string, ")") !== false){
    		if (math($string)) {
    			echo "entre por parentesis";
	    		$response = true.': Si corresponde a una operacion Matematica';
	    		$compute = compute($string);
	    	}else{
	    		$response = false.': No corresponde a una operacion Matematica';
	    		$compute = 'false';
	    	}
    	}else if( strpos($string, "(") == null && strpos($string, ")") !== false || strpos($string, ")") == null && strpos($string, "(") !== false){
    		$response = false.': No corresponde a una operacion Matematica';
    		$compute = 'false';
    	}else if (math($string)){
    		$response = true.': Si corresponde a una operacion Matematica';
    		$compute = compute($string);
    	}else{
    		$response = false.': No corresponde a una operacion Matematica';
    		$compute = 'false';
    	}

	    return $response. " | El resultado de la operación matematica es: ". $compute;
    }

    function math($stringi){
    	$operators = ["+", "-", "*", "/"];

    	for ($i=0; $i < count($operators); $i++) {
    		if (strpos($stringi, $operators[$i]) !== false) {
    			return true;
    		}else{
    			return false;
    		}
    	}
    }

    function compute($string){

    	$result = @eval("return " . $string . ";" );
    	return $result;
    	
    }



?>
<!DOCTYPE html>
<html>
<head>
	<title>Ejercicio 2</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h2>Resultado del ejericico 2</h2>
				<p>String usado <?php echo $string ?></p>
			</div>
			<div class="col-12">
				<table class="table table-info">
					 <thead>
					    <tr>
					      <th scope="col">s.operation and s.compute</th>
					    </tr>
					</thead>
					<tbody>
					    <tr>
					      <td><?php echo $operation; ?></td>
					    </tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>