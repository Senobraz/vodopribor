<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

$sPropertyCodeImages = $arParams['ADD_PICT_PROP'];

if ( !empty($sPropertyCodeImages))
{
    if ($arParams["ADD_DETAIL_TO_SLIDER"])
    {
        $arImagesValues[] = $arResult['PREVIEW_PICTURE']["ID"];
    }    
    
    foreach ($arResult['PROPERTIES'][$sPropertyCodeImages]['VALUE'] as $value)
    {
        $arImagesValues[] = $value ;
    }
    
	if (!is_array($arImagesValues))
		$arImagesValues = array($arImagesValues);    
   
   
	foreach ($arImagesValues as &$iImage)
	{	       
		$arImageFile = CFile::GetFileArray($iImage);
		if (isset($arImageFile['ID']))
		{		

			$arDetailImageResize = CFile::ResizeImageGet(
				$arImageFile["ID"],
					array("width" => 652, "height" => 378),
					BX_RESIZE_IMAGE_PROPORTIONAL_ALT,
					true				
			);

			$arPreviewImageResize = CFile::ResizeImageGet(
				$arImageFile["ID"],
					array("width" => 65, "height" => 65),
					BX_RESIZE_IMAGE_EXACT,
					true				
			);			

			$result[] = array(
				'ID' => (int)$arImageFile['ID'],
				'SRC' => $arImageFile['SRC'],
				'WIDTH' => (int)$arImageFile['WIDTH'],
				'HEIGHT' => (int)$arImageFile['HEIGHT'],
				'DESCRIPTION' => $arImageFile['DESCRIPTION'],
				'DETAIL' => $arDetailImageResize,
				'PREVIEW' => $arPreviewImageResize
			);
		}
	}
	$arResult['MORE_PHOTO'] = $result;
}

$boolConvert = $arResult['CONVERT_CURRENCY']['CURRENCY_ID'];

if (!$boolConvert)
    $strBaseCurrency = CCurrency::GetBaseCurrency();

$arResult['MIN_PRICE'] = CIBlockPriceTools::getMinPriceFromOffers(
    $arResult['OFFERS'],
    $boolConvert ? $arResult['CONVERT_CURRENCY']['CURRENCY_ID'] : $strBaseCurrency
);

if ( empty($arResult['MIN_PRICE']) )
{
	foreach($arResult["PRICES"] as $code=>$arPrice)
	{
		if( $arPrice["VALUE"] ){
			if( $arPrice["VALUE"] > $arPrice["DISCOUNT_VALUE"] )
			{
				$arResult['MIN_PRICE']["PRINT_DISCOUNT_VALUE"] = $arPrice["PRINT_DISCOUNT_VALUE"];
			}
			else
			{
				$arResult['MIN_PRICE']["PRINT_DISCOUNT_VALUE"] = $arPrice["PRINT_VALUE"];
			}
		}
		
	}
}


if ($arResult["PROPERTIES"]["S_FILE"])
{
	
	$filePath = $arResult["PROPERTIES"]["S_FILE"]["VALUE"];
	
	if( LANG_CHARSET == 'windows-1251' )
	{		
		$filePathRoot = mb_convert_encoding($_SERVER["DOCUMENT_ROOT"] . $filePath,  'UTF-8', 'Windows-1251');
	}
	else
	{		
		$filePathRoot = $_SERVER["DOCUMENT_ROOT"] . $filePath;
	}		

	if(file_exists($filePathRoot))
	{
		$fileSize = ceil(filesize($filePathRoot) / 1024);	

		$fileName = explode("/", $filePath);
		$fileName = end($fileName);

		$arResult["PROPERTIES"]["S_FILE"] = array(
			"SIZE" => $fileSize,
			"PATH" => $filePath,
			"NAME" => $fileName
		);	
	}
}

if ($arResult["PROPERTIES"]["S_DOCS"])
{
	foreach( $arResult["PROPERTIES"]["S_DOCS"]["VALUE"] as $key => $path )
	{
		$filePath = $path;
	
		if( LANG_CHARSET == 'windows-1251' )
		{		
			$filePathRoot = mb_convert_encoding($_SERVER["DOCUMENT_ROOT"] . $filePath,  'UTF-8', 'Windows-1251');
		}
		else
		{		
			$filePathRoot = $_SERVER["DOCUMENT_ROOT"] . $filePath;
		}		

		if(file_exists($filePathRoot))
		{
			$fileSize = ceil(filesize($filePathRoot) / 1024);	

			$fileName = explode("/", $filePath);
			$fileName = end($fileName);

			$arResult["PROPERTIES"]["S_DOCS"]["VALUE"][$key] = array(
				"SIZE" => $fileSize,
				"PATH" => $filePath,
				"NAME" => $fileName
			);	
		}
	}
}
?>