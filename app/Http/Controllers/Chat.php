<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function index()
    {
        // Consultar mensagens do banco de dados usando SQL puro
        $messages = DB::select('SELECT * FROM messages ORDER BY created_at DESC LIMIT 25');
    
        // Usar dd() para depuração: exibe o conteúdo da variável e para a execução do código
        dd($messages);
    
        // Retornar a view com a variável $messages (não será executado se dd() for chamado)
        return view('chat', ['messages' => $messages]);
    }

    public function store(Request $request)
    {
        // Inserir nova mensagem usando SQL puro
        $request->validate([
            'text' => 'required|string',
            'photo_url' => 'nullable|string',
        ]);

        DB::insert('INSERT INTO messages (text, photo_url, created_at, updated_at) VALUES (?, ?, NOW(), NOW())', [
            $request->text,
            $request->photo_url,
        ]);

        return redirect()->route('messages.index');
    }
}
