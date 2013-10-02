<?php

if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_devnulladdr_org_legal'] = Array (
	'ctrl' => $TCA['tx_devnulladdr_org_legal']['ctrl'],
	'interface' => Array (
		'showRecordFieldList' => 'lf_short,lf_descr'
	),
	'columns' => Array (
		'lf_short' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_org_legal.xml:tx_devnulladdr_org_legal.lf_abbr',
			'config' => Array (
				'type' => 'input',
				'size' => '16',
				'max' => '32',
				'eval' => 'required',
			)
		),
		'lf_descr' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_org_legal.xml:tx_devnulladdr_org_legal.lf_descr',
			'config' => Array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
				'size' => '200',
			)
		),
	),
	'types' => Array (
		'0' => Array('showitem' => 'lf_short;;;;1-1-1, lf_descr')
	),
	'palettes' => Array (
		'1' => Array('showitem' => '')
	)
);
?>