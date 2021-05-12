###LES BOUCLES\

1.
for ($i= 0;$i <=150;$i++){
    if($i%2!=0){
        echo $i . " ";
    }
}

2.
$sentence ="Je dois faire des sauvegardes régulières de mes fichiers";
$i=0;
while ($i <500){
    echo ($i+1) . "=>" . $sentence . PHP_EOL;
    $i++;
}

3.
for ($i = 1; $i < 12; $i++) {
  for ($j = 1; $j < 12; $j++) {
      echo str_pad($i*$j ,4, "|", STR_PAD_BOTH);
  }
  echo "\n";
}


###LES TABLEAUX\
