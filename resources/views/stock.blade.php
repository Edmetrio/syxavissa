@extends('templates.template')

@section('content')

    
<div class="content">

<!-- Start Content-->
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Lista dos Artigos</h4>
                    <!-- <div class="input-group-append" style="float: right;">
                            <a href="{{url('stock/create')}}"> Adicionar</a>
                        </div> -->
                    <p class="text-muted font-13 mb-4">
                        Artigos: são produtos finais por se vender
                    </p>
                    @if(session('status'))
                        <div class="alert alert-success" role="alert" style="text-align: center; font-weight: bold;">
                            <p class="status">{{session('status')}}</p>
                        </div>
                        @endif
                    <table id="basic-datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Nome do Artigo</th>
                                <th>Categoria</th>
                                <th>Quantidade</th>
                                <th>Preço</th>
                                <th>Armazém</th>
                                <th>Utilizador</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($stock as $s)
                            <tr>
                                <td>{{$s->artigos->nome}}</td>
                                <td>{{$s->artigos->categorias->nome}}</td>
                                <td>{{$s->quantidade}}</td>
                                <td>{{$s->artigos->preco}}</td>
                                <td>{{$s->armazens->nome}}</td>
                                <td>{{$s->users->name}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 

</div>

</div>


@endsection