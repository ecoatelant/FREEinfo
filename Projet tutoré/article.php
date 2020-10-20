<!DOCTYPE html>
<html>
<head>
	<title>FREEinfo - Article</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style/style.css" />
</head>
<body>
	<div id="main">
		<?php

			ob_start();

			(include 'config/config.php') === false ? die
				: (include $incDir .'/'. $securityFile . $incExt) === false ? die
					: (include $incDir .'/'. $headerFile . $incExt) === false ? ob_clean()
						: null ;
		?>
		<section>
			<article id="vraiArticle">
				<?php
					if(isset( $_GET['article'] ) && is_string( $_GET['article'] ) && secure( $_GET['article']) && file_exists($articleDir . '/' . $_GET['article'] . $pageExt)){
						include $articleDir . '/' . $_GET['article'] . $pageExt;
					}
					else{
						include $articleDir . '/' . 'articlePrincipal' . $pageExt ;
					}

				?>
			</article>
			<aside id="asideArticle">
				<h1>Pour aller plus loin:</h1>
				<ul>
					<li><?php 
					$premierArticle="article1"; //Si le site était réel, ici la variable s'adapterait
					if(file_exists($articleDir . '/' . $premierArticle . $pageExt) && !(($article1 = file_get_contents($articleDir.'/' . $premierArticle.$pageExt)) === false)){
							echo '<a href="article.php?article='.$premierArticle.'">'.recupererTitre($article1).'</a>';
					} 
					?></li>
					<li><?php 
					$deuxiemeArticle="article2"; //Si le site était réel, ici la variable s'adapterait
					if(file_exists($articleDir . '/' . $deuxiemeArticle . $pageExt) && !(($article2 = file_get_contents($articleDir.'/' . $deuxiemeArticle.$pageExt)) === false)){
						echo '<a href="article.php?article='.$deuxiemeArticle.'">'.recupererTitre($article2).'</a>';
					} 
					?></li>
					<li><?php 
					$troisiemeArticle="article3"; //Si le site était réel, ici la variable s'adapterait
					if(file_exists($articleDir . '/' . $troisiemeArticle . $pageExt) && !(($article3 = file_get_contents($articleDir.'/' . $troisiemeArticle.$pageExt)) === false)){
						echo '<a href="article.php?article='.$troisiemeArticle.'">'.recupererTitre($article3).'</a>';
					} 
					?></li>
				</ul>
			</aside>
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