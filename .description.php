<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die(); 
$arComponentDescription = array(
	"NAME" => "Группа пользователей",
	"DESCRIPTION" => "Выводим текст в зависимости от группы пользователя",
	"PATH" => array(
		"ID" => "user_components",
		"CHILD" => array(
			"ID" => "group-user",
			"NAME" => "Группа пользователей"
		)
	),
	"ICON" => "/images/icon.gif",
);
?>