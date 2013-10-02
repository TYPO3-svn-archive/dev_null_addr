<?php

if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_devnulladdr_contact'] = Array (
	'ctrl' => $TCA['tx_devnulladdr_contact']['ctrl'],
	'interface' => Array (
		'showRecordFieldList' => 'type,label,nature,standard,country,area_code,number,extension,email,url,remarks,uid_foreign'
	),
	'columns' => Array (
		'hidden' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => Array (
				'type' => 'check',
				'default' => '0',
				'size' => '1',
			)
		),
		'uid_foreign' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_contact.xml:tx_devnulladdr_contact.uid_foreign',
			'config' => Array (
				'type' => 'passthrough',
				'size' => '3',
			)
		),
		'type' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_contact.xml:tx_devnulladdr_contact.type',
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					Array('LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_contact.xml:tx_devnulladdr_contact.type.I.0', '0', t3lib_extMgm::extRelPath('dev_null_addr').'Resources/Public/Icons/selicon_tx_devnulladdr_contact_type_0.png'),
					Array('LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_contact.xml:tx_devnulladdr_contact.type.I.1', '1', t3lib_extMgm::extRelPath('dev_null_addr').'Resources/Public/Icons/selicon_tx_devnulladdr_contact_type_1.png'),
					Array('LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_contact.xml:tx_devnulladdr_contact.type.I.2', '2', t3lib_extMgm::extRelPath('dev_null_addr').'Resources/Public/Icons/selicon_tx_devnulladdr_contact_type_2.png'),
					Array('LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_contact.xml:tx_devnulladdr_contact.type.I.3', '3', t3lib_extMgm::extRelPath('dev_null_addr').'Resources/Public/Icons/selicon_tx_devnulladdr_contact_type_3.png'),
					Array('LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_contact.xml:tx_devnulladdr_contact.type.I.4', '4', t3lib_extMgm::extRelPath('dev_null_addr').'Resources/Public/Icons/selicon_tx_devnulladdr_contact_type_4.png'),
				),
				'size' => 1,
				'maxitems' => 1,
			)
		),
		'nature' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_contact.xml:tx_devnulladdr_contact.nature',
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					Array('LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_contact.xml:tx_devnulladdr_contact.nature.I.0', '0'),
					Array('LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_contact.xml:tx_devnulladdr_contact.nature.I.1', '1'),
				),
				'size' => 1,
				'maxitems' => 1,
			)
		),
		'standard' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_contact.xml:tx_devnulladdr_contact.standard',
			'config' => Array (
				'type' => 'check',
				'size' => 1,
				'default' => 1,
			)
		),
		'label' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_contact.xml:tx_devnulladdr_contact.label',
			'config' => Array (
				'type' => 'none',
				'size' => 50,
			)
		),
		'country' => Array (
			'exclude' => 1,
			'displayCond' => 'EXT:static_info_tables:LOADED:true',
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_contact.xml:tx_devnulladdr_contact.country',
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					Array('',0),
				),
				'itemsProcFunc' => 'tx_staticinfotables_div->selectItemsTCA',
				'itemsProcFunc_config' => array (
					'table' => 'static_countries',
					'indexField' => 'uid',
					'prependHotlist' => 1,
					'hotlistLimit' => 5,
					'hotlistApp' => 'tx_devnulladdr',
				),
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
		'area_code' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_contact.xml:tx_devnulladdr_contact.area_code',
			'config' => Array (
				'type' => 'input',
				'size' => '8',
				'max' => '8',
			)
		),
		'number' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_contact.xml:tx_devnulladdr_contact.number',
			'config' => Array (
				'type' => 'input',
				'size' => '16',
				'max' => '16',
				'eval' => 'required',
			)
		),
		'extension' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_contact.xml:tx_devnulladdr_contact.extension',
			'config' => Array (
				'type' => 'input',
				'size' => '8',
				'max' => '8',
			)
		),
		'email' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_contact.xml:tx_devnulladdr_contact.email',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
				'max' => '100',
				'eval' => 'trim, required',
			)
		),
		'url' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_contact.xml:tx_devnulladdr_contact.url',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
				'max' => '100',
				'eval' => 'trim, required',
			)
		),
		'remarks' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_contact.xml:tx_devnulladdr_contact.remarks',
			'config' => Array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
				'size' => '200',
			)
		),
	),
	'types' => Array (
		'0' => Array('showitem' => '--palette--;;pContact;;1-1-1, --palette--;;pPhone;;1-1-1, --palette--;;pRemarks;;1-1-1'),
		'1' => Array('showitem' => '--palette--;;pContact;;1-1-1, --palette--;;pMobile;;1-1-1, --palette--;;pRemarks;;1-1-1'),
		'2' => Array('showitem' => '--palette--;;pContact;;1-1-1, --palette--;;pPhone;;1-1-1, --palette--;;pRemarks;;1-1-1'),
		'3' => Array('showitem' => '--palette--;;pContact;;1-1-1, email;;;;1-1-1, --palette--;;pRemarks;;1-1-1'),
		'4' => Array('showitem' => '--palette--;;pContact;;1-1-1, url;;;;1-1-1, --palette--;;pRemarks;;1-1-1'),
	),
	'palettes' => Array (
		'pContact' => Array('showitem' => 'type, nature, standard, hidden'),
		'pPhone' => Array('showitem' => 'country, --linebreak--, area_code, number, extension'),
		'pMobile' => Array('showitem' => 'country, --linebreak--, area_code, number'),
		'pEmail' => Array('showitem' => 'email'),
		'pUrl' => Array('showitem' => 'url'),
		'pRemarks' => Array('showitem' => 'remarks'),
	)
);

?>