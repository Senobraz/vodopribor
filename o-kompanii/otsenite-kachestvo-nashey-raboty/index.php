<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("������� �������� ����� ������");
?>
<p>��������������� ��������� ��������� �������� �������� ��������� � ������� ����� �����. </p>
					<p>�� ������ �������� �� ���������� ��� ������� ���������������� ���� ������������. �� ������ ����� ��������� ��������� � ������ ����� �����������, ������������� �� ��� ������� ���������.</p>
					<p>�� ����� ����������� �� ����� ��� ����������. ��� ������ ��������� ������������ ��������. ����� ������ ������� ���������������� �����."</p>	
<?$APPLICATION->IncludeComponent(
	"tiangroup:form.result.new", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"WEB_FORM_ID" => "1",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"USE_EXTENDED_ERRORS" => "Y",
		"SEF_MODE" => "Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"LIST_URL" => "",
		"EDIT_URL" => "",
		"SUCCESS_URL" => "",
		"CHAIN_ITEM_TEXT" => "",
		"CHAIN_ITEM_LINK" => "",
		"SEF_FOLDER" => "/o-kompanii/otsenite-kachestvo-nashey-raboty/",
		"FORM_RESULT_NEW_SUCCESS" => "�������! ���� ��������� ������� ����������."
	),
	false
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>