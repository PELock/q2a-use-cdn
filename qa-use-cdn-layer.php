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

class qa_html_theme_layer extends qa_html_theme_base
{
	function head_script()
	{
		if(qa_opt('use_cdn'))
		{
			if(qa_opt('use_cdn_jquery'))
			{
				foreach ($this->content['script'] as $index => &$script)
				{
					if (strpos($script, "/qa-content/jquery-"))
					{
						$script = '<script src="' . qa_opt('use_cdn_jquery_src') .'"></script>';
					}

				}
			}
		}

		qa_html_theme_base::head_script();
	}

	/*
	function head_css()
	{
		parent::head_css();
	}
	*/
}

