<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Novo Exercício</title>
    </head>
<body>

    {{-- O componente Header, como corrigimos, deve ser self-closed --}}
    <x-header titulo="Registrar Novo Exercício" />

    <main style="padding: 20px;">
        <h2>Novo Registro</h2>

        {{-- O action aponta para a rota que salva o exercício (método POST) --}}
        <form action="{{ route('exercicios.store') }}" method="POST">
            @csrf
            {{-- Token de segurança obrigatório no Laravel --}}

            <div>
                <label for="type">Nome da Atividade:</label>
                {{-- MUDANÇA AQUI: Input de texto em vez de Select --}}
                <input type="text" name="type" id="type" required 
                    maxlength="50" placeholder="Ex: Corrida, Pilates, etc." 
                    value="{{ old('type') }}">

                {{-- Exibe erro de validação (se houver) --}}
                @error('type')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <br>

            <div>
                <label for="duration">Duração (em minutos):</label>
                {{-- Garanta que o tipo é 'number' --}}
                <input type="number" name="duration" id="duration" min="1" required
                    value="{{ old('duration') }}"> 
                
                @error('duration')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <br>

            <div>
                <label for="calories_burned">Calorias Queimadas (estimado):</label>
                <input type="number" name="calories_burned" id="calories_burned" min="1" required
                       value="{{ old('calories_burned') }}">

                @error('calories_burned')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <br>

            <div>
                <label for="date">Data do Exercício:</label>
                <input type="date" name="date" id="date" required
                       value="{{ old('date', date('Y-m-d')) }}"> {{-- Sugere a data atual --}}

                @error('date')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <br>

            {{-- Se o usuário estiver logado, não precisa de campo, mas se precisar forçar, use um campo hidden --}}
            @auth
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            @else
                {{-- Caso o sistema não use autenticação, você precisaria de um Select para o usuário --}}
                @endauth

            <br>

            <button type="submit" style="padding: 10px; background-color: green; color: white; border: none; cursor: pointer;">
                Salvar Exercício
            </button>
        </form>
        
        <br>
        <a href="{{ route('exercicios.index') }}">Voltar para a Lista</a>

    </main>


    <x-footer />

</body>
</html>