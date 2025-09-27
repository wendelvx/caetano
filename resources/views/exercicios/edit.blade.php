<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Exercício</title>
    <style>
        body { font-family: sans-serif; background-color: #f4f4f9; color: #333; margin: 20px; }
        .form-container { max-width: 600px; margin: auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="number"], input[type="date"] { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        .button { padding: 10px 15px; border: none; border-radius: 4px; color: white; cursor: pointer; text-decoration: none; display: inline-block; }
        .button-save { background-color: #28a745; }
        .button-cancel { background-color: #6c757d; }
        .error-message { color: #dc3545; font-size: 0.875em; margin-top: 5px; }
    </style>
</head>
<body>
<form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
<div class="form-container">
    <h2>Editar Exercício</h2>

    {{-- O formulário aponta para a rota de UPDATE, passando o ID do exercício --}}
    <form action="{{ route('exercicios.update', $exercicio->id) }}" method="POST">
        @csrf  {{-- Token de segurança do Laravel, obrigatório --}}
        @method('PUT') {{-- Informa ao Laravel que, apesar de ser um POST, a intenção é de UPDATE --}}

        <div class="form-group">
            <label for="name_activity">Nome da Atividade:</label>
            {{-- A função old() é uma boa prática. Se a validação falhar, ela mantém o que o usuário digitou.
                 Caso contrário, ela usa o valor original do banco de dados: $exercicio->name_activity --}}
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

        <button type="submit" class="button button-save">Salvar Alterações</button>
        <a href="{{ route('exercicios.index') }}" class="button button-cancel">Cancelar</a>
    </form>
</div>

</body>
</html>