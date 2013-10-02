<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 W. Rotschek <typo3@dev-null.at>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Plugin 'dev/null Google maps' for the 'dev_null_addr' extension.
 *
 * @author	W. Rotschek <typo3@dev-null.at>
 * @package	TYPO3
 * @subpackage	tx_devnulladdr
 */
class tx_devnulladdr_pi1 extends tslib_pibase {
	public $prefixId      = 'tx_devnulladdr';		// Same as class name
	public $scriptRelPath = 'pi1/class.tx_devnulladdr_pi1.php';	// Path to this script relative to the extension dir.
	public $extKey        = 'dev_null_addr';	// The extension key.
	public $pi_checkCHash = TRUE;
	
	private $uid = 0;
	private $lConf = array();
	
	/**
	 * The main method of the Plugin.
	 *
	 * @param string $content The Plugin content
	 * @param array $conf The Plugin configuration
	 * @return string The content that is displayed on the website
	 */
	public function main($content, array $conf) {
		$this->conf = $conf;
		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();
		
		$this->uid = $this->cObj->data['uid'];
		
		// init Flexform values
		$this->init();
				
		// return $content . t3lib_utility_Debug::viewArray($this->lConf);

		$pageRenderer = $GLOBALS['TSFE']->getPageRenderer();

		//get page-ID of content element
		$this->uid = $this->cObj->data['uid'];
		
		// template file
		$template = $this->lConf['sConfig.template'];
		if(empty($template))
			$template = $this->conf['resources.']['mapView.']['template'];
		
		// load template code
		$templateCode = $this->cObj->fileResource($template);
				
		$subParts['mapMap']	= $this->cObj->getSubpart($templateCode, '###MAP_MAP###');
		$subParts['mapKml']	= $this->cObj->getSubpart($templateCode, '###MAP_KML_LINK###');
		
		if(empty($template))
			return '<div style="color:red; font-weight:bold">Error: Missing template</div>';

		// append CSS Link to pageRenderer
		$pageRenderer->addJsFile($this->conf['resources.']['mapView.']['jsMapApi'], 'text/javascript', false, false, '', true);
		$pageRenderer->addJsFile($this->conf['resources.']['mapView.']['jsClusterer'], 'text/javascript', false, false, '', true);
		
		// load additional css
		// base css styles - required
		$pageRenderer->addCssFile($this->conf['resources.']['mapView.']['cssScreen']);

		// custom styles for media="print"
		if($this->conf['resources.']['mapView.']['cssPrint']) {
			$pageRenderer->addCssFile($this->conf['resources.']['mapView.']['cssPrint'], 'stylesheet', 'print');
		}

		// custom styles for media="all"
		if($this->conf['resources.']['mapView.']['cssPrint']) {
			$pageRenderer->addCssFile($this->conf['resources.']['mapView.']['cssCustom']);
		}
		
		$style = array(
			'height' => $this->lConf['sLayout.canvasHeight'],
			'width' => $this->lConf['sLayout.canvasWidth'],
		);
		
		$mapStyle = $this->renderCss('#map-canvas'.$this->uid, $style);
		$pageRenderer->addCssInlineBlock('map-canvas'.$this->uid, $mapStyle, false, false);
		
		// build link to js file generating map content
		$linkJs = $this->cObj->getTypoLink_URL(
			$GLOBALS['TSFE']->id,
		  	array(
				'type' => $this->conf['typeNum.']['mapJs'],
				'tx_devnulladdr[map]' => $this->uid,
			)
		);

		// build link to kml file holding map content
		$linkKml = $this->cObj->getTypoLink(
			$this->pi_getLL('tx_devnulladdr_p1.linklabel.kmlDownload', '???'),
			$GLOBALS['TSFE']->id,
		  	array(
				'type' => $this->conf['typeNum.']['mapKml'],
				'tx_devnulladdr[map]' => $this->uid,
			)
		);
	
		$pageRenderer->addJsFile($linkJs, 'text/javascript', FALSE, FALSE, '', TRUE);
	
		$markers = array(
			'###MAP_UID###' => $this->uid,
			'###KML_LINK###' => $linkKml,
		);

		$content .= $this->cObj->substituteMarkerArray($subParts['mapMap'], $markers);
		
		if($this->lConf['sConfig.enablekml']) {
			$content .= $this->cObj->substituteMarkerArray($subParts['mapKml'], $markers);
		}
		
		return $this->pi_wrapInBaseClass($content);

	}
	
	/**
	 * The main method of the Plugin.
	 *
	 * @param string $selector a valid css-selector
	 * @param array $params array of attributes=>values combinations
	 * @return string The css configuration that is rendered
	 */
	private function renderCss($selector, $params) {
		
		$css = array();
		
		foreach ($params as $key => $val) {
			if($val != '') {
				$css[] = sprintf("\t%s:\t%s;\n", $key, $val);
			}
		}
		
		return $selector . " {\n" . implode("\n", $css) . "}\n";
	}

	/**
	 * initializes the flexform and all config options
	 */
	private function init(){
	
		 // Init and get the flexform data of the plugin
		$this->pi_initPIflexForm();
		
		// Assign the flexform data to a local variable for easier access
		$piFlexForm = $this->cObj->data['pi_flexform'];

		// Traverse the entire array based on the language...
		// and assign each configuration option to $this->lConf array...
		foreach ( $piFlexForm['data'] as $sheet => $data ) {
			foreach ( $data as $lang => $value ) {
				foreach ( $value as $key => $val ) {
					$this->lConf[$sheet . '.' . $key] = $this->pi_getFFvalue($piFlexForm, $key, $sheet);
				}
			}
		}
	}
}


if (defined('TYPO3_MODE') && isset($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/dev_null_addr/pi1/class.tx_devnulladdr_pi1.php'])) {
	include_once($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/dev_null_addr/pi1/class.tx_devnulladdr_pi1.php']);
}

?>