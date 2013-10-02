<?php

if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_devnulladdr_addr_status'] = Array (
	'ctrl' => $TCA['tx_devnulladdr_addr_status']['ctrl'],
	'interface' => Array (
		'showRecordFieldList' => 'st_short,st_descr'
	),
	'columns' => Array (
		'st_short' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_addr_status.xml:tx_devnulladdr_addr_status.st_short',
			'config' => Array (
				'type' => 'input',
				'size' => '16',
				'max' => '32',
				'eval' => 'trim, required',
			)
		),
		'st_descr' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_addr_status.xml:tx_devnulladdr_addr_status.st_descr',
			'config' => Array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
				'size' => '200',
			)
		),
	),
	'types' => Array (
		'0' => Array('showitem' => '--palette--;;1;;1-1-1')
	),
	'palettes' => Array (
		'1' => Array('showitem' => 'st_short,--linebreak--, st_descr')
	)
);

?>