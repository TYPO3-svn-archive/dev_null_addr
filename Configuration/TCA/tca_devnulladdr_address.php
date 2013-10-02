<?php

if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

// Get the extension configuration
$confArr = unserialize($_EXTCONF);

$TCA['tx_devnulladdr_address'] = Array (
	'ctrl' => $TCA['tx_devnulladdr_address']['ctrl'],
	'interface' => Array (
		'showRecordFieldList' => 'type,label,status,contact_permission,data_source,external_id,preceding_title,title,letter_title,first_name,middle_name,last_name_prefix,name,maiden_name,general_suffix,initials,org_name,org_type,org_legal_form,department,building,floor,room,street,street_number,postal_code,locality,admin_area,country,po_number,po_no_number,po_postal_code,po_locality,po_admin_area,po_country,contact_info,formation_date,closure_date,birth_date,birth_place,death_date,death_place,gender,marital_status,nationality,mother_tongue,preferred_language,join_date,leave_date,occupation,image,fe_user'
	),
	'columns' => Array (
		'hidden' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => Array (
				'type' => 'check',
				'default' => '0',
				'size' => 1,
			)
		),
		'type' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.type',
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					Array('LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.type.I.0', '0', t3lib_extMgm::extRelPath('dev_null_addr').'Resources/Public/Icons/selicon_tx_devnulladdr_address_type_0.png'),
					Array('LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.type.I.1', '1', t3lib_extMgm::extRelPath('dev_null_addr').'Resources/Public/Icons/selicon_tx_devnulladdr_address_type_1.png'),
					Array('LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.type.I.2', '2', t3lib_extMgm::extRelPath('dev_null_addr').'Resources/Public/Icons/selicon_tx_devnulladdr_address_type_2.png'),
				),
				'size' => 1,
				'maxitems' => 1,
			)
		),
		'label' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.label',
			'config' => Array (
				'type' => 'none',
				'size' => 50,
			)
		),
		'status' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.status',
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					Array('LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_addr_status.xml:tx_devnulladdr_addr_status.I.1', -1),
					Array('LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_addr_status.xml:tx_devnulladdr_addr_status.I.0', 0),
					Array('------', '--div--'),
				),
				'foreign_table' => 'tx_devnulladdr_addr_status',
				'foreign_table_where' => 'ORDER BY tx_devnulladdr_addr_status.sorting',
				'exclusiveKeys' => '-1',
				'size' => 1,
				'minitems' => 1,
				'maxitems' => 1,
			)
		),
		'data_source' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.data_source',
			'config' => Array (
				'type' => 'input',
				'size' => '10',
				'max' => '48',
			)
		),
		'external_id' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.external_id',
			'config' => Array (
				'type' => 'input',
				'size' => '10',
				'max' => '48',
			)
		),
		'contact_permission' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.contact_permission',
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					Array('------',0),
				),
				'foreign_table' => 'tx_devnulladdr_contact_perm',
				'foreign_table_where' => 'ORDER BY tx_devnulladdr_contact_perm.sorting',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
		'image' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.image',
			'config' => Array (
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'max_size' => 500,
				'uploadfolder' => 'uploads/tx_dev_null_addr',
				'show_thumbs' => 1,
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
		'preceding_title' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.preceding_title',
			'config' => Array (
				'type' => 'input',
				'size' => '10',
				'max' => '48',
			)
		),
		'title' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.title',
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					Array('------',0),
				),
				'foreign_table' => 'tx_devnulladdr_addr_title',
				'foreign_table_where' => ($confArr['lookupsFromCurrentPageOnly'] != 0 ? 'AND tx_devnulladdr_addr_title.pid=###CURRENT_PID### ' : '' )
							.'ORDER BY tx_devnulladdr_addr_title.sorting',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
		'letter_title' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.letter_title',
			'config' => Array (
				'type' => 'input',
				'size' => '48',
				'max' => '48',
			)
		),
		'first_name' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.first_name',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
				'max' => '48',
			)
		),
		'middle_name' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.middle_name',
			'config' => Array (
				'type' => 'input',
				'size' => '10',
				'max' => '48',
			)
		),
		'last_name_prefix' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.last_name_prefix',
			'config' => Array (
				'type' => 'input',
				'size' => '10',
				'max' => '24',
			)
		),
		'name' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.name',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
				'max' => '48',
				'eval' => 'required',
			)
		),
		'maiden_name' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.maiden_name',
			'config' => Array (
				'type' => 'input',
				'size' => '10',
				'max' => '48',
			)
		),
		'general_suffix' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.general_suffix',
			'config' => Array (
				'type' => 'input',
				'size' => '10',
				'max' => '24',
			)
		),
		'initials' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.initials',
			'config' => Array (
				'type' => 'input',
				'size' => '5',
				'max' => '24',
			)
		),
		'org_name' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.org_name',
			'config' => Array (
				'type' => 'input',
				'size' => '48',
				'max' => '48',
			)
		),
		'org_type' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.org_type',
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					Array('',0),
				),
				'foreign_table' => 'tx_devnulladdr_org_type',
				'foreign_table_where' => ($confArr['lookupsFromCurrentPageOnly'] != 0 ? 'AND tx_devnulladdr_org_type.pid=###CURRENT_PID### ' : '')
							.'ORDER BY tx_devnulladdr_org_type.sorting',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
		'org_legal_form' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.org_legal_form',
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					Array('',0),
				),
				'foreign_table' => 'tx_devnulladdr_org_legal',
				'foreign_table_where' => ($confArr['lookupsFromCurrentPageOnly'] != 0 ? 'AND tx_devnulladdr_org_legal.pid=###CURRENT_PID### ' : '')
							.'ORDER BY tx_devnulladdr_org_legal.sorting',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
		'department' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.department',
			'config' => Array (
				'type' => 'input',
				'size' => '10',
				'max' => '48',
			)
		),
		'building' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.building',
			'config' => Array (
				'type' => 'input',
				'size' => '10',
				'max' => '48',
			)
		),
		'floor' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.floor',
			'config' => Array (
				'type' => 'input',
				'size' => '3',
				'max' => '48',
			)
		),
		'room' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.room',
			'config' => Array (
				'type' => 'input',
				'size' => '10',
				'max' => '48',
			)
		),
		'street' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.street',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
				'max' => '48',
			)
		),
		'street_number' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.street_number',
			'config' => Array (
				'type' => 'input',
				'size' => '4',
				'max' => '12',
			)
		),
		'postal_code' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.postal_code',
			'config' => Array (
				'type' => 'input',
				'size' => '12',
				'max' => '12',
			)
		),
		'locality' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.locality',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
				'max' => '48',
			)
		),
		'admin_area' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.admin_area',
			'config' => Array (
				'type' => 'input',
				'size' => '10',
				'max' => '48'
			)
		),
		'country' => Array (
			'exclude' => 1,
			'displayCond' => 'EXT:static_info_tables:LOADED:true',
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.country',
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
		'po_number' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.po_number',
			'displayCond' => 'FIELD:po_no_number:REQ:false',
			'config' => Array (
				'type' => 'input',
				'size' => '12',
				'max' => '12',
			)
		),
		'po_no_number' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.po_no_number',
			'config' => Array (
				'type' => 'check',
				'size' => 1,
			)
		),
		'po_postal_code' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.po_postal_code',
			'displayCond' => 'FIELD:po_no_number:REQ:false',
			'config' => Array (
				'type' => 'input',
				'size' => '12',
				'max' => '12',
			)
		),
		'po_locality' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.po_locality',
			'displayCond' => 'FIELD:po_no_number:REQ:false',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
				'max' => '48',
			)
		),
		'po_admin_area' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.po_admin_area',
			'displayCond' => 'FIELD:po_no_number:REQ:false',
			'config' => Array (
				'type' => 'input',
				'size' => '10',
				'max' => '48',
			)
		),
		'po_country' => Array (
			'exclude' => 1,
			'displayCond' => 'EXT:static_info_tables:LOADED:true',
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.po_country',
			'displayCond' => 'FIELD:po_no_number:REQ:false',
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
		'contact_info' => Array (
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.contact_info',
			'config' => Array (
				'type' => 'inline',	
                "foreign_table" => "tx_devnulladdr_contact",
                "foreign_field" => "uid_foreign",
                "maxitems" => 10,

			)
		),
		'formation_date' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.formation_date',
			'config' => Array (
				'type' => 'input',
				'size' => '8',
				'max' => '20',
				'eval' => 'date',
			)
		),
		'closure_date' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.closure_date',
			'config' => Array (
				'type' => 'input',
				'size' => '8',
				'max' => '20',
				'eval' => 'date',
			)
		),
		'birth_date' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.birth_date',
			'config' => Array (
				'type' => 'input',
				'size' => '8',
				'max' => '20',
				'eval' => 'date',
			)
		),
		'birth_place' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.birth_place',
			'config' => Array (
				'type' => 'input',
				'size' => '48',
				'max' => '48',
			)
		),
		'death_date' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.death_date',
			'config' => Array (
				'type' => 'input',
				'size' => '8',
				'max' => '20',
				'eval' => 'date',
			)
		),
		'death_place' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.death_place',
			'config' => Array (
				'type' => 'input',
				'size' => '48',
				'max' => '48',
			)
		),
		'gender' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.gender',
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					// Array('', '0'),
					Array('LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.gender.I.0', '0'),
					Array('LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.gender.I.1', '1'),
					Array('LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.gender.I.2', '2'),
				),
				'size' => 1,
				'maxitems' => 1,
			)
		),
		'marital_status' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.marital_status',
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					// Array('', '0'),
					Array('LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.marital_status.I.0', '0'),
					Array('LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.marital_status.I.1', '1'),
					Array('LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.marital_status.I.2', '2'),
					Array('LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.marital_status.I.3', '3'),
				),
				'size' => 1,
				'maxitems' => 1,
			)
		),
		'nationality' => Array (
			'exclude' => 1,
			'displayCond' => 'EXT:static_info_tables:LOADED:true',
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.nationality',
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
		'mother_tongue' => Array (
			'exclude' => 1,
			'displayCond' => 'EXT:static_info_tables:LOADED:true',
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.mother_tongue',
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					Array('',0),
				),
				'itemsProcFunc' => 'tx_staticinfotables_div->selectItemsTCA',
				'itemsProcFunc_config' => array (
					'table' => 'static_languages',
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
		'preferred_language' => Array (
			'exclude' => 1,
			'displayCond' => 'EXT:static_info_tables:LOADED:true',
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.preferred_language',
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					Array('',0),
				),
				'itemsProcFunc' => 'tx_staticinfotables_div->selectItemsTCA',
				'itemsProcFunc_config' => array (
					'table' => 'static_languages',
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
		'join_date' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.join_date',
			'config' => Array (
				'type' => 'input',
				'size' => '8',
				'max' => '20',
				'eval' => 'date',
			)
		),
		'leave_date' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.leave_date',
			'config' => Array (
				'type' => 'input',
				'size' => '8',
				'max' => '20',
				'eval' => 'date',
			)
		),
		'occupation' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.occupations',
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					Array('------',0),
				),
				'foreign_table' => 'tx_devnulladdr_occupation',
				'foreign_table_where' => ($confArr['lookupsFromCurrentPageOnly'] != 0 ? 'AND tx_devnulladdr_occupation.pid=###CURRENT_PID### ' : '')
							.'ORDER BY tx_devnulladdr_occupation.sorting',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'remarks' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.remarks',
			'config' => Array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
				'size' => '100',
			)
		),
		'fe_user' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.fe_user',
			'config' => Array (
				'type' => 'input',
				'size' => '10',
				'max' => '48',
				'type' => 'group',
				'internal_type' => 'db',
				'allowed' => 'fe_users',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
				'wizards' => Array(
					'_VALIGN' => 'top',
					'add' => Array(
						'type' => 'script',
						'title' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.fe_user.add',
						'icon' => 'add.gif',
						'params' => Array(
							'table'=>'fe_users',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'set'
						),
						'script' => 'wizard_add.php',
					),
					'edit' => Array(
						'type' => 'popup',
						'title' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.fe_user.edit',
						'script' => 'wizard_edit.php',
						'popup_onlyOpenIfSelected' => 1,
						'icon' => 'edit2.gif',
						'JSopenParams' => 'height=450,width=580,status=0,menubar=0,scrollbars=1',
					),
					'suggest' => array(
						'type' => 'suggest',
					),
				),
			),
		),
		'map_icon' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.map_icon',
			'config' => Array (
				'type' => 'group',
				'internal_type' => 'db',
				'allowed' => 'tx_devnulladdr_map_icon_file',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
				'wizards' => Array(
					'_VALIGN' => 'top',
					'suggest' => array(
						'type' => 'suggest',
					),
				),
			),
		),
		'latitude' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.latitude',
			'config' => Array (
				'type' => 'input',
				'size' => 12,
				'max' => 12,
				'eval' => 'tx_devnulladdr_eval_latitude',
			)
		),
		'longitude' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.longitude',
			'config' => Array (
				'type' => 'input',
				'size' => 12,
				'max' => 12,
				'eval' => 'tx_devnulladdr_eval_longitude',
			)
		),
		'map' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.map',		
			'config' => array (
				'type' => 'user',
				'userFunc' => 'user_devnulladdr_map_tca->render',
				'parameters' => array(
					'longitude' => 'longitude',
					'latitude' => 'latitude',
					'address' => 'adress',
				),
			)
		),
		"marker_text" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.marker_text",		
			"config" => Array (
				"type" => "text",
				"cols" => "40",
				"rows" => "10",
			),
			'defaultExtras' => 'richtext:rte_transform[flag=rte_enabled|mode=ts_css',
		),
	),
	'types' => Array (
		'0' => Array('showitem' => '
			--div--;LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.div.person,
				--palette--;;pAddrHead;;1-1-1,
				--palette--;;pAddrName;;1-1-1,
				--palette--;;pAddrAddress;;1-1-1,
			--div--;LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.div.contact_info_relationships,
				--palette--;;pContact;;1-1-1,
			--div--;LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.div.dates,
				--palette--;;pGender;;1-1-1,
				--palette--;;pOccupation;;1-1-1,
				--palette--;;pNationality;;1-1-1,
				--palette--;;pBirth;;1-1-1,
				--palette--;;pLang;;1-1-1,
				--palette--;;pJoin;;1-1-1'),
		'1' => Array('showitem' => '
			--div--;LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.div.org,
				--palette--;;pOrgHead;;1-1-1,
				--palette--;;pOrgName;;1-1-1,
				--palette--;;pOrgAddress;;1-1-1,
				--palette--;;pPoBox;;1-1-1,
			--div--;LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.div.map,
				--palette--;;pMapsIcon;;1-1-1,
				--palette--;;pMapsMap;;1-1-1,
				--palette--;;pMapsLoc;;1-1-1,
			--div--;LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.div.contact_info_relationships,
				--palette--;;pContact;;1-1-1,
			--div--;LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.div.dates,
				--palette--;;pOrgDates;;1-1-1,
				--palette--;;pOrgType;;1-1-1'),
		'2' => Array('showitem' => '
			--div--;LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.div.poi,
				--palette--;;pPoiHead;;1-1-1,
				--palette--;;pPoiAdress;;1-1-1,
			--div--;LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.div.map,
				--palette--;;pMapsIcon;;1-1-1,
				--palette--;;pMapsMap;;1-1-1,
				--palette--;;pMapsLoc;;1-1-1,
			--div--;LLL:EXT:dev_null_addr/Resources/Private/Language/locallang_devnulladdr_address.xml:tx_devnulladdr_address.div.info_text,
				--palette--;;pMapsInfo;;1-1-1')
	),
	'palettes' => Array (
		'pAddrHead' => Array('showitem' => 'label, --linebreak--, type, status, hidden'),
		'pAddrName' => Array('showitem' => 'title, --linebreak--, name, first_name'),
		'pAddrAddress' => Array('showitem' => 'street, street_number, room, --linebreak--, postal_code, locality, --linebreak--, country'),
		'pContact' => Array('showitem' => 'contact_permission, data_source, external_id, --linebreak--, contact_info'),
		'pOccupation' => Array('showitem' => 'occupation'),
		'pPoBox' => Array('showitem' => 'po_number, po_no_number, --linebreak--, po_postal_code, po_locality, --linebreak--, po_country'),
		'pPersonal' => Array('showitem' => 'birth_date,birth_place'),
		'pBirth' => Array('showitem' => 'birth_date,birth_place'),
		'pDeath' => Array('showitem' => 'death_date,death_place'),
		'pLang' => Array('showitem' => 'mother_tongue, preferred_language'),
		'pJoin' => Array('showitem' => 'join_date, leave_date'),
		'pGender' => Array('showitem' => 'gender'),
		'pNationality' => Array('showitem' => 'nationality'),
		'pMapsIcon' => Array('showitem' => 'map_icon'),
		'pMapsLoc' => Array('showitem' => 'marker, --linebreak--, latitude, longitude'),
		'pMapsMap' => Array('showitem' => 'map'),
		'pMapsInfo' => Array('showitem' => 'marker_text'),
		'pOrgHead' => Array('showitem' => 'label, --linebreak--, type, status, hidden'),
		'pOrgName' => Array('showitem' => 'name, org_legal_form, --linebreak--, org_name'),
		'pOrgAddress' => Array('showitem' => 'street, street_number, building, floor, room, --linebreak--, postal_code, locality, --linebreak--, country'),
		'pOrgDates' => Array('showitem' => 'formation_date, closure_date'),
		'pOrgType' => Array('showitem' => 'org_type'),
		'pPoiHead' => Array('showitem' => 'label, --linebreak--, type, hidden'),
		'pPoiAdress' => Array('showitem' => 'name, --linebreak--, street, --linebreak--, postal_code, locality, --linebreak--, country'),
	)
);

?>