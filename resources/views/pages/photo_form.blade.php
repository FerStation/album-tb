@extends('/layouts/main')

@section('content')
@include('/partials/navbar')
<div class="container">

  <!-- Coluna Btn voltar -->
  <div class="row">
    <div class="col-12 my-4">
      <a href=""><i class="fas fa-arrow-left me-2"></i>Voltar</a>
    </div>

    <!-- Coluna Card form -->
    <div class="col-12">
      <div class="card shadow bg-white rounded">
        <div class="card-header gradient text-white">
          <h2 class="card-title p-3"><i class="fas fa-image"></i> Nova Imagem</h2>
        </div>
        <div class="card-body p-4">
          <form action="/photos" method="POST">
            @csrf
            <div class="row">

              <!-- Coluna da foto -->
              <div class="col-lg-6">
                <div class="d-flex flex-column h-100">
                  <div
                    class="miniatura img-thumbnail d-flex flex-column justify-content-center align-items-center h-100 mt-4">
                    <i class="far fa-image"></i>
                    <br>
                    <small>
                    </small>
                  </div>
                  <div class="form-group mt-2">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Nenhum arquivo selecionado</label>
                    </div>
                  </div>
                </div>
              </div><!-- fim da coluna da foto -->

              <!-- coluna das inputs -->
              <div class="col-lg-6">

                <!-- Titulo -->
                <div class="form-group">
                  <label for="title">Título</label>
                  <div class="input-group">
                    <div class="input-group-text">
                      <i class="fas fa-image"></i>
                    </div>
                    <input id="title" name="title" type="text" class="form-control"
                      placeholder="Digite o título da sua imagem">
                  </div>
                </div>

                <!-- Data -->
                <div class="form-group mt-3">
                  <label for="date">Data</label>
                  <div class="input-group">
                    <div class="input-group-text">
                      <i class="far fa-calendar-alt"></i>
                    </div>
                    <input id="date" name="date" type="date" class="form-control">
                  </div>
                </div>

                <!-- Descrição -->
                <div class="form-group mt-3">
                  <label for="description">Descrição</label>
                  <textarea id="description" name="description" cols="40" rows="5" class="form-control"
                    placeholder="Digite uma pequena descrição da imagem"></textarea>
                </div>

                <!-- Botões -->
                <div class="form-group d-flex mt-3">
                  <button name="submit" type="reset" class="btn btn-laranja flex-grow-1 me-2">Limpar</button>
                  <button name="submit" type="submit" class="btn btn-primary flex-grow-1">Salvar</button>
                </div>

              </div><!-- fim coluna das inputs-->
            </div><!-- fim da row -->
          </form><!-- fim do form -->
        </div><!-- fim do card-body -->
      </div><!-- fim do card -->

    </div><!-- fim da coluna card-form -->
  </div><!-- fim da row -->

</div><!-- fim da container-->
@endsection
