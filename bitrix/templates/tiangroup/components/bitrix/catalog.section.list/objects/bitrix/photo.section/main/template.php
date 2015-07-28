<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? $this->setFrameMode(true); ?>
<? if( count($arResult["ITEMS"]) ) : ?>
	<div class="obj-content">
		<?= $arResult["DESCRIPTION"] ?>
	</div>	
	<div class="obj-inner">
		<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
			$title = !empty($arItem["PREVIEW_TEXT"]) ? $arItem["PREVIEW_TEXT"] : $arItem["NAME"];		
		?>
		<a href="<?= $arItem["PICTURE"]["SRC"] ?>" class="fnc" title="<?= htmlspecialcharsbx($title) ?>" rel="obj">
			<?if($picture = $arItem['PREVIEW_PICTURE']):?>
			<?$file = CFile::ResizeImageGet($picture['ID'], array('width'=>148, 'height'=>148), BX_RESIZE_IMAGE_EXACT, true); ?>
			<img src="<?=$file['src']?>" alt="" />
			<?endif?>
		</a>
		<?endforeach?>	
	</div>
	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
	<? endif ?>
<? else: ?>
<p class="no-found"><?= GetMessage("PHOTO_SECTION_NOT_FOUND") ?></p>
<?endif;?>