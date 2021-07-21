@extends('/layouts/main')

@section('content')
@include('/partials/navbar')
<div class="container">

  <!-- Coluna Btn voltar -->
  <div class="row">
    <div class="col-12 my-4">
      <a href="/"><i class="fas fa-arrow-left me-2"></i>Voltar</a>
    </div>

    <!-- Coluna Tabela -->
    <div class="col-12">
      <div class="card shadow bg-white rounded">
        <div class="card-header gradient text-white">
          <h2 class="card-title p-3">
            <i class="fas fa-image"></i>
            Fotos cadastradas
          </h2>
        </div>
        <div class="card-body p-4">
          <table class="table table-hover text-center">
            <thead class="">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Foto</th>
                <th scope="col">Titulo</th>
                <th scope="col">Data</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
              @foreach($photos as $photo)
              <tr class="align-middle">
                <td>{{$photo->id}}</td>
                <td>
                  <img width="200" class="img-thumbnail" src="https://www.osmais.com/wallpapers/201209/dia-de-chuva-wallpaper.jpg" alt="">
                </td>
                <td>{{$photo->title}}</td>
                <td>{{$photo->date}}</td>
                <td>
                  <a href="/photos/edit/{{$photo->id}}" class="btn btn-secondary">
                    <i class="fas fa-edit"></i>
                  </a>
                  <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div><!--fim do card-body -->
      </div><!-- fim do card -->
    </div><!-- fim da coluna da tabela -->

  </div><!--fim da row -->
</div><!-- fim do container -->
@endsection
