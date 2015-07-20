<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="banners">
	<?foreach($arResult["ITEMS"] as $arItem) : ?>
	<a href="<?= $arItem["PROPERTIES"]["HREF"]["VALUE"] ?>">	
		<?if($picture = $arItem['PREVIEW_PICTURE']):?>
			<?$file = CFile::ResizeImageGet($picture['ID'], array('width'=>220, 'height'=>220), BX_RESIZE_IMAGE_PROPORTIONAL, true); ?>
			<img src="<?=$file['src']?>" alt="" />
		<?endif?>
	</a>
	<?endforeach?> 	
</div>