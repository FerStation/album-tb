<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//importando o model
use App\Models\Photo;

class PhotoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $photos = Photo::all();
    return view('/pages/home', ['photos' => $photos]);
  }

  public function showAll()
  {
    $photos = Photo::all();
    return view('/pages/photo_list', ['photos' => $photos]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('pages/photo_form');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //Criação de um um objeto do tipo Photo
    $photo = new Photo();

    //Alterando os atributos do objeto
    $photo->title = $request->title;
    $photo->date = $request->date;
    $photo->description = $request->description;

    //upload
    if ($request->hasFile('photo') && $request->file('photo')->isValid()) {

      //Salvando o caminho completo em uma variavel
      $upload = $this->uploadPhoto($request->photo);

      //Dividindo a string em um array
      $directoryArray = explode(DIRECTORY_SEPARATOR,$upload);

      //Adicinando o nome do arquivo ao atributo photo_url
      $photo->photo_url = end($directoryArray);

    }

    //Se tudo deu certo, salva no bd
    if ($directoryArray) {
      $photo->save(); //Inserindo no banco de dados
    }

    //Redirecionar para a página inicial
    return redirect('/');

  } //fim do store

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $photo = Photo::findOrFail($id);
    return view('pages/photo_form', ['photo' => $photo]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //Retorna a foto do banco de dados
    $photo = Photo::findOrFail($request->id);

    //Alterando os atributos do objeto
    $photo->title = $request->title;
    $photo->date = $request->date;
    $photo->description = $request->description;
    $photo->photo_url = "teste";

    //Alterando no banco de dados
    $photo->update();

    //Redirecionar para a página de fotos
    return redirect('/photos');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //Retornar a foto do banco de dados
    $photo = Photo::findOrFail($id);

    //exluir foto do armazenamento
    $this->deletePhoto($photo->photo_url);

    //excluir foto do banco de dados
    $photo->delete();

    //Redirecionar para a página de fotos
    return redirect('/photos');
  }

  public function uploadPhoto($photo){

    //Define um nome aleatório para a foto, com base na data atual
    $nomeFoto = sha1(uniqid(date('HisYmd')));

    //Recupera a extensão do arquivo
    $extensao = $photo->extension();

    //Define o nome do arquivo com a extensão
    $nomeArquivo = "{$nomeFoto}.{$extensao}";

    //faz o upload
    $upload = $photo->move(public_path("storage".DIRECTORY_SEPARATOR."photos"), $nomeArquivo);

    //retorna o nome do arquivo
    return $upload;

  }

  public function deletePhoto($fileName){
    //Verifica se o arquivo existe
    if (file_exists(public_path("storage".DIRECTORY_SEPARATOR."photos".DIRECTORY_SEPARATOR.$fileName))) {

      //Excluir o arquivo de imagem
      unlink(public_path("storage".DIRECTORY_SEPARATOR."photos".DIRECTORY_SEPARATOR.$fileName));

    }//fim do if
  }

}//fim do controller
