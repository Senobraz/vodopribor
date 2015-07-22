<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? $this->setFrameMode(true); ?>
<div class="big-title">
	<a href="<?= $arParams["DETAIL_PAGE_LIST"] ?>"><?= $arParams["PAGER_TITLE"] ?></a>
</div>
<div class="news-wrap">
	<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));			
	?>
	<div class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($picture = $arItem['PREVIEW_PICTURE']):?>
		<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="img">			
			<?$file = CFile::ResizeImageGet($picture['ID'], array('width'=>96, 'height'=>65), BX_RESIZE_IMAGE_EXACT, true); ?>
			<img src="<?=$file['src']?>" alt="<?= htmlspecialcharsbx($arItem["NAME"]) ?>" />				
		</a>
		<?endif?>	
		<div class="date"><?=$arItem['DISPLAY_ACTIVE_FROM']?></div>
		<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="title"><?=$arItem["NAME"]?></a>
		<div class="desc">
			 <?=$arItem["PREVIEW_TEXT"]?>
		</div>
	</div>
	<?endforeach;?>
</div>
<div class="final">
	<a href="<?= $arParams["DETAIL_PAGE_LIST"] ?>" class="button"><?= GetMessage("NEWS_MAIN_MORE") ?></a>
</div>
