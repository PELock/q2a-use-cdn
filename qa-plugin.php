<?php

////////////////////////////////////////////////////////////////////////////////
//
// Q2A Use CDN v1.0 - a plugin for Question2Answer v1.7/v1.8 system
//
// Replace local copy of the JQuery script with a CDN source
//
// Bartosz Wójcik
// https://www.pelock.com
// http://twitter.com/PELock
//
////////////////////////////////////////////////////////////////////////////////

	// don't allow this page to be requested directly from browser
	if (!defined('QA_VERSION'))
	{
		header('Location: ../../');
		exit;
	}

	qa_register_plugin_module('module', 'qa-use-cdn-admin.php', 'qa_use_cdn_admin', 'Use CDN Admin');

	qa_register_plugin_layer('qa-use-cdn-layer.php', 'Use CDN Replacement Layer');

/*                              
	Omit PHP closing tag to help avoid accidental output
*/                              
                          

