<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
CModule::IncludeModule("iblock");
Bitrix\Main\Loader::IncludeModule("iblock");


// Получение списка типов инфоблоков
 $dbIBlockType = CIBlockType::GetList(
   array("sort" => "asc"),
   array("ACTIVE" => "Y")
);
while ($arIBlockType = $dbIBlockType->Fetch())
{
   if ($arIBlockTypeLang = CIBlockType::GetByIDLang($arIBlockType["ID"], LANGUAGE_ID))
      $arIblockType[$arIBlockType["ID"]] = "[".$arIBlockType["ID"]."] ".$arIBlockTypeLang["NAME"];
}

// Получение списка инфоблоков заданного типа
function IBlockGetListType($iBlockType){
	$dbIBlocks = CIBlock::GetList(array("SORT" => "ASC"),array("ACTIVE" => "Y","TYPE" => $iBlockType,));
	while ($arIBlocks = $dbIBlocks->Fetch())
	{
		$paramIBlocks[$arIBlocks["ID"]] = "[" . $arIBlocks["ID"] . "] " . $arIBlocks["NAME"];
	}
	return $paramIBlocks;
}

$paramIBlocks_1 = IBlockGetListType($arCurrentValues["IBLOCK_TYPE_1"]);
$paramIBlocks_2 = IBlockGetListType($arCurrentValues["IBLOCK_TYPE_2"]);

// Получение группы пользователей
$rsGroups = CGroup::GetList($by = "c_sort", $order = "asc", array("ACTIVE" => "Y"));
if(intval($rsGroups->SelectedRowsCount()) > 0)
{
   while($arGroups = $rsGroups->Fetch())
   {
      $arUsersGroups[$arGroups['ID']] = "[" . $arGroups["ID"] . "] " . $arGroups["NAME"];
   }
}


$arComponentParameters = array(
	"GROUPS" => array(),
	"PARAMETERS" => array(
		"GROUP_USER_1" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("GROUP_USER_1"),
			"TYPE" => "LIST",
			"VALUES" => $arUsersGroups,
			"MULTIPLE" => "N",
		),
		"IBLOCK_TYPE_1" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("IBLOCK_TYPE_1"),
			"TYPE" => "LIST",
			"VALUES" => $arIblockType,
			"REFRESH" => "Y",
			"MULTIPLE" => "N",
		),
		"IBLOCK_ID_1" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("IBLOCK_ID_1"),
			"TYPE" => "LIST",
			"VALUES" => $paramIBlocks_1,
			"REFRESH" => "Y",
			"MULTIPLE" => "N",
		),
		"GROUP_USER_2" => array(

			"NAME" => GetMessage("GROUP_USER_2"),
			"TYPE" => "LIST",
			"VALUES" => $arUsersGroups,
			"MULTIPLE" => "N",
		),
		"IBLOCK_TYPE_2" => array(

			"NAME" => GetMessage("IBLOCK_TYPE_2"),
			"TYPE" => "LIST",
			"VALUES" => $arIblockType,
			"REFRESH" => "Y",
			"MULTIPLE" => "N",
		),
		"IBLOCK_ID_2" => array(

			"NAME" => GetMessage("IBLOCK_ID_2"),
			"TYPE" => "LIST",
			"VALUES" => $paramIBlocks_2,
			"REFRESH" => "Y",
			"MULTIPLE" => "N",
		),
	),
);

?>
