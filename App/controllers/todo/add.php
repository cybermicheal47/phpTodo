<?php
use MainClasses\Database;
use MainClasses\Session;
$config = require basePath("config/db.php");
$db = new Database($config);


$allowedFields = [
    'name',
    'description',

];






$NewlistingData = array_intersect_key($_POST, array_flip($allowedFields));
$NewlistingData['user_id'] =  Session::get('user')['id']; //get current logged in user id

$NewlistingData = array_map('sanitize', $NewlistingData);


$errors = [];


foreach ($allowedFields as $field) {
    if (empty($NewlistingData[$field]) || !\MainClasses\Validation::string($NewlistingData[$field])) {
        $errors[] = ucfirst($field) . ' cannot be empty or invalid';
    }
}

if (!empty($errors)) {
//load the todolist in the db and pass on  to do "loadview" along side with the error
    $userId = Session::get('user')['id']; //get current logged in user id
    $params = [
        'user_id' => $userId
    ];
    $todolist = $db->query('SELECT * FROM todo WHERE user_id = :user_id', $params )->fetchAll();

    loadView('todolist/index', [
        'errors' => $errors,
        'todolist' => $todolist
    ]);
    exit;


}
 else{
    $fields = [];
    $values = [];

    foreach ($NewlistingData as $field => $value) {
        if($value == ''){
            $NewlistingData[$field] = null;
        }


        // Collect the field names
        $fields[] = $field;

        // Create a corresponding placeholder for each field (e.g., ':title')
        $values[] = ':' . $field;




    }
     // Create comma-separated lists of field names and placeholders

//     inspectandDie($fields);
     $fields = implode(", ", $fields); // Converts the $fields array into a string separated by

     $values = implode(", ", $values);  // Converts the $values array into a string separated by commas


     $insertquery = "INSERT INTO todo  ({$fields}) VALUES ({$values})";
    $db->query($insertquery , $NewlistingData);

    header('Location:  /todo');
exit();



}



?>