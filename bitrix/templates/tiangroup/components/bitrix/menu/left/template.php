<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? $this->setFrameMode(true); ?>
<?if (empty($arResult)) return;?>
<? function show_html_ul_menu( $arItems ) { ?>
<ul>	
	<?foreach($arItems as $arItem) :?>
	<li class="<?= $arItem["SELECTED"] ? "opened hasul" : "" ?>">       
        <a href="<?=$arItem["LINK"]?>" class="<?= $arItem["SELECTED"] ? "active" : "" ?>"><?=$arItem["TEXT"]?></a>
        <?if(count($arItem["ITEMS"])){
			show_html_ul_menu($arItem["ITEMS"]);
        }?>
    </li>
	<?endforeach?> 
</ul>
<? } ?>
<? echo show_html_ul_menu($arResult) ?>



