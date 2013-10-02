<?php

if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_devnulladdr_occupation'] = Array (
	'ctrl' => $TCA['tx_devnulladdr_occupation']['ctrl'],
	'interface' => Array (
		'showRecordFieldList' => 'oc_short,oc_descr'
	),
	'columns' => Array (
		'oc_short' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_occupation.xml:tx_devnulladdr_occupation.oc_short',
			'config' => Array (
				'type' => 'input',
				'size' => '16',
				'max' => '32',
				'eval' => 'required',
			)
		),
		'oc_descr' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_occupation.xml:tx_devnulladdr_occupation.oc_descr',
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
		'1' => Array('showitem' => 'oc_short,--linebreak--,oc_descr')
	)
);

?>