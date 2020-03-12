<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
CModule::IncludeModule("iblock");
Bitrix\Main\Loader::IncludeModule("iblock");

global $USER;
$user_id = $USER->GetID();
$arGroups = CUser::GetUserGroup($user_id); // получение списка групп пользователя

$grA_id = $arResult['grA_id'];
$grB_id = $arResult['grB_id'];

// получение первого инфоблока по id
$dbIBlocks_1 = CIBlock::GetList(array("SORT" => "ASC"),array("ACTIVE" => "Y","ID" => $arResult['group_a']));
	$arIBlocks_1 = $dbIBlocks_1->Fetch();
		

// получение второго инфоблока по id
$dbIBlocks_2 = CIBlock::GetList(array("SORT" => "ASC"),array("ACTIVE" => "Y","ID" => $arResult['group_b']));
	$arIBlocks_2 = $dbIBlocks_2->Fetch();

// проверка групп пользователя
if( in_array($grA_id, $arGroups ) && in_array($grB_id, $arGroups) )
{
	echo $arIBlocks_1['DESCRIPTION'];
	echo  "</br>";
    echo $arIBlocks_2['DESCRIPTION'];

}  else if(in_array($grA_id, $arGroups )) {
	echo $arIBlocks_1['DESCRIPTION'];
} else if(in_array($grB_id, $arGroups )) {
	echo $arIBlocks_2['DESCRIPTION'];
}


?>
