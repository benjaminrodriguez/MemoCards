<?php 

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

    // ----------------------------------------------------------------------------

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

    function message_DELETE ($id)
    {
        // DESINSCRIPTION USER
        $bdd = bdd();
        $desinscription = $bdd->prepare(
        'DELETE FROM message
         WHERE message.id = ?
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

    function inscription_insert_hobbies_one ($hobby)
    {
        $bdd = bdd();
        // INSCRIPTION HOBBY
        $inscription = $bdd->prepare(
                                    'INSERT INTO hobbies (hobby)
                                    VALUES (?);
                                    ');
        $inscription->execute(array($hobby));
    }

    // ----------------------------------------------------------------------------

    function inscription_insert_hobbies_two ($user_id, $id_hobby)
    {
        $bdd = bdd();
        // INSCRIPTION HOBBY TABLE INTERMEDIAIRE
        $inscription = $bdd->prepare(
                                    'INSERT INTO hobbies_has_user (user_id, hobbies_id)
                                    VALUES (?, LAST_INSERT_ID());
                                    ');
        $inscription->execute(array($user_id, $id_hobby));
        
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

    function write_topic_INSERT($content, $autor_id, $subject_id)
    {
        $bdd = bdd();
        // INSCRIPTION
        $creer_sujet = $bdd->prepare(
            'INSERT INTO message (date, content_message, autor_id, subject_id)
            VALUES (NOW(), ?, ?, ?);
            ');
        $creer_sujet->execute(array($content, $autor_id, $subject_id));
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
        $forum = $bdd->prepare('SELECT message.content_message, message.date, user.username, message.id
                                FROM message
                                INNER JOIN subject ON message.subject_id=subject.id
                                INNER JOIN user ON subject.user_id=user.id
                                WHERE subject_id = ?
                                ORDER BY date DESC;
                                ');
        $count = 0;
        $forum->execute(array($id));
        $message = $forum->fetchAll(PDO::FETCH_ASSOC);
        return $message;
    }

    //-------------------------------------------------------------------------------

    function messages_autor_SELECT($subject_num, $message_num)
    {
        $bdd = bdd();
        $forum = $bdd->prepare('SELECT message.autor_id, message.subject_id
                                FROM message
                                WHERE subject_id AND id = ? 
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
                            VALUES(?)
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

    function new_deck_INSERT($name, $description, $autor_id, $picture, $categorie_id)
    {
        // INSERT LE NOUVEAU DECK CREE
        $bdd = bdd();
        $req = $bdd->prepare('  INSERT INTO deck (name, description, autor_id, status, picture, date_creation, categorie_id)
                                VALUES (?, ?, ?, "privated", ?, NOW(), ?);
                            ');
        $req-> execute(array($name, $description, intval($autor_id), $picture, intval($categorie_id)));
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

    function new_passed_INSERT($user_id, $deck_id)
    {
        // INSERT LE NOUVEAU DECK CREE
        $bdd = bdd();
        $req = $bdd->prepare('  INSERT INTO passed (date_passed, number_game, score_user, user_id, deck_id)
                                VALUES (NULL, NULL, NULL, ?, ?);
                            ');
        $req-> execute(array(intval($user_id), intval($deck_id) ));
    }


?>