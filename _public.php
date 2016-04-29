<?php
# -- BEGIN LICENSE BLOCK ----------------------------------
# This file is part of Katzenjammer, a theme for Dotclear.
#
# Copyright (c) 2010 - 2015 annso (contact@as-i-am.fr) and contributors
#
# Licensed under the GPL version 2.0 license.
# A copy of this license is available in LICENSE file or at
# http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
# -- END LICENSE BLOCK ------------------------------------
if (!defined('DC_RC_PATH')) { return; }

l10n::set(dirname(__FILE__).'/locales/'.$_lang.'/public');

# appel css menu
$core->addBehavior('publicHeadContent','katzenjammer_publicHeadContent');

function katzenjammer_publicHeadContent($core)
{
	$style = $core->blog->settings->themes->katzenjammer_menu;
	if (!preg_match('/^simplemenu|menu-no$/',$style)) {
		$style = 'simplemenu';
	}

	$url = $core->blog->settings->system->themes_url.'/'.$core->blog->settings->system->theme;
	echo '<link rel="stylesheet" type="text/css" media="screen" href="'.$url."/".$style.".css\" />\n";
}

$core->tpl->addValue('ScrollDownLink',array('tplKatzenjammer','ScrollDownLink'));
$core->tpl->addValue('ScrollAnchor',array('tplKatzenjammer','ScrollAnchor'));

class tplKatzenjammer
{
	/*
	Cette fonction  crée un lien qui défile vers le prochain article
	Utilisation : {{tpl:ScrollDownLink}}
	*/
	public static function ScrollDownLink($attr)
	{
		
		$f = $GLOBALS['core']->tpl->getFilters($attr);

		$res = 
		'<?php echo "<div class=\"scroller\">"; ?>'.
		'<?php echo "<a href=\"#item-"; ?>'.
		'<?php echo $_ctx->posts->post_id; ?>'.
		'<?php echo "\">"; ?>'.
		'<?php echo "<img src=\""; ?>'.
		'<?php echo '.sprintf($f,'$core->blog->settings->system->themes_url."/".$core->blog->settings->system->theme').'; ?>'.
		'<?php echo "/img/down.jpg\" alt=\"Scroll down\" />"; ?>'.
		'<?php echo "</a>"; ?>'.
		'<?php echo "</div>"; ?>';
		
		return $res;
	}

	
	/*
	Cette fonction crée une ancre au nom de l'id de l'article
	Utilisation : {{tpl:ScrollAnchor}}
	*/
	public static function ScrollAnchor($attr)
	{
		return '
		<?php 
			$res = \'<a name="item-\'.$_ctx->posts->post_id.\'"></a> \';
			echo $res;
		?>';	
	}

}