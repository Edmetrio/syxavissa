@extends('templates.template')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Formulário de Categoria</h4>
                <p class="sub-header">
                    Formulário de Cadastro de Categoria: é especialmente utilizado para o registo de todas categorias
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

                @if(isset($categoria))
                <form method="POST" enctype="multipart/form-data" action="{{url("categoria/$categoria->id")}}">
                    @method('PUT')
                @else
                <form action="{{url('categoria')}}" method="POST" enctype="multipart/form-data">
                @endif
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity" class="col-form-label">Nome da Categoria</label>
                            <input type="text" class="form-control" placeholder="Televisão" name="nome" value="{{$categoria->nome ?? ''}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputCity" class="col-form-label">Icon</label>
                            <input type="file" class="form-control" name="icon">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">@if(isset($categoria)) Alterar @else Adicionar @endif</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection