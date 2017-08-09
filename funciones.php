<?php


function redondear($num,$decimales)
{
	$aux = 1;
	
	for($i=0 ;$i < $decimales ;$i++)
	{
		$aux = $aux*10;		
	}
	
	$valor = round($num*$aux)/$aux;
	
	return $valor;
}

function esDiagonalDominante($matriz,$fc)
{
	for($i=1;$i<=$fc;$i++)
	{	
		$sum = 0;
		
		for($j=1;$j<=$fc;$j++)
		{	
			$sum = $sum + abs($matriz[$i][$j]);
		}
		
		if ( abs($matriz[$i][$i]) >= ($sum-abs($matriz[$i][$i])) )
		{				
		} else
		{
			return false;			
		}
	}	
	return true;	
}

function sePuedeConvertir($matriz,$fc)
{
$i=1;
$k=1;
	while($i<=$fc && $k<=$fc)
	{	
		$sum = 0;
		
		for($j=1;$j<=$fc;$j++)
		{	
			$sum = $sum + abs($matriz[$i][$j]);
		}
		
		if ( abs($matriz[$i][$k]) >= ($sum-abs($matriz[$i][$k])) )
		{
			$k++;
			$i=0;				
		} elseif ($i == $fc)
			{
				return false;
			}		
		$i++;
	}	
	return true;	
}


function convertirMatriz($matriz,$fc)
{
	for($i=1;$i<=$fc;$i++)
	{
		$max = $matriz[$i][$i];
		for($j=1;$j<=$fc;$j++)
		{	
			if(abs($matriz[$i][$j]) >= abs($max))
			{
				$max = $matriz[$i][$j];
				$imax = $i;			
				$jmax= $j;
			}
		}
		for($aux=1;$aux<=$fc+1;$aux++)
		{
			$matrizAux[$jmax][$aux] = $matriz[$imax][$aux];
		}
	}
	return $matrizAux;
}

function obtenerValor($matriz,$i,$fc,$arr,$decimales)
{
	//$i representa una fila.
$numerador = $matriz[$i][$fc+1];
	for($j=1;$j<=$fc;$j++)
	{
		$numerador = $numerador - redondear($matriz[$i][$j]*$arr[$j],$decimales);
	}
	$numerador = $numerador + redondear($matriz[$i][$i]*$arr[$i],$decimales);
	return redondear($numerador/$matriz[$i][$i],$decimales);
}

function elevar2($num)
{
	return $num*$num;	
}


function obtenerNorma2($arr2,$arr,$fc,$decimales)
{
$valor = 0;
	
	for($i=1;$i<=$fc;$i++)
	{
		$valor = $valor + elevar2(abs($arr2[$i] - $arr[$i]));	
	}
	return redondear(sqrt($valor),$decimales);
}


?>