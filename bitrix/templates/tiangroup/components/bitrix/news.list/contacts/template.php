<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? $this->setFrameMode(true); ?>
<? if( count($arResult["ITEMS"] ) > 0) : ?>

	<?foreach($arResult["ITEMS"] as $arItem):?>	
	<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));			
	?>	
	<div class="cont-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<h3><?= $arItem["NAME"] ?></h3>
		<div class="map"></div>
		<div class="cont-addr">
			<span><?= $arItem["PROPERTIES"]["ADDRESS"]["VALUE"] ?></span>
			<p><?= $arItem["PREVIEW_TEXT"] ?></p>
		</div>
		<?= $arItem["DETAIL_TEXT"] ?>
	</div>
	<?endforeach?>	
	<?=$arResult['NAV_STRING']?>

	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	<script type="text/javascript">
	$('.cont-item').each(function(){
	    var map;
	    var elevator;
		var geocoder;
		var markers = [];
		
	    var myOptions = {
	       zoom: 1,
			center: new google.maps.LatLng(0, 0),
			disableDefaultUI: true,
			scaleControl: true,
			panControl: true,
			zoomControl: true,
			scrollwheel: false      
	    };
		
		var myMap = $(this).find('.map');
		var myAdress = $(this).find('.cont-addr span').text();	
		
		function initialize() {
			geocoder = new google.maps.Geocoder();	
			map = new google.maps.Map(myMap[0], myOptions);	
			codeAddress();
		}
		function codeAddress() {
			var adr2 = [];
			var bounds = new google.maps.LatLngBounds ();
					geocoder.geocode( { 'address': myAdress}, function(results, status) {
						if (status == google.maps.GeocoderStatus.OK) {
							var image = {
								url: 'assets/images/map-icon.png',
							origin: new google.maps.Point(0, 0),
							anchor: new google.maps.Point(34, 58)
						}
						var str = results[0].formatted_address;

						var infowindow = new google.maps.InfoWindow({});
						var p = results[0].geometry.location;
						var latlng = new google.maps.LatLng(p.lat, p.lng);
						var marker = new google.maps.Marker({
							position: p,
							map: map,
							icon: '<?= SITE_TEMPLATE_PATH?>/assets/images/map-icon.png',
							clickable: true
						});

						markers.push(marker);

						adr2.push(results[0].geometry.location);
						for (var i = 0, LtLgLen = adr2.length; i < LtLgLen; i++) {
							bounds.extend(adr2[i]);
						}
						map.fitBounds(bounds);

						google.maps.event.addDomListener(window, 'resize', function() {
							map.fitBounds(bounds);
							;
						});

						var infowindow = new google.maps.InfoWindow({
							content: myAdress
						});
						google.maps.event.addListener(marker, 'click', function() {
							infowindow.open(map, this);
						});

						// проблемы с одним маркером и слишком близким зумом		
						var zm = map.getZoom();
						if (zm > 18) {
							map.setZoom(18);
						}
					}
				});
			}
			google.maps.event.addDomListener(window, 'load', initialize);
		});
	</script>	
<? else: ?>
<p class="no-found"><?= GetMessage("CONTACTS_NOT_FOUND") ?></p>
<? endif ?>



