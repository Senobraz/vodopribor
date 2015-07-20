<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$items = array();

foreach($arResult as $arItem)
{
    $level = $arItem["DEPTH_LEVEL"];

    if($level > 1)
    {
        $items[count($items)-1]["ITEMS"][] = $arItem;
    }
    else
    {
        $items[] = $arItem;
    }


}

$arResult = $items;


return;

$sections2 = array();

$section_code = $_REQUEST["SECTION_CODE"];

foreach($arResult["SECTIONS"] as $arSection)
{
    $level = $arSection["DEPTH_LEVEL"];

    if($level > 1)
    {
        if($section_code == $arSection["CODE"])
        {
            $sections2[$arSection["IBLOCK_SECTION_ID"]]["SECTION_ACTIVE"] = "Y";
            $arSection["SECTION_ACTIVE"] = "Y";
        }
        $sections2[$arSection["IBLOCK_SECTION_ID"]]["ITEMS"][$arSection['ID']] = $arSection;
    }else
    {
        if($section_code == $arSection["CODE"])
        {
            $arSection["SECTION_ACTIVE"] = "Y";
        }
        $sections2[$arSection['ID']] = $arSection;
    }

}

$arResult["SECTIONS2"] = $sections2;
?>