@extends('templates.template')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Formulário de Subcategoria</h4>
                <p class="sub-header">
                    Formulário de Cadastro de Subcategoria: é especialmente utilizado para o registo de todas subcategorias
                </p>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Opss!</strong> Algum problema com seu formulário<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if(isset($subcategoria))
                <form method="POST" enctype="multipart/form-data" action="{{url("subcategoria/$subcategoria->id")}}">
                    @method('PUT')
                    @else
                    <form action="{{url('subcategoria')}}" method="POST" enctype="multipart/form-data">
                        @endif
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity" class="col-form-label">Nome da Categoria</label>
                                <input type="text" class="form-control" placeholder="Televisão" name="nome" value="{{$subcategoria->nome ?? ''}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState" class="col-form-label">Categoria</label>
                                <select name="categoria_id" class="form-control">
                                    <option value="{{$subcategoria->categorias->id ?? ''}}">{{$subcategoria->categorias->nome ?? 'Seleccione a Categoria'}}</option>
                                    @foreach($categoria as $c)
                                    <option value="{{$c->id}}">{{$c->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity" class="col-form-label">Icon</label>
                                <input type="file" class="form-control" name="icon">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">@if(isset($subcategoria))Alterar @else Adicionar @endif</button>
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection