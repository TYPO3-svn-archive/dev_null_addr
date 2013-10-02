<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

t3lib_extMgm::addLLrefForTCAdescr('tx_devnulladdr_address',       'EXT:dev_null_addr/Resources/Private/CSH/locallang_csh_tx_devnulladdr_address.xml');
t3lib_extMgm::addLLrefForTCAdescr('tx_devnulladdr_org_legal',     'EXT:dev_null_addr/Resources/Private/CSH/locallang_csh_tx_devnulladdr_org_legal.xml');
t3lib_extMgm::addLLrefForTCAdescr('tx_devnulladdr_org_type',      'EXT:dev_null_addr/Resources/Private/CSH/locallang_csh_tx_devnulladdr_org_type.xml');
t3lib_extMgm::addLLrefForTCAdescr('tx_devnulladdr_contact',       'EXT:dev_null_addr/Resources/Private/CSH/locallang_csh_tx_devnulladdr_contact.xml');
t3lib_extMgm::addLLrefForTCAdescr('tx_devnulladdr_contact_perm',  'EXT:dev_null_addr/Resources/Private/CSH/locallang_csh_tx_devnulladdr_contact_perm.xml');
t3lib_extMgm::addLLrefForTCAdescr('tx_devnulladdr_occupation',    'EXT:dev_null_addr/Resources/Private/CSH/locallang_csh_tx_devnulladdr_occupation.xml');

t3lib_extMgm::addLLrefForTCAdescr('tx_devnulladdr_addr_status',   'EXT:dev_null_addr/Resources/Private/CSH/locallang_csh_tx_devnulladdr_addr_status.xml');
t3lib_extMgm::addLLrefForTCAdescr('tx_devnulladdr_addr_title',    'EXT:dev_null_addr/Resources/Private/CSH/locallang_csh_tx_devnulladdr_addr_title.xml');

t3lib_extMgm::addLLrefForTCAdescr('tt_content.pi_flexform.dev_null_addr_pi1.list', 'EXT:dev_null_addr/pi1/locallang_csh_flexform.xml');

$TCA['tx_devnulladdr_address'] = Array (
	'ctrl' => Array (
		'title' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address',
		'label' => 'label',
		'label_alt' => 'name, first_name, locality',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'type' => 'type',
		'default_sortby' => 'ORDER BY label',
		'delete' => 'deleted',
		'enablecolumns' => Array (
			'disabled' => 'hidden',
		),
		'dividers2tabs' => 1,
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY)."Configuration/TCA/tca_devnulladdr_address.php",
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY)."Resources/Public/Icons/icon_tx_devnulladdr_address.png",
		'typeicon_column' => 'type',
		'typeicons' => Array (
			'0' => t3lib_extMgm::extRelPath($_EXTKEY)."Resources/Public/Icons/icon_tx_devnulladdr_addr_type_0.png",
			'1' => t3lib_extMgm::extRelPath($_EXTKEY)."Resources/Public/Icons/icon_tx_devnulladdr_addr_type_1.png",
			'2' => t3lib_extMgm::extRelPath($_EXTKEY)."Resources/Public/Icons/icon_tx_devnulladdr_addr_type_2.png",
		),
		'fe_cruser_id' => 'fe_user',
		'canNotCollapse' => '1',
		'requestUpdate' => 'po_no_number',
	),
	'feInterface' => Array (
		'fe_admin_fieldList' => 'type, label, status, title, first_name, last_name, street, postal_code, locality, country, po_number, po_postal_code, image, birth_date, death_date, gender, marital_status, nationality, religion, mother_tongue, preferred_language',
	),
);

$TCA['tx_devnulladdr_contact'] = Array (
	'ctrl' => Array (
		'title' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_contact.xml:tx_devnulladdr_contact',
		'label' => 'label',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'type' => 'type',
		'default_sortby' => 'ORDER BY label',
		'delete' => 'deleted',
		'canNotCollapse' => 1,
		'enablecolumns' => Array (
			'disabled' => 'hidden',
		),
		'hideTable' => 1,
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY)."Configuration/TCA/tca_devnulladdr_contact.php",
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY)."Resources/Public/Icons/icon_tx_devnulladdr_contact.png",
		'typeicon_column' => 'type',
		'typeicons' => Array (
			'0' => t3lib_extMgm::extRelPath($_EXTKEY)."Resources/Public/Icons/icon_tx_devnulladdr_contact_phone.png",
			'1' => t3lib_extMgm::extRelPath($_EXTKEY)."Resources/Public/Icons/icon_tx_devnulladdr_contact_mobile.png",
			'2' => t3lib_extMgm::extRelPath($_EXTKEY)."Resources/Public/Icons/icon_tx_devnulladdr_contact_fax.png",
			'3' => t3lib_extMgm::extRelPath($_EXTKEY)."Resources/Public/Icons/icon_tx_devnulladdr_contact_email.png",
			'4' => t3lib_extMgm::extRelPath($_EXTKEY)."Resources/Public/Icons/icon_tx_devnulladdr_contact_url.png",
		),
	),
);

$TCA['tx_devnulladdr_occupation'] = Array (
	'ctrl' => Array (
		'title' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_occupation.xml:tx_devnulladdr_occupation',
		'label' => 'oc_short',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'sortby' => 'sorting',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY)."Configuration/TCA/tca_devnulladdr_occupation.php",
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY)."Resources/Public/Icons/icon_tx_devnulladdr_occupation.png",
	),
);

$TCA['tx_devnulladdr_org_legal'] = Array (
	'ctrl' => Array (
		'title' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_org_legal.xml:tx_devnulladdr_org_legal',
		'label' => 'lf_short',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'sortby' => 'sorting',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY)."Configuration/TCA/tca_devnulladdr_org_legal.php",
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY)."Resources/Public/Icons/icon_tx_devnulladdr_org_legal.png",
	),
);

$TCA['tx_devnulladdr_org_type'] = Array (
	'ctrl' => Array (
		'title' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_org_type.xml:tx_devnulladdr_org_type',
		'label' => 'ot_short',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'sortby' => 'sorting',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY)."Configuration/TCA/tca_devnulladdr_org_type.php",
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY)."Resources/Public/Icons/icon_tx_devnulladdr_org_type.png",
	),
);

$TCA['tx_devnulladdr_contact_perm'] = Array (
	'ctrl' => Array (
		'title' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_contact_perm.xml:tx_devnulladdr_contact_perm',
		'label' => 'cp_short',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'sortby' => 'sorting',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY)."Configuration/TCA/tca_devnulladdr_contact_perm.php",
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY)."Resources/Public/Icons/icon_tx_devnulladdr_contact_perm.png",
	),
);

$TCA['tx_devnulladdr_addr_status'] = Array (
	'ctrl' => Array (
		'title' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_addr_status.xml:tx_devnulladdr_addr_status',
		'label' => 'st_short',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'sortby' => 'sorting',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY)."Configuration/TCA/tca_devnulladdr_addr_status.php",
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY)."Resources/Public/Icons/icon_tx_devnulladdr_addr_status.png",
	),
);

$TCA['tx_devnulladdr_addr_title'] = Array (
	'ctrl' => Array (
		'title' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_addr_title.xml:tx_devnulladdr_addr_title',
		'label' => 'ti_short',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'sortby' => 'sorting',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY)."Configuration/TCA/tca_devnulladdr_addr_title.php",
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY)."Resources/Public/Icons/icon_tx_devnulladdr_addr_title.png",
	),
);

$TCA['tx_devnulladdr_map_layers'] = Array (
	'ctrl' => Array (
		'title' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_layers.xml:tx_devnulladdr_layers',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY title',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY)."Configuration/TCA/tca_devnulladdr_map_layers.php",
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY)."Resources/Public/Icons/icon_tx_devnulladdr_map_layers.png",
		'dividers2tabs' => 1,
		'canNotCollapse' => '1',
	),
);

$TCA['tx_devnulladdr_map_icon_file'] = Array (
	'ctrl' => Array (
		'title' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_map_icon_file.xml:tx_devnulladdr_map_icon_file',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY title',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY)."Configuration/TCA/tca_devnulladdr_map_icon_file.php",
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY)."Resources/Public/Icons/icon_tx_devnulladdr_map_icon_file.png",
		'dividers2tabs' => 1,
		'canNotCollapse' => '1',
	),
);

$TCA['tx_devnulladdr_kml_file'] = Array (
	'ctrl' => Array (
		'title' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_kml_file.xml:tx_devnulladdr_kml_file',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY title',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY)."Configuration/TCA/tca_devnulladdr_kml_file.php",
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY)."Resources/Public/Icons/icon_tx_devnulladdr_kml_file.png",
		'type' => 'type',
	),
);

t3lib_div::loadTCA('tt_content');
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY.'_pi1'] = 'layout,select_key,pages,recursive';

// you add pi_flexform to be renderd when your plugin is shown
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY.'_pi1']='pi_flexform';

t3lib_extMgm::addPlugin(array(
    'LLL:EXT:dev_null_addr/locallang.xml:tt_content.list_type_pi1',
    $_EXTKEY . '_pi1',
    t3lib_extMgm::extRelPath($_EXTKEY) . 'pi1/ce_wiz.png'
),'list_type');

// now, add your flexform xml-file
t3lib_extMgm::addPiFlexFormValue($_EXTKEY.'_pi1', 'FILE:EXT:'.$_EXTKEY.'/pi1/flexform_ds_pi1.xml');
 
if (TYPO3_MODE === 'BE') {
	$TBE_MODULES_EXT['xMOD_db_new_content_el']['addElClasses']['tx_devnulladdr_pi1_wizicon'] = t3lib_extMgm::extPath($_EXTKEY) . 'pi1/class.tx_devnulladdr_pi1_wizicon.php';
}

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/Static/dev_null_addr/', 'dev/null Addresses');

?>