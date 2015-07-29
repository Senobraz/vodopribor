<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
	$SID = $arResult["arForm"]["SID"];
?>
<div class="form">
	<?=$arResult["FORM_ERRORS_TEXT"];?>
	<?=$arResult["FORM_DESCRIPTION"]?>
	<?=$arResult["FORM_HEADER"]?>
		<? foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) : ?>
		<?
			if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden') :

				echo $arQuestion["HTML_CODE"];

			else :		
		?>
		<div class="row">
			<label for="id1">
				<?=$arQuestion["CAPTION"]?>
				<span><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?></span>
			</label>
			<?= $arQuestion["HTML_CODE"]?>
			
		</div>
		<? endif ?>
		<? endforeach ?>
		<? if($arResult["isUseCaptcha"] == "Y") : ?>
		<div class="row">
			<label for="id9">Введите символы с картинки<span>*</span></label>
			<div class="capcha">
				<img id="captcha_img<?= $SID ?>" src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>">	
				<a class="reload reload<?= $SID ?>"></a>
				<input id="captcha_sid<?= $SID ?>" type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" />
				<input type="text" name="captcha_word" size="30" maxlength="50" value="" class="inputtext" />
			</div>
		</div>
		<? endif ?>
		<div class="final">
			<button name="web_form_submit" class="button" type="submit"><?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?></button>
		</div>
	<input type="hidden" name="web_form_apply" value="Y" />
	<?=$arResult["FORM_FOOTER"]?>
</div>
<div style="display:none;">
	<div class="dones" id="done"> 
		<h2>Спасибо! </h2>
		<p>Ваше сообщение отправлено.</p>
	</div>
</div>


<script type="text/javascript">
  
   
	$(document).ready(function(){
		
		var <?= $SID ?> = $('form[name="<?= $SID ?>"]');
		var $url = '<?= $this->GetFolder() ?>' + '/ajax/captcha.php';
		
		$('.reload<?= $SID ?>, #captcha_img<?= $SID ?>').click(function(){    			
			var that = $('.reload<?= $SID ?>');
			that.addClass('load');
			
			$.getJSON($url, function(data) {
			  $('#captcha_img<?= $SID ?>').attr('src','/bitrix/tools/captcha.php?captcha_sid='+data);
			  $('#captcha_sid<?= $SID ?>').val(data);
			  that.removeClass('load');
			});			
			return false;
		});	
	  
		$(<?= $SID ?>).ajaxForm({
			dataType: 'json',
			data: {
                web_form_is_ajax: 1,               
            },
            beforeSend: function() {
				$(<?= $SID ?>).find(".error").removeClass('error');
            },
			success: function(data) {                
				if (data.result == 'error') {
                    if (data.errors)
                        $.each(data.errors, function (index, value) {
                            $(<?= $SID ?>).find("[name=" + index + "]").addClass('error');							
						});                  
                } else {
                    $("#done").html(data.message);
					$.fancybox($('#done'));
					setTimeout(function(){
							$.fancybox.close();
					   },1500);					
                    $(<?= $SID ?>).trigger('reset');
                }
				$('.reload<?= $SID ?>, #captcha_img<?= $SID ?>').click();
			}		
			
		});	 
		
		if ($('input[name="form_text_26"]').length > 0) {
			 $('input[name="form_text_26"]').mask('+7(999) 999-99-99');
		}
   });     
</script>