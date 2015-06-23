
<?php

if (!defined ('TYPO3_MODE')) die ('Access denied.');


\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Nn.' . $_EXTKEY,
	'T3responsive',
	array(
		
	),
	// non-cacheable actions
	array(
		
	)
);



// ----------------------------------------------------
// Plugin einfügen

t3lib_extMgm::addPItoST43($_EXTKEY,'pi1/class.tx_t3responsive_pi1.php','_pi1','list_type',1);

  
t3lib_extMgm::addPageTSConfig('
	<INCLUDE_TYPOSCRIPT: source="FILE:EXT:t3responsive/ext_pageTSconfig.txt">
');

?>