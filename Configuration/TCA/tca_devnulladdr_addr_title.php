<?php

if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_devnulladdr_addr_title'] = Array (
	'ctrl' => $TCA['tx_devnulladdr_addr_title']['ctrl'],
	'interface' => Array (
		'showRecordFieldList' => 'ti_short,ti_descr'
	),
	'columns' => Array (
		'ti_short' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_addr_title.xml:tx_devnulladdr_addr_title.ti_short',
			'config' => Array (
				'type' => 'input',
				'size' => '16',
				'max' => '32',
				'eval' => 'trim, required',
			)
		),
		'ti_descr' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_addr_title.xml:tx_devnulladdr_addr_title.ti_descr',
			'config' => Array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
				'size' => '200',
			)
		),
	),
	'types' => Array (
		'0' => Array('showitem' => 'ti_short;;;;1-1-1, ti_descr')
	),
	'palettes' => Array (
		'1' => Array('showitem' => '')
	)
);


?>