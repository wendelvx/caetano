<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Exercício</title>
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
</head>
<body>
    @include('layouts.header')

    <div class="form-container">
        <h2>🔥 Editar Exercício 🔥</h2>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('exercicios.update', $exercicio->id) }}" method="POST">
            @csrf  
            @method('PUT') 

            <div class="form-group">
                <label for="name_activity">Nome da Atividade:</label>
                <input type="text" id="name_activity" name="name_activity" value="{{ old('name_activity', $exercicio->name_activity) }}" required>
                @error('name_activity')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="duration">Duração (em minutos):</label>
                <input type="number" id="duration" name="duration" value="{{ old('duration', $exercicio->duration) }}" required>
                @error('duration')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="calories_burned">Calorias Queimadas:</label>
                <input type="number" id="calories_burned" name="calories_burned" value="{{ old('calories_burned', $exercicio->calories_burned) }}" required>
                @error('calories_burned')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="date">Data:</label>
                <input type="date" id="date" name="date" value="{{ old('date', $exercicio->date) }}" required>
                @error('date')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="button button-save">💪 Salvar Alterações</button>
            <a href="{{ route('exercicios.index') }}" class="button button-cancel">✖ Cancelar</a>
        </form>
    </div>

    @include('layouts.footer')
</body>
</html>
