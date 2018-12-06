<?php
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
           /* $count++;
            echo '<a href=index.php?page=forum&subject_id=' .$subject['id'].'> Sujet : '.$subject['title']. 
            ' date du : ' .$subject['date_posted']. ' par ' .$subject['username'].'</a><br><br>';
            */
            ?>
                <form method="post" action="index.php?page=forum&subject_id=<?php echo $subject['id']; ?>">
                Sujet :<button name="subject_id" value="<?php echo $subject['id']; ?>">  <?php echo $subject['title']; ?> </button>
                    <?php echo 'posté le : '.$subject['date_posted'].' par '.$subject['username'].'</a><br><br>'; ?>
                </form> 

            <?php

        }
        $forum->closeCursor();

    }

    //-------------------------------------------------------------------------------

    function messages_subject_SELECT($id)
    {
        $bdd = bdd();
        $forum = $bdd->prepare('SELECT message.content_message, message.date, user.username, message.id, message.autor_id
                                FROM message
                                INNER JOIN subject ON message.subject_id=subject.id
                                INNER JOIN user ON subject.user_id=user.id
                                WHERE subject_id = ?
                                ORDER BY date DESC;
                                ');
        $count = 0;
        $forum->execute(array(intval($id)));
        $message = $forum->fetchAll(PDO::FETCH_ASSOC);
        return $message;
    }

    //-------------------------------------------------------------------------------

    function messages_autor_SELECT($subject_num, $message_num)
    {
        $bdd = bdd();
        $forum = $bdd->prepare('SELECT message.autor_id
                                FROM message
                                WHERE subject_id = ? AND id = ? 
                                ;
                                ');
        $forum->execute(array($subject_num, $message_num));
        $message = $forum->fetchAll(PDO::FETCH_ASSOC);
        return $message;
    }

    //-------------------------------------------------------------------------------

    function first_messages_subject_SELECT($id)
    {
        $bdd = bdd();
        $forum = $bdd->prepare('SELECT *
                                FROM subject
                                WHERE id = ?
                                ');
        while ($subject = $forum->fetch($id)) 
        {
            echo $subject['content_message'].' le '.$subject['date'].' par '.$subject['username'].'<br>';
        }
        $forum->closeCursor();
        
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

    function last_deck_play_SELECT($user_id)
    {
        //SELECTIONNE TOUS LES DECKS DE L'UTILISATEUR TRIER PAR DATE DE LA DERNIERE PARTIE JOUEE
        $bdd = bdd();
        $req = $bdd->prepare('  SELECT deck.id, deck.name, deck.description, deck.autor_id, deck.status, deck.picture, deck.categorie_id, deck.date_creation, passed.date_passed
                                FROM deck
                                LEFT JOIN passed ON deck.id = passed.deck_id
                                LEFT JOIN user ON passed.user_id = user.id
                                WHERE user.id = ?
                                ORDER BY passed.date_passed  ;
                            ');
        $req->execute(array($user_id));
        return $req;
    }

    //--------------------------------------------------------------------------------

    function categories_SELECT()
    {
        // SELECTIONNE LES DIFFERENTES CATEGORIES EXISTANTES
        $bdd = bdd();
        $req = $bdd->prepare('  SELECT *
                                FROM categorie
                                ORDER BY name ASC;
                            ');
        $req-> execute(array());
        return $req;
    }

    //--------------------------------------------------------------------------------

    function deck_id_SELECT($nom_deck)
    {
        // SELECTIONNE LES DIFFERENTES CATEGORIES EXISTANTES
        $bdd = bdd();
        $req = $bdd->prepare('  SELECT deck.id
                                FROM deck
                                WHERE deck.name = ?
                                LIMIT 1;
                            ');
        $req-> execute(array($nom_deck));
        return $req;
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

    function questforstat_SELECT($iddeck)
    {
        //SELECTIONNE TOUS LES DECKS DE L'UTILISATEUR
        $bdd = bdd();
        $query = "SELECT recto.question_cards, succes_rate.level_cards, succes_rate.chain, succes_rate.played_cards
                FROM deck
                JOIN recto 
                ON recto.deck_id = deck.id AND deck.id = :id
                JOIN verso ON verso.recto_id = recto.id
                JOIN succes_rate ON succes_rate.verso_id = verso.id
                ORDER BY succes_rate.level_cards ASC;";
        
        $query_params = array(
            ':id' => $iddeck
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

    //--------------------------------------------------------------------------------
?>