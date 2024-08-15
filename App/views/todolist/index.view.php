<?php
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Todo</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">



</head>



<?php if (isset($errors)) : ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Error!</strong>
        <ul class="list-disc pl-5">
            <?php foreach ($errors as $error): ?>
                <li><?= $error ?></li>


            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>


<div class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans">
    <div class="bg-white rounded shadow p-6 m-4 w-full h-full lg:w-3/4 lg:max-w-lg">
        <div class="mb-4">
            <h1 class="text-grey-darkest">Todo List</h1>
            <div class="flex mt-4">
                <form action="/todo" method="POST">
                <input class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker mb-4 " placeholder="Add Todo" name="name">

                    <textarea
                            name="description"
                            class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker"
                            placeholder="Add Description"
                            rows="4"
                    ></textarea>
                    <!-- Form fields (e.g., input fields) should go here -->
                    <button type="submit" class="flex-no-shrink p-2 border-2 rounded text-teal border-teal hover:text-gray-500 hover:bg-teal">
                        Add
                    </button>
                </form>         </div>








            <div>
                <?php if (empty($todolist)) :?>
                    <p class="text-gray-500">No to-do items found. Add a new one above!</p>
                <?php else: ?>

                <?php foreach ($todolist as $todo): ?>
                <div class="flex mb-4  justify-between ">
                    <a href="/todo/show?id=<?= $todo['id'] ?>" <p class="w-full text-grey-darkest"><?= isset($todo["name"]) ? $todo['name'] : " No Todo List Found"  ?>  <a/>   </p>
                    <!-- Edit button -->
                    <a href="/todo/edit?id=<?= $todo['id'] ?>" class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-gray-500 text-green border-green hover:bg-green">
                        Edit
                    </a>

                    <!-- Remove button -->
                    <form action="/todo/delete?id=<?= $todo['id'] ?>" method="POST">
                        <input type="hidden" name="_method" value="DELETE">

                        <button type="submit" class="flex-no-shrink p-2 ml-2 border-2 rounded text-red border-red hover:text-gray-500 hover:bg-red">
                            Remove
                        </button>
                    </form>



                </div>

                    <?php endforeach; ?>

                   <?php endif; ?>
                 </div>














        </div>


    </div>
</div>
