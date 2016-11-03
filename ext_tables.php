<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');



// -----------------------------------------------------------------------
// Spickzettel:
// 
// TCA für tt_content:
// typo3/sysext/cms/tbl_tt_content.php
//
// -----------------------------------------------------------------------

/*
t3lib_div::loadTCA("tt_content");
t3lib_div::loadTCA("pages");
t3lib_div::loadTCA("sys_file_reference");
*/

// -----------------------------------------------------------------------
// Bildbreite: Responsive
// -----------------------------------------------------------------------

$percents = array('12.5', '16.66', '33.33', '66.66');
for ($i = 5; $i <= 100; $i+=5) {
	$percents[] = $i;
}
	
$tempArr = array(array('',''));
foreach ($percents as $i) {
	$ii = str_replace('.', '-', ''.$i);
	$tempArr[] = array($i.'%', $ii);
}

$sortfunc = function ($a, $b) {
	if (intval($b[1]) == intval($a[1])) return 0;
	return intval($b[1]) > intval($a[1]) ? -1 : 1;
};

usort($tempArr, $sortfunc);

$tempColumns = Array (

	"tx_t3responsive_imgwidth" => Array (		
		'exclude' => 1,
			'label' => 'LLL:EXT:t3responsive/locallang_db.xml:tt_content.tx_t3responsive_imgwidth',
			'config' => array(
				'type' => 'select',
				'items' => $tempArr,
				'default' => '',
			),
	),
	"tx_t3responsive_imgwidthxs" => Array (		
		'exclude' => 1,
			'label' => 'LLL:EXT:t3responsive/locallang_db.xml:tt_content.tx_t3responsive_imgwidthxs',
			'config' => array(
				'type' => 'select',
				'items' => $tempArr,
				'default' => '',
			),
	),
	"tx_t3responsive_imgwidthsm" => Array (		
		'exclude' => 1,
			'label' => 'LLL:EXT:t3responsive/locallang_db.xml:tt_content.tx_t3responsive_imgwidthsm',
			'config' => array(
				'type' => 'select',
				'items' => $tempArr,
				'default' => '',
			),
	),
	"tx_t3responsive_imgwidthmd" => Array (		
		'exclude' => 1,
			'label' => 'LLL:EXT:t3responsive/locallang_db.xml:tt_content.tx_t3responsive_imgwidthmd',
			'config' => array(
				'type' => 'select',
				'items' => $tempArr,
				'default' => '',
			),
	),
	"tx_t3responsive_imgwidthlg" => Array (		
		'exclude' => 1,
			'label' => 'LLL:EXT:t3responsive/locallang_db.xml:tt_content.tx_t3responsive_imgwidthlg',
			'config' => array(
				'type' => 'select',
				'items' => $tempArr,
				'default' => '',
			),
	),
	
	"tx_t3responsive_hidexs" => Array (		
		'exclude' => 1,
			'label' => 'LLL:EXT:t3responsive/locallang_db.xml:tt_content.tx_t3responsive_hidexs',
			'config' => array(
				'type' => 'check',
				'default' => '0',
				'items' => array(
					'1' => array(
						'0' => 'LLL:EXT:t3responsive/locallang_db.xml:tt_content.tx_t3responsive_hidden'
					)
				)
			),
	),
	"tx_t3responsive_hidesm" => Array (		
		'exclude' => 1,
			'label' => 'LLL:EXT:t3responsive/locallang_db.xml:tt_content.tx_t3responsive_hidesm',
			'config' => array(
				'type' => 'check',
				'default' => '0',
				'items' => array(
					'1' => array(
						'0' => 'LLL:EXT:t3responsive/locallang_db.xml:tt_content.tx_t3responsive_hidden'
					)
				)
			),
	),
	"tx_t3responsive_hidemd" => Array (		
		'exclude' => 1,
			'label' => 'LLL:EXT:t3responsive/locallang_db.xml:tt_content.tx_t3responsive_hidemd',
			'config' => array(
				'type' => 'check',
				'default' => '0',
				'items' => array(
					'1' => array(
						'0' => 'LLL:EXT:t3responsive/locallang_db.xml:tt_content.tx_t3responsive_hidden'
					)
				)
			),
	),
	"tx_t3responsive_hidelg" => Array (		
		'exclude' => 1,
			'label' => 'LLL:EXT:t3responsive/locallang_db.xml:tt_content.tx_t3responsive_hidelg',
			'config' => array(
				'type' => 'check',
				'default' => '0',
				'items' => array(
					'1' => array(
						'0' => 'LLL:EXT:t3responsive/locallang_db.xml:tt_content.tx_t3responsive_hidden'
					)
				)
			),
	),
	"tx_t3responsive_imgfloat" => Array (		
		'exclude' => 1,
			'label' => '',
			'config' => array(
				'type' => 'check',
				'default' => '0',
				'items' => array(
					'1' => array(
						'0' => 'LLL:EXT:t3responsive/locallang_db.xml:tt_content.tx_t3responsive_imgfloat'
					)
				)
			),
	),
);


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns("tt_content",$tempColumns);

$GLOBALS['TCA']['tt_content']['palettes']['image_settings']['showitem'] = str_replace(
	'imageborder;', 
	',tx_t3responsive_imgwidth;;;;1-1-1,--linebreak--,
	tx_t3responsive_imgwidthxs;;;;1-1-1,
	tx_t3responsive_imgwidthsm;;;;1-1-1,
	tx_t3responsive_imgwidthmd;;;;1-1-1,
	tx_t3responsive_imgwidthlg;;;;1-1-1,
	imageborder;',
	$GLOBALS['TCA']['tt_content']['palettes']['image_settings']['showitem']
);


$GLOBALS['TCA']['tt_content']['palettes']['imageblock']['showitem'] = str_replace(
	'imagecols;', 
	',tx_t3responsive_imgfloat;;;;1-1-1, imagecols;',
	$GLOBALS['TCA']['tt_content']['palettes']['imageblock']['showitem']
);


$GLOBALS['TCA']['tt_content']['palettes']['visibility_resp'] = array(
	'showitem' => 'tx_t3responsive_hidexs;;,tx_t3responsive_hidesm;;,tx_t3responsive_hidemd;;,tx_t3responsive_hidelg;;',
	'canNotCollapse' => 1
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_content','--palette--;LLL:EXT:t3responsive/locallang_db.xml:tt_content.tx_t3responsive_hide;visibility_resp', '', 'after:hidden');


// -----------------------------------------------------------------------
// sys_file_reference erweitern
// -----------------------------------------------------------------------


$tempColumns = Array (
	"tx_t3responsive_fp_zoom" => Array (		
		'label' => 'LLL:EXT:t3responsive/locallang_db.xml:tt_content.tx_t3responsive_fp_zoom',
		'l10n_mode' => 'exclude',
		'config' => array(
			'type' => 'check',
			'default' => '0',
			'items' => array(
				'1' => array(
					'0' => 'LLL:EXT:t3responsive/locallang_db.xml:tt_content.tx_t3responsive_imgfloat'
				)
			)
		),
	),
);


$TCA['sys_file_reference']['palettes']['focal_point'] = array(
	'showitem' => 'tx_t3responsive_fp_zoom',
	'canNotCollapse' => 1
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns("sys_file_reference",$tempColumns);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('sys_file_reference', 'tx_t3responsive_fp_zoom');

$TCA['sys_file_reference']['palettes']['imageoverlayPalette']['showitem'] .= ',--linebreak--,tx_t3responsive_fp_zoom,--palette--;LLL:EXT:t3responsive/locallang_db.xml:tt_content.tx_t3responsive_hide;focal_point';
$TCA['sys_file_reference']['types']['1']['showitem'] .= ',--linebreak--,tx_t3responsive_fp_zoom,--palette--;LLL:EXT:t3responsive/locallang_db.xml:tt_content.tx_t3responsive_hide;focal_point';


// -----------------------------------------------------------------------
// pages erweitern
// -----------------------------------------------------------------------


$tempColumns = array (
	"tx_t3responsive_hidexs" => Array (		
		'exclude' => 1,
			'label' => 'LLL:EXT:t3responsive/locallang_db.xml:tt_content.tx_t3responsive_hidexs',
			'config' => array(
				'type' => 'check',
				'default' => '0',
				'items' => array(
					'1' => array(
						'0' => 'LLL:EXT:t3responsive/locallang_db.xml:tt_content.tx_t3responsive_hidden'
					)
				)
			),
	),
	"tx_t3responsive_hidesm" => Array (		
		'exclude' => 1,
			'label' => 'LLL:EXT:t3responsive/locallang_db.xml:tt_content.tx_t3responsive_hidesm',
			'config' => array(
				'type' => 'check',
				'default' => '0',
				'items' => array(
					'1' => array(
						'0' => 'LLL:EXT:t3responsive/locallang_db.xml:tt_content.tx_t3responsive_hidden'
					)
				)
			),
	),
	"tx_t3responsive_hidemd" => Array (		
		'exclude' => 1,
			'label' => 'LLL:EXT:t3responsive/locallang_db.xml:tt_content.tx_t3responsive_hidemd',
			'config' => array(
				'type' => 'check',
				'default' => '0',
				'items' => array(
					'1' => array(
						'0' => 'LLL:EXT:t3responsive/locallang_db.xml:tt_content.tx_t3responsive_hidden'
					)
				)
			),
	),
	"tx_t3responsive_hidelg" => Array (		
		'exclude' => 1,
			'label' => 'LLL:EXT:t3responsive/locallang_db.xml:tt_content.tx_t3responsive_hidelg',
			'config' => array(
				'type' => 'check',
				'default' => '0',
				'items' => array(
					'1' => array(
						'0' => 'LLL:EXT:t3responsive/locallang_db.xml:tt_content.tx_t3responsive_hidden'
					)
				)
			),
	)
);

$GLOBALS['TCA']['pages']['palettes']['page_visibility_resp'] = array(
	'showitem' => 'tx_t3responsive_hidexs;;,tx_t3responsive_hidesm;;,tx_t3responsive_hidemd;;,tx_t3responsive_hidelg;;',
	'canNotCollapse' => 1
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $tempColumns);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
	'pages', 
	'--palette--;LLL:EXT:t3responsive/locallang_db.xml:tt_content.tx_t3responsive_hide;page_visibility_resp', 
	'', 
	'after:nav_hide'
);

// -----------------------------------------------------------------------
// Diverses
// -----------------------------------------------------------------------

// Auch SVGs beim Upload-Feld erlauben
$GLOBALS['TCA']['pages']['columns']['media']['config']['allowed'] .= ',svg';


	
?>