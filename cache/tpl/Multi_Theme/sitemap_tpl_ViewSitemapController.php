<?php $_result='<section id="module-sitemap">
	<header>
		<h1>' . $_functions->i18n('sitemap') . '</h1>
	</header>
	<div class="content">
		';$_subtpl=$_data->get('SITEMAP');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
	</div>
	<footer></footer>
</section>
'; ?>