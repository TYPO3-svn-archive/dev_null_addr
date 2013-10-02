<?php

if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_devnulladdr_org_type'] = Array (
	'ctrl' => $TCA['tx_devnulladdr_org_type']['ctrl'],
	'interface' => Array (
		'showRecordFieldList' => 'ot_short,ot_descr'
	),
	'columns' => Array (
		'ot_short' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_org_type.xml:tx_devnulladdr_org_type.ot_short',
			'config' => Array (
				'type' => 'input',
				'size' => '16',
				'max' => '32',
				'eval' => 'trim, required',
			)
		),
		'ot_descr' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_org_type.xml:tx_devnulladdr_org_type.ot_descr',
			'config' => Array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
				'size' => '200',
			)
		),
	),
	'types' => Array (
		'0' => Array('showitem' => '--palette--;Description;1;;1-1-1')
	),
	'palettes' => Array (
		'1' => Array('showitem' => 'ot_short,--linebreak--,ot_descr')
	)
);
?>