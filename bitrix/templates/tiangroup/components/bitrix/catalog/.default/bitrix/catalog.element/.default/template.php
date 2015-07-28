<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>
<? $this->setFrameMode(true); ?>
<div class="card-title"><span><?= GetMessage("CATALOG_DBC_ELEMENT_VENDER") ?>:</span> 
	<?= $arResult["PROPERTIES"]["S_VENDER"]["VALUE"] ?>
</div>
<? if( count($arResult['MORE_PHOTO']) > 0 ) : ?> 
	<? if ( count($arResult['MORE_PHOTO']) > 1 ) : ?>
	<div class="slider-card">
		<div class="slider-top">
			<ul>
				<? foreach( $arResult['MORE_PHOTO'] as $arPicture ) : ?>
				<li>			
					<a class="fnc" title="<?= $arPicture["DESCRIPTION"] ? $arPicture["DESCRIPTION"]  : $arResult["NAME"] ?>" rel="cs" href="<?= $arPicture["SRC"] ?>">
						<img src="<?= $arPicture["DETAIL"]["src"] ?>" />
					</a>
				</li>
				<? endforeach ?>				
			</ul>
		</div>
		<div class="slider-page" id="pager">
			<? $i=0; foreach( $arResult['MORE_PHOTO'] as $arPicture ) : ?>
			<a data-slide-index="<?= $i ?>" href=""><img src="<?= $arPicture["PREVIEW"]["src"] ?>" /></a>				
			<? $i++; endforeach ?>
		</div>	
	</div>
	<? else : ?>
		<? $arPicture = current($arResult['MORE_PHOTO']) ?>
		<img class="detail-one-img" src="<?= $arPicture["DETAIL"]["src"] ?>" />
	<? endif ?>
<? endif ?>
<? if($arResult["PROPERTIES"]["S_FILE"]["PATH"]) : ?>
<div class="ramka">
	<div class="doc">
		<div class="top"><?= GetMessage("CATALOG_DBC_ELEMENT_FILE") ?></div>
		<div class="doc-row">
			<a href="<?= $arResult["PROPERTIES"]["S_FILE"]["PATH"] ?>" class="us-icon"></a>
			<a href="<?= $arResult["PROPERTIES"]["S_FILE"]["PATH"] ?>"><?= $arResult["PROPERTIES"]["S_FILE"]["NAME"] ?> <span><?= $arResult["PROPERTIES"]["S_FILE"]["SIZE"] ?> Κα</span></a>
		</div>
	</div>
</div>
<? endif ?>

<div class="new-char">
	<div class="new-plus n-char">
		<div><a href="" class="showed active" data-item="1"><span><?= GetMessage("CATALOG_DBC_ELEMENT_DESCRIPTION") ?></span></a></div>
		<? if($arResult["DISPLAY_PROPERTIES"]) : ?>
		<div><a href="" data-item="2" class="showed"> <span><?= GetMessage("CATALOG_DBC_ELEMENT_CHAR") ?></span></a></div>
		<? endif ?>
		<? if ($arResult["PROPERTIES"]["S_DOCS"]["VALUE"]) : ?>
		<div><a href="" data-item="3" class="showed "> <span><?= GetMessage("CATALOG_DBC_ELEMENT_DOCS") ?></span></a></div>
		<? endif ?>
		<? if ($arResult["PROPERTIES"]["S_PRICE_CONTENT"]["VALUE"]) : ?>
		<div><a href="" data-item="4" class="showed "> <span><?= GetMessage("CATALOG_DBC_ELEMENT_PRICE") ?></span></a></div>
		<? endif ?>
	</div>
	<div class="n-char-body showed" data-item="1">
		<?= $arResult["DETAIL_TEXT"] ? $arResult["DETAIL_TEXT"] : $arResult["PREVIEW_TEXT"] ?>		
	</div>
	<? if($arResult["DISPLAY_PROPERTIES"]) : ?>
	<div class="n-char-body" data-item="2">
		<table>
			<thead>
				<tr>
					<th><?= GetMessage("CATALOG_DBC_ELEMENT_PROP") ?></th>
					<th><?= GetMessage("CATALOG_DBC_ELEMENT_VALUE") ?></th>				
				</tr>
			</thead>
			<tbody>
				<? foreach ( $arResult["DISPLAY_PROPERTIES"] as $prop) :?> 
				<tr>
					<td><?= $prop["NAME"]?></td>
					<td><?= $prop["DISPLAY_VALUE"]?></td>					
				</tr>
				<? endforeach; ?>			
			</tbody>
		</table>
	</div>
	<? endif ?>
	<? if ($arResult["PROPERTIES"]["S_DOCS"]["VALUE"]) : ?>
	<div class="n-char-body" data-item="3">
		<? foreach( $arResult["PROPERTIES"]["S_DOCS"]["VALUE"] as $file ) : ?>
		<div class="doc-row">
			<a href="<?= $file["PATH"] ?>" class="us-icon"></a>
			<a href="<?= $file["PATH"] ?>"><?= $file["NAME"] ?> <span><?= $file["SIZE"] ?> Κα</span></a>
		</div>
		<? endforeach; ?>		
	</div>
	<? endif ?>
	<? if ($arResult["PROPERTIES"]["S_PRICE_CONTENT"]["VALUE"]) : ?>
	<div class="n-char-body" data-item="4">
		<?
			$arText = $arResult["PROPERTIES"]["S_PRICE_CONTENT"]["VALUE"];					
		?>
		<?= $arText["TYPE"] == "html" ? htmlspecialcharsBack($arText["TEXT"]) : nl2br($arText["TEXT"]) ?>		
	</div>
	<? endif ?>
</div>



