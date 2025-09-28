<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Exercícios</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    

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

   
</div>

</div>
    @include('layouts.footer')

</body>

</html>