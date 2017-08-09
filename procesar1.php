<?php


if (isset($_POST['n']) && !empty($_POST['n']))
{	
	$n = $_POST['n'];

		echo "<form action=\"procesar2.php\" method=\"post\" name=\"form2\" >";
			
			echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
			
			for($c=1;$c<=$n+1;$c++)
			{
				echo "Columna ".$c." ";
			}
			
			echo "<br>";
			
				for ($i=0;$i < $n;$i++)		
				{
					echo "Fila ".($i+1)." ";
					
					for ($j=0;$j < $n+1;$j++)
					{
						echo "<input type=\"text\" name=\"numero[]\" style=\"width:60px;\" />";			
					}
					
					echo "<br>";
										
				}
			echo "Cantidad de decimales de precision: "."<input type=\"text\" name=\"decimales\" style=\"width:30px;\" /><br>";
			echo "Cota de error: "."<input type=\"text\" name=\"error\" style=\"width:70px;\"/><br>";
		
			echo "<input type=\"hidden\" value=\"$n\" name=\"filas\" />";
			echo "<br>"."<input type=\"submit\" value=\"Procesar\" />";	
		echo "</form>";
} else
{
	echo "No se ingresaron los datos necesarios.";
}
?>