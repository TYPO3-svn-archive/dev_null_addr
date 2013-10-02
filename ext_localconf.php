<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

	// Activate Hooks in TCE-Main (processDatamapClass)
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] = 'EXT:dev_null_addr/Classes/Hooks/class.tx_devnulladdr_tcemainprocdm.php:tx_devnulladdr_tcemainprocdm';

	t3lib_extMgm::addUserTSConfig('
#		options.saveDocNew.tx_devnulladdr_address=1
	');
	
t3lib_extMgm::addPItoST43($_EXTKEY, 'pi1/class.tx_devnulladdr_pi1.php', '_pi1', 'list_type', 1);

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tce']['formevals']['tx_devnulladdr_eval_latitude'] = 'EXT:dev_null_addr/Classes/Eval/class.tx_devnulladdr_eval_latitude.php';
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tce']['formevals']['tx_devnulladdr_eval_longitude'] = 'EXT:dev_null_addr/Classes/Eval/class.tx_devnulladdr_eval_longitude.php';

?>
