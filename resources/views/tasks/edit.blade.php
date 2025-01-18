<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taskly</title>
    @vite("resources/css/app.css")
</head>

<body class="flex flex-col min-h-screen bg-blue-50">
    <header class="bg-blue-600 shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="py-4">
                <p class="text-white text-3xl font-bold">Taskly</p>
            </div>
        </div>
    </header>
    <main class="flex-grow items-center">
        <div class="w-full mx-auto px-4 sm:px-6">
            <div class="py-[100px]">
                <form action="/tasks/{{ $task->id }}" method="post" class="mt-10">
                    @csrf
                    @method("PUT")
                    <div class="flex flex-col items-center">
                        <!-- 入力フィールド -->
                        <label class="w-full max-w-3xl mx-auto">
                            <input
                                class="placeholder:italic placeholder:text-gray-400 block bg-white w-full border border-gray-300 rounded-lg py-3 pl-4 shadow-sm focus:outline-none focus:border-blue-500 focus:ring-blue-500 focus:ring-1 text-base sm:text-lg"
                                type="text" name="task_name" value="{{ $task->name }}" />
                            @error("task_name")
                            <div class="mt-3">
                                <p class="text-red-500">
                                    {{ $message }}
                                </p>
                            </div>
                            @enderror
                        </label>
                        <div class="mt-8 w-full items-center flex gap-10 justify-center">
                            <!-- 戻るボタン -->
                            <a href="/tasks" class="block shrink-0 py-4 px-4 text-sky-500 underline underline-offset-2 rounded-md hover:bg-sky-100 transition-colors">
                                戻る
                            </a>
                            <!-- 送信ボタン -->
                            <button type="submit"
                                class="py-3 px-6 bg-blue-600 text-white font-semibold text-lg rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                                編集する
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer class="bg-blue-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="py-4 text-center">
                <p class="text-white text-sm">© 2025 Taskly.</p>
            </div>
        </div>
    </footer>
</body>

</html>