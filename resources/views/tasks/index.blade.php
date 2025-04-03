<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <main class="max-w-4xl mx-auto p-6 my-10 bg-white rounded-lg shadow-lg">
        <h2 class="text-3xl font-semibold text-gray-700 mb-6">Task Management</h2>
        
        <a href="{{ route('tasks.create') }}" class="inline-block mb-4">
            <button class="bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600 transition">
                Create New Task
            </button>
        </a>

        <div class="overflow-x-auto">
            <table class="w-full border border-gray-300 rounded-lg">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-left">Title</th>
                        <th class="px-4 py-2 text-left">Description</th>
                        <th class="px-4 py-2 text-left">Due Date</th>
                        <th class="px-4 py-2 text-left">Status</th>
                        <th class="px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr class="border-b bg-gray-50 hover:bg-gray-100">
                            <td class="px-4 py-2">{{ $task->title }}</td>
                            <td class="px-4 py-2">{{ $task->description }}</td>
                            <td class="px-4 py-2">{{ $task->due_date }}</td>
                            <td class="px-4 py-2">
                                <span class="px-2 py-1 text-xs font-semibold rounded 
                                    {{ $task->status ? 'bg-green-200 text-green-700' : 'bg-yellow-200 text-yellow-700' }}">
                                    {{ $task->status ? 'Completed' : 'Pending' }}
                                </span>
                            </td>
                            <td class="px-4 py-2 flex space-x-2">
                                <form action="{{ route('tasks.toggle-status', $task->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" 
                                        class="px-3 py-1 rounded text-white text-sm font-semibold transition 
                                        {{ $task->status ? 'bg-green-500 hover:bg-green-600' : 'bg-yellow-500 hover:bg-yellow-600' }}">
                                        {{ $task->status ? 'Mark as Pending' : 'Mark as Completed' }}
                                    </button>
                                </form>
                                <a href="{{ route('tasks.edit', $task->id) }}">
                                    <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition">
                                        Edit
                                    </button>
                                </a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition"
                                        onclick="return confirm('Are you sure you want to DELETE this task?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $tasks->links() }}
        </div>
    </main>
</body>
</html>