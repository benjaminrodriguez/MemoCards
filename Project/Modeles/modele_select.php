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
        $req = $bdd->query('SELECT *
                                FROM subject
                                INNER JOIN user ON subject.user_id=user.id
                                ORDER BY date_posted DESC;
                            ');
        $req->execute(array());
        return $req;
    }

    //-------------------------------------------------------------------------------

    function messages_subject_SELECT($subject_id)
    {
        $bdd = bdd();
        $req= $bdd->prepare('SELECT *
                                FROM message
                                INNER JOIN subject ON message.subject_id=subject.id
                                INNER JOIN user ON subject.user_id=user.id
                                WHERE subject_id = ?
                                ORDER BY date ASC;
                                ');
        $req->execute(array(intval($subject_id)));
        $message = $req->fetchAll();
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
        $query ='SELECT subject.content, subject.date_posted, user.username
                FROM subject
                INNER JOIN user ON subject.user_id= user.id AND subject.id = :subid
                LIMIT 1;';
        $query_params = array(
            ':subid' => $id
            );
        
        try {
            $stmt = $bdd->prepare($query);
            $stmt->execute($query_params);
        } catch(Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        $f = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $f;
        
        
        
       /* 
        while ($subject = $forum->fetch($id)) 
        {
            echo $subject['content'].' le '.$subject['date_posted'].' par '.$subject['username'].'<br>';
        }
        $forum->closeCursor();
        */
    }
    
    //-------------------------------------------------------------------------------

    function password_SELECT($id)
    {
        $bdd = bdd();
        $req = $bdd->prepare(' SELECT password
                                FROM user
                                WHERE id = ?
                                LIMIT 1;
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
        $req= $req->fetchAll(PDO::FETCH_ASSOC);
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
        $req = $bdd->prepare('  SELECT *
                                FROM deck
                                LEFT JOIN passed ON deck.id = passed.deck_id
                                LEFT JOIN user ON passed.user_id = user.id
                                WHERE user.id = ?
                            ');
        $req->execute(array($user_id));
        return $req;
    }

    //--------------------------------------------------------------------------------

    function questions_deck_SELECT($deck_id)
    {
        //SELECTIONNE TOUS LES DECKS DE L'UTILISATEUR
        $bdd = bdd();
        $req = $bdd->prepare('  SELECT *
                                FROM recto
                                WHERE recto.deck_id = ?
                            ');
        $req->execute(array($deck_id));
        return $req;
    }

    //--------------------------------------------------------------------------------
    
    function answers_deck_SELECT($deck_id)
    {
        //SELECTIONNE TOUS LES DECKS DE L'UTILISATEUR
        $bdd = bdd();
        $req = $bdd->prepare('  SELECT verso.id, verso.answer_cards, verso.statut_cards
                                FROM verso
                                LEFT JOIN recto on verso.recto_id = recto.id
                                LEFT JOIN deck on recto.deck_id = deck.id
                                WHERE deck.id = ?
                            ');
        $req->execute(array($deck_id));
        return $req;
    }

    //--------------------------------------------------------------------------------

    function questforstat_SELECT($iddeck, $iduser)
    {
        //SELECTIONNE TOUS LES DECKS DE L'UTILISATEUR
        $bdd = bdd();
        $query = "SELECT recto.question_cards, succes_rate.level_cards, succes_rate.chain, succes_rate.played_cards, succes_rate.nb_succes
                    FROM user
                    JOIN passed ON passed.user_id = user.id AND user.id = :user
                    JOIN deck ON passed.deck_id = deck.id
                    JOIN recto ON recto.deck_id = deck.id AND deck.id = :id
                    JOIN verso ON verso.recto_id = recto.id
                    JOIN succes_rate ON succes_rate.verso_id = verso.id
                    ORDER BY succes_rate.level_cards ASC;";
        
        $query_params = array(
            ':id' => $iddeck,
            ':user' => $iduser
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

        function questforstat_version2_SELECT($id_user)
        {
            //SELECTIONNE TOUS LES DECKS DE L'UTILISATEUR
            $bdd = bdd();
            $query = "SELECT recto.question_cards, succes_rate.level_cards, succes_rate.chain, succes_rate.played_cards, succes_rate.nb_succes, deck.id as deck_id
                        FROM user
                        JOIN passed ON passed.user_id = user.id AND user.id = :user
                        JOIN deck ON passed.deck_id = deck.id
                        JOIN recto ON recto.deck_id = deck.id 
                        JOIN verso ON verso.recto_id = recto.id
                        JOIN succes_rate ON succes_rate.verso_id = verso.id
                        ORDER BY succes_rate.level_cards ASC;";
            
            $query_params = array(
                ':user' => $id_user
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

    function id_question_SELECT($question_cards)
    {
        //SELECTIONNE TOUS LES DECKS DE L'UTILISATEUR
        $bdd = bdd();
        $req = $bdd->prepare('  SELECT id
                                FROM recto
                                WHERE recto.question_cards = ?
                            ');
        $req->execute(array($question_cards));
        return $req;
    }

    //--------------------------------------------------------------------------------

    function question_by_id_SELECT($id_card)
    {
        //SELECTIONNE TOUS LES DECKS DE L'UTILISATEUR
        $bdd = bdd();
        $req = $bdd->prepare('  SELECT recto.question_cards
                                FROM recto
                                WHERE id = ?
                            ');
        $req->execute(array($id_card));
        return $req;
    }

    //--------------------------------------------------------------------------------

    function answer_by_id_SELECT($id_card)
    {
        //SELECTIONNE TOUS LES DECKS DE L'UTILISATEUR
        $bdd = bdd();
        $req = $bdd->prepare('  SELECT verso.answer_cards
                                FROM verso
                                WHERE id = ?
                            ');
        $req->execute(array($id_card));
        return $req;
    }

    //--------------------------------------------------------------------------------

    function verso_id_SELECT($answer)
    {
        //SELECTIONNE TOUS LES DECKS DE L'UTILISATEUR
        $bdd = bdd();
        $req = $bdd->prepare('  SELECT verso.id
                                FROM verso
                                WHERE verso.answer_cards = ?
                            ');
        $req->execute(array($answer));
        return $req;
    }

    //--------------------------------------------------------------------------------

    function id_subjects_SELECT($user_id, $subject_content)
    {
        $bdd = bdd();
        $req = $bdd->prepare('SELECT subject.id
                                FROM subject
                                WHERE subject.user_id = ? AND subject.content = ?
                            ');
        $req->execute(array(intval($user_id), htmlspecialchars($subject_content)));
        return $req;
    }
    
    //--------------------------------------------------------------------------------

    function info_subjects_SELECT($subject_id)
    {
        $bdd = bdd();
        $req = $bdd->prepare('SELECT *
                                FROM subject
                                WHERE subject.id = ? 
                            ');
        $req->execute(array(intval($subject_id)));
        return $req;
    }
    
    //--------------------------------------------------------------------------------
    
    function find_autor_SELECT($user_id)
    {
        $bdd = bdd();
        $req = $bdd->prepare('SELECT user.username
                                FROM user
                                WHERE user.id = ? 
                            ');
        $req->execute(array(intval($user_id)));
        $autor = $req->fetch();
        return $autor;
    }
    
    //--------------------------------------------------------------------------------

    function count_message_SELECT($subject_id)
    {
        $bdd = bdd();
        $req = $bdd->prepare('  SELECT COUNT(content_message) as count_message
                                FROM message
                                WHERE subject_id = ?
                            ');
        $req->execute(array(intval($subject_id)));
        $count_message = $req->fetch();
        return $count_message;
    }
    
    //--------------------------------------------------------------------------------

    
    function game2_rep_SELECT($iddeck)
    {
        //SELECTIONNE TOUS LES DECKS DE L'UTILISATEUR
        $bdd = bdd();
        $query = "SELECT `answer_cards`
                FROM verso
                WHERE `recto_id` = :id AND `statut_cards` LIKE 'T';";
        
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


    function deck_succes_rate_SELECT($id_deck)
    {
        //SELECTIONNE TOUS LES ID NECESSAIRES POUR DELETE DE DECK
        $bdd = bdd();
        $req = $bdd->prepare ("  SELECT succes_rate.id as succes_rate_id
                    FROM succes_rate
                    LEFT JOIN verso ON verso.id = succes_rate.verso_id
                    LEFT JOIN recto ON recto.id = verso.recto_id
                    LEFT JOIN deck ON deck.id = recto.deck_id
                    WHERE deck.id = ?;");
        
        $req->execute(array(htmlspecialchars(intval($id_deck))));
        $all_id = $req->fetchAll();

        return $all_id;
    }

    //--------------------------------------------------------------------------------

    function deck_verso_SELECT($id_deck)
    {
        //SELECTIONNE TOUS LES ID NECESSAIRES POUR DELETE DE DECK
        $bdd = bdd();
        $req = $bdd->prepare ("  SELECT verso.id as verso_id
                    FROM verso
                    LEFT JOIN recto ON recto.id = verso.recto_id
                    LEFT JOIN deck ON deck.id = recto.deck_id
                    WHERE deck.id = ?;");
        
        $req->execute(array(htmlspecialchars(intval($id_deck))));
        $all_id = $req->fetchAll();

        return $all_id;
    }

    //--------------------------------------------------------------------------------

    function deck_recto_SELECT($id_deck)
    {
        //SELECTIONNE TOUS LES ID NECESSAIRES POUR  DELETE DE DECK
        $bdd = bdd();
        $req = $bdd->prepare (" SELECT recto.id as recto_id
                                FROM recto
                                WHERE recto.deck_id = ?;");
        
        $req->execute(array(htmlspecialchars(intval($id_deck))));
        $all_id = $req->fetchAll();

        return $all_id;
    }

    //--------------------------------------------------------------------------------

    function deck_comments_SELECT($id_deck)
    {
        //SELECTIONNE TOUS LES ID NECESSAIRES POUR DELETE DE DECK
        $bdd = bdd();
        $req = $bdd->prepare (" SELECT comments_deck.id as comments_deck_id
                                FROM comments_deck
                                WHERE comments_deck.deck_id = ?;");
        
        $req->execute(array(htmlspecialchars(intval($id_deck))));
        $all_id = $req->fetchAll();

        return $all_id;
    }

    //--------------------------------------------------------------------------------

    function deck_hashtag_SELECT($id_deck)
    {
        //SELECTIONNE TOUS LES ID NECESSAIRES POUR DELETE DE DECK
        $bdd = bdd();
        $req = $bdd->prepare (" SELECT hashtag_has_deck.id as hashtag_id
                                FROM hashtag_has_deck
                                WHERE hashtag_has_deck.deck_id = ?;");
        
        $req->execute(array(htmlspecialchars(intval($id_deck))));
        $all_id = $req->fetchAll();

        return $all_id;
    }

    //--------------------------------------------------------------------------------

    function deck_passed_SELECT($id_deck)
    {
        //SELECTIONNE TOUS LES ID NECESSAIRES POUR DELETE DE DECK
        $bdd = bdd();
        $req = $bdd->prepare (" SELECT passed.id as passed_id
                                FROM passed
                                WHERE passed.deck_id = ?;");
        
        $req->execute(array(htmlspecialchars(intval($id_deck))));
        $all_id = $req->fetchAll();

        return $all_id;
    }

    //--------------------------------------------------------------------------------

    function training_deck_SELECT($id_user, $id_deck)
    {
        //SELECTIONNE TOUS LES ID NECESSAIRES POUR DELETE DE DECK
        $bdd = bdd();
        $req = $bdd->prepare (" SELECT  deck.id as deck_id, recto.question_cards, recto.id as recto_id, verso.answer_cards, verso.id as verso_id
                                FROM user
                                JOIN passed ON passed.user_id = user.id AND user.id = ?
                                JOIN deck ON passed.deck_id = deck.id
                                JOIN recto ON recto.deck_id = deck.id AND deck.id = ?
                                JOIN verso ON verso.recto_id = recto.id
                                JOIN succes_rate ON succes_rate.verso_id = verso.id
                            ;");
        
        $req->execute(array($id_user, htmlspecialchars(intval($id_deck))));
        $deck = $req->fetchAll();

        return $deck;
    }
?>