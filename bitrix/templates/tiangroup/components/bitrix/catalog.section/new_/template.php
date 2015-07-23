<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? if ( !empty($arResult["ITEMS"])) : ?>
<div class="tit-c">
	<a href="" class="title-h"><?= GetMessage("CT_BCS_CATALOG_BTN_MESSAGE_TITLE") ?></a>
</div>
<div class="slide-wrap">
	<ul>
		<? foreach($arResult["ITEMS"] as $arElement): ?> 
		<?	

			$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCT_ELEMENT_DELETE_CONFIRM')));
			
		?>
		<li>
			<a href="<?= $arElement["DETAIL_PAGE_URL"]?>" class="cat-item" id="<?=$this->GetEditAreaId($arElement['ID']);?>">
				<div class="img">
					<?if($picture = $arElement['PREVIEW_PICTURE']):?>
						<?$file = CFile::ResizeImageGet($picture['ID'], array('width'=>290, 'height'=>408), BX_RESIZE_IMAGE_EXACT, true); ?>
						<img src="<?=$file['src']?>" alt="" />
						<? else: ?>
						<img src="<?=SITE_TEMPLATE_PATH?>/assets/images/no-main.jpg" alt="" />
					<?endif?>				
				</div>
				<div class="desc"><?= $arElement["NAME"] ?></div>
				<div class="price">							
					<?

						if (!empty($arElement['MIN_PRICE']))
						{
							if ('N' == $arParams['PRODUCT_DISPLAY_MODE'] && isset($arElement['OFFERS']) && !empty($arElement['OFFERS']))
							{
								echo GetMessage(
									'CT_BCS_TPL_MESS_PRICE_SIMPLE_MODE',
									array(
										'#PRICE#' => $arElement['MIN_PRICE']['PRINT_DISCOUNT_VALUE'],									
									)
								);
							}
							else
							{
								echo $arElement['MIN_PRICE']['PRINT_DISCOUNT_VALUE'];
							}
							if ('Y' == $arParams['SHOW_OLD_PRICE'] && $arElement['MIN_PRICE']['DISCOUNT_VALUE'] < $arElement['MIN_PRICE']['VALUE'])
							{
								?> <span><? echo $arElement['MIN_PRICE']['PRINT_VALUE']; ?></span><?
							}
						}

					?>
				</div>
				<? if( $arElement["PROPERTIES"]["S_NEW"]["VALUE"] ) : ?>
				<div class="hit"><?= GetMessage("CT_BCS_CATALOG_BTN_MESSAGE_NEW") ?></div>
				<? endif ?>			
			</a>
		</li>
		<? endforeach; ?>		
	</ul>
</div>
<? endif ?>