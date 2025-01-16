<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDo</title>
    @vite('resources/css/app.css')
</head>

<body class="flex flex-col min-h-screen bg-gray-100">
    <header class="bg-blue-700 shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="py-4">
                <p class="text-white text-2xl font-bold">ToDo</p>
            </div>
        </div>
    </header>
    <main class="flex-grow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="py-12">
                <p class="text-3xl font-bold text-center text-gray-800">タスク一覧</p>
                <form action="/tasks" method="post" class="mt-10">
                    @csrf
                    <div class="flex flex-col items-center">
                        <!-- 入力フィールド -->
                        <label class="w-full max-w-3xl mx-auto">
                            <input
                                class="placeholder:italic placeholder:text-gray-400 block bg-white w-full border border-gray-300 rounded-lg py-3 pl-4 shadow-sm focus:outline-none focus:border-blue-500 focus:ring-blue-500 focus:ring-1 text-base sm:text-lg"
                                placeholder="例: 課題を終わらせる..." type="text" name="task_name" />
                            @error("task_name")
                            <div class="mt-3">
                                <p class="text-red-500">
                                    {{ $message }}
                                </p>
                            </div>
                            @enderror
                        </label>
                        <!-- 送信ボタン -->
                        <button type="submit"
                            class="mt-6 px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                            タスクを追加
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer class="bg-blue-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="py-4 text-center">
                <p class="text-white text-sm">© 2025 ToDo Application. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>