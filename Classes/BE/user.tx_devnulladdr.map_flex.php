<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 W. Rotschek <typo3@dev-null.at>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Google map.
 *
 * @author	W. Rotschek <typo3@dev-null.at>
 * @package	TYPO3
 * @subpackage	tx_devnulladdr
 */
class user_devnulladdr_map_flex {

	/**
	 * Renders the Google map in a flex form.
	 *
	 * @param array $PA
	 * @param t3lib_TCEforms $pObj
	 * @return string
	 */
	public function render($conf) {
	
		// return  t3lib_utility_Debug::viewArray($conf);

		$PA = $conf;
		
		$PA['parameters'] = array(
				'latitude' => 'latitude',
				'longitude' => 'longitude',
			);

		$out = array();
		// $latitude = (float) $PA['row'][$PA['parameters']['latitude']];
		// $longitude = (float) $PA['row'][$PA['parameters']['longitude']];
		$address =  $PA['row'][$PA['parameters']['address']];
		
		$baseElementId = isset($PA['itemFormElID']) ? $PA['itemFormElID'] : $PA['table'] . '_map';
		$addressId = $baseElementId . '_address';
		$mapId = $baseElementId . '_map';

		$xml = $conf['row']['pi_flexform'];
		$array = t3lib_div::xml2array($xml);
				
		$tmpDefault = $array['data']['sDEF']['lDEF'];
		
		// get current value
		$latitude 	= isset($tmpDefault['latitude']['vDEF'])  ? $tmpDefault['latitude']['vDEF'] : 0;
		$longitude	= isset($tmpDefault['longitude']['vDEF']) ? $tmpDefault['longitude']['vDEF'] : 0;
		$zoom		= isset($tmpDefault['zoom']['vDEF'])      ? $tmpDefault['zoom']['vDEF'] : 8;

		$dataPrefix = 'data[' . $PA['table'] . '][' . $PA['row']['uid'] . ']';

		// get BE-form flex fields
		$dataPiFlex = $dataPrefix . '[pi_flexform]';

		$flexLatitude = $dataPrefix . '[pi_flexform][data][sDEF][lDEF][' . $PA['parameters']['latitude'] . '][vDEF]';
		$flexLongitude = $dataPrefix . '[pi_flexform][data][sDEF][lDEF][' . $PA['parameters']['longitude'] . '][vDEF]';

		$flexZoom = $dataPrefix . '[pi_flexform][data][sDEF][lDEF][zoom][vDEF]';

		$updateJs = "TBE_EDITOR.fieldChanged('%s','%s','%s','%s');";
		$updateFlexJs = sprintf($updateJs, $PA['table'], $PA['row']['uid'], 'pi_flexform', $dataPiFlex);
		
		$out[] = '<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>';
		$out[] = '<script type="text/javascript">';
		$out[] = <<<EOT
		
if (typeof TxDevNullAddr == 'undefined') TxDevNullAddr = {
	geocoder : new google.maps.Geocoder()
};

TxDevNullAddr.init = function() {
	
	TxDevNullAddr.origin = new google.maps.LatLng({$latitude}, {$longitude});
	
	TxDevNullAddr.mapOptions = {
		zoom:		{$zoom},
		center: 	new google.maps.LatLng({$latitude}, {$longitude}),
		mapTypeId:	google.maps.MapTypeId.ROADMAP,
		panControl: false,
		streetViewControl: false
	};
	
	TxDevNullAddr.map = new google.maps.Map(document.getElementById('{$mapId}'),
		TxDevNullAddr.mapOptions);
	
	TxDevNullAddr.marker = new google.maps.Marker({
		map:		TxDevNullAddr.map,
		position:	TxDevNullAddr.origin,
		draggable:	true
	});
	
	google.maps.event.addListener(TxDevNullAddr.map, 'zoom_changed', function() {
		var zoom = TxDevNullAddr.map.getZoom();
		
		// Update visible fields
		document[TBE_EDITOR.formname]['{$flexZoom}'].selectedIndex = zoom;
		
		// Update hidden (real) fields
		document[TBE_EDITOR.formname]['{$flexZoom}_selIconVal'].selectedIndex = zoom;
		
		// Tell TYPO3 that fields were updated
		{$updateFlexJs}
	});
	
	google.maps.event.addListener(TxDevNullAddr.map, 'drag', function() {
		var pos = TxDevNullAddr.map.getCenter();
		var lat = pos.lat().toFixed(8);
		var lng = pos.lng().toFixed(8);

		// Update visible fields
		document[TBE_EDITOR.formname]['{$flexLatitude}_hr'].value = lat;
		document[TBE_EDITOR.formname]['{$flexLongitude}_hr'].value = lng;

		// Update hidden (real) fields
		document[TBE_EDITOR.formname]['{$flexLatitude}'].value = lat;
		document[TBE_EDITOR.formname]['{$flexLongitude}'].value = lng;

		// Tell TYPO3 that fields were updated
		{$updateFlexJs}
		
		// Update marker position
		TxDevNullAddr.marker.setPosition(pos);
	});
	
	google.maps.event.addListener(TxDevNullAddr.marker, 'dragend', function() {
		var pos = TxDevNullAddr.marker.getPosition();
		var lat = pos.lat().toFixed(8);
		var lng = pos.lng().toFixed(8);

		// Update visible fields
		document[TBE_EDITOR.formname]['{$flexLatitude}_hr'].value = lat;
		document[TBE_EDITOR.formname]['{$flexLongitude}_hr'].value = lng;

		// Update hidden (real) fields
		document[TBE_EDITOR.formname]['{$flexLatitude}'].value = lat;
		document[TBE_EDITOR.formname]['{$flexLongitude}'].value = lng;

		// Tell TYPO3 that fields were updated
		{$updateFlexJs}
		
		// Update map center
		TxDevNullAddr.map.setCenter(pos);
	});
	
	// Make sure to refresh Google Map if corresponding tab is not yet active
	// get plugin menu
	TxDevNullAddr.tabPrefix = Ext.fly('{$mapId}').findParentNode('[id$="-DIV"]').id;
	TxDevNullAddr.tabPrefix = Ext.util.Format.substr(TxDevNullAddr.tabPrefix, 0, TxDevNullAddr.tabPrefix.length - 4);
	if (Ext.fly(TxDevNullAddr.tabPrefix + '-DIV').getStyle('display') == 'none') {
		Ext.fly(TxDevNullAddr.tabPrefix + '-MENU').on('click', TxDevNullAddr.refreshMap);
	}

	// get content element menu
	TxDevNullAddr.tabPrefix = Ext.fly(TxDevNullAddr.tabPrefix + '-DIV').findParentNode('[id$="-DIV"]').id;
	TxDevNullAddr.tabPrefix = Ext.util.Format.substr(TxDevNullAddr.tabPrefix, 0, TxDevNullAddr.tabPrefix.length - 4);
	if (Ext.fly(TxDevNullAddr.tabPrefix + '-DIV').getStyle('display') == 'none') {
		Ext.fly(TxDevNullAddr.tabPrefix + '-MENU').on('click', TxDevNullAddr.refreshMap);
	}
};

TxDevNullAddr.refreshMap = function() {
	google.maps.event.trigger(TxDevNullAddr.map, 'resize');
	TxDevNullAddr.map.setCenter(TxDevNullAddr.marker.getPosition());
	// No need to do it again
	Ext.fly(TxDevNullAddr.tabPrefix + '-MENU').un('click', TxDevNullAddr.refreshMap);
};

TxDevNullAddr.geocodeAddress = function() {
	var address = document.getElementById("{$addressId}").value;
	TxDevNullAddr.geocoder.geocode({'address': address}, function(results, status) {
		TxDevNullAddr.geocodeResult = results;
		
		if (status == google.maps.GeocoderStatus.OK) {
			TxDevNullAddr.map.setCenter(results[0].geometry.location);
			TxDevNullAddr.marker.setPosition(results[0].geometry.location);
			
			var lat = TxDevNullAddr.marker.getPosition().lat().toFixed(8);
			var lng = TxDevNullAddr.marker.getPosition().lng().toFixed(8);
			
			// Update visible fields
			document[TBE_EDITOR.formname]['{$flexLatitude}_hr'].value = lat;
			document[TBE_EDITOR.formname]['{$flexLongitude}_hr'].value = lng;
			
			// Update hidden (real) fields
			document[TBE_EDITOR.formname]['{$flexLatitude}'].value = lat;
			document[TBE_EDITOR.formname]['{$flexLongitude}'].value = lng;
			
			// Update flex fields			
			{$updateFlexJs}
		} else {
			alert("Geocode was not successful for the following reason: " + status);
		}
	});
};

google.maps.event.addDomListener(window, 'load', TxDevNullAddr.init);

EOT;
		$out[] = '</script>';
		$out[] = '<div id="' . $baseElementId . '">';
		$out[] = '
			<input id="' . $addressId . '" type="textbox" value="' . $address . '" style="width:300px">
			<input type="button" value="Lookup" onclick="TxDevNullAddr.geocodeAddress()">
		';
		$out[] = '<div id="' . $mapId . '" style="height:400px;margin:10px 0;width:400px">Loading map ...</div>';
		$out[] = '</div>'; // id=$baseElementId

		return implode('', $out);
	}
}

?>