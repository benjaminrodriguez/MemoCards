<table>     
    <tr>
    <th class="vt_auteur"><strong>Auteur</strong></th>             
    <th class="vt_mess"><strong>Message</strong></th>       
    </tr>
    <tr>
    <td>
    <?php echo'<strong>
    <a href="./voirprofil.php?m='.$data['membre_id'].'&amp;action=consulter">
    '.stripslashes(htmlspecialchars($data['membre_pseudo'])).'</a></strong></td>
    <td>Posté à '.date('H\hi \l\e d M Y',$data['mp_time']).'</td>';
    ?>
    </tr>
    <tr>
    <td>
    <?php
        
    //Ici des infos sur le membre qui a envoyé le mp
    echo'<p><img src="./images/avatars/'.$data['membre_avatar'].'" alt="" />
    <br />Membre inscrit le '.date('d/m/Y',$data['membre_inscrit']).'
    <br />Messages : '.$data['membre_post'].'
    <br />Localisation : '.stripslashes(htmlspecialchars($data['membre_localisation'])).'</p>
    </td><td>';
        
    echo code(nl2br(stripslashes(htmlspecialchars($data['mp_text'])))).'
    <hr />'.code(nl2br(stripslashes(htmlspecialchars($data['membre_signature'])))).'
    </td></tr></table>';
