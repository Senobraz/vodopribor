<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? $this->setFrameMode(true); ?>

<?= $arResult["DESCRIPTION"] ?>
<? 
	if ( empty($arResult["DESCRIPTION"]) ) 
		echo GetMessage("PHOTO_SECTION_NOT_FOUND");
?>
<? if( count($arResult["ITEMS"]) ) : ?>
<div class="slider-card us">	
	<div class="slider-top">
		<ul>
			<?foreach($arResult["ITEMS"] as $arItem):?>
			<li>
				<a href="<?= $arItem["PICTURE"]["SRC"] ?>" class="fnc" title="<?= htmlspecialcharsbx($arItem["NAME"]) ?>" rel="cs">				
					<?if($picture = $arItem['PREVIEW_PICTURE']):?>
					<?$file = CFile::ResizeImageGet($picture['ID'], array('width'=>652, 'height'=>378), BX_RESIZE_IMAGE_EXACT, true); ?>
					<img src="<?=$file['src']?>" title="<?= htmlspecialcharsbx($arItem["NAME"]) ?>" />
					<?endif?>
				</a>
			</li>
			<?endforeach?>			
		</ul>
	</div>
	<div class="slider-page" id="pager">
		<? $i=0; foreach($arResult["ITEMS"] as $arItem):?>
		<a data-slide-index="<?= $i ?>" >
			<?if($picture = $arItem['PREVIEW_PICTURE']):?>
			<?$file = CFile::ResizeImageGet($picture['ID'], array('width'=>65, 'height'=>65), BX_RESIZE_IMAGE_EXACT, true); ?>
			<img src="<?=$file['src']?>" title="<?= htmlspecialcharsbx($arItem["NAME"]) ?>" />
			<?endif?>
		</a>
		<? $i++; endforeach?>		
	</div>
</div>
<?endif;?>