<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDo</title>
    <script src="{{ asset('/js/script.js') }}" defer></script>
    @vite('resources/css/app.css')
</head>

<body class="flex flex-col min-h-screen bg-blue-50">
    <header class="bg-blue-600 shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="py-4">
                <p class="text-white text-3xl font-bold">Taskly</p>
            </div>
        </div>
    </header>
    <main class="flex-grow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="py-12">
                <div class="wrap">
                    <p class="text-4xl font-bold text-center text-gray-800 typing">今日は何をしよう？</p>
                </div>
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
                @if ($tasks->isNotEmpty())
                <div class="max-w-7xl mx-auto mt-20">
                    <div class="inline-block min-w-full py-2 align-middle">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-blue-500">
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-m font-semibold text-white">
                                            タスク一覧
                                        </th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Actions</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach ($tasks as $task)
                                    <tr>
                                        <td class="px-3 py-4 text-m text-gray-700 font-medium">
                                            <div>{{ $task->name }}</div>
                                        </td>
                                        <td class="p-0 text-right text-sm font-medium">
                                            <div class="flex justify-end space-x-1">
                                                <!-- 完了ボタン -->
                                                <form action="/tasks/{{ $task->id }}" method="post" class="inline-block" role="menutask" tabindex="-1">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="{{$task->status}}">
                                                    <button type="submit" class="bg-emerald-500 py-4 px-5 mr-2 text-white rounded-md hover:bg-emerald-600 transition-colors">
                                                        完了
                                                    </button>
                                                </form>
                                                <!-- 編集ボタン -->
                                                <a href="/tasks/{{ $task->id }}/edit" class="inline-block py-4 px-4 text-sky-500 underline underline-offset-2 rounded-md hover:bg-sky-100 transition-colors">
                                                    編集
                                                </a>
                                                <!-- 削除ボタン -->
                                                <form action="/tasks/{{ $task->id }}" method="post" class="inline-block" role="menutask" tabindex="-1">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="py-4 px-4 mr-2 text-red-500 rounded-md hover:bg-red-100 transition-colors">
                                                        削除
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endif
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