<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $query = Client::query();

        if ($request->search) {
            $query->where('nom', 'like', "%{$request->search}%")
                  ->orWhere('telephone', 'like', "%{$request->search}%");
        }

        $clients = $query->latest()->paginate(10);

        return view('clients.index', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'telephone' => 'required|string|max:20|unique:clients,telephone',
            'email' => 'nullable|email|unique:clients,email',
            'adresse' => 'nullable|string|max:255',
        ]);

        Client::create($request->all());
        flash()->success('Client ajouté avec succès.');
        return back();
    }


    public function update(Request $request, Client $client)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'telephone' => [
                'required',
                'string',
                'max:20',
                Rule::unique('clients')->ignore($client->id),
            ],
            'email' => [
                'nullable',
                'email',
                Rule::unique('clients')->ignore($client->id),
            ],
            'adresse' => ['nullable', 'string', 'max:255'],
        ]);

        $client->update($request->only('nom', 'prenom', 'telephone', 'email', 'adresse'));

        flash()->success('Client modifié avec succès.');
        return back();
    }

    public function destroy(Client $client)
    {
        $client->delete();

        flash()->warning('Client supprimé.');
        return back();
    }

}

