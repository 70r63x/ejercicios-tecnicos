<?php

	//$array = [1,2]; $ejemplo = 'a = [1,2]';
	//$array = [[1,2],[2,4]]; $ejemplo = 'b = [[1,2],[2,4]]';
	//$array = [[1,2],[2,4],[2,4]]; $ejemplo = 'c = [1,2]';
	//$array = [[[3,4],[6,5]]]; $ejemplo = 'd = [[1,2],[2,4],[2,4]]';
	//$array = [[[1, 2, 3]], [[5, 6, 7],[5, 4, 3]], [[3, 5, 6], [4, 8, 3], [2, 3]]]; $ejemplo = 'e = [[[1, 2, 3]], [[5, 6, 7],[5, 4, 3]], [[3, 5, 6], [4, 8, 3], [2, 3]]]';
	$array = [[[1, 2, 3], [2, 3, 4]], [[5, 6, 7], [5, 4, 3]], [[3, 5, 6], [4, 8, 3]]]; $ejemplo = 'f = [[[1, 2, 3], [2, 3, 4]], [[5, 6, 7], [5, 4, 3]], [[3, 5, 6], [4, 8, 3]]]';


	$dimension = dimension($array);
	$straight = straight($array);
	$compute = compute($array);

	function dimension($array)
	{
	    if (is_array(reset($array))){
	        $response = dimension(reset($array)) + 1;
	    }else{
	        $response = 1;
	    }

	    return $response;
	}

	function straight($array){
        foreach ($array as $valueArray){
            $res = mb_strlen(serialize((array)$valueArray));
            $num[]=$res;                
        }

        $equal = count(array_unique($num))===1;
        $res = $equal;

        if($res == 1){
        	return true.': Si contien la misma cantidad de elementos';
        }else if ($res == ""){
        	return false.': No contien la misma cantidad de elementos';
        }  
    }

    function compute($array) { 
        $sum = 0;
        $item = new RecursiveIteratorIterator(new RecursiveArrayIterator($array));

        foreach($item as $valor) {
          	$sum += $valor;
        }
        return $sum;
    }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Ejercicio 1</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row my-3">
			<div class="col-12 text-center">
				<h2>Resultado del ejericico 1</h2>
				<p>Array usado <?php echo $ejemplo ?></p>
			</div>
			<div class="col-12">
				<table class="table table-info">
					 <thead>
					    <tr>
					      <th scope="col">o.dimension</th>
					      <th scope="col">o.straight</th>
					      <th scope="col">o.compute</th>
					    </tr>
					</thead>
					<tbody>
					    <tr>
					      <td><?php echo 'El array tiene '.$dimension.' Dimensiones'; ?></td>
					      <td><?php echo $straight; ?></td>
					      <td><?php echo 'La suma de todos los elementos del array son: '.$compute; ?></td>
					    </tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>