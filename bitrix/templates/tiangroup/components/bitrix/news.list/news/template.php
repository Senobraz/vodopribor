<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="news">
	<ul class="lvl-2">
		<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			//echo "<pre>"; var_dump($arItem); echo "</pre>";
		?>
		<li class="item"  id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<?if($picture = $arItem['PREVIEW_PICTURE']):?>
				<?$file = CFile::ResizeImageGet($picture['ID'], array('width'=>940, 'height'=>400), BX_RESIZE_IMAGE_EXACT, true); ?>
				<img src="<?=$file['src']?>" alt="" />
			<?endif?>
			<div class="left">
				<div class="date">
					<?=$arItem['DISPLAY_ACTIVE_FROM']?>				
				</div>
				<a class="title" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
				<div class="txt">
					 <?=$arItem["PREVIEW_TEXT"]?>
				</div>
			</div>
		</li>
		<?endforeach?>	
	</ul>
</div>
<?=$arResult['NAV_STRING']?>


