<?php



$fp = fopen("ListeLiens.txt", "r+"); 

$i=1;
while($i <= 150){
    $ligne = fgets($fp);
    echo '<a href="'.$ligne.'">'.$ligne.'</a> <br>';
    $i++;
}
fclose($fp); 

/*$visiteur = fgets($fp);
$visiteur++;

fseek($fp,0);

fputs($fp,$visiteur);




 echo $visiteur;
*/
?>