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
class user_devnulladdr_map_tca {

	/**
	 * Renders the Google map in a TCA form.
	 *
	 * @param array $PA
	 * @param t3lib_TCEforms $pObj
	 * @return string
	 */
	public function render(array &$PA, t3lib_TCEforms $pObj) {
		$version = class_exists('t3lib_utility_VersionNumber')
				? t3lib_utility_VersionNumber::convertVersionNumberToInteger(TYPO3_version)
				: t3lib_div::int_from_ver(TYPO3_version);
		if ($version < 4006000) {
			$PA['parameters'] = array(
				'latitude' => 'latitude',
				'longitude' => 'longitude',
				'address' => 'address'
			);
		}

		$out = array();
		$latitude = (float) $PA['row'][$PA['parameters']['latitude']];
		$longitude = (float) $PA['row'][$PA['parameters']['longitude']];
		$address =  $PA['row'][$PA['parameters']['address']];
		
		$baseElementId = isset($PA['itemFormElID']) ? $PA['itemFormElID'] : $PA['table'] . '_map';
		$addressId = $baseElementId . '_address';
		$mapId = $baseElementId . '_map';

		if (empty($latitude))
			$latitude = 0;
		if(empty($longitude))
			$longitude = 0;

		$dataPrefix = 'data[' . $PA['table'] . '][' . $PA['row']['uid'] . ']';
		$latitudeField = $dataPrefix . '[' . $PA['parameters']['latitude'] . ']';
		$longitudeField = $dataPrefix . '[' . $PA['parameters']['longitude'] . ']';
		$addressField = $dataPrefix . '[' . $PA['parameters']['address'] . ']';

		$updateJs = "TBE_EDITOR.fieldChanged('%s','%s','%s','%s');";
		$updateLatitudeJs = sprintf($updateJs, $PA['table'], $PA['row']['uid'], $PA['parameters']['latitude'], $latitudeField);
		$updateLongitudeJs = sprintf($updateJs, $PA['table'], $PA['row']['uid'], $PA['parameters']['longitude'], $longitudeField);
		$updateAddressJs = sprintf($updateJs, $PA['table'], $PA['row']['uid'], $PA['parameters']['address'], $addressField);
		
		$out[] = '<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>';
		$out[] = '<script type="text/javascript">';
		$out[] = <<<EOT
		
if (typeof TxDevNullAddr == 'undefined') TxDevNullAddr = {
	geocoder : new google.maps.Geocoder()
};

TxDevNullAddr.init = function() {
	
	TxDevNullAddr.origin = new google.maps.LatLng({$latitude}, {$longitude});
	
	TxDevNullAddr.mapOptions = {
		zoom:		8,
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
	
	google.maps.event.addListener(TxDevNullAddr.marker, 'dragend', function() {
		var pos = TxDevNullAddr.marker.getPosition();
		var lat = pos.lat().toFixed(8);
		var lng = pos.lng().toFixed(8);

		// Update visible fields
		document[TBE_EDITOR.formname]['{$latitudeField}_hr'].value = lat;
		document[TBE_EDITOR.formname]['{$longitudeField}_hr'].value = lng;

		// Update hidden (real) fields
		document[TBE_EDITOR.formname]['{$latitudeField}'].value = lat;
		document[TBE_EDITOR.formname]['{$longitudeField}'].value = lng;

		// Tell TYPO3 that fields were updated
		{$updateLatitudeJs}
		{$updateLongitudeJs}
		
		// Update map center
		TxDevNullAddr.map.setCenter(pos);
	});
	
	// Make sure to refresh Google Map if corresponding tab is not yet active
	TxDevNullAddr.tabPrefix = Ext.fly('{$mapId}').findParentNode('[id$="-DIV"]').id;
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
			document[TBE_EDITOR.formname]['{$latitudeField}_hr'].value = lat;
			document[TBE_EDITOR.formname]['{$longitudeField}_hr'].value = lng;
			
			// Update hidden (real) fields
			document[TBE_EDITOR.formname]['{$latitudeField}'].value = lat;
			document[TBE_EDITOR.formname]['{$longitudeField}'].value = lng;
			
			// Update geolocation fields			
			{$updateLatitudeJs}
			{$updateLongitudeJs}
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