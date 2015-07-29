<?php

/**
 *  docs https://dev.1c-bitrix.ru/api_help/form/validators.php
 * 
 */

class CFormCustomValidatorPhone
{
  function GetDescription()
  {
    return array(
      "NAME"            => "phone",                                           // идентификатор
      "DESCRIPTION"     => "Телефон",                                         // наименование
      "TYPES"           => array("text", "textarea"),                         // типы полей
	  "SETTINGS"        => array("CFormCustomValidatorPhone", "GetSettings"), // метод, возвращающий массив настроек    
      "CONVERT_TO_DB"   => array("CFormCustomValidatorPhone", "ToDB"),        // метод, конвертирующий массив настроек в строку
      "CONVERT_FROM_DB" => array("CFormCustomValidatorPhone", "FromDB"),      // метод, конвертирующий строку настроек в массив	  
      "HANDLER"         => array("CFormCustomValidatorPhone", "DoValidate")   // валидатор
    );
  }

  function GetSettings()
  {
    return array(
      "REG" => array(
        "TITLE"   => "Регулярное выражение",
        "TYPE"    => "TEXT",
        "DEFAULT" => "#^\+[0-9]{1,2}\s?\([0-9]{3}\)\s?[0-9]+\-[0-9]+\-[0-9]{2}+$#",
      ),      
    );
  } 
  
  function ToDB($arParams)
  {
    // проверка переданных параметров
    $arParams["REG"] = $arParams["REG"];  
    
    // возвращаем сериализованную строку
    return serialize($arParams);
  }

  function FromDB($strParams)
  {
    // никаких преобразований не требуется, просто вернем десериализованный массив
    return unserialize($strParams);
  }
    
  function DoValidate($arParams, $arQuestion, $arAnswers, $arValues)
  {
    global $APPLICATION;
   
    foreach ($arValues as $value)
    {      
		if(!preg_match("$arParams[REG]", $value))
		{			
			$APPLICATION->ThrowException("#FIELD_NAME#: некорректно заполнено поле");
			return false;
		}	
	}
	
    // все значения прошли валидацию, вернем true
    return true;
  }
}

// установим метод CFormCustomValidatorNumberEx в качестве обработчика события
AddEventHandler("form", "onFormValidatorBuildList", array("CFormCustomValidatorPhone", "GetDescription"));
?>