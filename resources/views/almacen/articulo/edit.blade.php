@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Artículo: {{$articulo->nombre}}</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
    {!!Form::model($articulo,['method'=>'PATCH','route'=>['articulo.update',$articulo->idarticulo],'files'=>'true'])!!}
    {{Form::token()}}
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" required value="{{$articulo->nombre}}" class="form-control">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="">Categoría</label>
                <select name="idcategoria" class="form-control" id="">
                    @foreach($categorias as $cat)
                        @if($cat->idcategoria == $articulo->idcategoria)
                        <option value="{{$cat->idcategoria}}" selected>{{$cat->nombre}}</option>
                        @else
                        <option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
                        @endif
                    @endforeach                
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="codigo">Código</label>
                <input type="text" name="codigo" value="{{$articulo->codigo}}" class="form-control">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="text" name="stock" value="{{$articulo->stock}}" class="form-control">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="precio">Precio</label>
                <div class="row">
                    <div class="m-0 p-0 col-lg-1 col-sm-1 col-md-1 col-xs-1">
                        <p class="">$</p>
                    </div>
                    <div class="col-lg-11 col-sm-10 col-md-11 col-xs-11 p-0 m-0">
                        <input type="text" name="precio" required value="{{$articulo->precio}}" class="form-control" placeholder="Precio del articulo...">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <input type="text" name="descripcion" required value="{{$articulo->descripcion}}" class="form-control">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen"  class="form-control">
                @if(($articulo->imagen)!="")
                    <img src="{{asset('imagenes/articulos/'.$articulo->imagen)}}" alt="" height="300px" width="300px">
                @endif
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <a href="{{URL::action('ArticuloController@index')}}"><button class="btn btn-danger" type="button">Cancelar</button></a>
            </div>
        </div>
    </div>
    {!!Form::close()!!}
@endsection