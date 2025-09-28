<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Exercício</title>
    <style>
        body { 
            font-family: 'Impact', 'Arial Black', sans-serif; 
            background: radial-gradient(circle at top, #111 0%, #000 100%);
            color: #eee; 
            margin: 0; 
            
        }

        .form-container { 
            max-width: 700px; 
            margin: 40px auto; 
            background: linear-gradient(135deg, #1c1c1c, #2b2b2b);
            padding: 30px; 
            border-radius: 12px; 
            border: 2px solid #ff0000;
            box-shadow: 0 0 20px rgba(255,0,0,0.5), inset 0 0 10px rgba(255,0,0,0.2);
            text-align: center;
        }

        h2 { 
            font-size: 28px; 
            margin-bottom: 20px; 
            color: #ff0000; 
            text-transform: uppercase;
            letter-spacing: 3px;
            text-shadow: 2px 2px 6px black;
        }

        .form-group { 
            margin-bottom: 20px; 
            text-align: left;
        }

        label { 
            display: block; 
            margin-bottom: 8px; 
            font-weight: bold; 
            color: #ff4444;
            font-size: 14px;
            letter-spacing: 1px;
        }

        input[type="text"], 
        input[type="number"], 
        input[type="date"] { 
            width: 100%; 
            padding: 12px; 
            border: 2px solid #444; 
            border-radius: 6px; 
            background: #111; 
            color: #fff; 
            font-size: 16px;
            transition: all 0.3s ease;
        }

        input:focus {
            border-color: #ff0000;
            outline: none;
            box-shadow: 0 0 10px rgba(255,0,0,0.6);
        }

        .button { 
            padding: 12px 24px; 
            border: none; 
            border-radius: 8px; 
            color: #fff; 
            cursor: pointer; 
            text-decoration: none; 
            display: inline-block; 
            font-weight: bold;
            text-transform: uppercase;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .button-save { 
            background: linear-gradient(135deg, #ff0000, #990000); 
            border: 2px solid #ff3333;
        }

        .button-cancel { 
            background: linear-gradient(135deg, #555, #222); 
            border: 2px solid #999;
        }

        .button:hover {
            transform: scale(1.1) rotate(-1deg);
            box-shadow: 0 0 15px rgba(255,0,0,0.7);
        }

        .error-message { 
            color: #ff6666; 
            font-size: 0.9em; 
            margin-top: 5px; 
            font-style: italic;
        }
        .form-container { 
    max-width: 700px; 
    margin: 40px auto; 
    background: linear-gradient(135deg, #1c1c1c, #2b2b2b);
    padding: 30px; 
    border-radius: 12px; 
    border: 2px solid #ff0000;
    box-shadow: 0 0 20px rgba(255,0,0,0.5), inset 0 0 10px rgba(255,0,0,0.2);
    text-align: center;
    transition: all 0.3s ease;
    transform: scale(1);
}

/* Efeito interativo no hover */
.form-container:hover {
    transform: scale(1.02) translateY(-5px);
    box-shadow: 
        0 0 30px rgba(255,0,0,0.7), 
        0 0 60px rgba(255,0,0,0.4),
        inset 0 0 15px rgba(255,0,0,0.3);
    border-color: #fff;
}

/* Animação suave para o "glow pulsar" */
@keyframes pulse-glow {
    0% { box-shadow: 0 0 20px rgba(255,0,0,0.5); }
    50% { box-shadow: 0 0 30px rgba(255,0,0,0.9); }
    100% { box-shadow: 0 0 20px rgba(255,0,0,0.5); }
}

.form-container {
    animation: pulse-glow 3s infinite;
}

    </style>
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
