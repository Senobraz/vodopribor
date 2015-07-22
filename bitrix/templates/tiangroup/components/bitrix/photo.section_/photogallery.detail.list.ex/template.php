<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? if( $arResult["ITEMS"] ) : ?>
<ul>		
	<? foreach($arResult["ITEMS"] as $arItem):?>	
	<li>
		<a title="<?= $arItem["NAME"] ?>" data-url="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="photo-fancy" rel="album<?= $arResult["ID"] ?>" href="<?= $arItem['PREVIEW_PICTURE']["SRC"] ?>">
			<?if($picture = $arItem['PREVIEW_PICTURE']):?>
			<?$file = CFile::ResizeImageGet($picture['ID'], array('width'=>259, 'height'=>177), BX_RESIZE_IMAGE_PROPORTIONAL, true); ?>
			<img src="<?=$file['src']?>" alt="" />
			<?endif?>
		</a>
	</li>
	<? endforeach?>		
</ul>
<? endif ?>

