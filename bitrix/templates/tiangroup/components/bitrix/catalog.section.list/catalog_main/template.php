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
    $pagetitle = isset($arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]) && $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"] != ""
        ? $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]
        : $arResult['SECTION']['NAME'];

    $APPLICATION->SetTitle($pagetitle );
}

if (0 < $arResult["SECTIONS_COUNT"]) : ?>
<div class="top-prod">
	<? foreach ($arResult['SECTIONS'] as $arSection) : ?> 
	<?	
		$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
		$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
	?>	
	<a href="<?=$arSection["SECTION_PAGE_URL"]?>" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
		<div class="img">
			<?if($picture = $arSection['PICTURE']):?>
			<?$file = CFile::ResizeImageGet($picture['ID'], array('width'=>220, 'height'=>155), BX_RESIZE_IMAGE_EXACT, true); ?>
			<img src="<?=$file['src']?>" alt="<?= htmlspecialcharsbx($arSection["NAME"]) ?>" />
			<? else: ?>
			<img src="<?=SITE_TEMPLATE_PATH ?>/assets/images/nofoto/prod_index.jpg" alt="<?= htmlspecialcharsbx($arSection["NAME"]) ?>" />
			<?endif?>
		</div>
		<?= $arSection["NAME"] ?>
	</a>
	<?endforeach ?>		
</div>
<? else : ?>
	
<? endif ?>