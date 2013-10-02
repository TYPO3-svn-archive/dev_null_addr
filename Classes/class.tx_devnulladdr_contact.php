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

class tx_devnulladdr_contact {

   function label_userFunc(&$params, $pObj) {
   
		$record = t3lib_BEfunc::getRecord($params['table'], $params['row']['uid']);
		
		$params['title'] = tx_devnulladdr_contact::getLabel($record);

     }

	function getLabel($record) {
   
		// Get the 'standard' flag
		if ($record['standard']) {
			$standard = '* ';
		}
		
			// Get the international phone prefix
		if ($record['country'] != '') {
			if (t3lib_extMgm::isLoaded('static_info_tables')) {
				$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('cn_phone','static_countries','uid='.$record['country']);
				if ($res) $cn_phone_array = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res);
				if (is_array($cn_phone_array)) {
					$cn_phone = ' +'.$cn_phone_array['cn_phone'];
				}
			}
		}
		
			// Get the area code
		if ($record['area_code'] != '') {
			$area_code = ' ('.$record['area_code'].')';
		}
	
			// Get the number
		if ($record['number'] != '') {
			$number = ' '.$record['number'];
		}

			// Get the extension
		if ($record['extension'] != '') {
			$extension = '-'.$record['extension'];
		}

		switch ($record['type']) {
			case 0: // Phone
				$label = $cn_phone.$area_code.$number.$extension;
				break;

			case 1: // Mobile
				$label = $cn_phone.$area_code.$number;
				break;

			case 2: // Fax
				$label = $cn_phone.$area_code.$number.$extension;
				break;

			case 3: // E-Mail
				$label = $record['email'];
				break;

			case 4: // URL
				$label = $record['url'];
				break;
				
			default:
				$label = $record['number'];
		}

		return $label;

     }

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/dev_null_addr/api/class.tx_devnulladdr_contact.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/dev_null_addr/api/class.tx_devnulladdr_contact.php']);
}

?>
