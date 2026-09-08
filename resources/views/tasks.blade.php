<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My To-Do App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h1 class="text-2xl font-bold mb-4 text-gray-800">My To-Do List</h1>

        <form action="/tasks" method="POST" class="flex mb-4">
            @csrf
            <input type="text" name="title" placeholder="Add a new task..." required
                class="border border-gray-300 p-2 rounded-l w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit" class="bg-blue-500 text-white px-4 rounded-r hover:bg-blue-600">Add</button>
        </form>

        
        <ul class="divide-y divide-gray-200">
            @foreach ($tasks as $task)
                <li class="py-2 flex justify-between items-center text-gray-700">
                    <div class="flex items-center space-x-2">

                    <form action="/tasks/{{ $task->id }}/toggle" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="checkbox" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}
                                class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 cursor-pointer">
                        </form>

                        <span class="{{ $task->completed ? 'line-through text-gray-400' : '' }}">{{ $task->title }}</span>
                    </div>
                    
                    <div class="flex space-x-2 items-center">
                        <a href="/tasks/{{ $task->id }}/edit" class="text-blue-500 hover:text-blue-700 text-sm font-semibold">Edit</a>

                        <form action="/tasks/{{ $task->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-semibold">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

</body>
</html>