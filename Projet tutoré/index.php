<!DOCTYPE html>
<html>
<head>
	<title>FREEinfo - Accueil</title>
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
			<article id="articleIndex">
				<figure onclick="location.href = 'article.php?article=articlePrincipal';">
					<?php
							($articlePrincipal = file_get_contents($articleDir.'/articlePrincipal'.$pageExt)) === false
							? die
							: $illustration=recupererImage($articlePrincipal, true);
							echo $illustration;
					?>
					<figcaption>Le Dossier</figcaption>
				</figure>
				<h1>
					<?php
							$titrePrincipal=recupererTitre($articlePrincipal) ;
							echo $titrePrincipal;
					?>
				</h1>
				<p>
					<?php
						$paragraphe=recupererTexteDebut($articlePrincipal, 300);
						echo $paragraphe ;
					?>
				</p>
				<div class="btn-container"><a class="customBtn" href="article.php?article=articlePrincipal">Lire la suite</a></div>
			</article>
			<aside id="asideIndex">
				<div class="suggestion">
					<?php
						($article1 = file_get_contents($articleDir.'/article1'.$pageExt)) === false ? die
								: $vignette1=recupererMiniature($article1, true);
						echo $vignette1;
						
					?>
					<div class="bloctitre">
						<h1>
						<a href="article.php?article=article1"><?php
							 $titre1=recupererTitre($article1) ;
								echo $titre1;
						?></a>
						</h1>
					</div>
				</div>
				<div class="suggestion">
					<?php
					($article2 = file_get_contents($articleDir.'/article2'.$pageExt)) === false ? die
								: $vignette2=recupererMiniature($article2, true);
						echo $vignette2;
					?>
					<div class="bloctitre">
						<h1>
							<a href="article.php?article=article3"><?php
								 $titre2=recupererTitre($article2) ;
									echo $titre2;
							?></a>
						</h1>
					</div>
				</div>
				<div class="suggestion">
					<?php
					($article3 = file_get_contents($articleDir.'/article3'.$pageExt)) === false ? die
								: $vignette3=recupererMiniature($article3, true);
						echo $vignette3;
					?>
					<div class="bloctitre">
						<h1>
							<a href="article.php?article=article3"><?php
								 $titre3=recupererTitre($article3) ;
									echo $titre3;
							?></a>
						</h1>
					</div>
				</div>
			</aside>
		</section>
		<?php

			(include $incDir .'/'. $footerFile . $incExt) === false 
			? ob_clean() 
			: null ;

			ob_end_flush();
		?>
	</div>
	<script type="text/javascript">
		lienSuggestion=document.querySelectorAll('#main section #asideIndex .suggestion .bloctitre h1 a');
		images=document.querySelectorAll("#main section #asideIndex .suggestion img");
		
			lienSuggestion[0].addEventListener('mouseover', function(){
				images[0].style.opacity=0.5;
			});
			lienSuggestion[0].addEventListener('mouseout', function(){
				images[0].style.opacity=1;
			});

			lienSuggestion[1].addEventListener('mouseover', function(){
				images[1].style.opacity=0.5;
			});
			lienSuggestion[1].addEventListener('mouseout', function(){
				images[1].style.opacity=1;
			});

			lienSuggestion[2].addEventListener('mouseover', function(){
				images[2].style.opacity=0.5;
			});
			lienSuggestion[2].addEventListener('mouseout', function(){
				images[2].style.opacity=1;
			});
	</script>
</body>
</html>