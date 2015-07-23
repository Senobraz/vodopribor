<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? $this->setFrameMode(true); ?>
<? if( count($arResult["ITEMS"] ) > 0) : ?>
<h2><?= $arParams["PAGER_TITLE"] ?></h2>
<div class="svid">
	<div class="svid-alb">
	<?foreach($arResult["ITEMS"] as $arItem):?>	
	<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));			
	?>
	<?if($picture = $arItem['PREVIEW_PICTURE']):?>
	<a href="<?= $picture["SRC"] ?>" class="fnc" rel="sv<?= $arParams["SECTION_ID"] ?>" title="<?= htmlspecialcharsbx($arItem["NAME"]) ?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">	
		<?$file = CFile::ResizeImageGet($picture['ID'], array('width'=>294, 'height'=>209), BX_RESIZE_IMAGE_EXACT, true); ?>
		<img src="<?=$file['src']?>" alt="<?= htmlspecialcharsbx($arItem["NAME"]) ?>" />		
	</a>
	<?endif?>
	<?endforeach?>
	</div>
	<div class="final">
		<a class="button sv-op"><?= GetMessage("GALLERY_ALL") ?></a>
	</div>
</div>
<? else: ?>
<p class="no-found"><?= GetMessage("GALLERY_NOT_FOUND") ?></p>
<? endif ?>