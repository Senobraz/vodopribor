<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? $this->setFrameMode(true); ?>
<? if( count($arResult["ITEMS"] ) > 0) : ?>
<div class="news">
	<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));			
	?>
	<div class="n-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">		
		<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="img">
			<?if($picture = $arItem['PREVIEW_PICTURE']):?>	
			<?$file = CFile::ResizeImageGet($picture['ID'], array('width'=>294, 'height'=>200), BX_RESIZE_IMAGE_EXACT, true); ?>
			<img src="<?=$file['src']?>" alt="<?= htmlspecialcharsbx($arItem["NAME"]) ?>" />
			<? else: ?>
			<img src="<?=SITE_TEMPLATE_PATH ?>/assets/images/nofoto/new.jpg" alt="<?= htmlspecialcharsbx($arItem["NAME"]) ?>" />
			<?endif?>
		</a>		
		<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="title"><?= $arItem["NAME"] ?></a>
		<div class="desc">
			<?=$arItem["PREVIEW_TEXT"]?>
			<div class="date"><?=$arItem['DISPLAY_ACTIVE_FROM']?></div>
		</div>
	</div>
	<?endforeach?>	
</div>
<?=$arResult['NAV_STRING']?>
<? else: ?>
<p class="no-found"><?= GetMessage("NEWS_NOT_FOUND") ?></p>
<? endif ?>


