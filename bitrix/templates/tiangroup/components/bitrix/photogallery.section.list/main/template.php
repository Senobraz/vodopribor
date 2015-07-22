<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/********************************************************************
				Input params
********************************************************************/
$arParams["ALBUM_PHOTO_SIZE"] = intVal($arParams["ALBUM_PHOTO_SIZE"]);

if (!function_exists("__photo_cut_long_words"))
{
	function __photo_cut_long_words($str)
	{
		$MaxStringLen = 5;
		if (strLen($str) > $MaxStringLen)
			$str = preg_replace("/([^ \n\r\t\x01]{".$MaxStringLen."})/is".BX_UTF_PCRE_MODIFIER, "\\1<WBR/>&shy;", $str);
		return $str;
	}
}

if (!function_exists("__photo_part_long_words"))
{
	function __photo_part_long_words($str)
	{
		$word_separator = "\s.,;:!?\#\-\*\|\[\]\(\)\{\}";
		if (strLen(trim($str)) > 5)
		{
			$str = str_replace(
				array(chr(1), chr(2), chr(3), chr(4), chr(5), chr(6), chr(7), chr(8),
					"&amp;", "&lt;", "&gt;", "&quot;", "&nbsp;", "&copy;", "&reg;", "&trade;",
					chr(34), chr(39)),
				array("", "", "", "", "", "", "", "",
					chr(1), "<", ">", chr(2), chr(3), chr(4), chr(5), chr(6),
					chr(7), chr(8)),
				$str);
			$str = preg_replace("/(?<=[".$word_separator."]|^)(([^".$word_separator."]+))(?=[".$word_separator."]|$)/ise".BX_UTF_PCRE_MODIFIER,
				"__photo_cut_long_words('\\2')", $str);

			$str = str_replace(
				array(chr(1), "<", ">", chr(2), chr(3), chr(4), chr(5), chr(6), chr(7), chr(8), "&lt;WBR/&gt;", "&lt;WBR&gt;", "&amp;shy;"),
				array("&amp;", "&lt;", "&gt;", "&quot;", "&nbsp;", "&copy;", "&reg;", "&trade;", chr(34), chr(39), "<WBR/>", "<WBR/>", "&shy;"),
				$str);
		}
		return $str;
	}
}

?>

<div class="collection">
	<?foreach($arResult["SECTIONS"] as $res):?>
	<? if($res["ELEMENTS_CNT"] == 0) continue; ?>
	<?
		$res["ORIG_NAME"] = $res["NAME"];
		$res["NAME"] = __photo_part_long_words($res["NAME"]);	
		
	?>
	<div class="collect-item">
		<div class="title">
			<a href="<?=$res["SECTION_PAGE_URL"]?>" ><?=$res["NAME"]?></a>
		</div>
		<div class="album">		
			<?$APPLICATION->IncludeComponent("bitrix:photo.section", "photogallery.detail.list.ex", array(
				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"SECTION_ID" => $res["ID"],
				"SECTION_CODE" => "",
				"SECTION_USER_FIELDS" => array(
					0 => "",
					1 => "",
				),
				"ELEMENT_SORT_FIELD" => "",
				"ELEMENT_SORT_ORDER" => "",
				"FILTER_NAME" => "arrFilter",
				"FIELD_CODE" => array(
					0 => "",
					1 => "",
				),
				"PROPERTY_CODE" => array(
					0 => "",
					1 => "",
				),
				"PAGE_ELEMENT_COUNT" => "4",
				"LINE_ELEMENT_COUNT" => "",
				"SECTION_URL" => "",
				"DETAIL_URL" => "",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "N",
				"AJAX_OPTION_HISTORY" => "N",
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "36000000",
				"CACHE_FILTER" => "N",
				"CACHE_GROUPS" => "N",
				"META_KEYWORDS" => "",
				"META_DESCRIPTION" => "",
				"BROWSER_TITLE" => "-",
				"SET_TITLE" => "N",
				"SET_STATUS_404" => "N",
				"ADD_SECTIONS_CHAIN" => "N",
				"PAGER_TEMPLATE" => "main",
				"DISPLAY_TOP_PAGER" => "N",
				"DISPLAY_BOTTOM_PAGER" => "N",
				"PAGER_TITLE" => "",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "N",
				"AJAX_OPTION_ADDITIONAL" => ""
				)
			);?>		
		</div>
		<div class="desc">
			<?= $res["DESCRIPTION"] ?> 
		</div>
	</div>
	<?endforeach;?>	
</div>