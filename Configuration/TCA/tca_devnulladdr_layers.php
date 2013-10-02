<?php

if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_devnulladdr_layers'] = Array (
	'ctrl' => $TCA['tx_devnulladdr_layers']['ctrl'],
	'interface' => Array (
		'showRecordFieldList' => 'title,addresses'
	),
	'columns' => Array (
		'title' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_layers.xml:tx_devnulladdr_layers.title',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
				'max' => '30',
				'eval' => 'trim, required',
			)
		),
		'addresses' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_layers.xml:tx_devnulladdr_layers.addresses',
			'config' => Array (
				'type' => 'group',
				'internal_type' => 'db',
				'allowed' => 'tx_devnulladdr_address',
				'MM' => 'tx_devnulladdr_layers_mm',
				'MM_match_fields' => array('matchfield' => 'tx_devnulladdr_layers'),
				'MM_insert_fields' => array(
					'tablenames' => 'tx_devnulladdr_address',
					'matchfield' => 'tx_devnulladdr_layers',
				),
				/*
				<foreign_table_where>
					AND (tx_gomapsap_adress.pid=###CURRENT_PID### 
					OR tx_gomapsap_adress.pid=###STORAGE_PID###
					OR tx_gomapsap_adress.pid=###PAGE_TSCONFIG_ID###
					OR tx_gomapsap_adress.pid IN (###PAGE_TSCONFIG_IDLIST###))
				</foreign_table_where>
				*/
				'size' => '10',
				'minitems' => '1',
				'maxitems' => '99',
				'multiple' => '0',
				'eval' => 'required',
				'show_thumbs' => '1',
				'wizards' => Array(
					'suggest' => array(
						'type' => 'suggest',
					),
				),
			)
		),
	),
	'types' => Array (
		'0' => Array('showitem' => 'title;;;;1-1-1, addresses')
	),
	'palettes' => Array (
		'1' => Array('showitem' => ''),
	)
);


?>