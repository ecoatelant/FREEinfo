<header>
	<div class="interieur">
		<img class="logo" src="style/image/brand/logo.png" alt="logo FREEinfo"/>
		<nav>
			<ul>
				<li><a href="index.php">Accueil</a></li><li><a href="article.php">Articles</a>
					<ul>
						<?php 
							$dossierHead="articlePrincipal";
							$nomArticle1Head="article1";
							$nomArticle2Head="article2";
							$nomArticle3Head="article3";
							(include $incDir .'/'. $articleFile . $incExt) === false ? die
								: ($articlePrincipalhead = file_get_contents($articleDir.'/'.$dossierHead.$pageExt)) === false ? die
									: ($article1head = file_get_contents($articleDir.'/'.$nomArticle1Head.$pageExt)) === false ? die
										: ($article2head = file_get_contents($articleDir.'/'.$nomArticle2Head.$pageExt)) === false ? die
											: ($article3head = file_get_contents($articleDir.'/'.$nomArticle3Head.$pageExt)) === false
											? die
											: null ;
							echo "<li><a href=\"article.php?article=".$dossierHead."\">Dossier : ".recupererTitre($articlePrincipalhead)."</a></li>";
							echo "<li><a href=\"article.php?article=".$nomArticle1Head."\">".recupererTitre($article1head)."</a></li>";
							echo "<li><a href=\"article.php?article=".$nomArticle2Head."\">".recupererTitre($article2head)."</a></li>";
							echo "<li id=\"dernier\"><a href=\"article.php?article=".$nomArticle3Head."\">".recupererTitre($article3head)."</a></li>";
						?>
					</ul>
				</li><li><a href="galerie.php">Galerie</a></li><li><a href="equipe.php">L'équipe</a></li>
				<!--Je les colle car sinon ça crée de petits espaces !-->
			</ul>
		</nav>
	</div>
</header>
