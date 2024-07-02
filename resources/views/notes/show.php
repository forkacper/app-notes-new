<?php use Core\Functions; ?>

<form method="POST" action="/note">
    <input name="_method" hidden value="PATCH">
    <input name="id" hidden value="<?= $id ?? 0 ?>">
    <div class="mt-5 col-span-full">
        <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900">Title:</label>
        <div class="mt-2">
            <input type="text" name="title" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                   value="<?= Functions::old('title') ?? $title ?? '' ?>">
        </div>

        <?php if (Functions::error('title')): ?>
            <p class="mt-2 text-pink-600 text-sm"><?= Functions::error('title') ?></p>
        <?php endif; ?>
    </div>

    <div class="mt-10 col-span-full">
        <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Description:</label>
        <div class="mt-2">
            <textarea name="description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= Functions::old('description') ?? $description ?? ''?></textarea>
        </div>

        <?php if (Functions::error('description')): ?>
            <p class="mt-2 text-pink-600 text-sm"><?= Functions::error('description') ?></p>
        <?php endif; ?>
    </div>

    <div class="mt-10 flex justify-end">
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update Note</button>
    </div>
</form>