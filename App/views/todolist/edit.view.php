<?php
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> </html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Todo</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">



</head>
<div class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans pt-36">
    <div class="bg-white rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg">
        <div class="mb-4">
            <h1 class="text-grey-darkest"> Edit Your Todo </h1>
            <div class="flex mt-4">
                <form action="/todo/edit?id=<?=$currentdata["id"] ?>" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker mb-4 " placeholder="Add Todo" name="name" value="<?= $currentdata['name'] ?? '' ?>">

                    <textarea

                            name="description"
                            class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker"
                            placeholder="Add Description"
                            rows="4"

                    >    <?= $currentdata["description"] ?? '' ?></textarea>
                    <!-- Form fields (e.g., input fields) should go here -->
                    <button type="submit" class="flex-no-shrink p-2 border-2 rounded text-teal border-teal hover:text-gray-500 hover:bg-teal">
                        edit
                    </button>
                </form>    </div>
        </div>
        <div>

                 </div>
        </div>
    </div>
</div>
