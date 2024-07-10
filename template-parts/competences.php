<?php 
    $curseur=1; // On commence à lister le premier élément des compétences.
    
    while ($curseur <= 4)
    {   
        $text = "competence_" . $curseur;
        if (get_field($text) != '')
        {
            echo "<p class='competence-item'>* " . get_field($text) . "</p>";
        }

        $curseur++;
    }
?>