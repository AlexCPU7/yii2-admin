<?php

$site = file_get_contents('https://www.instagram.com/animeshnik_art/');
var_dump($site);
$start = '"edge_followed_by"';
$end = ',"followed_by_viewer"';
//$start = '{"activity_counts"';
//$end = ';</script>';



$num1 = strpos($site, $start);
$num2 = substr($site, $num1);

$parse = substr($num2, 0, strpos($num2,$end));
//$parse = mb_substr($parse, 1, -1);
$parse = '{' . $parse . '}';
$json = json_decode($parse);

$follow = (int)$json->edge_followed_by->count;
Yii::$app->formatter->decimalSeparator = '.';
Yii::$app->formatter->thousandSeparator = ' ';
$formattedValue = Yii::$app->formatter->asDecimal($follow);
echo Yii::t('app', 'Balance: {value, number} - {formattedValue}', ['value' => $follow, 'formattedValue' => $formattedValue]) . '<br>';


$value = 123456;
Yii::$app->formatter->decimalSeparator = '.';
Yii::$app->formatter->thousandSeparator = ' ';
$formattedValue = Yii::$app->formatter->asDecimal($value);
echo Yii::t('app', 'Balance: {value, number} - {formattedValue}', ['value' => $value, 'formattedValue' => $formattedValue]). '<br>';
//echo (int)$res->edge_followed_by->count;

$fileCount = 10000000;
echo Yii::t('app', 'Total {fileCount, plural, one{# file} other{# files}}', ['fileCount' => $fileCount]);

// перевод

?>