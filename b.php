<?php

// original

$txt = "L'amour est toujours passion et désintéressé.
Il n'est jamais jaloux.
L'amour n'est ni prétentieux, ni orgueilleux.
Il n'est jamais grossier, ni égoïste.
Il n'est pas colérique.
Et il n'est pas rancunier.
L'amour ne se réjouit pas de tous les péchés d'autrui.
Mais trouve sa joie dans l'infinité.
Il excuse tout.
Il croit tout.
Il espère tout.
Et endure tout.
Voilà ce qu'est l'amour.";

//compression

$input = str_replace("\n",' ',$txt);        //remplace les passages a la ligne par des espaces dans la variable txt.
$input = str_replace("'",' ',$input);       //remplace les ' , les , et les . par un espace dans la variable input.
$input = str_replace(",",' ',$input);       
$input = str_replace(".",' ',$input);      

$mots = explode(' ',$input);               //decompose une chaîne et stock chaque mot dans ce dernier.

//print_r(explode(' ', $input));

$table = array();                           

$ii = 0;                                

for($i = 0 ; $i<count($mots); $i++)         //compte tous les éléments du tableau contenu dans $mots et en retourne le nombre.
{
    $found = false;                         
    foreach($table as $item)                // parcours le tableau $table et assigne la valeur à $item pour chaque itération.
    {
        if($mots[$i] == $item)              //Si la valeur incrémenté de $i dans $mots est égale a la valeur assignée à $item.
        {
            $found = true;                  //On passe found à TRUE.
        }
    }
    if($found == false)                     //si on ne trouve pas de doublon 
    {
        $c = substr('0'.$ii,-2);            // On affecte à $c la valeur récupérée par substr qui met 0 + l'index récupérer par $ii et qui ensuite ne selectionne 
        $table[$c] = $mots[$i];             // que les deux derniers caractères.ex = ( '0'+12 => 012 , -2 => 12). Ajoute a $table qui prend l'index numerique la valeur du mot contenu dans $mots
        $ii++;                              //
    }
}

print_r($table);                            
print("\n");                              

$output = $txt;                             //Affectation du texte contenu dans $txt à $output

for($i = 0; $i<count($table); $i++)         // On compte le nombre d'éléments dans $table on en selectionne chaque element par son index(numérique) et on les remplacent par l'index numerique de 
{
    $c = substr('0'.$i,-2);                 //

    $output = str_replace($table[$c],$c,$output);   // on remplace l'index de table[$c] par $c de la chaîne de caractère de output.
}
print("\n");  
print_r('Compression de txt:'."\n".$output);                           
print("\n");      

//========================= Décompression =================================================

$decompress = $output;

for($i = 0; $i <count($table); $i++)    
{     
    $d = substr('0'.$i,-2); 

    $decompress = str_replace($d,$table[$d],$decompress);
}
print("\n");
print_r('Décompression de output:'."\n".$decompress);                           
print("\n");

?>