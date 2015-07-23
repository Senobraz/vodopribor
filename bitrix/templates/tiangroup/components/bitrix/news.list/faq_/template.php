<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? $this->setFrameMode(true); ?>
<?$isSections = $APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"select_section_list",
	Array(
		"COMPONENT_TEMPLATE" => "select_section_list",
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"SECTION_ID" => "",
		"SECTION_CODE" => "",
		"COUNT_ELEMENTS" => "Y",
		"TOP_DEPTH" => "2",
		"SECTION_FIELDS" => array("NAME"),
		"SECTION_USER_FIELDS" => array(""),
		"VIEW_MODE" => "LINE",
		"SHOW_PARENT_NAME" => "Y",
		"SECTION_URL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y"
	),
	$component
);?>
<? if( count($arResult["ITEMS"] ) > 0) : ?>
	<?foreach($arResult["ITEMS"] as $arItem):?>	
	<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));			
	?>
	<div class="vop-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="vop-row">
			<div class="mini">
				<div class="left vo"><?= GetMessage("FAQ_Q") ?></div>
				<div class="right">
					<div><?=$arItem['DISPLAY_ACTIVE_FROM']?>  •  <?= $arItem["NAME"] ?></div>
					<?= $arItem["PREVIEW_TEXT"] ?>
				</div>
			</div>
			<div class="mini sec">
				<div class="left"><?= GetMessage("FAQ_A") ?></div>
				<div class="right">
					<?= $arItem["DETAIL_TEXT"] ?>					
				</div>
				<div class="final ">
					<a  class="button vo"><?= GetMessage("FAQ_MORE") ?></a>
				</div>
			</div>
		</div>
	</div>
<?endforeach?>
<?=$arResult['NAV_STRING']?>
<? else: ?>
<p class="no-found"><?= GetMessage("FAQ_NOT_FOUND") ?></p>
<? endif ?>


