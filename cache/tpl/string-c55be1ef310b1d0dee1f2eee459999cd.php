<?php $_result='		<section id="module-wiki">					
			<header>
				<h1>
					<a href="/chaudron/syndication/?url=/rss/wiki/" title="Syndication" class="fa fa-syndication"></a>
					Wiki Les recettes du Chaudron
				</h1>
			</header>
			<div class="content">
						<div class="wiki-tools-container">
			<nav id="cssmenu-wikitools" class="cssmenu cssmenu-right cssmenu-actionslinks cssmenu-tools">
				<ul class="level-0 hidden">
					
					<li><a href="../wiki/history.php" title="Historique" class="cssmenu-title">
						<i class="fa fa-reply"></i> Historique
					</a></li>
					
						
							<li><a href="../wiki/admin_wiki.php#index" title="Modifier l\'accueil" class="cssmenu-title">
								<i class="fa fa-edit"></i> Modifier l\'accueil
							</a></li>
						
					
					
					
						<li><a href="../wiki/property.php?random=1" title="Page aléatoire" class="cssmenu-title">
							<i class="fa fa-random"></i> Page aléatoire
						</a></li>
					
					
				</ul>
			</nav>
			<script>
				jQuery("#cssmenu-wikitools").menumaker({
					title: "Outils",
					format: "multitoggle",
					breakpoint: 768
				});
				jQuery(document).ready(function() {
					jQuery("#cssmenu-wikitools ul").removeClass(\'hidden\');
				});
			</script>
		</div>
		<div class="spacer"></div>

				<br /><br />
				Bienvenue sur le module wiki !<br /><br />
Voici quelques conseils pour bien débuter sur ce module.<br />
<ul class="formatter-ul">
<li class="formatter-li">Pour configurer votre module, rendez vous dans l\'<a href="/chaudron/wiki/admin_wiki.php">administration du module</a></li>
<li class="formatter-li">Pour créer des catégories, <a href="/chaudron/wiki/post.php?type=cat">cliquez ici</a></li>
<li class="formatter-li">Pour créer des articles, rendez vous <a href="/chaudron/wiki/post.php">ici</a></li>
</ul><br /><br />
Pour personnaliser l\'accueil de ce module, <a href="/chaudron/wiki/admin_wiki.php">cliquez ici</a><br /><br />
Pour en savoir plus, n\'hésitez pas à consulter la documentation du module sur le site de <a href="http://www.phpboost.com/forum/">PHPBoost</a>.
				<br />
				
				<br /><br />
				<div class="options">
					<a href="/chaudron/wiki/explorer.php" title="Explorateur du wiki">
						<i class="fa fa-folder-open"></i>
						Explorateur du wiki
					</a>
				</div>
				<br />
				
			</div>
			<footer></footer>
		</section>
		
'; ?>