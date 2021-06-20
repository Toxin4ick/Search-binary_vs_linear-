<?php
$arr=[];
for($i=0;$i<1000;$i++)
{
    $arr[$i]=rand(1,1000);
}
$arr2=[0,1,2];
$find=1;
function binarySearch($arr, $find,$start=0,$end=null)
{
    sort($arr);
    if ($end===null)
    {
        $end=count($arr)-1;//если end не объявлен то его значение будет равно последнему индексу массива
    }


    while ($start<=$end){
        $halfIndex=floor(($start+$end)/2);
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
echo "Бинарный поиск нашёл число ".binarySearch($arr,$arr2[1]);
$timeEnd = microtime(true);
$time = $timeEnd - $timeStart;
echo ' За ' . $time." Времени<br>";
$timeStart = microtime(true);
echo "Линейный поиск нашёл число ".linearSearch($arr,$arr2[1]);
$timeEnd = microtime(true);
$time = $timeEnd - $timeStart;
echo ' За ' . $time." Времени<br>";