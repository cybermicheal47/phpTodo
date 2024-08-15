<?php
use MainClasses\Database;
use MainClasses\Validation;
$config = require basePath("config/db.php");
$db = new Database($config);



//get the  current data from db


$id = isset($_GET["id"]) ? $_GET["id"] : '';

if (!$id) {
    echo "Missing id";
}

$params = ['id' => $id];
$currentdata = $db->query('SELECT * FROM todo WHERE id = ' . $id)->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['_method']) && $_POST['_method'] === 'PUT') {






// get new updated data and sanitaze it

    $allowedFields = ['name', 'description'];

    $requiredFields = ['name', 'description'];

    $updatedfields = array_intersect_key($_POST, array_flip($allowedFields));
    $updatedfields = array_map('sanitize', $updatedfields);



    // Validate required fields
    $errors = [];
    foreach ($requiredFields as $field) {
        if (empty($updatedfields[$field]) || !Validation::string($updatedfields[$field])) {
            $errors[$field] = ucfirst($field) . " is required";
        }
    }



//if errors reload with error msg

    if(!empty($errors)) {

        loadView('todo/edit', ['errors' => $errors, 'currentdata' => $currentdata]);
        exit;
    }



    // update the data to db
else{
        $updatedfieldtodb = [];
        foreach (array_keys($updatedfields) as $field ) {
            $updatedfieldtodb[] = "{$field} = :{$field}";
        };

        $updatedfieldtodb = implode(', ', $updatedfieldtodb);
        $updateQuery = "UPDATE todo SET $updatedfieldtodb WHERE id = :id";



    // Include the ID in the update parameters
    $updatedfields['id'] =$id;


    $db->query($updateQuery, $updatedfields);

    header('Location: /todo');
    exit();
}



}











loadView('todolist/edit', ['currentdata' => $currentdata]);
?>