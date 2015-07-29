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
      "NAME"            => "phone",                                           // �������������
      "DESCRIPTION"     => "�������",                                         // ������������
      "TYPES"           => array("text", "textarea"),                         // ���� �����
	  "SETTINGS"        => array("CFormCustomValidatorPhone", "GetSettings"), // �����, ������������ ������ ��������    
      "CONVERT_TO_DB"   => array("CFormCustomValidatorPhone", "ToDB"),        // �����, �������������� ������ �������� � ������
      "CONVERT_FROM_DB" => array("CFormCustomValidatorPhone", "FromDB"),      // �����, �������������� ������ �������� � ������	  
      "HANDLER"         => array("CFormCustomValidatorPhone", "DoValidate")   // ���������
    );
  }

  function GetSettings()
  {
    return array(
      "REG" => array(
        "TITLE"   => "���������� ���������",
        "TYPE"    => "TEXT",
        "DEFAULT" => "#^\+[0-9]{1,2}\s?\([0-9]{3}\)\s?[0-9]+\-[0-9]+\-[0-9]{2}+$#",
      ),      
    );
  } 
  
  function ToDB($arParams)
  {
    // �������� ���������� ����������
    $arParams["REG"] = $arParams["REG"];  
    
    // ���������� ��������������� ������
    return serialize($arParams);
  }

  function FromDB($strParams)
  {
    // ������� �������������� �� ���������, ������ ������ ����������������� ������
    return unserialize($strParams);
  }
    
  function DoValidate($arParams, $arQuestion, $arAnswers, $arValues)
  {
    global $APPLICATION;
   
    foreach ($arValues as $value)
    {      
		if(!preg_match("$arParams[REG]", $value))
		{			
			$APPLICATION->ThrowException("#FIELD_NAME#: ����������� ��������� ����");
			return false;
		}	
	}
	
    // ��� �������� ������ ���������, ������ true
    return true;
  }
}

// ��������� ����� CFormCustomValidatorNumberEx � �������� ����������� �������
AddEventHandler("form", "onFormValidatorBuildList", array("CFormCustomValidatorPhone", "GetDescription"));
?>