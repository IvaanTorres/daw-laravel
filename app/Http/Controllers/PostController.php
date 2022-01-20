<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    //! De esta manera podemos restringir que métodos utilizar.
    //! En este caso, todos los métodos solo son accesibles por admin.
    function __construct(){
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //getAll()
    {
        $posts = DB::table('posts')
        ->orderBy('created_at', 'desc')
        ->paginate(5); //Si usas paginate() no es necesario usar get()
        //? PREGUNTAR COMO HACER LOS BOTONES DE PAGINACION
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request) //insert()
    {
        $newPost = new Post();
        $newPost->title = $request->get('title');
        $newPost->body = $request->get('body');
        $newPost->user()->associate(User::where('login',  $request->get('user'))->get()[0]->id); //? PREGUNTAR
        $newPost->save();
        return redirect('/posts', 302);
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
        $comments = Comment::where('post_id', $post->id)->orderBy('created_at')->get();
        return view('posts.show', ['post' => $post, 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //Formulario de editar
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id) //edit()
    {
        $post = Post::findOrFail($id);
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->user()->associate(User::where('login',  $request->get('user'))->get()[0]->id); //? PREGUNTAR
        $post->save();

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //del()
    {
        Comment::where('post_id', $id)->delete();
        Post::findOrFail($id)->delete();
        return redirect('/posts', 302);
    }

    /* ----------------------------------- -- ----------------------------------- */
    //Métodos de prueba para insertar y editar posts aleatorios

    public function nuevoPrueba(){
        $ran= rand();
        $newPost = new Post();
        $newPost->title = "Titulo $ran";
        $newPost->body = "Contenido $ran";
        $newPost->save();
        return redirect('/', 302);
    }

    public function editarPrueba($id){
        $ran= rand();
        $modifiedPost = Post::findOrFail($id);
        $modifiedPost->title="Titulo $ran";
        $modifiedPost->body="Contenido $ran";
        $modifiedPost->save();
        return redirect('/', 302);
    }
}
