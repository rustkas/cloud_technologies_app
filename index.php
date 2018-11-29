<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="/img/favicon.png" sizes="60x60"/>
</head>
<body>
<?php

require_once('connect_db.php');

$query = "SELECT nickname, surname, name, email FROM users ORDER BY nickname";
$users = $pdo->query($query);
try {
    //add header
    //get meta information. Description of a table (column names).
    $q = $pdo->prepare("DESCRIBE users");
    $q->execute();
    $table_fields = $q->fetchAll(PDO::FETCH_COLUMN);

    echo '<h1  class="text-center">List of users</h1>';
    //start creating table structure
    echo '<table class="table table-striped table-bordered table-hover table-sm">';

    //start print header of the table
    echo '<thead class="thead-dark">';

    echo '<tr>';
    echo '<th>' . 'Nickname' . '</th>';
    echo '<th>' . 'Name' . '</th>';
    echo '<th>' . 'Surname' . '</th>';
    echo '<th>' . 'Email' . '</th>';
    echo '</tr>';
    echo '</thead>';
    //end print header of the table

    //start print body of the table
    echo '<tbody>';
    while ($user = $users->fetch()) {
        echo '<tr>';
        echo '<td>' . $user['nickname'] . '</td>';
        echo '<td>' . $user['surname'] . '</td>';
        echo '<td>' . $user['name'] . '</td>';
        echo '<td><a href="mailto:' . $user['email'] . '">' . $user['email'] . '</a></td>';
        echo '</tr>';
    }
    echo '</tbody></table>';
    //end print body of the table

} catch (PDOException $e) {
    echo "Request failed: " . $e->getMessage();
}

//close coonection to the database
$users = null;
$pdo = null;
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>
</html>