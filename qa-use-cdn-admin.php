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
///
class qa_use_cdn_admin
{
	function option_default($option)
	{
		
	    switch($option)
		{
		case 'use_cdn':
		case 'use_cdn_jquery':
			return true;

		case 'use_cdn_jquery_src':
			return "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js";
	    }

		return null;
	}
        
	function allow_template($template)
	{
		return ($template!='admin');
	}       
		
	function admin_form(&$qa_content)
	{                       
		// Process form input
		$ok = null;
		
		if (qa_clicked('use_cdn_save'))
		{
			qa_opt('use_cdn', (bool)qa_post_text('use_cdn'));

			qa_opt('use_cdn_jquery', (bool)qa_post_text('use_cdn_jquery'));
			qa_opt('use_cdn_jquery_src', (string)qa_post_text('use_cdn_jquery_src'));

			$ok = qa_lang('admin/options_saved');
		}
  	    else if (qa_clicked('use_cdn_reset'))
  	    {
			foreach($_POST as $i => $v)
			{
				$def = $this->option_default($i);

				if ($def !== null) qa_opt($i, $def);
			}

			$ok = qa_lang('admin/options_reset');
	    }

		qa_set_display_rules($qa_content, [
			'use_cdn_jquery' => 'use_cdn',
		]);

        // create the form for display
		$fields = [];
		
		$fields[] = [
			'label' => 'Use CDN sources (instead of local copies) to serve Question2Answer scripts',
			'tags' => 'NAME="use_cdn"',
			'value' => qa_opt('use_cdn'),
			'type' => 'checkbox',
		];

		$fields[] = [ 'type' => 'blank' ];

		$fields[] = [
			'label' => 'Use CDN for JQuery',
			'tags' => 'NAME="use_cdn_jquery"',
			'value' => qa_opt('use_cdn_jquery'),
			'type' => 'checkbox',
		];

		$fields[] = [
			'label' => 'JQuery CDN URL',
			'value' => qa_opt('use_cdn_jquery_src'),
			'tags' => 'NAME="use_cdn_jquery_src"',
			'type' => 'input',
		];

		return [

			'ok' => ($ok && !isset($error)) ? $ok : null,
				
			'fields' => $fields,
		 
			'buttons' => [
				[
					'label' => qa_lang_html('main/save_button'),
					'tags' => 'NAME="use_cdn_save"',
				],

				[
					'label' => qa_lang_html('admin/reset_options_button'),
					'tags' => 'NAME="use_cdn_reset"',
				]
			],
		];
	}
}
