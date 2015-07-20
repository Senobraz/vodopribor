<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="catalog">
	<ul class="lvl-2 uslugi">
		<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		//echo "<pre>"; var_dump($arItem); echo "</pre>";
		?>
		<li class="item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
			<div class="left">
				<a href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
					<div class="uslugi-img">
						<?if($picture = $arItem['PREVIEW_PICTURE']):?>
						<?$file = CFile::ResizeImageGet($picture['ID'], array('width'=>940, 'height'=>400), BX_RESIZE_IMAGE_EXACT, true); ?>
						<img src="<?= $file['src'] ?>" alt="" />
						<?endif?>
					</div>
				</a>
			</div>
			<div class="right">
				<div class="title">
					<a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><?= $arItem["NAME"] ?></a>
				</div>
				<div class="txt">
					<?= $arItem["PREVIEW_TEXT"] ?>
				</div>
			</div>
		</li>
		<?endforeach?>		
	</ul>
	<?=$arResult['NAV_STRING']?>
</div>