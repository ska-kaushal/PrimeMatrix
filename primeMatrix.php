<?php 
//$counterLimit = 10;
$counterLimit= (!empty($argv[1]) && is_int($argv[1]))?is_int($argv[1]):1;
$counter = 0;  
$number = 1;
$primeNumbers = [];
//$primeNumberMatrix = [];
$primeNumberMatrixHtml = "";
while ($counter < $counterLimit)  
{  
    $primeOrNot = checkPrime($number);
    if($primeOrNot!=0){
        $primeNumbers[] = $primeOrNot;
        $counter++;
    }
    $number++;
}

$i = 0;
$j = 0;
$tab = "\t";
$newLine = "\n";
$pipeSign = "|";

$primeNumberMatrixHtml .=$tab.implode($tab,$primeNumbers).$newLine;
foreach($primeNumbers as  $primeNumberV){
  $primeNumberMatrixHtml .= $primeNumberV.$pipeSign;
  foreach($primeNumbers as  $primeNumberH){
      //$primeNumberMatrix[$i][$j] = $primeNumberV*$primeNumberH;  
      $primeNumberMatrixHtml .= $tab.$primeNumberV*$primeNumberH;
      $j++;
  }
  $primeNumberMatrixHtml .=$newLine;
  $i++;
}

//echo '<pre>';
//print_r($primeNumberMatrix);
echo $primeNumberMatrixHtml;

function checkPrime($number){
    if ($number == 1) 
    return 0; 
      
    for ($i = 2; $i <= sqrt($number); $i++){ 
        if ($number % $i == 0) 
            return 0; 
    } 
    return $number; 
}