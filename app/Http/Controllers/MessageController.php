<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all(); // Obtém todas as mensagens do banco de dados
        return view('user.prof.chat', compact('messages')); // Passa a variável para a visualização
    }

    public function store(Request $request)
    {
        // Validar a solicitação
        $request->validate([
            'text' => 'required|string',
            'photo_url' => 'nullable|string',
        ]);

        // Inserir nova mensagem usando Eloquent
        $message = Message::create([
            'text' => $request->text,
            'photo_url' => $request->photo_url,
        ]);

        return redirect()->route('messages.index'); // Redireciona para a lista de mensagens após salvar
    }
}
