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
                            <a href="{{url('artigo/create')}}"> Adicionar</a>
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
                                <th>Código de Barras</th>
                                <th>Nome</th>
                                <th>Categoria</th>
                                <th>Tipo</th>
                                <th>Ícone</th>
                                <th>Preço</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($artigo as $a)
                            <tr>
                                <td>{{$a->codigobarra}}</td>
                                <td>{{$a->nome}}</td>
                                <td>{{$a->categorias->nome}}</td>
                                <td>{{$a->tipos->nome}}</td>
                                <td><img class="img-fluid" src="assets/images/artigo/{{$a->icon}}" alt="Artigo" style="width: 30px"/></td>
                                <td>{{$a->preco}}</td>
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