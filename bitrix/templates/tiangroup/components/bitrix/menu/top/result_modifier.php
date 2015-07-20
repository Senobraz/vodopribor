<?php	
	$arMenu = array();
	$inx = 0;
	
	foreach ($arResult as $arItem)
	{
		if( $arItem["DEPTH_LEVEL"] == 1 )
		{			
			$arMenu[++$inx] = $arItem;			
		}
		
		if( $arItem["DEPTH_LEVEL"]  == 2 )
		{
			$arMenu[$inx]["ITEMS"][] = $arItem;			
		}		
	}	
	
	$arResult = $arMenu;
	
?>