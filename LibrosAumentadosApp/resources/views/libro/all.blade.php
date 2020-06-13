@extends("layouts.master")

@section("content")



<div class="jumbotron">
  <h3 class="text-center">Lista de libros</h3>
  
  <hr class="my-4">
  <div class="elementos container-fluid">
    {{ $libroList->links() }}
        <div class="row">

            <div class="col-md-3">
                <form class="search d-block">
                    <input class="form-control libros-input" id="search" type="search" placeholder="Buscador de libros" aria-label="Search">
                  </form>
                <div class="search-libros">
                    <ul class="libros-php">
                      @forelse ($libroList as $l)
                        <li>
                          <a href="{{ route('contenido.contenido', $l->id) }}">
                            {{$l->titulo}}
                          </a>
                        </li>
                      @empty
                        <li>...</li>
                      @endforelse
                    </ul>
                    
                </div>
            </div>
            @foreach ($libroList as $libro)   
            <div class="col-md-3 badge-secondary">
                <div class="elemento mb-4">
                    <div class="elemento-header">
                    <p>
                        <a href="{{route('contenido.contenido', $libro->id)}}"><img src='{{ URL::asset("$libro->cubierta")}}' class="cubierta"></a>
                    </p>
                    </div>
                    <div class="elemento-body">
                        <h6>{{$libro->titulo}}</h6>
                        <p>{{$libro->subtitulo}}</p>
                        <p>Autor: {{$libro->autor}}</p>
                    </div>
                </div>
            </div>  
            @endforeach


        </div>
       
    </div>    
</div>

<script>
            $(function(){
                  //$('.search-libros').hide();
                  
                $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                  
                let tasks;
                $('#search').keyup(function(){
                    if($('#search').val()){
                        let search = $('#search').val();
                        console.log(search);
                        $.ajax({
                            url: "{{ route('contenido.libros') }}",
                            type: 'POST',
                            data: {search: search},
                            success: function(response){
                            
                                tasks = JSON.parse(response);
                                console.log(tasks);
                                    let template = '';
                                    
                                    
                                    tasks.forEach(task => {

                                    var ruta = "{{ route('contenido.contenido', 1) }}";  
                                    ruta = ruta.substr(0, ruta.length-1); 
                                    var id = task.id;
                                    var titulo = task.titulo;
                                    

                                    
                                        template += "<ul class='libros-php'><li><a href='"+ruta+""+id+"'>"+titulo+"</li></a></ul>";
                                    });
                                    $('.search-libros').html(template);
                                    $('.search-libros').show();
                            }
                        });
                    }else{
                        
                    }
                });

            });   
</script>




@endsection
