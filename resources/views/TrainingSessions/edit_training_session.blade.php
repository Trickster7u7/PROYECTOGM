@extends('layouts.user-layout')
@section('content')



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper pb-4">
    @if ($errors->any())
    <div class="alert bg-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar sesiones</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Editar sesiones</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">

        <form action="{{route('TrainingSessions.update_session',[$trainingSession['id']])}}" method="post" enctype="multipart/form-data" class="w-75 m-auto">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Editar</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" id="name" class="form-control" value="{{$trainingSession->name}}" name="name">
                                <label for="day">Dia</label>
                                <input type="date" id="day" class="form-control" value="{{$trainingSession->day}}" name="day">
                                <label for="starts_at">Empieza en</label>
                                <input type="time" id="starts_at" class="form-control" value="{{$trainingSession->starts_at}}" name="starts_at">

                                <label for="finishes_at">Termina en</label>
                                <input type="time" id="finishes_at" class="form-control" value="{{$trainingSession->finishes_at}}" name="finishes_at">
                           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('TrainingSessions.listSessions')}}" class="btn btn-secondary">Cancelar</a>
                    <input type="submit" value="Update" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
</div>
@endsection
