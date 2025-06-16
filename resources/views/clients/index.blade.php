@extends('layouts.app')

@section('title', 'Gestion des Clients')

@section('content')
<div class="container-fluid">

  <h1 class="bg-light text-white" style="font-size: 25px;border-radius: 5px;"><span class="px-4">Gestion des
      Clients</span></h1>
  <div class=" bg-light mt-5">
    <div class="d-flex justify-content-between align-items-center mb-2 pt-2">
      <div class="row row-group">
        <form method="GET" action="{{ route('clients.index') }}" class="px-3">
          <input type="text" name="search" class="form-control w-full " placeholder="Recherche nom ou téléphone"
            value="{{ request('search') }}">
        </form>
      </div>
      <div class="row row-group">
        <button class="btn btn-primary mr-3 on_client" style="background-color: #1b6f0c;border: #1b6f0c;"
          data-bs-toggle="modal" data-bs-target="#addClientModal"><i class="fa fa-plus"></i>Ajouter un client</button>
      </div>
    </div>

    <div class="">
      <div class="card-body table-responsive p-1">
        <table class="table">
          <thead class="bg-white text-dark">
            <tr class="text-center">
              <th scope="col">N.</th>
              <th scope="col">Nom</th>
              <th scope="col">Téléphone</th>
              <th scope="col">Email</th>
              <th scope="col">Adresse</th>
              <th scope="col" >Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($clients as $key=>$client)
            <tr class="text-center">
              <td scope="row">{{ $key = $key + 1 }}</td>
              <td>{{ $client->nom }} {{ $client->prenom }}</td>
              <td>{{ $client->telephone }}</td>
              <td>{{ $client->email ?? '-' }}</td>
              <td>{{ $client->adresse ?? '-' }}</td>
              <td class="text-center">
                <button class="btn btn-sm me-1 text-white" style="background-color: #1b6f0c;" data-bs-toggle="modal"
                  data-bs-target="#editClientModal{{$client->id}}"><i class="fa fa-pen me-1"></i>Modifier</button>
                <form action="{{ route('clients.destroy', $client) }}" method="POST" class="d-inline"
                  onsubmit="return confirm('Confirmer la suppression ?')">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm bg-dark text-white"><i class="fa fa-trash me-1"></i>Supprimer</button>
                </form>
              </td>
            </tr>

            <!-- Modal Édition -->
            <div class="modal fade" id="editClientModal{{$client->id}}" tabindex="-1"
              aria-labelledby="editClientModalLabel" aria-hidden="true">
              <div class="modal-dialog bg-white">
                <form method="POST" class="modal-content" id="editClientForm" action="{{ route('clients.update', $client) }}">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="_action" value="edit">
                  <input type="hidden" name="client_id" value="{{ $client->id }}">
                  <div class="modal-header text-center">
                    <h5 class="modal-title" style="color: #1b6f0c;text-align: center;" id="addClientModalLabel">Modifier
                      le client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-close bg-light"
                        style="border: none;"></i></button>
                  </div>
                  <div class="modal-body ">
                    <div class="mb-3">
                      <label for="nom" class="form-label text-dark">Nom</label>
                      <input type="text" class="form-control w-full" style="background-color: grey;"
                         value="{{ $client->nom }}" name="nom" required>
                    </div>
                    <div class="mb-3">
                      <label for="nom" class="form-label text-dark">Prenom</label>
                      <input type="text" class="form-control w-full" style="background-color: grey;"
                        placeholder="Ex : Jonh" value="{{ $client->prenom }}" name="prenom" required>
                    </div>
                    <div class="mb-3">
                      <label for="telephone" class="form-label text-dark">Téléphone</label>
                      <input type="text" class="form-control w-full" style="background-color: grey;"
                        placeholder="Ex : 627458625" value="{{ $client->telephone }}" name="telephone" required>
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label text-dark">Email</label>
                      <input type="email" class="form-control w-full" style="background-color: grey;"
                        placeholder="Ex : jonh@doe.com" value="{{ $client->email }}" name="email">
                    </div>
                    <div class="mb-3">
                      <label for="adresse" class="form-label text-dark">Adresse</label>
                      <input type="text" class="form-control w-full" style="background-color: grey;"
                        placeholder="Ex : Conakry" value="{{ $client->adresse }}" name="adresse">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                        class="fa fa-close me-1"></i> Annuler</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save me-1"></i> Modifier</button>
                  </div>
                </form>
              </div>
            </div>
            @empty
            <tr>
              <td colspan="6" class="text-center">Aucun client trouvé.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

    <div class="mt-3">
      {{ $clients->links() }}
    </div>
  </div>

</div>

<!-- Modal Ajout -->
<div class="modal fade" id="addClientModal" tabindex="-1" aria-labelledby="addClientModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <form method="POST" action="{{ route('clients.store') }}" class="modal-content">
      @csrf
      <input type="hidden" name="_action" value="add">
      <div class="modal-header text-center">
        <h5 class="modal-title" style="color: #1b6f0c;text-align: center;" id="addClientModalLabel">Ajouter un client
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-close bg-light"
            style="border: none;"></i></button>
      </div>
      <div class="modal-body ">
        <div class="mb-3">
          <label for="nom" class="form-label text-dark">Nom</label>
          <input type="text" class="form-control w-full" style="background-color: grey;" placeholder="Ex : Doe"
            name="nom" required>
        </div>
        <div class="mb-3">
          <label for="nom" class="form-label text-dark">Prenom</label>
          <input type="text" class="form-control w-full" style="background-color: grey;" placeholder="Ex : Jonh"
            name="prenom" required>
        </div>
        <div class="mb-3">
          <label for="telephone" class="form-label text-dark">Téléphone</label>
          <input type="text" class="form-control w-full" style="background-color: grey;" placeholder="Ex : 627458625"
            name="telephone" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label text-dark">Email</label>
          <input type="email" class="form-control w-full" style="background-color: grey;"
            placeholder="Ex : jonh@doe.com" name="email">
        </div>
        <div class="mb-3">
          <label for="adresse" class="form-label text-dark">Adresse</label>
          <input type="text" class="form-control w-full" style="background-color: grey;" placeholder="Ex : Conakry"
            name="adresse">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-close me-1"></i>
          Annuler</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save me-1"></i> Ajouter</button>
      </div>
    </form>
  </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if ($errors->any())
            @if (old('_action') === 'add')
                var addModal = new bootstrap.Modal(document.getElementById('addClientModal'));
                addModal.show();
            @elseif (old('_action') === 'edit')
                var editModalId = 'editClientModal{{ old('client_id') }}';
                var editModal = new bootstrap.Modal(document.getElementById(editModalId));
                editModal.show();
            @endif
        @endif
    });
</script>
@endsection
