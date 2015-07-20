<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?//echo '<pre>';print_r($arResult);echo '</pre>';?>

<ul class="slides">
	<?foreach($arResult["ITEMS"] as $arItem) : ?>
	<li>
		<a href="<?= $arItem["PROPERTIES"]["HREF"]["VALUE"] ?>">			
			<?if($picture = $arItem['DETAIL_PICTURE']):?>
				<?$file = CFile::ResizeImageGet($picture['ID'], array('width'=>940, 'height'=>400), BX_RESIZE_IMAGE_EXACT, true); ?>
				<img src="<?=$file['src']?>" alt="" />
			<?endif?>

			<div class="content_slide">
				<div class="txt">
					<span class="title"><?=$arItem["NAME"]?></span>
				</div>
			</div>
		</a>
	</li>
	<?endforeach?> 	
</ul>