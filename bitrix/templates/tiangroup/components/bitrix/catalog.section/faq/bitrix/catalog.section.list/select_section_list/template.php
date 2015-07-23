<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);

if (0 < $arResult["SECTIONS_COUNT"]) : ?>
<div class="form vop">
	<form action="" method="get" id="select_section_list_form">
		<div class="row">
			<label for="xx"><?= GetMessage("SELECT_SECTION_LIST_TITLE") ?></label>
			<select name="SECTION_CODE" id="select_section_list_select">
				<option value="<?= $arResult['SECTIONS'][1]["LIST_PAGE_URL"]?>"><?= GetMessage("SELECT_SECTION_LIST_ALL") ?></option>
				<? foreach ($arResult['SECTIONS'] as $arSection) : ?> 				
				<option 
					<? if($_REQUEST["SECTION_CODE"] == $arSection["CODE"]) : ?>
					selected="selected" 
					<? endif ?> 
					value="<?= $arSection["SECTION_PAGE_URL"] ?>"><?= $arSection["NAME"] ?></option>
				<?endforeach ?>					
			</select>
		</div>
	</form>
</div>
<script>
	$('#select_section_list_select').change( function(){	
		window.location = $(this).val();
	})
</script>
	
<? else : ?>
	
<? endif ?>