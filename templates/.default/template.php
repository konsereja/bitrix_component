<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
CModule::IncludeModule("iblock");
Bitrix\Main\Loader::IncludeModule("iblock");

global $USER;
$user_id = $USER->GetID();
$arGroups = CUser::GetUserGroup($user_id); // получение списка групп пользователя

$grA_id = $arResult['grA_id'];
$grB_id = $arResult['grB_id'];
function getIBlockID($group_id){
	$dbIBlocks = CIBlock::GetList(array("SORT" => "ASC"),array("ACTIVE" => "Y","ID" => $group_id));
	$arIBlocks = $dbIBlocks->Fetch();
	return $arIBlocks;
}
// получение первого инфоблока по id
$arIBlocks_1 = getIBlockID($arResult['group_a']);
		
// получение второго инфоблока по id
$arIBlocks_2 = getIBlockID($arResult['group_b']);

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
