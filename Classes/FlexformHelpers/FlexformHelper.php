<?php
namespace Nn\T3responsive\FlexformHelpers;


class FlexformHelper extends \TYPO3\CMS\Fluid\ViewHelpers\CObjectViewHelper {

	/**
	 * Bootstrap Breakpoints als Auswahl-Liste bereitsstellen
	 *
	 */
	 
	public function addBootstrapBreakpointOptions($config, $a = null) {
		$config['items'] = array_merge( $config['items'], array( 
			array('Alle', 'all', ''),
			array('Smartphone (xs: ≤ 768px)', 'xs', ''),
			array('Tablet (sm: ≥ 768px)', 'sm', ''),			
			array('Desktop (md: ≥ 992px)', 'md', ''),			
			array('Wide Desktop (lg: ≥ 1200px)', 'lg', '')			
		));
		return $config;
	}
	
	public function addNumericOptions($config, $a = null) {
		
		if ($config['config']['addNumericOptions.step']) {
			$tmp = array();
			for ($i = $config['config']['addNumericOptions.from']; $i <= $config['config']['addNumericOptions.to']; $i+=$config['config']['addNumericOptions.step']) {
				$tmp[] = array("{$i}{$config['config']['addNumericOptions.units']}", $i);
			}
		}
		
		$opt = $this->addOptions($config, $a);		
		if ($tmp) $config['items'] = array_merge( $config['items'], $tmp );
		
		return $config;
	}
	
	
	public function addOptions( &$config, $a = null) {

		$tmp = array();
		
		if ($config['config']['addEmptyOption']) $tmp[] = array('','', '');
		
		$obj = json_decode($config['config']['addOptions'], true);
		
		if ($obj) {
			foreach ($obj as $k=>$v) {
				$tmp[] = array( $v, $k, '');
			}
		}
		
		if ($tmp) $config['items'] = array_merge( $config['items'], $tmp );
	}
	
}
