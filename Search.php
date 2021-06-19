<?php
$arr=[];
for($i=0;$i<1000;$i++)
{
    $arr[$i]=$i;
}
$find=960;
function binarySearch($arr, $find,$start=0,$end=null)
{
    if ($end===null)
    {
        $end=count($arr)-1;//если end не объявлен то его значение будет равно последнему индексу массива
    }

    if ($start>$end)
    {
        return ('Вуа вуа вуа');
    }

    $halfIndex =(int)(($start +$end)/2);  //Находим среднее значение

    if($arr[$halfIndex]!==$find){
        if($arr[$halfIndex]<$find){
            $start=$halfIndex+1;
        }
        else
        {
            $end = $halfIndex -1;
        }
        return binarySearch($arr,$find,$start,$end);
    }
    return $arr[$halfIndex];
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
echo binarySearch($arr,$find);
$timeEnd = microtime(true);
$time = $timeEnd - $timeStart;
echo 'Затрачено секунд: ' . $time."<br>";
$timeStart = microtime(true);
echo linearSearch($arr,$find);
$timeEnd = microtime(true);
$time = $timeEnd - $timeStart;
echo 'Затрачено секунд: ' . $time;