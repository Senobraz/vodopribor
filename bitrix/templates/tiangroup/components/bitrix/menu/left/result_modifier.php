<?php	
	$arMenu = array();
	$inx = 0;
	
	$temp_depth_level_1 = 0;
	$temp_depth_level_2 = 0;
	$temp_depth_level_3 = 0;
	
	foreach ($arResult as $arItem)
	{
		if( $arItem["DEPTH_LEVEL"] == 1 )
		{			
			$temp_depth_level_1 = $arItem["ITEM_INDEX"];			
			$arMenu[$temp_depth_level_1] = $arItem;		
		}		
		if( $arItem["DEPTH_LEVEL"] == 2 )
		{
			$temp_depth_level_2 = $arItem["ITEM_INDEX"];
			$arMenu[$temp_depth_level_1]["ITEMS"][$temp_depth_level_2] = $arItem;			
		}
		if( $arItem["DEPTH_LEVEL"] == 3 )
		{
			$temp_depth_level_3 = $arItem["ITEM_INDEX"];
			$arMenu[$temp_depth_level_1]["ITEMS"][$temp_depth_level_2]["ITEMS"][$temp_depth_level_3] = $arItem;			
		}	
	}	
	
	$arResult = $arMenu;
	
?>