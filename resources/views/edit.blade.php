<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h1 class="text-2xl font-bold mb-4 text-gray-800">Edit Task</h1>

        <form action="/tasks/{{ $task->id }}" method="POST">
            @csrf
            @method('PATCH')
            <input type="text" name="title" value="{{ $task->title }}" required
                class="border border-gray-300 p-2 rounded w-full mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <div class="flex justify-between">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
                <a href="/" class="text-gray-500 hover:underline py-2">Cancel</a>
            </div>
        </form>
    </div>

</body>
</html>