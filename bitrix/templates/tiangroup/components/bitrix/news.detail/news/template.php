<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? $this->setFrameMode(true); ?>

<? if ($arResult['DETAIL_PICTURE']["SRC"]) : ?>
<img src="<?= $arResult['DETAIL_PICTURE']["SRC"] ?>">
<? endif ?>
<?if(strlen($arResult["DETAIL_TEXT"])>0){?>

	<?=$arResult["DETAIL_TEXT"];?>

<?}else{?>

	<p class="txt">
		<?=$arResult["PREVIEW_TEXT"]?>
	</p>

<?}?>
<div class="in-date"><?=$arResult['DISPLAY_ACTIVE_FROM']?></div>
<div class="final nw">
	<a href="<?= $arParams["DETAIL_PAGE_LIST"] ?>" class="button">Посмотреть список новостей</a>
</div>
	


