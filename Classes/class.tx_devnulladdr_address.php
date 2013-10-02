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

class tx_devnulladdr_address {

   function label_userFunc(&$params, $pObj) {
   
		$record = t3lib_BEfunc::getRecord($params['table'], $params['row']['uid']);
		
		$params['title'] = tx_devnulladdr_address::getLabel($record);

     }

    function getLabel($record) {
   
		if ($record['type'] == 0) {
				// Label for a person
			$label = $record['name'];
			if ($record['first_name']) 
				$label.= ', '.$record['first_name'];
		} else {
				// Label for an organization or POI
			$label = $record['name'];
		}

			// Add locality if filled
		if ($record['locality']) 
			$label .= ' - '.$record['locality'];

		return $label;

    }
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/dev_null_addr/api/class.tx_devnulladdr_address.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/dev_null_addr/api/class.tx_devnulladdr_address.php']);
}

?>
