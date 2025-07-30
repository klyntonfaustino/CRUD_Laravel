<!DOCTYPE html>
<html lang="pt-BR   ">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left;}
        th { background-color: #f2f2f2; }
        .success-message {color: green; font-weight: bold; margin-bottom: 15px;}
        .button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Lista de Tarefas</h1>

    @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif  

    <a href="{{ route('tasks.create') }}" class="button">Criar Nova Tarefa</a>

    @if ($tasks->isEmpty())
        <p>Nenhuma tarefa encontrada.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->status }}</td>
                        <td>
                            <a href="{{ route('tasks.show', $task->id) }}">">Ver</a> |
                            <a href="{{ route('tasks.edit', $task->id) }}">">Editar</a> |
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?');" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background:none; border:none; color:bluer; cursor: pointer; padding: 0; font-family: inherit; font-size: inherit;">">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif 
</body>
</html>