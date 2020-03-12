# bitrix_component
Вывод разного контента  для разных групп пользователей


Пример вызова компонента
```php
<?$APPLICATION->IncludeComponent(
	"local:group.user",
	".default",
	Array(
		"COMPONENT_TEMPLATE" => ".default",
		"GROUP_USER_1" => "5",
		"GROUP_USER_2" => "2",
		"IBLOCK_ID_1" => "1",
		"IBLOCK_ID_2" => "2",
		"IBLOCK_TYPE_1" => "group_user",
		"IBLOCK_TYPE_2" => "group_user"
	),
  false,
  Array()
);?>
```
Компонент располагается в директории /bitrix/components/local
