<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Nova Tarefa</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        form { max-width: 500px; padding: 20px; border: 1px solid #ddd; border-radius: 8px; }
        div { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], textarea, select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;     
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #28a745;
            color: white;
            padding: 10px 20px
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover { background-color: #218838; }
        .error { color: red; font-size: 0.9em; margin-top: 5px; }
        .back-button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 10px;
        }
        .back-button:hover {
            background-color: #5a6268;
        } 
    </style>
</head>
<body>
    <h1>Criar Nova Tarefa</h1>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Título:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="description">Descrição:</label>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pendente</<option value="ongoing" {{ old('status') == 'ongoing' ? 'selected' : '' }}>Em Andamento<
                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Concluída</option>
            </select>
            @error('status')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <a href="{{ route('tasks.index') }}" class="back-button">Voltar</a>
        <button type="submit">Salvar Tarefa</button>
</body>
</html>