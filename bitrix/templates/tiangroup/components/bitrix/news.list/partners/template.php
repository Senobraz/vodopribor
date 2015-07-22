<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? $this->setFrameMode(true); ?>
<? if( count($arResult["ITEMS"] ) > 0) : ?>
<div class="partners">
	<?foreach($arResult["ITEMS"] as $arItem):?>	
	<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));			
		
		$arUrl = parse_url($arItem["PROPERTIES"]["LINK"]["VALUE"]);		
		$link = ($arUrl["scheme"] ? $arUrl["scheme"] : "http") . "://";
		$link .= $arUrl["host"] ? $arUrl["host"] : $arUrl["path"] ;		
	?>
	<div class="partner" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($picture = $arItem['PREVIEW_PICTURE']):?>	
		<a href="<?= $link ?>" class="img">
			<?$file = CFile::ResizeImageGet($picture['ID'], array('width'=>232, 'height'=>148), BX_RESIZE_IMAGE_EXACT, true); ?>
			<img src="<?=$file['src']?>" alt="<?= htmlspecialcharsbx($arItem["NAME"]) ?>" alt="<?= htmlspecialcharsbx($arItem["NAME"]) ?>" />
		</a>
		<?endif?>
		<a href="" class="title"><?= $arItem["NAME"] ?></a>
		<div class="desc">
			<?=$arItem["PREVIEW_TEXT"]?>
		</div>
		<a href="<?= $link ?>" class="part-link"><?= $arItem["PROPERTIES"]["LINK"]["VALUE"] ?></a>
	</div>	
	<?endforeach?>	
</div>
<?=$arResult['NAV_STRING']?>
<? else: ?>
<p class="no-found"><?= GetMessage("PARTNERS_NOT_FOUND") ?></p>
<? endif ?>


