<?php
$arr=[];
for($i=0;$i<1000;$i++)
{
    $arr[$i]=rand(1,10000);
}
$find=960;
function binarySearch($arr, $find,$start=0,$end=null)
{
    if ($end===null)
    {
        $end=count($arr)-1;//если end не объявлен то его значение будет равно последнему индексу массива
    }


    while ($start<$end){
        $halfIndex=(int)(($start+$end)/2);
        if($arr[$halfIndex] == $find) {

            return $arr[$halfIndex];

        }
        if ($find < $arr[$halfIndex]) {

            $end = $halfIndex -1;

        }else{
            $start=$halfIndex+1;
        }
    }
    try {
        if ($arr[$halfIndex]!=$find)
        {
            throw new LogicException("элемент не найден");
        }
    }catch (Exception $e){
        echo $e-> getMessage();
        die;
    }
}
function linearSearch($arr,$find)
{
    foreach ($arr as $key=>$value) {
        if ($find == $value) {
            return $find;
        }
    }
}
$timeStart = microtime(true);
echo "Бинарный поиск нашёл число ".binarySearch($arr,$find);
$timeEnd = microtime(true);
$time = $timeEnd - $timeStart;
echo ' За ' . $time." Времени<br>";
$timeStart = microtime(true);
echo "Линейный поиск нашёл число ".linearSearch($arr,$find);
$timeEnd = microtime(true);
$time = $timeEnd - $timeStart;
echo ' За ' . $time." Времени<br>";