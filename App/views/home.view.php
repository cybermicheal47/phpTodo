<?php  loadPartial('header');
use MainClasses\Session;
?>




<!--<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">-->

<div class="">
    <div class="flex  items-center justify-around py-10 flex-wrap">

        <img class="h-full py-2 pr-4 ml-8" src="/images/Notee.png"></img>

        <div class="flex flex-col px-4 py-23 ">
            <span class="text-2xl text-purple-300 text-400 pb-8">

Stay Organized and Boost Productivity with Our  <br/> Intuitive To-Do List App</span>

            <?php if (Session::has('user')) : ?>
            <a href="/todo" <button class="bg-blue-500 hover:bg-blue-700 text-white text-center font-bold py-2 px-4 rounded">
               View Your TodoList
            </button> </a>
            <?php else : ?>


            <a href="/login" <button class="bg-blue-500 hover:bg-blue-700 text-white text-center font-bold py-2 px-4 rounded">
                Login
            </button> </a>
            <?php endif; ?>



        </div>
    </div>
</div>
