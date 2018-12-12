<?php
$id = $_SESSION['id'];

succes_rate_unsub_DELETE($id);
verso_unsub_DELETE($id);
recto_unsub_DELETE($id);
hashtag_unsub_DELETE($id);
hobbies_unsub_DELETE($id);
passed_unsub_DELETE($id);
deck_unsub_DELETE($id);
user_unsub_DELETE($id);

session_unset();
session_destroy();
session_write_close();
header('Location: index.php');
exit;
?>