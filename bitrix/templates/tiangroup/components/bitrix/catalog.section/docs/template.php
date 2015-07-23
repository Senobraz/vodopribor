<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? $this->setFrameMode(true); ?>
<? if( count($arResult["ITEMS"] ) > 0) : ?>
<div class="doc">
	<div class="top"><?= GetMessage("DOCS_TITLE") ?></div>
	<?foreach($arResult["ITEMS"] as $arItem):?>	
	<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));			
	
		if( LANG_CHARSET == 'windows-1251' )
		{
			$filePath = $arItem["PROPERTIES"]["FILE"]["VALUE"];
			$filePathRoot = mb_convert_encoding($_SERVER["DOCUMENT_ROOT"] . $filePath,  'UTF-8', 'Windows-1251');
			
		}
		else
		{
			$filePath = $arItem["PROPERTIES"]["FILE"]["VALUE"];
			$filePathRoot = $_SERVER["DOCUMENT_ROOT"] . $filePath;
			
		}		
		
		if(!file_exists($filePathRoot)) 
			continue;
		
		$fileSize = ceil(filesize($filePathRoot) / 1024);
	
	?>
	<div class="doc-row" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<a href="<?= $filePath ?>" class="us-icon"></a>
		<a href="<?= $filePath ?>"><?= $arItem['NAME'] ?> <span><?= $fileSize ?> <?= GetMessage("DOCS_KB") ?></span></a>
	</div>
	<?endforeach?>	
</div>
<? else: ?>
<p class="no-found"><?= GetMessage("DOCS_NOT_FOUND") ?></p>
<? endif ?>