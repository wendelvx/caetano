<?php

namespace App\Http\Controllers;

use App\Models\Exercicio;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ExercicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user=Auth::User();
        $nameExec = $request->input('name-filter');
        $dateExec = $request->input('date-filter');
        
        $exercicios = Exercicio::where('user_id', $user->id)
            ->when($nameExec,fn($query) => $query->where('name_activity','like',"%{$nameExec}%"))
            ->when($dateExec,fn($query) => $query->whereDate('date',$dateExec))
            ->get();
            
        return view('exercicios.index', compact('exercicios','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validatedData = $request->validate([
            'name_activity'            => 'required|string|max:255', 
            'duration'        => 'required|integer|min:1',  
            'calories_burned' => 'required|integer|min:1',
            'date'            => 'required|date',
        ]);

        $validatedData['user_id'] = Auth::id();

        Exercicio::create($validatedData);

        return redirect()->route('exercicios.index')->with('success', 'O exercício foi registrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Exercicio $exercicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exercicio $exercicio)
    {
        if ($exercicio->user_id !== Auth::id()) {
        abort(403, 'Acesso não autorizado.');
    }

    return view('exercicios.edit', compact('exercicio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exercicio $exercicio)
    {
        if ($exercicio->user_id !== Auth::id()) {
            abort(403, 'Acesso não autorizado.');
        }

        $validatedData = $request->validate([
            'name_activity'   => 'required|string|max:255',
            'duration'        => 'required|integer|min:1',
            'calories_burned' => 'required|integer|min:1',
            'date'            => 'required|date',
        ]);

        $exercicio->update($validatedData);

        return redirect()->route('exercicios.index')->with('success', 'Exercício atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exercicio $exercicio)
    {
        
        if ($exercicio->user_id !== Auth::id()) {
            abort(403, 'Acesso não autorizado.');
        }

        $exercicio->delete();

        return redirect()->route('exercicios.index')->with('success', 'Exercício removido com sucesso!');
    }
}
