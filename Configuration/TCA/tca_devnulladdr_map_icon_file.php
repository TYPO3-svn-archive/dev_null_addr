<?php

if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_devnulladdr_map_icon_file'] = Array (
	'ctrl' => $TCA['tx_devnulladdr_map_icon_file']['ctrl'],
	'interface' => Array (
		'showRecordFieldList' => 'title,addresses'
	),
	'columns' => Array (
		'title' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_map_icon_file.xml:tx_devnulladdr_map_icon_file.title',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
				'max' => '30',
				'eval' => 'trim, required',
			)
		),
		'icon_file' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_map_icon_file.xml:tx_devnulladdr_map_icon_file.icon_file',
			'config' => Array (
				'type' => 'group',
				'internal_type' => 'file_reference',
				'allowed' => 'gif,png',
				'show_thumbs' => '1',
				'size' => '1',
				'minitems' => '0',
				'maxitems' => '1',
				'uploadfolder' => 'uploads/tx_devnulladdr_map_icon',
			)
		),
		'anchor_x' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_map_icon_file.xml:tx_devnulladdr_map_icon_file.anchor_x',
			'config' => Array (
				'type' => 'input',
				'size' => '8',
				'max' => '8',
				'eval' => 'int,null',
			)
		),
		'anchor_y' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_map_icon_file.xml:tx_devnulladdr_map_icon_file.anchor_y',
			'config' => Array (
				'type' => 'input',
				'size' => '8',
				'max' => '8',
				'eval' => 'int,null',
			)
		),
	),
	'types' => Array (
		'0' => Array('showitem' => '
			--palette--;;pHeader;;1-1-1,
			--palette--;;pFile;;1-1-1,
			--palette--;;pAnchor'
		),
	),
	'palettes' => Array (
		'1' => Array('showitem' => ''),
		'pHeader' => Array('showitem' => 'title'),
		'pFile' => Array('showitem' => 'icon_file'),
		'pAnchor' => Array('showitem' => 'anchor_x, anchor_y'),
	)
);


?>