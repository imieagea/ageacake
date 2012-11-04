<?php

/**
 * Helper CKEditor pour CakePHP v1.3.4
 * Code Original par Pierre-Emmanuel Fringant
 * URL : http://www.formation-cakephp.com/388/ckeditor-helper
 * Modifié par Damien Varron, 09/10/2010
 */

class CkHelper extends AppHelper
{
	var $helpers = array('Html', 'Js');
 
	function replace($fieldName, $options = array())
	{
		$defaults = array(
 			'customConfig' => $this->webroot.'/js/ckeditor/app.config.js',
 			'loadFinder' => true
 		);
 
		$options = array_merge($defaults, $options);
 
	 	$fieldId = $this->domId($fieldName);
 
	 	$loadFinder = $options['loadFinder'];
 
	 	unset($options['loadFinder']);
 
		$script = "\tvar ck_$fieldId = CKEDITOR.replace('$fieldId', {$this->Js->object($options)});";
 
		if($loadFinder)
		{
			$script .= "\n\tCKFinder.setupCKEditor(ck_$fieldId, '".$this->webroot."/js/ckfinder/');";
		}
 
		return $this->Html->scriptBlock($script, array('inline' => true));
	}
}
?>