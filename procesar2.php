<?php

include('funciones.php');

$fc = $_POST['filas'];
$decimales = $_POST['decimales'];
$e = $_POST['error'];

echo "La matriz A tiene ".$fc." filas y columnas"."<br>";

$i=0;
$aux=true;

	for($f=1;$f<=$fc;$f++)
	{
		
		for($c=1;$c<=$fc+1;$c++)
		{
			if (isset($_POST['numero'][$i]) && !empty($_POST['numero'][$i]))
			{
				$matriz[$f][$c] = $_POST['numero'][$i];
				$i++;
			} else
			{
				$aux = false;
				break;	
			}
		}			
	}
	
	if ($aux)
	{
			
		if(sePuedeConvertir($matriz,$fc) && !esDiagonalDominante($matriz,$fc))
		{
			$matriz = convertirMatriz($matriz,$fc);
		}
		
		if(esDiagonalDominante($matriz,$fc))
		{
			echo "Iteracion numero: 0<br><br>Vector solucion numero: 0<br><br>";
			echo "(";
			for($i=1;$i<=$fc;$i++)
			{
				echo ($arr[$i] = 0).";";							
			}
			echo ")<br><br>";
			$arr2 = $arr;
			
		$iteracion=1;
			do		
			{			
				$arr = $arr2;
							
				echo "Iteracion numero: ".$iteracion."<br><br>";
				echo "Vector solucion numero: ".$iteracion."<br>";
				echo "(";
				
				for($i=1;$i<=$fc;$i++)
				{				
					$arr2[$i] = obtenerValor($matriz,$i,$fc,$arr,$decimales);				
					echo $arr2[$i].";";							
				}
				
				echo ")<br><br>";	
				echo "La norma vale: ".($norma = obtenerNorma2($arr2,$arr,$fc,$decimales));
				echo "<br><br>";
				$iteracion++;
			} while ($norma >= $e);
			echo "Cantidad total de iteraciones necesarias: ".($iteracion-1)."<br>El resultado es el vector: ";
			echo "(";
			for($i=1;$i<=$fc;$i++)
			{
				echo $arr2[$i].";";							
			}
			echo ")<br><br>";
			echo "Desea ingresar otra matriz?";
			echo "<form action='procesar3.php' method='post' name='form3' >
					<select name='lista'>
						<option value='si'>Si</option>
						<option value='no'>No</option>
				  	</select>
					<input type='submit' value='Enviar respuesta' />
				  </form>";
		} else
		{
			echo "La matriz no es diagonalmente dominante ni se puede convertir por lo que no se puede asegurar la convergencia de los metodos iterativos.";
		}
	} else
	{
		echo "No se ingresaron los datos necesarios.";
	}
?>