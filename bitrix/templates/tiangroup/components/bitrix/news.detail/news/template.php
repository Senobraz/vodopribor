<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if(strlen($arResult["DETAIL_TEXT"])>0){?>

	<?=$arResult["DETAIL_TEXT"];?>

<?}else{?>

	<p class="txt">
		<?=$arResult["PREVIEW_TEXT"]?>
	</p>

<?}?>


