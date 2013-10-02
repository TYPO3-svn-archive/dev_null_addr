<?php

if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_devnulladdr_contact_perm'] = Array (
	'ctrl' => $TCA['tx_devnulladdr_contact_perm']['ctrl'],
	'interface' => Array (
		'showRecordFieldList' => 'cp_short,cp_descr'
	),
	'columns' => Array (
		'cp_short' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_contact_perm.xml:tx_devnulladdr_contact_perm.cp_short',
			'config' => Array (
				'type' => 'input',
				'size' => '16',
				'max' => '32',
				'eval' => 'trim, required',
			)
		),
		'cp_descr' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_contact_perm.xml:tx_devnulladdr_contact_perm.cp_descr',
			'config' => Array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
				'size' => '200',
			)
		),
	),
	'types' => Array (
		'0' => Array('showitem' => 'cp_short,cp_descr')
	),
	'palettes' => Array (
		'1' => Array('showitem' => 'cp_short, --linebreak--, cp_descr')
	)
);

?>