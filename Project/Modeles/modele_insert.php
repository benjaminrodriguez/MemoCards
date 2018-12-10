<?php
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

    function new_passed_INSERT($user_id, $deck_id)
    {
        // INSERT LE NOUVEAU DECK CREE
        $bdd = bdd();
        $req = $bdd->prepare('  INSERT INTO passed (date_passed, number_game, score_user, user_id, deck_id)
                                VALUES (NULL, NULL, NULL, ?, ?);
                            ');
        $req-> execute(array(intval($user_id), intval($deck_id) ));
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

    function new_question_INSERT($question_cards, $deck_id)
    {
        $bdd = bdd();
        $req = $bdd->prepare(
            'INSERT INTO recto (question_cards, deck_id)
            VALUES (?, ?);
            ');
        $req->execute(array($question_cards, $deck_id));
    }

    //--------------------------------------------------------------------------------

    function new_answer_INSERT($answer_cards, $recto_id)
    {
        $bdd = bdd();
        $req = $bdd->prepare(
            'INSERT INTO verso (answer_cards, statut_cards, recto_id)
             VALUES (?, ?, ?);
            ');
        $req->execute(array($answer_cards, 'T', $recto_id));
    }

    
?>