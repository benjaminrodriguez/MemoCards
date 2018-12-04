<?php
//Si rien n'est demandé ou s'il y a une erreur dans l'url 
//On affiche la boite de mp.
default;
    
    echo'<p><i>Vous êtes ici</i> : <a href="./index.php">Index du forum</a> --> <a href="./messagesprives.php">Messagerie privée</a>';
    echo '<h1>Messagerie Privée</h1><br /><br />';

    $query=$db->prepare('SELECT mp_lu, mp_id, mp_expediteur, mp_titre, mp_time, membre_id, membre_pseudo
    FROM forum_mp
    LEFT JOIN forum_membres ON forum_mp.mp_expediteur = forum_membres.membre_id
    WHERE mp_receveur = :id ORDER BY mp_id DESC');
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    $query->execute();
    echo'<p><a href="./messagesprives.php?action=nouveau">
    <img src="./images/nouveau.gif" alt="Nouveau" title="Nouveau message" />
    </a></p>';
    if ($query->rowCount()>0)
    {
        ?>
        <table>
        <tr>
        <th></th>
        <th class="mp_titre"><strong>Titre</strong></th>
        <th class="mp_expediteur"><strong>Expéditeur</strong></th>
        <th class="mp_time"><strong>Date</strong></th>
        <th><strong>Action</strong></th>
        </tr>

        <?php
        //On boucle et on remplit le tableau
        while ($data = $query->fetch())
        {
            echo'<tr>';
            //Mp jamais lu, on affiche l'icone en question
            if($data['mp_lu'] == 0)
            {
            echo'<td><img src="./images/message_non_lu.gif" alt="Non lu" /></td>';
            }
            else //sinon une autre icone
            {
            echo'<td><img src="./images/message.gif" alt="Déja lu" /></td>';
            }
            echo'<td id="mp_titre">
            <a href="./messagesprives.php?action=consulter&amp;id='.$data['mp_id'].'">
            '.stripslashes(htmlspecialchars($data['mp_titre'])).'</a></td>
            <td id="mp_expediteur">
            <a href="./voirprofil.php?action=consulter&amp;m='.$data['membre_id'].'">
            '.stripslashes(htmlspecialchars($data['membre_pseudo'])).'</a></td>
            <td id="mp_time">'.date('H\hi \l\e d M Y',$data['mp_time']).'</td>
            <td>
            <a href="./messagesprives.php?action=supprimer&amp;id='.$data['mp_id'].'&amp;sur=0">supprimer</a></td></tr>';
        } //Fin de la boucle
        $query->CloseCursor();
        echo '</table>';

    } //Fin du if
    else
    {
        echo'<p>Vous n avez aucun message privé pour l instant, cliquez
        <a href="./index.php">ici</a> pour revenir à la page d index</p>';
    }
} //Fin du switch
?>
</div>
</body>
</html>
