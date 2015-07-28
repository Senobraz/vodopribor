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

$templateData = array(
	'TEMPLATE_THEME' => $this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/colors.css',
	'TEMPLATE_CLASS' => 'bx_'.$arParams['TEMPLATE_THEME']
);

?>
<? if( count($arResult["ITEMS"]) > 0) : ?> 

<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get" class="smartfilter">
    <?foreach($arResult["HIDDEN"] as $arItem):?>
    <input type="hidden" name="<?echo $arItem["CONTROL_NAME"]?>" id="<?echo $arItem["CONTROL_ID"]?>" value="<?echo $arItem["HTML_VALUE"]?>" />
    <?endforeach;?>
    
        <? foreach($arResult["ITEMS"] as $key=>$arItem) : ?>
		<div class="vac-item cat ">
			<div class="vac-top">
				<div class="left"><?=$arItem["NAME"]?></div>
				<div class="right"></div>
			</div>
            <?
                if(isset($arItem["PRICE"])):
                    if (!$arItem["VALUES"]["MIN"]["VALUE"] || !$arItem["VALUES"]["MAX"]["VALUE"] || $arItem["VALUES"]["MIN"]["VALUE"] == $arItem["VALUES"]["MAX"]["VALUE"])
                        continue;
                endif;
					
				if(
					empty($arItem["VALUES"])
					|| isset($arItem["PRICE"])
				)
					continue;

				if (
					$arItem["DISPLAY_TYPE"] == "A"
					&& (
						$arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0
					)
				)
					continue;				
            ?>
			<?
				$arCur = current($arItem["VALUES"]);
				switch ($arItem["DISPLAY_TYPE"])
				{
					case "A"://NUMBERS_WITH_SLIDER 
						//break;
					
					case "B"://NUMBERS
						//break;
					
					case "G"://CHECKBOXES_WITH_PICTURES
						//break;
					
					case "H"://CHECKBOXES_WITH_PICTURES_AND_LABELS
						//break;
					
					case "P"://DROPDOWN
						//break;
					
					case "R"://DROPDOWN_WITH_PICTURES_AND_LABELS
						//break;
					
					case "K"://RADIO_BUTTONS
						//break;
					
					case "U"://CALENDAR
						//break;
					
					default://CHECKBOXES
					?>
						<div class="vac-bot">
						<?foreach($arItem["VALUES"] as $val => $ar):?>						
							<div class="check">									
								<input
									type="checkbox"
									class="checkbox"
									value="<? echo $ar["HTML_VALUE"] ?>"
									name="<? echo $ar["CONTROL_NAME"] ?>"
									id="<? echo $ar["CONTROL_ID"] ?>"
									<? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
									onclick=""
								/>
								<label for="<? echo $ar["CONTROL_ID"] ?>"><?=$ar["VALUE"];?></label>
							</div>						
						<?endforeach;?>
						</div>	
				<?}
			?>
		</div>
        <? endforeach; ?>
    
    <input class=""  type="hidden" id="set_filter" name="set_filter" value="<?=GetMessage("CT_BCSF_SET_FILTER")?>" />
</form>

<script>
    $(document).ready(function() {
        $('.smartfilter input[type="checkbox"]').change( function(){
           $('.smartfilter').submit();
        })
		$('.vac-item.cat').each(function( index ) {
			var that = $(this);
			$(this).find('input[type="checkbox"]').each(function( index ) {
				if ($(this).prop('checked'))
					that.addClass('opened')
			});
		});
    })	
</script>
<? endif?>

