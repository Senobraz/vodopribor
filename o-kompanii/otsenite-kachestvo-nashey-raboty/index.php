<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Оцените качество нашей работы");
?>
<p>«Уралводоприбор» постоянно стремится повышать качество продукции и уровень своих услуг. </p>
					<p>На данной странице мы предлагаем Вам оценить результативность этой деятельности. Вы можете также высказать пожелания к работе наших сотрудников, поблагодарить их или сделать замечание.</p>
					<p>За любое предложение мы будем Вам благодарны. Все анкеты изучаются руководством компании. Любой отклик получит незамедлительный ответ."</p>	
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
		"FORM_RESULT_NEW_SUCCESS" => "Спасибо! Ваше сообщение успешно отправлено."
	),
	false
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>