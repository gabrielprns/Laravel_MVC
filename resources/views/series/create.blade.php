<x-layout title="Nova-Série">
  <form action="{{route('series.store')}}" method="post">
    @csrf
    <div class="row mb3">
      <div class="col-8">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text"
          autofocus
          class="form-control"
          name="nome"
          id ="nome"
          value="{{old('nome')}}" >
      </div>

      <div class="col-2">
        <label for="seasonQty" class="form-label">Nº de Temporadas: </label>
        <input type="text"
        class="form-control"
          name="seasonQty"
          id ="seasonQty"
          value="{{old('nome')}}" >
      </div>

      <div class="col-2">
        <label for="EpisodesPerSeason" class="form-label">Episódios por Temporada:</label>
        <input type="text"
        class="form-control"
          name="EpisodesPerSeason"
          id ="EpisodesPerSeason"
          value="{{old('nome')}}" >
      </div>
    </div>
    <button type="submit" class="mt-2 btn btn-primary">Adicionar</button>
  </form>
</x-layout>