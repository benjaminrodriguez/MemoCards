<?php 
    ob_start();
/*
    if (!isset($_GET['subject_id']))
    { 
        ?>
        <form action='' method='POST'>
            <button class="btn btn-lg btn-primary btn-block" name="choix_forum" value="creer_sujet">Créer un sujet</button>
        </form>
        <?php 
    } */

    if (!isset($_GET['subject_id']) && isset($_GET['choix_forum']) && $_GET['choix_forum'] === 'creer_sujet')
    {
        ?>  
        <!-- Comment Form -->
        <div class="comment-form-container">
                    <h6>Créer un sujet </h6>
                    <form method="POST" action="" >

                        <input type='text' name='title' placeholder="Titre" required><br>

                        <textarea class="span6" name="content" required></textarea>
                        <div class="row">
                            <div class="span2">
                                <input type="hidden" name="choix_forum" value="creer_sujet" >
                                <button class="btn btn-lg btn-primary" type="submit">Créer sujet</button>
                            </div>
                        </div>
                    </form>
                </div>
        <?php
    }
    

    if (isset($print_message) && isset($key)) 
    {
        if (isset($print_message[$key]) && isset($_GET['subject_id'])) 
        {
            echo htmlspecialchars($print_message[$key]['content_message']).' le '.
            htmlspecialchars($print_message[$key]['date']).' par '.
            htmlspecialchars($print_message[$key]['username']). '<a href="./index?page=forum&choix_forum=delete_message&message_num='
            .htmlspecialchars($print_message[$key]['id']).'&subject_id='.htmlspecialchars($_SESSION['subject_id']).'"> Supprimer mon message</a><br><br>' ;
        }
    }

    if (isset($_GET['subject_id']) && isset($_SESSION['print_messages']) && $_SESSION['print_messages'] == false)
    {
        $_SESSION['print_messages'] = true;
        ?>
        <form action='' method='POST'>

        <textarea name='content' rows="4" cols="50"  required> </textarea><br>

        <input type="hidden" name="choix_forum" value="write_topic" >

        <button class="btn btn-lg btn-primary" type="submit">Poster message</button>

        </form>
        <?php
    } 

    $content = ob_get_clean();
?>