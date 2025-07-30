<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes de Tarefa</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        .details-box {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            max-width: 600px;
            margin-bottom: 20px;
        }
        .details-box p {
            margin-bottom: 10px;
        }
        .details-box strong {
            display: inline-block;
            width: 120px;
        }
        .button-group {
            margin-top: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            color: whiter;
            margin-right: 10px;
        }
        .button.edit { background-color: #ffc107; color:#333; }
        .button.delete { background-color: #dc3545; }
        .button.back { background-color: #6c757d; }
        .button:hover { opacity: 0.9; }
        from { display: inline-block; }
    </style>
</head>
<body>
    <h1>Detalhes da Tarefa</h1>

    <div class="details-box">
        <p><strong>ID:</strong> {{ $task->id }}</p>
        <p><strong>Título:</strong> {{ $task->title }}</p>
        <p><strong>Descrição:</strong> {{ $task->description ?? 'N/A' }}</p>
        <p><strong>Status:</strong> {{ $task->status }}</p></p>
        <p><strong>Criado em:</strong> {{ $task->created_at->format('d/m/Y H:i') }}</p>
        <p><strong>Atualizado em:</strong> {{ $task->updated_at->format('d/m/Y H:i') }}</p>
    </div>

    <div class="button-group">
        <a href="{{ route('tasks.edit', $task->id) }}" class="button edit">Editar</a>

        <from action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?');">
            @csrf
            @method('DELETE')<button type="submit" class="button delete">Excluir</button>
        </from>
        
        <a href="{{ route('tasks.index') }}" class="button back">Voltar para Lista</a>
    </div>
</body>
</html>