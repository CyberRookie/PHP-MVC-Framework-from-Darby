<!--12/31/21 adding the users result set from pages.php -->

<?php
//first dump the data so we can view in the browser pages
var_dump($data);
echo "<br>";
//create a loop through each user
foreach ($data['users'] as $user) {
    echo "Information: " . $user->user_name . $user->user_email;
    echo "<br>";
}

?>