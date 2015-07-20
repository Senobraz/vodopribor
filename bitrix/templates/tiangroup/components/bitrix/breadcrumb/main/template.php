<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//delayed function must return a string
if(empty($arResult))
    return GetMessage("BREADCRUMB_MAIN");

$strReturn = '<a href="'.SITE_DIR.'">'.GetMessage("BREADCRUMB_MAIN").'</a> / ';
$num_items = count($arResult);
for($index = 0, $itemSize = $num_items; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	
	if($arResult[$index]["LINK"] <> "" && $index<(count($arResult)-1))
		$strReturn .= '<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'">'.$title.'</a> / ';
	else
		$strReturn .= ''.$title.'';
}

return $strReturn;
?>