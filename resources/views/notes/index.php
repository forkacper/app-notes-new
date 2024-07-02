<div class="container flex justify-end">
    <div>
        <a href="/notes/create">
            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Add Note
            </button>
        </a>
    </div>
</div>

<div class="flex min-h-screen items-center justify-center">
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-xl">
            <thead>
            <tr class="bg-blue-gray-100 text-gray-700">
                <th class="py-3 px-4 text-left">Title</th>
                <th class="py-3 px-4 text-left">Description</th>
                <th class="py-3 px-4 text-left"></th>
                <th class="py-3 px-4 text-left"></th>
            </tr>
            </thead>
            <tbody class="text-blue-gray-900">
            <?php
            if (!empty($notes)):
                foreach ($notes as $note): ?>
                <tr class="border-b border-blue-gray-200">

                <td class="py-3 px-4">
                    <?= $note['title'] ?>
                </td>

                <td class="py-3 px-4">
                    <?= $note['description'] ?>
                </td>

                <td class="py-3 px-4">
                    <a href="#" class="font-medium text-blue-600 hover:text-blue-800">Edit</a>
                </td>

                <td class="py-3 px-4">
                    <form method="POST" action="/note">
                        <input name="_method" hidden value="DELETE">
                        <input name="id" hidden value="<?= $note['id'] ?>">
                        <button type="submit" class="font-medium text-blue-600 hover:text-blue-800">Delete</button>
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