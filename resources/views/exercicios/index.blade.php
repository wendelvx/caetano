<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Exercícios</title>
    <style>
        /* --- Reset Básico e Estilos Gerais --- */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            margin: 30px auto;
            padding: 0 20px;
        }

        h1,
        h2 {
            color: #2c3e50;
            margin-bottom: 20px;
        }

        h1 {
            text-align: center;
        }

        /* --- Estilo para os "Cards" --- */
        .card {
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        /* --- Mensagens de Alerta --- */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid transparent;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }

        .alert-danger ul {
            list-style-position: inside;
        }

        /* --- Estilos do Formulário --- */
        .form-group {
            margin-bottom: 15px;
        }

        .form-filter {
            position: relative;
            margin: 20px 0;
            display: flex;
            flex-direction: row;
            width: 100%;
        }

        .form-filter input {
            width: 100%;
            margin-right: 3px;
            padding: 12px 8px;
            font-size: 16px;
            border: 1px solid #aaa;
            border-radius: 4px;
            outline: none;
        }

        .form-filter label {
            position: absolute;
            left: 10px;
            top: 12px;
            background: white;
            /* evita sobrepor a borda */
            padding: 0 4px;
            color: #777;
            font-size: 16px;
            transition: 0.2s ease all;
            pointer-events: none;
            /* impede clique no label */
        }

        .form-filter input:focus+label,
        .form-filter input:not(:placeholder-shown)+label {
            top: -8px;
            left: 8px;
            font-size: 12px;
            color: #9fa8b3ff;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .submit-button {
            display: inline-block;
            background-color: #3498db;
            color: #ffffff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-button:hover {
            background-color: #2980b9;
        }

        /* --- Estilos da Tabela --- */
        .table-container {
            margin-top: 10px;
            overflow-x: auto;
            /* Para responsividade em telas pequenas */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead {
            background-color: #e9ecef;
        }

        table th,
        table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Container para alinhar os botões lado a lado */
        .actions-container {
            display: flex;
            gap: 8px;
            /* Espaçamento entre os botões */
            align-items: center;
        }

        /* Estilo base para os botões */
        f .button {
            display: inline-block;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
            transition: opacity 0.3s ease;
        }

        .button:hover {
            opacity: 0.8;
        }

        /* Estilo para o botão de Listar/Ver */
        .button-view {
            background-color: #3498db;
            /* Azul */
        }

        /* Estilo para o botão de Remover */
        .button-delete {
            background-color: #e74c3c;
            /* Vermelho */
        }

        /* Garante que o formulário não adicione margens extras */
        .actions-container form {
            margin: 0;
        }
    </style>
</head>

<body>
    @include('layouts.header')


    <div class="container">

        <h1>Painel de Exercícios</h1>

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="card">
            <h2>Registrar Novo Exercício</h2>
            <form action="{{ route('exercicios.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name_activity">Nome da Atividade</label>
                    <input type="text" id="name_activity" name="name_activity" required value="{{ old('name_activity') }}">
                </div>

                <div class="form-group">
                    <label for="duration">Duração (em minutos)</label>
                    <input type="number" id="duration" name="duration" required min="1" value="{{ old('duration') }}">
                </div>

                <div class="form-group">
                    <label for="calories_burned">Calorias Queimadas</label>
                    <input type="number" id="calories_burned" name="calories_burned" required min="1" value="{{ old('calories_burned') }}">
                </div>

                <div class="form-group">
                    <label for="date">Data do Exercício</label>
                    <input type="date" id="date" name="date" required value="{{ old('date') }}">
                </div>

                <button type="submit" class="submit-button">Registrar</button>
            </form>
        </div>

        <div class="card">
            <h2>Histórico de Exercícios De {{ $user->name }}</h2>
            <form action="{{ route('exercicios.index') }}" method="GET">
                @csrf
                <h3>Pesquisa</h3>
                <div class="form-filter">
                    <div class="form-filter">
                        <input type="text" id="name_activity" name="name-filter" value="{{ old('name_activity') }}">
                        <label for="name_activity">Nome da Atividade</label>
                    </div>
                    <div class="form-filter">
                        <input type="date" id="date" name="date-filter" value="{{ old('date') }}">
                        <label for="date">Data do Exercício</label>
                    </div>
                </div>
                <button type="submit" class="submit-button">Buscar</button>
                <button class="submit-button" style="background-color:#721c24" onclick="window.location='{{route('exercicios.index')}}'">
                    limpar</button>
            </form>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Atividade</th>
                            <th>Duração (min)</th>
                            <th>Calorias</th>
                            <th>Data</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($exercicios as $exercicio)
                        <tr>
                            <td>{{ $exercicio->name_activity }}</td>    
                            <td>{{ $exercicio->duration }}</td>
                            <td>{{ $exercicio->calories_burned }}</td>
                            <td>{{ \Carbon\Carbon::parse($exercicio->date)->format('d/m/Y') }}</td>

                            <td>
                                <div class="actions-container">
                                    <a href="{{ route('exercicios.edit', $exercicio->id) }}" class="button button-view">Editar</a>

                                    <form action="{{ route('exercicios.destroy', $exercicio->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja remover este exercício?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="button button-delete">Remover</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="text-align: center;">Nenhum exercício registrado ainda.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>

</html>