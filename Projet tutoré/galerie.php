<!DOCTYPE html>
<html>
<head>
	<title>FREEinfo - Galerie</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style/style.css" />
</head>
<body>
	<div id="main">
		<?php

			ob_start();

			(include 'config/config.php') === false ? die
				: (include $incDir .'/'. $securityFile . $incExt) === false ? die
					: (include $incDir .'/'. $headerFile . $incExt) === false 
					? die
					: null ;
		?>
		<section>
			<div id="grandeImage">
				<h1>Image :</h1>
				<img class="big-image" src="style/image/illustration/bigbrother.jpg" alt="big brother">
			</div>
			<div id="navigationImg">
				<h2>Cliquez pour agrandir :</h2>
				<table>
					<tr>
						<td><img class="img-gal" onclick="afficherImage(1);" src="style/image/illustration/bigbrother.jpg" alt="big brother" style="opacity:0.6;"></td>
						<td><img class="img-gal" onclick="afficherImage(2);" src="style/image/illustration/mapfreedom.jpg" alt="Carte freedom house censure"></td>
						<td><img class="img-gal" onclick="afficherImage(3);" src="style/image/illustration/snowden.jpg" alt="Edward Snowden"></td>
						<td><img class="img-gal" onclick="afficherImage(4);" src="style/image/illustration/terre_internet.png" alt="Terre internet"></td>
					</tr>
				</table>
			</div>
		</section>
		<?php

			(include $incDir .'/'. $footerFile . $incExt) === false 
			? ob_clean() 
			: null ;

			ob_end_flush();
		?>
	</div>
	<script type="text/javascript">
		function afficherImage(arg){
			var imagesArray=document.querySelectorAll('#main section #navigationImg tr td img'),
			grandeImage=document.querySelector('#main section #grandeImage img');

			for(var i=0 ; i<imagesArray.length; i++){
				imagesArray[i].style.opacity=1;
			}

			imagesArray[arg-1].style.opacity=0.6;
			grandeImage.src=imagesArray[arg-1].src;
			grandeImage.alt=imagesArray[arg-1].alt;
		}
	</script>
</body>
</html>