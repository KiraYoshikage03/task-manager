<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Task</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <main class="max-w-4xl mx-auto p-6 my-10 bg-white rounded-lg shadow-lg">
        <h2 class="text-3xl font-semibold text-gray-700 mb-6">Create New Task</h2>
        
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-semibold mb-2">Title</label>
                <input type="text" name="title" id="title" placeholder="Title" required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-semibold mb-2">Description</label>
                <textarea name="description" id="description" placeholder="Description" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <div class="mb-4">
                <label for="due_date" class="block text-gray-700 text-sm font-semibold mb-2">Due Date</label>
                <input type="date" name="due_date" id="due_date" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <button type="submit" 
                    class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                    Add Task
                </button>
            </div>
        </form>
    </main>
</body>
</html>