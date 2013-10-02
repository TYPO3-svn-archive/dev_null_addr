<?php
$extensionPath = t3lib_extMgm::extPath('dev_null_addr');

$default = array(
		't3lib_utility_debug'				=> PATH_t3lib.'utility/class.t3lib_utility_debug.php',

        'tx_devnulladdr_address'			=> $extensionPath.'Classes/class.tx_devnulladdr_address.php',
        'tx_devnulladdr_contact'			=> $extensionPath.'Classes/class.tx_devnulladdr_contact.php',

		// BE user form content
        'user_devnulladdr_map_flex'			=> $extensionPath.'Classes/BE/user.tx_devnulladdr.map_flex.php',
        'user_devnulladdr_map_tca'			=> $extensionPath.'Classes/BE/user.tx_devnulladdr.map_tca.php',
);
return $default;
?>
