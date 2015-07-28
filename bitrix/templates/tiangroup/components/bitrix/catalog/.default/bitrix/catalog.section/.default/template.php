<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? $this->setFrameMode(true); ?>
<? if ( !empty($arResult["ITEMS"])) : ?>
<div class="cat-result">
	<div class="res-top">
		<div class="left"><?= GetMessage("CT_BCS_CATALOG_TD_COLUMN_1") ?></div>
		<div class="right"><?= GetMessage("CT_BCS_CATALOG_TD_COLUMN_2") ?></div>
	</div>
	<? foreach($arResult["ITEMS"] as $arElement): ?> 
	<?	

		$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCT_ELEMENT_DELETE_CONFIRM')));

	?>
	<div class="res-item" id="<?=$this->GetEditAreaId($arElement['ID']);?>">
		<div class="left">
			<a href="<?= $arElement["DETAIL_PAGE_URL"]?>" class="title"><?= $arElement["NAME"] ?></a>
			<div>				
				<?if($picture = $arElement['PREVIEW_PICTURE']):?>
				<a href="<?= $arElement["DETAIL_PAGE_URL"]?>" class="img">
					<?$file = CFile::ResizeImageGet($picture['ID'], array('width'=>89, 'height'=>89), BX_RESIZE_IMAGE_EXACT, true); ?>
					<img src="<?=$file['src']?>" alt="<?= htmlspecialcharsbx($arElement["NAME"]) ?>" />					
				</a>
				<?endif?>	
				<div class="desc">
					<?= $arElement["PREVIEW_TEXT"] ?>
				</div>
			</div>
		</div>
		<div class="right">
			<? foreach ( $arElement["DISPLAY_PROPERTIES"] as $prop) :?> 
			<div class="res-row">
				<div class="left"><?= $prop["NAME"]?>:</div>
				<div class="right"><?= $prop["DISPLAY_VALUE"]?></div>
			</div>
			<?endforeach?>	
		</div>
	</div>
	<? endforeach; ?>	
</div>
<? if (strlen($arResult["NAV_STRING"]) > 0):?><?= $arResult["NAV_STRING"] ?><?endif?>
<? else: ?>
<p class="not-found"><?= GetMessage("CT_BCS_CATALOG_BTN_MESSAGE_NOT_FOUNT") ?></p>
<? endif; ?>