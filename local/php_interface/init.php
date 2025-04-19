<?php

// регистрируем обработчик
AddEventHandler("search", "BeforeIndex", "BeforeIndexHandler");
// создаем обработчик события "BeforeIndex"
function BeforeIndexHandler($arFields)
{
    if(!CModule::IncludeModule("iblock")) // подключаем модуль
        return $arFields;
    if($arFields["MODULE_ID"] == "iblock")
    {
        $db_props = CIBlockElement::GetProperty(                        // Запросим свойства индексируемого элемента
            $arFields["PARAM2"],         // BLOCK_ID индексируемого свойства
            $arFields["ITEM_ID"],          // ID индексируемого свойства
            array("sort" => "asc"),       // Сортировка (можно упустить)
            Array("CODE"=>"TYPE_TRANSMISSION")); // CODE свойства (в данном случае артикул)
        if($ar_props = $db_props->Fetch()) {
            $arFields["TITLE"] .= " ".$ar_props["VALUE_ENUM"];   // Добавим свойство в конец заголовка индексируемого элемента
        }

    }
    return $arFields; // вернём изменения
}