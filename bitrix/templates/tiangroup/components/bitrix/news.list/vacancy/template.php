<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? $this->setFrameMode(true); ?>
<? if( count($arResult["ITEMS"] ) > 0) : ?>

	<?foreach($arResult["ITEMS"] as $arItem):?>	
	<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));			
	?>	
	<div class="vac-item">
		<div class="vac-top" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="left"><?= $arItem["NAME"] ?></div>
			<div class="right"><?= $arItem["PROPERTIES"]["ZP"]["VALUE"] ?></div>
		</div>
		<div class="vac-bot">
			<? foreach ( $arItem["DISPLAY_PROPERTIES"] as $prop) :?> 
			<div class="vac-row">
				<div class="left"><?= $prop["NAME"]?></div>
				<div class="right"><?= $prop["DISPLAY_VALUE"]?></div>
			</div>
			<? endforeach; ?>		
			<div class="final">
				<div class="vac-fin">
					<h5><?= GetMessage("VACANCY_PHONES") ?></h5>
					<?
						$arText = $arItem["PROPERTIES"]["PHONES"]["VALUE"];					
					?>
					<?= $arText["TYPE"] == "html" ? htmlspecialcharsBack($arText["TEXT"]) : nl2br($arText["TEXT"]) ?>				
				</div>
				<div class="vac-fin">
					<h5><?= GetMessage("VACANCY_CONTACTS") ?></h5>				
					<?= $arItem["PROPERTIES"]["CONTACTS"]["VALUE"] ?>	
				</div>
				<div class="vac-fin">
					<h5><?= GetMessage("VACANCY_EMAIL") ?></h5>
					<a href="mailto:<?= $arItem["PROPERTIES"]["EMAIL"]["VALUE"] ?>"><?= $arItem["PROPERTIES"]["EMAIL"]["VALUE"] ?></a>
				</div>
			</div>
		</div>	
	</div>
	<?endforeach?>	
</div>
<?=$arResult['NAV_STRING']?>
<? else: ?>
<p class="no-found"><?= GetMessage("VACANCY_NOT_FOUND") ?></p>
<? endif ?>


