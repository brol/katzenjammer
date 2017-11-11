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

$this->registerModule(
	/* Name */			"Katzenjammer",
	/* Description*/	"Thème en une colonne, noir et blanc",
	/* Author */		"annso, Pierre Van Glabeke",
	/* Version */		'2.3',
	array(
		'type'	 =>	'theme',
		'tplset' => 'mustek',
		'dc_min' => '2.9'
	)
);