<?php

// original

$txt = "l'amour est toujours passion et désintéressé.
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

$mots = explode(' ', $input);               //decompose une chaîne et stock chaque mot dans ce dernier.
$table = array();                           //Création d'un tableau dans la variable $table.

$ii = 0;                                    // variable $ii initialisée à laquelle on affect 0.

for($i = 0 ; $i<count($mots); $i++)         //Boucle d'incrémentation/ count va compter tous les éléments du tableau contenu dans $mots et en retourner le nombre.
{
    $found = false;                         // on definit found sur false.
    foreach($table as $item)                // parcour le tableau $table et assigne la valeur à $item pour chaque itération.
    {
        if($mots[$i] == $item)              //Si la valeur incrémenté de $i dans $mots est égale a la valeur assignée à $item.
        {
            $found = true;                  //On passe found à TRUE.
        }
    }
    if($found == false)                     //si $found est égal à false
    {
        $c = substr('0'.$ii,-2);            // On affecte à $c la valeur récupérée par substr qui met 0 + l'index récupérer par $ii et qui ensuite ne selectionne 
        $table[$c] = $mots[$i];             // que les deux derniers caractères.ex = ( '0'+12 => 12). Ajoute a $table qui prend l'index numerique la valeur du mot contenu dans $mots
        $ii++;                              //
    }
}

print_r($table);                            
//print("\n");                              

$output = $txt;                             //

for($i = 0; $i<count($table); $i++)         //
{
    $c = substr('0'.$i,-2);                 //

    $output = str_replace($table[$c],$c,$output);   //
}

print_r($output);                           //
print("\n");                                //

 // Décompression





































?>