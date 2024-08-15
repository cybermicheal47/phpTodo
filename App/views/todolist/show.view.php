<?php
/** @var array $todolist */

?>



<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Todo</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">



</head>
<div class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans  pt-36">
    <div class=" bg-white rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg">
        <div class="mb-4">
            <h1 class="text-grey-darkest"> <?= $todolist["name"] ?></h1>

        </div>
        <div>
            <div class="flex mb-4 items-center">
                <p class="w-full text-grey-darkest"><?= $todolist["description"] ?></p>
                <!-- Edit button -->
                <a href="/todo/edit?id=<?= $todolist['id'] ?>" class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-gray-500 text-green border-green hover:bg-green">
                    Edit
                </a>

                <!-- Remove button -->
                <form action="/todo/delete?id=<?= $todolist['id'] ?>" method="POST" style="display: inline;">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="flex-no-shrink p-2 ml-2 border-2 rounded text-red border-red hover:text-gray-500 hover:bg-red">
                        Remove
                    </button>
                </form>

            </div>   </div>


        </div>
    </div>
</html>
