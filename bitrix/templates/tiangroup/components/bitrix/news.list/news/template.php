<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? if( count($arResult["ITEMS"] ) > 0) : ?>
<div class="news">
	<?foreach($arResult["ITEMS"] as $arItem):?>
	<div class="n-item">
		<?if($picture = $arItem['PREVIEW_PICTURE']):?>	
		<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="img">
			<?$file = CFile::ResizeImageGet($picture['ID'], array('width'=>294, 'height'=>200), BX_RESIZE_IMAGE_EXACT, true); ?>
			<img src="<?=$file['src']?>" alt="<?= htmlspecialchars($arItem["NAME"]) ?>" />
		</a>
		<?endif?>
		<a href="" class="title"><?= $arItem["NAME"] ?></a>
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


