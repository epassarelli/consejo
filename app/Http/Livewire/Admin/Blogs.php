<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Blog;
use App\Models\Tipoblog;
use Illuminate\Support\Facades\Session;
use Livewire\WithFileUploads;



class Blogs extends Component
{

    use WithFileUploads;

    public $blog;
    public $blog_id;
    public $name, $tipoblog_id, $subtitulo, $volanta, $contenido, $imagen, $link, $publicado, $usuario_id;
    public $isOpen = false;
    public $muestraModal = 'none';
    public $cambioImg = false;
    public $accion = '';


    protected $blogs, $tiposblog;
    protected $listeners = ['delete'];

    public function render()
    {
        $blogs = Blog::select([
            'blogs.id',
            'blogs.tipoblog_id',
            'tipos_blog.name',
            'blogs.subtitulo',
            'blogs.volanta',
            'blogs.contenido',
            'blogs.imagen',
            'blogs.link',
            'blogs.publicado',
            'blogs.usuario_id',
            'blogs.updated_at',
            'users.name as usuario',
        ])
            ->leftJoin('tipos_blog', 'blogs.tipoblog_id', '=', 'tipos_blog.id')
            ->leftJoin('users', 'blogs.usuario_id', '=', 'users.id')
            ->get();
        $tiposblog = Tipoblog::where('habilitado', 1)->get();

        return view('livewire.admin.blogs', compact('blogs', 'tiposblog'))->layout('layouts.adminlte');
    }


    protected function rules()
    {

        if (($this->cambioImg === true && $this->accion === 'editar') ||  $this->accion === 'crear') {
            return [
                'tipoblog_id' => 'required | not_in:0',
                'subtitulo'   => 'required',
                'volanta'     => 'required',
                'contenido'   => 'required',
                // 'imagen'      => 'required',
                // 'link'        => 'required',
                // 'usuario_id'  => 'required',
                'imagen' => 'required|mimes:jpg,png|max:1024',
            ];
        } else {

            return [
                'tipoblog_id' => 'required | not_in:0',
                'subtitulo'   => 'required',
                'volanta'     => 'required',
                'contenido'   => 'required',
                // 'imagen'      => 'required',
                // 'link'        => 'required',
                // 'usuario_id'  => 'required',

            ];
        }
    }




    protected function messages()
    {
        return [
            'tipoblog.id.required' => 'Debe seleccionar un tipo de Blog',
            'tipoblog.id.not_in'   => 'Debe seleccionar un tipo de Blog',
            'subtitulo.required'   => 'Debe cargar un subtitulo',
            'volanta.required'     => 'Debe cargar una volanta',
            'contenido.required'   => 'Debe cargar un contenido',
            // 'imagen.required'      => 'Debe cargar una imagen',
            // 'link.required'        => 'Debe cargar un  link',

        ];
    }

    public function create()
    {
        $this->blog_id = 0;
        $this->accion = 'crear';
        $this->resetInputFields();
        $this->openModal();
    }

    public function edit($id)
    {

        $blog  = Blog::findOrFail($id);
        $this->accion = 'editar';
        $this->blog_id = $id;
        $this->tipoblog_id = $blog->tipoblog_id;
        $this->subtitulo = $blog->subtitulo;
        $this->volanta = $blog->volanta;
        $this->contenido = $blog->contenido;
        $this->imagen = $blog->imagen;
        $this->link = $blog->link;
        $this->publicado = $blog->publicado;
        $this->usuario_id = $blog->usuario_id;

        $this->openModal();
    }

    public function store()
    {
        $this->validate();


        if ($this->cambioImg) {
            $imagen_name = $this->imagen->getClientOriginalName();
            $upload_imagen = $this->imagen->storeAs('public/img/blogs', $imagen_name);
            $this->cambioImg = false;
        } else {
            $imagen_name = $this->imagen;
        }


        Blog::updateOrCreate(
            ['id' => $this->blog_id],
            [
                'tipoblog_id' => $this->tipoblog_id,
                'subtitulo' => $this->subtitulo,
                'volanta' => $this->volanta,
                'contenido' => $this->contenido,
                'imagen' => $imagen_name,
                'link' => $this->link,
                'publicado' => $this->publicado,
                'usuario_id' => auth()->user()->id,
            ]
        );

        $this->closeModal();
        $this->resetInputFields();
        $this->emit('mensajePositivo', ['mensaje' => 'Operacion exitosa']);
    }

    public function delete($id)
    {
        Blog::find($id)->delete();
    }

    public function closeModal()
    {
        // $this->isOpen = false;
        $this->muestraModal = 'none';
    }

    public function openModal()
    {
        // $this->isOpen = true;
        $this->muestraModal = 'block';
    }

    private function resetInputFields()
    {
        $this->blog_id = 0;
        $this->tipoblog_id = 0;
        $this->subtitulo = '';
        $this->volanta = '';
        $this->contenido = '';
        $this->imagen = '';
        $this->link = '';
        $this->publicado = 0;
        $this->usuario_id = 0;
        $this->cambioImg = false;

    }


    public function cambioImagen()
    {
        $this->cambioImg = true;
    }


}
