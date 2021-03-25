<?php

function checkNode($listNum, $nbNode = 0){

    $dictNum = [];

    foreach($listNum as $num) {
        if(strlen($num) > 0 && !array_key_exists($num[0], $dictNum)){
            $dictNum[$num[0]] = [substr($num, 1)];
            $nbNode += 1;
        } elseif(strlen($num) > 0 && array_key_exists($num[0], $dictNum)){
            $keys = array_keys($dictNum, $dictNum[$num[0]]);
            array_push($dictNum[$keys[0]], substr($num, 1));
        }
    }
    error_log(var_export($dictNum, true));
    foreach($dictNum as $key => $value){
        if($dictNum[$key] !== ""){
            $nbNode += checkNode($value);
        }
    }
    return $nbNode;
}

$listTel = [];

fscanf(STDIN, "%d", $N);
for ($i = 0; $i < $N; $i++)
{
    fscanf(STDIN, "%s", $telephone);
    array_push($listTel, $telephone);
    sort($listTel);
}

$nbNode = checkNode($listTel);

echo $nbNode;

?>
