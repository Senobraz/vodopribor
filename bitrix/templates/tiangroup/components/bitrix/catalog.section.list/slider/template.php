<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

if ('Y' == $arParams['SHOW_PARENT_NAME'] && 0 < $arResult['SECTION']['ID'])
{
//    $pagetitle = isset($arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]) && $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"] != ""
//        ? $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]
//        : $arResult['SECTION']['NAME'];
//
//    $APPLICATION->SetTitle($pagetitle );
}?>
<? if (0 < $arResult["SECTIONS_COUNT"]) : ?>
<div class="slider">
	<div class="vert-sl">
		<ul>
			<? $i=1; foreach ($arResult['SECTIONS'] as $arSection) : ?> 
			<?	
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
			?>	
			<li id="<?=$this->GetEditAreaId($arSection['ID']);?>">
				<a  data-action="<?= $i ?>" class="<?= $i==1 ? "active" : "" ?>">
					<div class="img">
						<div>
							<?if($picture = $arSection['PICTURE']):?>	
							<?$file = CFile::ResizeImageGet($picture['ID'], array('width'=>99, 'height'=>99), BX_RESIZE_IMAGE_EXACT, true); ?>
							<img src="<?=$file['src']?>" alt="<?= htmlspecialcharsbx($arSection["NAME"]) ?>" />							
							<?endif?>
						</div>
					</div>
					<div class="desc">
						<span><?= $arSection["NAME"] ?></span>
					</div>
				</a>
			</li>
			<? $i++; endforeach; ?>
		</ul>
	</div>
	<div class="horiz-sl">
		<? $i=1; foreach ($arResult['SECTIONS'] as $arSection) : ?> 
		<div class="sl-object <?= $i==1 ? "visible" : "" ?>"  data-slider="<?= $i ?>">		
			<ul id="obj<?= $i ?>">
			<?$APPLICATION->IncludeComponent("bitrix:photo.section", "main", array(
				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"SECTION_ID" => $arSection["ID"],
				"SECTION_CODE" => $arSection["CODE"],
				"SECTION_USER_FIELDS" => array(
					0 => "",
					1 => "",
				),
				"ELEMENT_SORT_FIELD" => "",
				"ELEMENT_SORT_ORDER" => "",
				"FILTER_NAME" => "arrFilter",
				"FIELD_CODE" => array(
					0 => "",
					1 => "",
				),
				"PROPERTY_CODE" => array(
					0 => "LINK",
					1 => "",
				),
				"PAGE_ELEMENT_COUNT" => 100,
				"LINE_ELEMENT_COUNT" => "",
				"SECTION_URL" => "",
				"DETAIL_URL" => "",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "N",
				"AJAX_OPTION_HISTORY" => "N",
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "36000000",
				"CACHE_FILTER" => "N",
				"CACHE_GROUPS" => "Y",
				"META_KEYWORDS" => "",
				"META_DESCRIPTION" => "",
				"BROWSER_TITLE" => "-",
				"SET_TITLE" => "Y",
				"SET_STATUS_404" => "N",
				"ADD_SECTIONS_CHAIN" => "N",
				"PAGER_TEMPLATE" => "main",
				"DISPLAY_TOP_PAGER" => "N",
				"DISPLAY_BOTTOM_PAGER" => "Y",
				"PAGER_TITLE" => "Фотографии",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "Y",
				"AJAX_OPTION_ADDITIONAL" => ""
				),
				$component
			);?>
			</ul>
			<div class="slider-counter"></div>
		</div>
		<? $i++; endforeach; ?>		
	</div>
</div>
<? endif; ?>