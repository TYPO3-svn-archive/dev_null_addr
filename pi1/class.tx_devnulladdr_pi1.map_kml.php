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
 * Plugin 'dev/null Google maps - jscript' for the 'dev_null_addr' extension.
 *
 * @author	W. Rotschek <typo3@dev-null.at>
 * @package	TYPO3
 * @subpackage	tx_devnulladdr
 */
 class tx_devnulladdr_pi1_mapkml extends tslib_pibase {
	public $prefixId      = 'tx_devnulladdr';		// Same as class name
	public $scriptRelPath = 'pi1/class.tx_devnulladdr_pi1.map_kml.php';	// Path to this script relative to the extension dir.
	public $extKey        = 'dev_null_addr';	// The extension key.
	public $pi_checkCHash = FALSE;
	
	private $uidMap = 0;
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
		$this->pi_USER_INT_obj=1;
		
		$this->uidMap = $this->cObj->data['uid'];
		
		// init Flexform values
		$this->init();
		
		// return $content = t3lib_utility_Debug::viewArray($this->conf);
		// $content .= t3lib_utility_Debug::viewArray($this->cObj->data);
		// return t3lib_utility_Debug::viewArray($this->lConf);
		
		// defaults
		$latitude	= $this->lConf['sDEF.latitude']		? $this->lConf['sDEF.latitude'] : 0;
		$longitude	= $this->lConf['sDEF.longitude']	? $this->lConf['sDEF.longitude'] : 0;
		$zoom		= $this->lConf['sDEF.zoom']			? $this->lConf['sDEF.zoom'] : 8;
		
		// template file
		$template = $this->conf['resources.']['mapKml.']['template'];
		
		$templateCode = $this->cObj->fileResource($template);
				
		$subParts['map']	= $this->cObj->getSubpart($templateCode, '###MAP_SCRIPT###');
		$subParts['icon']	= $this->cObj->getSubpart($templateCode, '###MAP_ICON###');
		$subParts['kml']	= $this->cObj->getSubpart($templateCode, '###KML_FILE###');
		$subParts['marker']	= $this->cObj->getSubpart($templateCode, '###MAP_DEFAULT_MARKER###');
		$subParts['custom']	= $this->cObj->getSubpart($templateCode, '###MAP_CUSTOM_MARKER###');
		$subParts['info']	= $this->cObj->getSubpart($templateCode, '###INFO_WINDOW###');

		// Prepare select statement for tx_devnulladdr_map_layers->tx_devnulladdr_address list->tx_devnulladdr_map_icon_file
		$dbIconFields = 'distinct tx_devnulladdr_map_icon_file.*';
		
		$dbIconTables = '
			tx_devnulladdr_map_layers_mm inner join tx_devnulladdr_map_layers
				on tx_devnulladdr_map_layers_mm.uid_foreign = tx_devnulladdr_map_layers.uid
			inner join tx_devnulladdr_map_layers_mm as layer_mm
				on tx_devnulladdr_map_layers_mm.uid_foreign = layer_mm.uid_local and
					layer_mm.matchfield = :table
			inner join tx_devnulladdr_address
			   on layer_mm.uid_foreign = tx_devnulladdr_address.uid
			inner join tx_devnulladdr_map_icon_file
				on tx_devnulladdr_address.map_icon = tx_devnulladdr_map_icon_file.uid
		';
		
		$dbIconWhere = implode(' AND ', array(
				'tx_devnulladdr_map_layers_mm.matchfield = :ident',
				'tx_devnulladdr_map_layers_mm.tablenames = :table',
				'tx_devnulladdr_map_layers_mm.uid_local = :uid',
		));

		$sqlAddr = $GLOBALS['TYPO3_DB']->prepare_SELECTquery($dbIconFields, $dbIconTables, $dbIconWhere, '', '');
		
		$sqlAddr->execute(array(
			':uid' => $this->uidMap,
			':ident' => 'tx_devnulladdr_pi1',
			':table' => 'tx_devnulladdr_map_layers'
		));

		while($rowIcon = $sqlAddr->fetch()){
			// $content .= t3lib_div::getFileAbsFileName($row2['kml_file']) . '<br />';
			// $content .= t3lib_div::getIndpEnv('TYPO3_REQUEST_HOST') . '<br />';
			// $content .= t3lib_utility_Debug::viewArray($row2);
			$markers = array(
				'###MAP_UID###' => $this->uidMap,
				'###ICON_UID###' => $rowIcon['uid'],
				'###ICON_URL###' => $this->cObj->typoLink_URL(array('parameter' => $rowIcon['icon_file'])),
			);
			$script .= $this->cObj->substituteMarkerArray($subParts['icon'], $markers);
		}

		$sqlAddr->free();
		
		// Prepare select statement for tx_devnulladdr_map_layers->tx_devnulladdr_address list
		$dbAddrFields = 'distinct tx_devnulladdr_address.*';
		
		$dbAddrTables = '
			tx_devnulladdr_map_layers_mm inner join tx_devnulladdr_map_layers
				on tx_devnulladdr_map_layers_mm.uid_foreign = tx_devnulladdr_map_layers.uid
			inner join tx_devnulladdr_map_layers_mm as layer_mm
				on tx_devnulladdr_map_layers_mm.uid_foreign = layer_mm.uid_local and
					layer_mm.matchfield = :table
			inner join tx_devnulladdr_address
			   on layer_mm.uid_foreign = tx_devnulladdr_address.uid
		';
		
		$dbAddrWhere = implode(' AND ', array(
				'tx_devnulladdr_map_layers_mm.matchfield = :ident',
				'tx_devnulladdr_map_layers_mm.tablenames = :table',
				'tx_devnulladdr_map_layers_mm.uid_local = :uid',
		));

		$sqlAddr = $GLOBALS['TYPO3_DB']->prepare_SELECTquery($dbAddrFields, $dbAddrTables, $dbAddrWhere, '', '');
		
		$sqlAddr->execute(array(
			':uid' => $this->uidMap,
			':ident' => 'tx_devnulladdr_pi1',
			':table' => 'tx_devnulladdr_map_layers'
		));

		while($rowMarker = $sqlAddr->fetch()){
			// $content .= t3lib_div::getFileAbsFileName($row2['kml_file']) . '<br />';
			// $content .= t3lib_div::getIndpEnv('TYPO3_REQUEST_HOST') . '<br />';
			// $content .= t3lib_utility_Debug::viewArray($row2);
			$markers = array(
				'###MAP_UID###' => $this->uidMap,
				'###KML_UID###' => $rowMarker['uid'],
				'###MARKER_LAT###' => $rowMarker['latitude'],
				'###MARKER_LON###' => $rowMarker['longitude'],
				'###MARKER_TITLE###' => addslashes($rowMarker['label']),
				'###MARKER_UID###' => $rowMarker['uid'],
				'###ICON_UID###' => $rowMarker['map_icon'],
				'###CONTENT_STRING###' => addslashes($this->cObj->stdWrap(
					$rowMarker['marker_text'], $this->conf['maps.']['infoWindow_stdWrap.'])),
			);

			if($rowMarker['map_icon']) {
				$script .= $this->cObj->substituteMarkerArray($subParts['custom'], $markers);
			} else {
				$script .= $this->cObj->substituteMarkerArray($subParts['marker'], $markers);
			}
			
			if($markers['###CONTENT_STRING###']) {
				$script .= $this->cObj->substituteMarkerArray($subParts['info'], $markers);
			}
		}

		$sqlAddr->free();
		
		$markers = array(
			'###MAP_UID###' => $this->uidMap,
			'###MAP_CONTENT###' => $script,
			'###LATITUDE###' => $latitude,
			'###LONGITUDE###' => $longitude,
			'###MAP_ZOOM###' => $zoom,
		);
		
		$content = $this->cObj->substituteMarkerArray($subParts['map'], $markers);

		return $content;

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

	private function linkJsParams($params) {
		
		$js = array();
		
		foreach ($params as $key => $val) {
			$js[] = '        '.$key.': '.$val;
		}
		
		return implode(",\n", $js);
	}
}


if (defined('TYPO3_MODE') && isset($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/dev_null_addr/pi1/class.tx_devnulladdr_pi1.map_kml.php'])) {
	include_once($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/dev_null_addr/pi1/class.tx_devnulladdr_pi1.map_kml.php']);
}

?>