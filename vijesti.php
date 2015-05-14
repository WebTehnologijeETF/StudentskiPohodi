
<html>
<body>
	<META http-equiv="Content-Type" content="text/html; charset=utf-8">

<?php
header('Content-Type: text/html; charset=UTF-8');	
$datoteka = glob("novosti/*.txt");
	$vijesti=$entry=$date=$autor=$naslov=$opis=$detalji=$slika=$link="";
	$detaljnijeIspis="Detaljnije";
	$brojac=0;
	$det="";

	foreach ($datoteka as $txt) 
	{
		$entry = file($txt);
		$date = trim($entry[0]);
		$autor = trim($entry[1]);
		$naslov = trim($entry[2]);
		$naslov= strtolower($naslov);
		$naslov = ucfirst($naslov);
		$slika = trim($entry[3]);
		$brojac = count($entry);
         $i = 4;
		
		while (trim($entry[$i]) != "--" && $brojac-1!= $i) 
		{
			$opis = $opis.$entry[$i];
			$i++;
			
		}
		
		$det=trim($entry[$i]);

		if($det== "--")
		{
			$i++;
			while ($i != count($entry)) 
			{
				$detalji = $detalji.$entry[$i];
				$i++;
			}
		}


		$vijesti ='<div class="vijesti">
				<h2 class="Naslov">'.$naslov.'</h2>
				<p class="datum">'.$date.'</p>
				<p class="autor">'.$autor.'</p> 
				<img class="Slika" src="'.$slika.'" >
				<p class="opis">'.$opis.'</p>
				<p class="detalji">'.$detalji.'</p>';
				
				
		if ($detalji != "")
		{
			$link = '<a href="#" class="detalji">'.$detaljnijeIspis.'.</a>';
		}
		
		$vijesti = $vijesti.$link.'</div>';
	   	echo $vijesti;
	}
?>
</body>
</html>
