<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die(); ?>
<?php	

	if ($arResult["arForm"]["ID"] == $arParams["WEB_FORM_ID"]) 
	{
		if ( bitrix_sessid() == $_REQUEST["sessid"])
		{			
			if( ($_REQUEST["web_form_apply"] == "Y")
				&& ($_REQUEST["web_form_is_ajax"] == 1) )
			{			 
				$APPLICATION->RestartBuffer();

				$result = array();
				$errors = array();
				
				
				if( LANG_CHARSET == 'windows-1251' )
				{
					$arParams["FORM_RESULT_NEW_SUCCESS"] = mb_convert_encoding($arParams["FORM_RESULT_NEW_SUCCESS"],  'UTF-8', 'Windows-1251');
					$arResult["FORM_ERRORS_TEXT"] = mb_convert_encoding($arResult["FORM_ERRORS_TEXT"],  'UTF-8', 'Windows-1251');
					
					if ($arResult["isFormErrors"] == "Y")
					{
						foreach( $arResult["FORM_ERRORS"] as $key => $value)
							$arResult["FORM_ERRORS"][$key] = mb_convert_encoding($value,  'UTF-8', 'Windows-1251');
					}					
				}	
				
				
				/*
				 * docs http://dev.1c-bitrix.ru/api_help/form/htmlnames.php
				 */
				foreach( $arResult["FORM_ERRORS"] as $field_sid => $value)
				{
					
					if( $field_sid === 0)
					{
						$errors["captcha_word"] = $value;
					}
					elseif (count($arResult["arAnswers"][$field_sid]) > 1)
					{
						/*
						 * form_dropdown_question_sid
						 * form_radio_question_sid
						 * form_checkbox_question_sid[]
						 * form_multiselect_question_sid[]
						 */
						$field_name = "form_" . $arResult["arAnswers"][$field_sid][0]["FIELD_TYPE"] . "_" . $field_sid;
						$errors[$field_name] = $value;
					}					
					else
					{
						/*
						 * form_text_answer_id
						 * form_textarea_answer_id
						 */
						$field_name = "form_" . $arResult["arAnswers"][$field_sid][0]["FIELD_TYPE"] . "_" . $arResult["arAnswers"][$field_sid][0]["ID"] ;
						$errors[$field_name] = $value;						
					}					
				}

				$result["message"] = $arParams["FORM_RESULT_NEW_SUCCESS"]; 
				$result["result"] = "success";

				if ($arResult["isFormErrors"] == "Y")
				{				
					$result["message"] =  strip_tags($arResult["FORM_ERRORS_TEXT"],"<br>");				
					$result["message"] =  str_replace(array("&nbsp","&quot",";","&raquo",""), array(" ", "","","","\n"), $result["msg"]);
					
					$result["errors"] = $errors;
					
					$result["result"] = "error";
				}				
				
				echo json_encode($result);
				exit;
			}
		}
	}		
 ?>