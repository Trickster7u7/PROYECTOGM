@extends('layouts.user-layout')
@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper pb-4">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-sm-6">
                        <h1>Nuevo Gimnacio</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item active">Crear nuevo gimnacio</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">

            <form action="{{ route('gym.store') }}" method="post" enctype="multipart/form-data" class="w-75 m-auto">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        @if (session('status'))
                            <h6 class="alart-success ">{{ session('status') }}</h6>
                        @endif
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Crear</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" id="name" class="form-control" required placeholder="Gym Name" name="name">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Administrador del Gym</label>
                                    <select class="form-control" name="user_id">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="city">Ciudad</label>
                                    <select required class=" form-control" name="city_id" id="city">
                                        <optgroup label="Available City">
                                            @foreach ($cities as $city)
                                                <option value={{ $city->id }}>{{ $city->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label class="form-label" for="image">Imagen</label>
                                    <input type="file" class="form-control" id="image" name="cover_image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="#" class="btn btn-secondary">Cancelar</a>
                        <input type="submit" value="Save Changes" class="btn btn-success float-right">
                    </div>
                </div>
            </form>

        </section>
    </div>

@endsection
