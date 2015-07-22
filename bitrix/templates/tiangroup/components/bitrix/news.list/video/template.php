<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? $this->setFrameMode(true); ?>
<? if( count($arResult["ITEMS"] ) > 0) : ?>
<div class="video-gallery">
	<?foreach($arResult["ITEMS"] as $arItem):?>	
	<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));			
	?>
	<div class="yt-wrap" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="youtube-video pretty-embed" data-url="<?= $arItem["PROPERTIES"]["LINK"]["VALUE"] ?>"></div>
		<div class="yt-desc" >
			<span><?= $arItem["NAME"] ?></span>
			<div><?= $arItem["PREVIEW_TEXT"] ?></div>
		</div>
	</div>
	
	<?endforeach?>	
</div>
<?=$arResult['NAV_STRING']?>
<? else: ?>
<p class="no-found"><?= GetMessage("VIDEO_NOT_FOUND") ?></p>
<? endif ?>


