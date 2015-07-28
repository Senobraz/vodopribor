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
$this->setFrameMode(true);?>

<? if (0 < $arResult["SECTIONS_COUNT"]) : ?>
	<div class="our-slider">
		<div class="our-wr">
			<ul>
				<? foreach ($arResult['SECTIONS'] as $arSection) : ?> 
				<?	
					$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
					$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
				?>	
				<li id="<?=$this->GetEditAreaId($arSection['ID']);?>">
					<a href="<?=$arSection["SECTION_PAGE_URL"]?>">
						<div class="img">						
							<?if($picture = $arSection['PICTURE']):?>
							<?$file = CFile::ResizeImageGet($picture['ID'], array('width'=>185, 'height'=>110), BX_RESIZE_IMAGE_EXACT, true); ?>
							<img src="<?=$file['src']?>" alt="<?= htmlspecialcharsbx($arSection["NAME"]) ?>" />
							<? else: ?>
							<img src="<?=SITE_TEMPLATE_PATH ?>/assets/images/nofoto/spec_index.jpg" alt="<?= htmlspecialcharsbx($arSection["NAME"]) ?>" />
							<?endif?>						
						</div>
						<?= $arSection["NAME"] ?> 
					</a>
				</li>
				<?endforeach ?>					
			</ul>
		</div>
	</div>
<? else : ?>
	
<? endif ?>