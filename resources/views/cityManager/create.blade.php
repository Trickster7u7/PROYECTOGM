@extends('layouts.user-layout')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper pb-4">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <!-- Errors Section -->
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
                        <h1>Agregar Manager</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item active">Nuevo Gerente de zona</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <form action="{{ route('cityManager.store') }}" method="post" enctype="multipart/form-data"
                class="w-75 m-auto">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Agregar</h3>
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
                                    <input type="text" id="name" required class="form-control" placeholder="Your Name"
                                        name="name">
                                </div>
                                <div class="form-group">
                                    <label for="pass">Contraseña</label>
                                    <input type="password" required id="pass" class="form-control"
                                        placeholder="Your password" name="password">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" required id="email" class="form-control" placeholder="your email"
                                        name="email">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="image">Agregar Imagen</label>
                                    <input type="file" class="form-control" id="image" name="profile_image">
                                </div>
                                <div class="  form-group">
                                    <label for="nationalID">CURP</label>
                                    <input type="text" required id="nationalID" class="form-control" name="national_id"
                                        placeholder="The national id must be between 10 and 17 digits.">
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
