<!DOCTYPE html>
<html>
<head>
	<title>FREEinfo - Galerie</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style/style.css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
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
		<section id="equipePage">

			<h1>Notre équipe</h1>
			<div id="blocmembres">
				<div class="membre">
					<img src="style/image/members/buzz_leclair.jpg" alt="Buzz l'éclair"/>
					<h2>Nassim</h2>
					<p>Développeur acharné du site, pour vous servir</p>
				</div>
				<div class="membre">
					<img src="style/image/members/woody.png" alt="Woody"/>
					<h2>Milan</h2>
					<p>Designer du site, photoshop n'a aucun secret pour lui !</p>
				</div>
				<div class="membre">
					<img src="style/image/members/jessie.jpeg" alt="Jessie"/>
					<h2>Emilie</h2>
					<p>Concepteure du site, pour mettre un peu d'ordre</p>
				</div>
			</div>
		</section>
		<?php

			(include $incDir .'/'. $footerFile . $incExt) === false 
			? ob_clean() 
			: null ;

			ob_end_flush();
		?>
	</div>
</body>
</html>