<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (empty($arResult)) return;?>
<ul>
<?foreach($arResult as $arItem){?>

    <li>       
        <a href="<?=$arItem["LINK"]?>" class="<?= $arItem["SELECTED"] ? "active" : "" ?>"><?=$arItem["TEXT"]?></a>
        <?if(count($arItem["ITEMS"])){?>
        <ul>
            <?foreach($arItem["ITEMS"] as $arItemSub){?>
            <li><a href="<?=$arItemSub["LINK"]?>" class="<?= $arItem["SELECTED"] ? "active" : "" ?>"><?=$arItemSub["TEXT"]?></a></li>
            <?}?>
        </ul>
        <?}?>
    </li>

<?}?>
</ul>	
