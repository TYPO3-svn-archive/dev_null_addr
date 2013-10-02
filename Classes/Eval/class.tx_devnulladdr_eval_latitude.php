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
 * Class with methods called for evaluation in BE forms
 *
 * @package	TYPO3
 * @subpackage	tx_devnulladdr
 */
class tx_devnulladdr_eval_latitude {
	function returnFieldJS() {
		return("
		if (-90 <= value && value <= 90)
			return value;
		else
			return '';
		");
	}

	function evaluateFieldValue($value, $is_in, &$set) {
		return(sprintf('%01.8f', $value));
	}
} 
?>