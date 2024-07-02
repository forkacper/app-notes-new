<?php

use Core\Functions;

include 'header.php';
?>
    <div class="min-h-full">
        <header class="bg-white">
            <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="#" class="-m-1.5 p-1.5">
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
                    </a>
                </div>
                <div class="hidden lg:flex lg:gap-x-12">
                    <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Dashboard</a>
                    <a href="/notes" class="text-sm font-semibold leading-6 text-gray-900">Notes</a>
                </div>
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <form method="POST" action="/login">
                        <input name="_method" value="DELETE" hidden>
                        <button type="submit" class="text-sm font-semibold leading-6 text-gray-900">Sign out <span aria-hidden="true">&rarr;</span></button>
                    </form>
                </div>
            </nav>
        </header>

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900"><?= $pageTitle ?></h1>
            </div>
        </header>

        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <?php include BASE_PATH . 'resources/views/' . $file . '.php'; ?>
            </div>
        </main>

    </div>

<?php
include 'footer.php';
?>