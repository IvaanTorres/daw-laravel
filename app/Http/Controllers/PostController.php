<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //getAll()
    {
        $posts = DB::table('posts')
        ->orderBy('titulo', 'asc')
        ->paginate(5); //Si usas paginate() no es necesario usar get()
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('/', 302);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //insert()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //getById()
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //Formulario de editar
    {
        return redirect('/', 302);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //edit()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //del()
    {
        $deletedPost = Post::findOrFail($id)->delete();
        return PostController::index();
    }

    /* ----------------------------------- -- ----------------------------------- */
    //Métodos de prueba para insertar y editar posts aleatorios

    public function nuevoPrueba(){
        $ran= rand();
        $newPost = new Post();
        $newPost->titulo = "Titulo $ran";
        $newPost->body = "Contenido $ran";
        $newPost->save();
        return redirect('/', 302);
    }

    public function editarPrueba($id){
        $ran= rand();
        $modifiedPost = Post::findOrFail($id);
        $modifiedPost->titulo="Titulo $ran";
        $modifiedPost->body="Contenido $ran";
        $modifiedPost->save();
        return redirect('/', 302);
    }
}
