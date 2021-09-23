@extends('templates.template')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Formulário de Artigo</h4>
                <p class="sub-header">
                    Formulário de Cadastro de Artigo: é especialmente utilizado para o registo de todos artigos
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

                @if(isset($artigo))
                <form method="POST" enctype="multipart/form-data" action="{{url("")}}">
                    @method('PUT')
                    @else
                    <form action="{{url('artigo')}}" method="POST" enctype="multipart/form-data">
                        @endif
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity" class="col-form-label">Nome da Categoria</label>
                                <input type="text" class="form-control" placeholder="Televisão" name="nome" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState" class="col-form-label">Categoria</label>
                                <select name="categoria_id" class="form-control">
                                    <option value=""></option>
                                    @foreach($categoria as $c)
                                    <option value="{{$c->id}}">{{$c->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState" class="col-form-label">Subcategoria</label>
                                <select name="subcategoria_id" class="form-control">
                                    <option value=""></option>
                                    @foreach($subcategoria as $s)
                                    <option value="{{$s->id}}">{{$s->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState" class="col-form-label">Tipo</label>
                                <select name="tipo_id" class="form-control">
                                    <option value=""></option>
                                    @foreach($tipo as $t)
                                    <option value="{{$t->id}}">{{$t->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity" class="col-form-label">Icon</label>
                                <input type="file" class="form-control" name="icon">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity" class="col-form-label">Preço</label>
                                <input type="number" class="form-control" placeholder="20" name="preco" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity" class="col-form-label">Iva</label>
                                <input type="text" class="form-control" name="iva">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity" class="col-form-label">Desconto</label>
                                <input type="number" class="form-control" placeholder="20" name="desconto" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity" class="col-form-label">Garantia</label>
                                <input type="number" class="form-control" placeholder="20" name="desconto" value="">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">@if(isset($artigo))Alterar @else Adicionar @endif</button>
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection