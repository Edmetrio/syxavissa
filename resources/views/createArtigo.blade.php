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
                    <form method="POST" enctype="multipart/form-data" action="{{url("artigo/$artigo->id")}}">
                        @method('PUT')
                    @else
                    <form action="{{url('artigo')}}" method="POST" enctype="multipart/form-data">
                    @endif
                        @csrf
                        <div class="form-row">
                        <div class="form-group col-md-6">
                                <label for="inputCity" class="col-form-label">Código de Barra</label>
                                <input type="text" class="form-control" placeholder="121212" name="codigobarra" value="{{$artigo->codigobarra ?? ''}}"  required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity" class="col-form-label">Nome do Artigo</label>
                                <input type="text" class="form-control" placeholder="Televisão" name="nome" value="{{$artigo->nome ?? ''}}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState" class="col-form-label">Categoria</label>
                                <select name="categoria_id" class="form-control">
                                    <option value="{{$artigo->categorias->id ?? 'Seleccione a Categoria'}}">{{$artigo->categorias->nome ?? 'Seleccione a Categoria'}}</option>
                                    @foreach($categoria as $c)
                                    <option value="{{$c->id}}">{{$c->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState" class="col-form-label">Subcategoria</label>
                                <select name="subcategoria_id" class="form-control">
                                    <option value="{{$artigo->subcategorias->id ?? ''}}">{{$artigo->subcategorias->nome ?? 'Seleccione a Subcategoria'}}</option>
                                    @foreach($subcategoria as $s)
                                    <option value="{{$s->id}}">{{$s->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState" class="col-form-label">Tipo</label>
                                <select name="tipo_id" class="form-control">
                                    <option value="{{$artigo->tipos->id ?? ''}}">{{$artigo->tipos->nome ?? 'Seleccione o Tipo'}}</option>
                                    @foreach($tipo as $t)
                                    <option value="{{$t->id}}">{{$t->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState" class="col-form-label">Unidade</label>
                                <select name="unidade_id" class="form-control">
                                    @if(isset($artigo))
                                    @foreach($artigo->stocks as $s)
                                    <option value="{{$s->unidades->id}}">{{$s->unidades->nome}}</option>
                                    @endforeach
                                    @else
                                    <option value="">Seleccione a Unidade </option>
                                    @endif
                                    @foreach($unidade as $u)
                                    <option value="{{$u->id}}">{{$u->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity" class="col-form-label">Icon</label>
                                <input type="file" class="form-control" name="icon" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity" class="col-form-label">Preço</label>
                                <input type="number" class="form-control" placeholder="20" name="preco" value="{{$artigo->preco ?? ''}}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity" class="col-form-label">Iva</label>
                                <input type="text" class="form-control" name="iva" value="17" required value="{{$artigo->iva ?? ''}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity" class="col-form-label">Desconto</label>
                                <input type="number" class="form-control" placeholder="20" name="desconto" value="2" required value="{{$artigo->desconto ?? ''}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity" class="col-form-label">Garantia</label>
                                <input type="number" class="form-control" placeholder="20" name="garantia" value="2" required value="{{$artigo->garantia ?? ''}}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputState" class="col-form-label">Armazém</label>
                                <select name="armazem_id" class="form-control">
                                    @if(isset($artigo))
                                    @foreach($artigo->stocks as $a)
                                    <option value="{{$a->armazens->id}}">{{$a->armazens->nome}}</option>
                                    @endforeach
                                    @else 
                                    <option value="{{$a->armazens->id ?? ''}}">{{$a->armazens->nome ?? 'Seleccione o Armazém'}}</option>
                                    @endif
                                    @foreach($armazem as $a)
                                    <option value="{{$a->id}}">{{$a->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity" class="col-form-label">Quantidade</label>
                                <input type="number" class="form-control" placeholder="2" name="quantidade" value="200" required value="{{$artigo->quantidade ?? ''}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity" class="col-form-label">Quantidade Alternativa</label>
                                <input type="number" class="form-control" placeholder="4" name="quantidade_alt" value="" value="2" required value="{{$artigo->quantidade ?? ''}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity" class="col-form-label">Estoque mínimo</label>
                                <input type="number" class="form-control" placeholder="2" name="stockminimo" value="2" required value="{{$artigo->stockminimo ?? ''}}">
                            </div>
                            <input type="text" class="form-control" name="users_id" value="e2dcebd3-75f9-46df-bded-144d2831e324" hidden>
                            <input type="text" class="form-control" name="estado" value="on" hidden>
                        </div>
                        <button type="submit" class="btn btn-primary">@if(isset($artigo)) Alterar @else Adicionar @endif</button>
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection