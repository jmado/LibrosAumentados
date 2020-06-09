@extends("layouts.adminMaster")

@section("content")

<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                {{-- 
                Boton de atras
                --}}
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">

                            @isset($datos)
                                <form action="{{ route('pagina.updateAdmin', ['pagina' => $datos->id]) }}" method="POST" enctype='multipart/form-data'>
                                @method("PUT")
                            @else
                                <form action="{{ route('pagina.store') }}" method="POST" enctype="multipart/form-data">
                            @endisset
                                @csrf


                                    <div class="row">
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="texto">Texto: </label>
                                                <textarea name="texto" class="form-control" id="texto" style="display:none;"></textarea>

                                                <div id="editor" style="border: 1px solid black"></div>
                                                {{-- Editor de texto online --}}
                                                <div id="markup"></div>
                                                <script src="https://unpkg.com/pell"></script>
                                                <script>
                                                    const pell = window.pell;
                                                    const editor = document.getElementById("editor");
                                                    //const markup = document.getElementById("markup");
                                                    const markup = document.getElementById("texto");

                                                    pell.init({
                                                    element: editor,
                                                    onChange: (html) => {
                                                        markup.innerHTML = "<br>";
                                                        markup.innerText += html;
                                                    }
                                                    });
                                                    editor.content.innerHTML = '{!!$pagina->texto ?? ''!!}'
                                                </script>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">  
                                            @if(isset($libros))
                                            <!--Si hay capitulos a seleccionar -->
                                            {{--
                                            <div class="form-group">
                                               
                                                <img src="#" alt="Cubierta del libro" style="width: 190px; height: 300px;">
                                            
                                            </div>
                                            --}}
                                            <div class="form-group">
                                                <label>Capitulo</label>
                                                <select name="capitulo_id" class="form-control">
                                                @foreach($capitulos as $c)
                                                    @if(isset($capitulo) && ($c->id == $capitulo->id))
                                                    <option value="{{$c->id}}" selected>{{$c->titulo}}</option> 
                                                    @else
                                                    <option value="{{$c->id}}" >{{$c->titulo}}</option>
                                                    @endif
                                                @endforeach    
                                                </select>
                                            </div>
                                            @else
                                            <!--NO hay capitulos a seleccionar -->
                                            <div class="form-group">
                                            <h4>{{$libro->titulo}}</h4>
                                                <img src="{{URL::asset($libro->cubierta)}}" alt="Cubierta del libro" style="width: 190px; height: 300px;">   
                                            </div>
                                            <div class="form-group">
                                                <p>Capitulo: {{$capitulo->titulo}}</p>
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                    
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input id="numero_pagina" type="number" name="numero_pagina" placeholder="Número de página:" class="form-control text-center" value="{{$datos->numero_pagina ?? ''}}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <button type="submit" class="btn btn-default">Enviar</button>
                                            <button type="reset" class="btn btn-default" onclick="window.history.back()">Cancelar</button>
                                        </div>
                                    </div>
                                
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                @if(count($errors)>0)
                                                    @foreach($errors->all() as $error)
                                                        <div class="text-danger">{{$error}}</div>
                                                    @endforeach
                                                @endif 
                                            </div>
                                        </div>
                                    </div>
                                
                                </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
</div>	

@endsection