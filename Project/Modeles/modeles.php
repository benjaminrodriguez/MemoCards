
<?php 
    
    function user_DELETE ($id)
    {
        // DESINSCRIPTION USER
        $bdd = bdd();
        $desinscription = $bdd->prepare(
        'DELETE FROM user
         WHERE user.id = ?
         VALUES (?);
        ');
        $desinscription->execute(array($id));
    }  


    // ----------------------------------------------------------------------------

    function inscription_INSERT ($username, $password, $birth_date, $status, $sex, $region, $email, $picture)
    {
        $bdd = bdd();
        // INSCRIPTION
        $inscription = $bdd->prepare(
        'INSERT INTO user (username, password, birth_date, status, sex, region, email, profile_picture) 
         VALUES (?, ?, ?, ?, ?, ?, ?, ?);
        ');
        $inscription->execute(array($username, $password, $birth_date, $status, $sex, $region, $email, $picture));
    }

    // ----------------------------------------------------------------------------

    function inscription_insert_hobbies ()
    {
        $bdd = bdd();
        // INSCRIPTION HOBBIES
        $inscription = $bdd->prepare(
        'INSERT INTO hobbies (hobby,user.id)
         INNER JOIN hobbies_has_user ON hobbies_has_user = user.id
         INNER JOIN user ON hobbies_has_user = user.id
         VALUES (?,?);
        ');
        $inscription->execute(array($hobbies));
    }

    // ----------------------------------------------------------------------------

    function create_topic_INSERT($title, $status, $content, $user_id)
    {
        $bdd = bdd();
        // INSCRIPTION
        $creer_sujet = $bdd->prepare(
            'INSERT INTO subject (title, date_posted, content, status, user_id)
            VALUES (?, NOW(), ?, ?, ?);
            ');
        $creer_sujet->execute(array($title, $content, $status, $user_id));
    }

    // ----------------------------------------------------------------------------

    function write_topic_INSERT($content, $autor_id)
    {
        $bdd = bdd();
        // INSCRIPTION
        $creer_sujet = $bdd->prepare(
            'INSERT INTO subject (date, content,autor_id)
            INNER JOIN message_has_subject ON message.id=message_has_subject.message_id
            INNER JOIN subject ON subject.id=message_has_subject.subject_id
            VALUES (NOW(), ?, ?);
            ');
        $creer_sujet->execute(array($content, $autor_id));
    }

    // ----------------------------------------------------------------------------

    function nb_card_select ($iddeck)
    {
        $bdd = bdd();
        $query = 'SELECT COUNT(recto.id) AS count FROM recto WHERE recto.deck_id = :id;';
        $query_params = array(':id' => $iddeck);

        try {
            $stmt = $bdd->prepare($query);
            $stmt->execute($query_params);
        }catch(Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
        $cptinit = $stmt->fetchAll();
        return $cptinit;
    }

    // ----------------------------------------------------------------------------

    function quest1_SELECT($iddeck,$list)
    {
        $bdd = bdd();
        $query = "SELECT recto.id, succes_rate.level_cards
                  FROM recto
                  JOIN verso ON verso.recto_id = recto.id AND recto.deck_id = :iddeck AND recto.id NOT IN ($list)
                  JOIN succes_rate ON succes_rate.verso_id = verso.id
                  ORDER BY succes_rate.level_cards ASC;
                ";

        $query_params = array(
            ':iddeck' => $iddeck 
            );

        try {
            $stmt = $bdd->prepare($query);
            $stmt->execute($query_params);
        }catch(Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
        $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $questions;
    }

    // ----------------------------------------------------------------------------

    function quest2_SELECT($iddeck,$list)
    {
        $bdd = bdd();
        $query = "SELECT *
        FROM recto
        WHERE recto.deck_id = :iddeck
        AND recto.id NOT IN ($list)
        ORDER BY RAND();";
        //unset($query_params);
        $query_params = array(
            ':iddeck' => $iddeck   // id from the deck currently used
            );

        try {
            $stmt = $bdd->prepare($query);
            $stmt->execute($query_params);
        } catch(Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $questions;
    }

    // ----------------------------------------------------------------------------

    function connection_SELECT($username)
    {
        $bdd = bdd();
        $pseudo = $bdd->prepare('SELECT *
                                FROM user
                                WHERE username = ?;
                                ');
        $pseudo->execute(array($username));
        $resultat = $pseudo->fetch();
        return $resultat;
    }

    //--------------------------------------------------------------------------------
    function verso_recup_SELECT($IDDELAQUESTION)
    {
        $bdd = bdd();
        $query = "SELECT *
        FROM `verso`
        WHERE recto_id = :idquest
        ORDER BY RAND();";
        //unset($query_params);
        $query_params = array(
            ':idquest' => $IDDELAQUESTION
            );

        try {
            $stmt = $bdd->prepare($query);
            $stmt->execute($query_params);
        } catch(Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        $ans = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $ans;
    }

    //-------------------------------------------------------------------------------
    function carte_recup_SELECT($IDDELAQUESTION)
    {
        $bdd = bdd();
        $query = "SELECT * FROM succes_rate JOIN verso ON verso.id = succes_rate.verso_id AND verso.statut_cards LIKE 'T' JOIN recto ON recto.id = verso.recto_id AND recto.id = :idquest;";
        //unset($query_params);
        $query_params = array(
            ':idquest' => $IDDELAQUESTION
            );

        try {
            $stmt = $bdd->prepare($query);
            $stmt->execute($query_params);
        } catch(Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        $carte = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $carte;
    }
//-------------------------------------------------------------

    function carte_quest_SELECT($IDDELAQUESTION)
    {
        $bdd = bdd();
        $query = "SELECT question_cards as q
        FROM recto
        WHERE recto.id = :id;";
        //unset($query_params);
        $query_params = array(
            ':id' => $IDDELAQUESTION
            );

        try {
            $stmt = $bdd->prepare($query);
            $stmt->execute($query_params);
        } catch(Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        $qu = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $qu;
    }

    //-----------------------------------------------

    function carte_UPDATE($id,$ply,$chain,$lv)
    {
        $bdd = bdd();
        $query = "UPDATE `succes_rate`
                SET
                `level_cards`=:lvcard,
                `chain`=:chain,
                `played_cards`=:plycards
                WHERE succes_rate.verso_id = (
                    SELECT verso.id
                    FROM verso
                    JOIN recto ON recto.id = verso.recto_id AND recto.id = :id AND verso.statut_cards LIKE 'T');";

        $query_params = array(
            ':id' => $id,
            ':plycards' => $ply,
            ':chain' => $chain,
            ':lvcard' => $lv);

        try {
            $stmt = $bdd->prepare($query);
            $stmt->execute($query_params);
        } catch(Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    // ----------------------------------------------------------------------------

    function subjects_SELECT()
    {
        // AFFICHAGE DE TOUS LES SUJETS LORS DE L'ARRIVEE SUT LE FORUM
        // METTRE AU FORMAT FR
        //DATE_FORMAT(date_posted, '%m/%d/%Y %H:%i')
        $bdd = bdd();
        $forum = $bdd->query('SELECT subject.id,title, date_posted, user.username AS username
                                FROM subject
                                INNER JOIN user ON subject.user_id=user.id
                                ORDER BY date_posted DESC;
                            ');
        //$forum->execute(array());
        $count = 0;
        while ($subject = $forum->fetch()) 
        {
            //return $subject;
            $count++;
            echo '<a href=index.php?page=forum&id=' .$subject['id'].'> Sujet : '.$subject['title']. 
            ' date du : ' .$subject['date_posted']. ' par ' .$subject['username'].'</a><br><br>';
        }
        $forum->closeCursor();

    }

    //-------------------------------------------------------------------------------

    function messages_subject_SELECT($id)
    {
        $bdd = bdd();
        $req = $bdd->prepare(' SELECT *
                            FROM message
                            INNER JOIN message_has_subject ON message.id=message_has_subject.message.id
                            INNER JOIN subject ON subject.id=message_has_subject.subject_id
                            WHERE subject.id = ?
                            ORDER BY date DEESC
                            LIMIT 1;
                            ');
        $req->execute(array($id));
        $donnees = $req->fetch();
        return $donnees;
    }
    
    //-------------------------------------------------------------------------------

    function password_SELECT($id)
    {
        $bdd = bdd();
        $req = $bdd->prepare(' SELECT password
                            FROM user
                            WHERE id = ?
                            LIMIT 1
                            ');
        $req->execute(array($id));
        $donnees = $req->fetch();
        return $donnees;
    }

    //--------------------------------------------------------------------------------


    //Permet d'UPDATE une information dans la BDD 
    function UPDATE($table, $attribut, $value_attribut, $id)
    {
        $bdd = bdd();
        $req = $bdd->prepare(' UPDATE ?
                            SET ? = ? 
                            WHERE id = ? 
                            LIMIT 1
                            ');
        $req->execute(array($table, $attribut, $value_attribut, $id));
    }

    //--------------------------------------------------------------------------------


    //Permet d'UPDATE une information dans la BDD 
    function username_UPDATE($username, $id)
    {
        $bdd = bdd();
        $req = $bdd->prepare(' UPDATE user
                            SET username = ? 
                            WHERE id = ? 
                            LIMIT 1
                            ');
        $req->execute(array($username, $id));
    }
    
    //--------------------------------------------------------------------------------

    //Permet d'UPDATE une information dans la BDD 
    function password_UPDATE( $value_attribut, $id)
    {
        $bdd = bdd();
        $req = $bdd->prepare(' UPDATE user
                            SET password = ? 
                            WHERE id = ? 
                            LIMIT 1
                            ');
        $req->execute(array($value_attribut, $id));
    }
    

    //--------------------------------------------------------------------------------

    //Permet d'UPDATE une information dans la BDD 
    function picture_UPDATE( $value_attribut, $id)
    {
        $bdd = bdd();
        $req = $bdd->prepare(' UPDATE user
                            SET profile_picture = ? 
                            WHERE id = ? 
                            LIMIT 1
                            ');
        $req->execute(array($value_attribut, $id));
    }

    //--------------------------------------------------------------------------------

    function my_deck_SELECT($user_id)
    {
        //SELECTIONNE TOUS LES DECKS DE L'UTILISATEUR
        $bdd = bdd();
        $req = $bdd->prepare('  SELECT deck.name, deck.description, deck.mark, deck.status
                                FROM deck
                                LEFT JOIN passed ON deck.id = passed.deck_id
                                LEFT JOIN user ON passed.user_id = user.id
                                WHERE user.id = ?
                            ');
        $req->execute(array($user_id));
        return $req;
    }

    //--------------------------------------------------------------------------------

    function last_deck_play_SELECT($user_id)
    {
        //SELECTIONNE TOUS LES DECKS DE L'UTILISATEUR TRIER PAR DATE DE LA DERNIERE PARTIE JOUEE
        $bdd = bdd();
        $req = $bdd->prepare('  SELECT deck.id, deck.autor_id, deck.name, deck.description, deck.mark, deck.status, passed.date_passed
                                FROM deck
                                LEFT JOIN passed ON deck.id = passed.deck_id
                                LEFT JOIN user ON passed.user_id = user.id
                                WHERE user.id = ?
                                ORDER BY passed.date_passed ;
                            ');
        $req->execute(array($user_id));
        return $req;
    }
    
    //--------------------------------------------------------------------------------


    
    function bdd()
    {
        //CONNEXION A LA BDD
        try
        {
            $bdd = new PDO('mysql:host=localhost; dbname=MemoCards; charset=utf8', 'root', 'toor');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
        return $bdd;
    }


?>