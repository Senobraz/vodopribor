<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if (0 < $arResult['SECTIONS_COUNT'])
{
	$arNewSection = array();
	$inx = 0;
	
	foreach ($arResult['SECTIONS'] as &$section)
	{
		if( $section["RELATIVE_DEPTH_LEVEL"] == 1 )
		{			
			$arNewSection[++$inx] = $section;			
		}
		
		if( $section["RELATIVE_DEPTH_LEVEL"] == 2 )
		{
			$arNewSection[$inx]["ITEMS"][] = $section;			
		}		
	}	
	
	$arResult['SECTIONS'] = $arNewSection;		
}

?>