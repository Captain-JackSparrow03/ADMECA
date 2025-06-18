<!-- Modal Édition -->
<div class="modal fade" id="editClientModal{{$client->id}}" tabindex="-1"
    aria-labelledby="editClientModalLabel">
    <div class="modal-dialog bg-white">
      <form method="POST" class="modal-content"  action="{{ route('clients.update', $client) }}">
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
            <input type="text" name="nom" class="form-control w-full {{ $errors->has('nom') ? 'is-invalid' : '' }}"
               style="background-color: grey;" value="{{ old('nom', $client->nom) }}"
                placeholder="{{ $errors->first('nom') ?? 'Entrez le nom' }}">
          </div>
          <div class="mb-3">
            <label for="nom" class="form-label text-dark">Prenom</label>
            <input type="text" name="prenom" class="form-control w-full {{ $errors->has('prenom') ? 'is-invalid' : '' }}"
               style="background-color: grey;" value="{{ old('prenom', $client->prenom) }}"
                placeholder="{{ $errors->first('prenom') ?? 'Entrez le prenom' }}">
          </div>
          <div class="mb-3">
            <label for="telephone" class="form-label text-dark">Téléphone</label>
            <input type="text" name="telephone" class="form-control w-full {{ $errors->has('telephone') ? 'is-invalid' : '' }}"
               style="background-color: grey;" value="{{ old('telephone', $client->telephone) }}"
                placeholder="{{ $errors->first('telephone') ?? 'Entrez le telephone' }}">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label text-dark">Email</label>
            <input type="text" name="email" class="form-control w-full {{ $errors->has('email') ? 'is-invalid' : '' }}"
               style="background-color: grey;" value="{{ old('email', $client->email) }}"
                placeholder="{{ $errors->first('email') ?? 'Entrez email' }}">
          </div>
          <div class="mb-3">
            <label for="adresse" class="form-label text-dark">Adresse</label>
            <input type="text" name="adresse" class="form-control w-full {{ $errors->has('adresse') ? 'is-invalid' : '' }}"
               style="background-color: grey;" value="{{ old('adresse', $client->adresse) }}"
                placeholder="{{ $errors->first('adresse') ?? 'Entrez adresse' }}">
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