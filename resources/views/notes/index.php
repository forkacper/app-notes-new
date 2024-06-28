<div class="container flex justify-end">
    <div>
        <a href="/notes/create">
            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Add Note
            </button>
        </a>
    </div>
</div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                Title
            </th>
            <th scope="col" class="px-6 py-3">
                Description
            </th>
            <th scope="col" class="px-6 py-3">
                Action
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
            if (!empty($notes)):
            foreach ($notes as $note): ?>
        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
            <td class="px-6 py-4 text-center">
                <?= $note['title'] ?>
            </td>
            <td class="px-6 py-4">
                <?= $note['description'] ?>
            </td>
            <td class="px-6 py-4 text-center">
                <a href="/note?id=<?= $note['id'] ?>">Update</a>
                <form method="POST" action="/note/delete">
                    <input name="_method" value="DELETE" hidden>
                    <input name="id" value="<?= $note['id'] ?>" hidden>
                    <button type="submit" class="">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; else: ?>
            <tr>
                <td rowspan="4" class="text-center">Brak notatek...</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>