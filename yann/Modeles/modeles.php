
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

    function inscription_INSERT ($username, $password, $date_naissance, $statut, $sex, $region, $email, $picture)
    {
        $bdd = bdd();
        // INSCRIPTION
        $inscription = $bdd->prepare(
        'INSERT INTO user (username, password, birth_date, statut, sex, region, email, profile_picture)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?);
        ');
        $inscription->execute(array($username, $password, $date_naissance, $statut, $sex, $region, $email, $picture));
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

    function topic_INSERT($name, $statut, $content, $user_id)
    {
        $bdd = bdd();
        // INSCRIPTION
        $creer_sujet = $bdd->prepare(
            'INSERT INTO subject (title, date_posted, content, statut, user_id)
            VALUES (?, NOW(), ?, ?, ?);
            ');
        $creer_sujet->execute(array($title, $content, $statut, $user_id));
    }


    function nb_card_SELECT($iddeck)
    {
        $bdd = bdd();
        //echo 'ici';
        $query = 'SELECT COUNT(recto.id) AS count FROM recto WHERE recto.deck_id = :id;';
        $query_params = array(':id' => $iddeck);

        try {
            $stmt = $bdd->prepare($query);
            $stmt->execute($query_params);
        }catch(Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
        $cptinit = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($cptinit);
        return $cptinit;
    }

    // ----------------------------------------------------------------------------

    function quest1_select ($iddeck,$list)
    {
        $bdd = bdd();
        $query = "SELECT recto.id, succes_rate.level_cards
                  FROM recto
                  JOIN verso ON verso.recto_id = recto.id AND recto.deck_id = :iddeck AND recto.id NOT IN ($list)
                  JOIN succes_rate ON succes_rate.verso_id = verso.id
                  ORDER BY succes_rate.level_cards ASC;
                ";

        $query_params = array(
            ':iddeck' => $iddeck // all the ids of the questions already asked
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

    function quest2_select ($iddeck,$list)
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
            ':lvcard' => $lv
    );

    try {
        $stmt = $bdd->prepare($query);
        $stmt->execute($query_params);
    } catch(Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    }
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
    function verso_recup_select($IDDELAQUESTION)
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
    function carte_recup_select($IDDELAQUESTION)
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

    // ----------------------------------------------------------------------------

    function subjects_SELECT()
    {
        $bdd = bdd();
        $forum = $bdd->prepare('SELECT name
                                FROM subject
                                ORDER BY date_posted DESC;
                                ');
        $forum->execute(array());
        $subject = $forum->fetch();
        return $subject;
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

    function my_deck_SELECT()
    {
        $bdd = bdd();
        $req = $bdd->prepare('  SELECT
                            ');
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