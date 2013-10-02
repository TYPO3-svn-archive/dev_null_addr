<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "dev_null_addr".
 *
 * Auto generated 01-10-2013 22:03
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'dev/null Address and Maps',
	'description' => 'Adresses and maps (googlemaps) with support for kml-files. Multiple maps on one page possible',
	'category' => 'plugin',
	'author' => 'W. Rotschek',
	'author_email' => 'typo3@dev-null.at',
	'shy' => '',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'alpha',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'author_company' => '',
	'version' => '0.1.0',
	'constraints' => array(
		'depends' => array(
			'php' => '5.2.0-0.0.0',
			'typo3' => '4.5.0-6.1.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:112:{s:9:"ChangeLog";s:4:"1111";s:16:"ext_autoload.php";s:4:"92b2";s:12:"ext_icon.gif";s:4:"c3a5";s:17:"ext_localconf.php";s:4:"bd88";s:14:"ext_tables.php";s:4:"37b2";s:14:"ext_tables.sql";s:4:"997c";s:13:"locallang.xml";s:4:"8be1";s:10:"README.txt";s:4:"9fa9";s:40:"Classes/class.tx_devnulladdr_address.php";s:4:"0099";s:40:"Classes/class.tx_devnulladdr_contact.php";s:4:"28a8";s:43:"Classes/BE/user.tx_devnulladdr.map_flex.php";s:4:"48da";s:42:"Classes/BE/user.tx_devnulladdr.map_tca.php";s:4:"9d1f";s:51:"Classes/Eval/class.tx_devnulladdr_eval_latitude.php";s:4:"9f4a";s:52:"Classes/Eval/class.tx_devnulladdr_eval_longitude.php";s:4:"8616";s:52:"Classes/Hooks/class.tx_devnulladdr_tcemainprocdm.php";s:4:"6d27";s:48:"Configuration/Static/dev_null_addr/constants.txt";s:4:"a7f1";s:44:"Configuration/Static/dev_null_addr/setup.txt";s:4:"8125";s:49:"Configuration/TCA/tca_devnulladdr_addr_status.php";s:4:"7814";s:48:"Configuration/TCA/tca_devnulladdr_addr_title.php";s:4:"7110";s:45:"Configuration/TCA/tca_devnulladdr_address.php";s:4:"f2da";s:45:"Configuration/TCA/tca_devnulladdr_contact.php";s:4:"c415";s:50:"Configuration/TCA/tca_devnulladdr_contact_perm.php";s:4:"31e2";s:46:"Configuration/TCA/tca_devnulladdr_kml_file.php";s:4:"788e";s:44:"Configuration/TCA/tca_devnulladdr_layers.php";s:4:"050b";s:51:"Configuration/TCA/tca_devnulladdr_map_icon_file.php";s:4:"3125";s:48:"Configuration/TCA/tca_devnulladdr_map_layers.php";s:4:"5b8d";s:48:"Configuration/TCA/tca_devnulladdr_occupation.php";s:4:"9e68";s:47:"Configuration/TCA/tca_devnulladdr_org_legal.php";s:4:"ded2";s:46:"Configuration/TCA/tca_devnulladdr_org_type.php";s:4:"7de9";s:66:"Resources/Private/CSH/locallang_csh_tx_devnulladdr_addr_status.xml";s:4:"6bf9";s:65:"Resources/Private/CSH/locallang_csh_tx_devnulladdr_addr_title.xml";s:4:"5a8e";s:62:"Resources/Private/CSH/locallang_csh_tx_devnulladdr_address.xml";s:4:"1499";s:62:"Resources/Private/CSH/locallang_csh_tx_devnulladdr_contact.xml";s:4:"fb46";s:67:"Resources/Private/CSH/locallang_csh_tx_devnulladdr_contact_perm.xml";s:4:"d5db";s:65:"Resources/Private/CSH/locallang_csh_tx_devnulladdr_occupation.xml";s:4:"deef";s:64:"Resources/Private/CSH/locallang_csh_tx_devnulladdr_org_legal.xml";s:4:"882a";s:63:"Resources/Private/CSH/locallang_csh_tx_devnulladdr_org_type.xml";s:4:"5fc3";s:64:"Resources/Private/Language/locallang_devnulladdr_addr_status.xml";s:4:"3da6";s:63:"Resources/Private/Language/locallang_devnulladdr_addr_title.xml";s:4:"9434";s:60:"Resources/Private/Language/locallang_devnulladdr_address.xml";s:4:"f39f";s:60:"Resources/Private/Language/locallang_devnulladdr_contact.xml";s:4:"3aab";s:65:"Resources/Private/Language/locallang_devnulladdr_contact_perm.xml";s:4:"47a3";s:61:"Resources/Private/Language/locallang_devnulladdr_kml_file.xml";s:4:"d8c0";s:59:"Resources/Private/Language/locallang_devnulladdr_layers.xml";s:4:"c843";s:66:"Resources/Private/Language/locallang_devnulladdr_map_icon_file.xml";s:4:"560f";s:63:"Resources/Private/Language/locallang_devnulladdr_occupation.xml";s:4:"6e40";s:62:"Resources/Private/Language/locallang_devnulladdr_org_legal.xml";s:4:"d750";s:61:"Resources/Private/Language/locallang_devnulladdr_org_type.xml";s:4:"de76";s:45:"Resources/Private/Templates/maps.cluster.html";s:4:"ec56";s:37:"Resources/Private/Templates/maps.html";s:4:"edb0";s:41:"Resources/Private/Templates/maps.kml.html";s:4:"ab03";s:58:"Resources/Public/Icons/icon_tx_devnulladdr_addr_status.png";s:4:"d96b";s:57:"Resources/Public/Icons/icon_tx_devnulladdr_addr_title.png";s:4:"bf5f";s:58:"Resources/Public/Icons/icon_tx_devnulladdr_addr_type_0.png";s:4:"7f1c";s:58:"Resources/Public/Icons/icon_tx_devnulladdr_addr_type_1.png";s:4:"e5df";s:58:"Resources/Public/Icons/icon_tx_devnulladdr_addr_type_2.png";s:4:"8eb6";s:54:"Resources/Public/Icons/icon_tx_devnulladdr_address.png";s:4:"6ab6";s:54:"Resources/Public/Icons/icon_tx_devnulladdr_contact.png";s:4:"6ab6";s:60:"Resources/Public/Icons/icon_tx_devnulladdr_contact_email.png";s:4:"c632";s:58:"Resources/Public/Icons/icon_tx_devnulladdr_contact_fax.png";s:4:"bf5a";s:61:"Resources/Public/Icons/icon_tx_devnulladdr_contact_mobile.png";s:4:"8c01";s:59:"Resources/Public/Icons/icon_tx_devnulladdr_contact_perm.png";s:4:"f57f";s:60:"Resources/Public/Icons/icon_tx_devnulladdr_contact_phone.png";s:4:"2100";s:58:"Resources/Public/Icons/icon_tx_devnulladdr_contact_url.png";s:4:"71ff";s:55:"Resources/Public/Icons/icon_tx_devnulladdr_kml_file.png";s:4:"cecd";s:60:"Resources/Public/Icons/icon_tx_devnulladdr_map_icon_file.png";s:4:"ad74";s:57:"Resources/Public/Icons/icon_tx_devnulladdr_map_layers.png";s:4:"228d";s:57:"Resources/Public/Icons/icon_tx_devnulladdr_occupation.png";s:4:"94af";s:56:"Resources/Public/Icons/icon_tx_devnulladdr_org_legal.png";s:4:"25c0";s:55:"Resources/Public/Icons/icon_tx_devnulladdr_org_type.png";s:4:"9ec2";s:64:"Resources/Public/Icons/selicon_tx_devnulladdr_address_type_0.png";s:4:"3fe6";s:64:"Resources/Public/Icons/selicon_tx_devnulladdr_address_type_1.png";s:4:"30e2";s:64:"Resources/Public/Icons/selicon_tx_devnulladdr_address_type_2.png";s:4:"a009";s:64:"Resources/Public/Icons/selicon_tx_devnulladdr_contact_type_0.png";s:4:"633b";s:64:"Resources/Public/Icons/selicon_tx_devnulladdr_contact_type_1.png";s:4:"41ad";s:64:"Resources/Public/Icons/selicon_tx_devnulladdr_contact_type_2.png";s:4:"1a80";s:64:"Resources/Public/Icons/selicon_tx_devnulladdr_contact_type_3.png";s:4:"3cec";s:64:"Resources/Public/Icons/selicon_tx_devnulladdr_contact_type_4.png";s:4:"ec84";s:35:"Resources/Public/Marker/airport.png";s:4:"0090";s:32:"Resources/Public/Marker/bank.png";s:4:"218d";s:31:"Resources/Public/Marker/bar.png";s:4:"e820";s:36:"Resources/Public/Marker/building.png";s:4:"ee19";s:34:"Resources/Public/Marker/camera.png";s:4:"b5ed";s:38:"Resources/Public/Marker/campground.png";s:4:"7075";s:32:"Resources/Public/Marker/dive.png";s:4:"6be7";s:32:"Resources/Public/Marker/fuel.png";s:4:"e3bd";s:32:"Resources/Public/Marker/golf.png";s:4:"c7c2";s:33:"Resources/Public/Marker/hotel.png";s:4:"42d1";s:33:"Resources/Public/Marker/house.png";s:4:"74f9";s:32:"Resources/Public/Marker/info.png";s:4:"9c07";s:34:"Resources/Public/Marker/marina.png";s:4:"4dd3";s:35:"Resources/Public/Marker/medical.png";s:4:"cbc2";s:34:"Resources/Public/Marker/picnic.png";s:4:"cea6";s:38:"Resources/Public/Marker/restaurant.png";s:4:"a14a";s:35:"Resources/Public/Marker/slipway.png";s:4:"662d";s:33:"Resources/Public/Marker/wreck.png";s:4:"1399";s:51:"Resources/Public/MarkerClusterer/markerclusterer.js";s:4:"b4e7";s:58:"Resources/Public/MarkerClusterer/markerclusterer_packed.js";s:4:"a47e";s:34:"Resources/Public/Shadow/shadow.png";s:4:"1499";s:38:"Resources/Public/css/dev_null_addr.css";s:4:"4a71";s:43:"Resources/Public/jscript/markerclusterer.js";s:4:"6c3c";s:52:"Resources/Public/jscript/markerclusterer_compiled.js";s:4:"7581";s:14:"doc/manual.sxw";s:4:"2b91";s:14:"pi1/ce_wiz.png";s:4:"43f7";s:39:"pi1/class.tx_devnulladdr_pi1.map_js.php";s:4:"3ae1";s:40:"pi1/class.tx_devnulladdr_pi1.map_kml.php";s:4:"4bb1";s:32:"pi1/class.tx_devnulladdr_pi1.php";s:4:"e55e";s:40:"pi1/class.tx_devnulladdr_pi1_wizicon.php";s:4:"d52e";s:13:"pi1/clear.gif";s:4:"cc11";s:23:"pi1/flexform_ds_pi1.xml";s:4:"8970";s:17:"pi1/locallang.xml";s:4:"5494";s:30:"pi1/locallang_csh_flexform.xml";s:4:"7a56";}',
	'suggests' => array(
	),
);

?>