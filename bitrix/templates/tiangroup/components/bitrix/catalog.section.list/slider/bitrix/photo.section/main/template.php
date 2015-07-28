<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? $this->setFrameMode(true); ?>
<? if( count($arResult["ITEMS"]) ) : ?>

	<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
		$title = !empty($arItem["PREVIEW_TEXT"]) ? $arItem["PREVIEW_TEXT"] : $arItem["NAME"];		
	?>
	<li>
		<a href="<?= $arItem["PROPERTIES"]["LINK"]["VALUE"] ?>">
			<?if($picture = $arItem['PREVIEW_PICTURE']):?>
			<?$file = CFile::ResizeImageGet($picture['ID'], array('width'=>652, 'height'=>440), BX_RESIZE_IMAGE_EXACT, true); ?>
			<img src="<?=$file['src']?>" alt="<?= htmlspecialcharsbx($arItem["NAME"]) ?>" />
			<?endif?>
			<div class="title"><span><?= $arItem["NAME"] ?></span></div>						
		</a>
	</li>
	<?endforeach?>	
<?endif;?>