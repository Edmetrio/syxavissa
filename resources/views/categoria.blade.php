@extends('templates.template')

@section('content')


<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Lista das Subcategorias</h4>
                        <div class="input-group-append" style="float: right;">
                            <a href="{{url('categoria/create')}}" class="btn btn-primary"> Adicionar</a>
                        </div>
                        <p class="text-muted font-13 mb-4">
                            Subcategorias: são subfases de uma categoria
                        </p>
                        @if(session('status'))
                        <div class="alert alert-success" role="alert" style="text-align: center; font-weight: bold;">
                            <p class="status">{{session('status')}}</p>
                        </div>
                        @endif
                        <table id="basic-datatable" class="table table-bordered dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Ícon</th>
                                    <th>Acções</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($categoria as $c)
                                <tr>
                                    <td>{{$c->nome}}</td>
                                    <td><img class="img-fluid" src="assets/images/categoria/{{$c->icon}}" style="width: 30px; text-align: center;" /></td>
                                    <td><a href="{{url("categoria/$c->id/edit")}}">Alterar</a></td>
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