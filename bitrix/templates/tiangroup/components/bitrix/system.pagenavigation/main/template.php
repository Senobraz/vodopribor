<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");

?>

<div class="pagination">
	<ul class="pager">
<?if($arResult["bDescPageNumbering"] === true):?>	
	
<?else: ?>
	<? if ($arResult["NavPageNomer"] > 1): ?>
	<li class="back-page"><a class="forum-page-previous" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"></a></li>
	<? endif ?>
		
	<?while($arResult["nStartPage"] <= $arResult["nEndPage"]):?>	
		<?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>		
		<li><a  class="active" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$arResult["nStartPage"]?></a></li>
		<?elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):?>			
			<li><a href="<?=$arResult["sUrlPath"]?>"><?=$arResult["nStartPage"]?></a></li>			
		<?else:?>			
			<li><a href="?PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$arResult["nStartPage"]?></a></li>
		<?endif?>	
		<?$arResult["nStartPage"]++?>
	<?endwhile?>
			
	<? if($arResult["NavPageNomer"] < $arResult["NavPageCount"]): ?>
	<li class="up-page"><a class="forum-page-next" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"></a></li>
	<? endif ?>
	
<?endif?>
	</ul>
</div>