<?php

if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_devnulladdr_kml_file'] = Array (
	'ctrl' => $TCA['tx_devnulladdr_kml_file']['ctrl'],
	'interface' => Array (
		'showRecordFieldList' => 'title,kml_file,kml_url,kml_suppress'
	),
	'columns' => Array (
		"title" => array (
			"exclude" => 1,
			"label" => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_kml_file.xml:tx_devnulladdr_kml_file.title',
			"config" => array (
				"type" => "input",
				"size" => "30",
				"required" => "1",
				"eval" => "trim, required",
			),
		),
		'type' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.type',
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					Array('LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_kml_file.xml:tx_devnulladdr_kml_file.type.I.0', '0'),
					Array('LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_kml_file.xml:tx_devnulladdr_kml_file.type.I.1', '1'),
				),
				'size' => 1,
				'maxitems' => 1,
			)
		),
		'kml_file' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_kml_file.xml:tx_devnulladdr_kml_file.kml_file',
			'config' => Array (
				'type' => 'group',
				'internal_type' => 'file_reference',
				'allowed' => 'kml',
				'size' => '1',
				'maxitems' => '1',
				'minitems' => '1',
				'eval' => 'required',
			),
		),
		'kml_url' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_kml_file.xml:tx_devnulladdr_kml_file.kml_url',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
				'max' => '100',
				'eval' => 'trim, required',
			)
		),
		'kml_suppress' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_kml_file.xml:tx_devnulladdr_kml_file.kml_suppress',
			'config' => Array (
				'type' => 'check',
			)
		),
		'kml_preserve' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_kml_file.xml:tx_devnulladdr_kml_file.kml_preserve',
			'config' => Array (
				'type' => 'check',
			)
		),
	),
	'types' => Array (
		'0' => Array('showitem' => 'title;;;;1-1-1, type, kml_file, kml_suppress, kml_preserve'),
		'1' => Array('showitem' => 'title;;;;1-1-1, type, kml_url, kml_suppress, kml_preserve'),
	),
	'palettes' => Array (
		'1' => Array('showitem' => '')
	)
);
?>