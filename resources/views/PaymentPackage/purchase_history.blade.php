@extends('layouts.user-layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Compras</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            {{-- <li class="breadcrumb-item active">Proyectos</li> --}}
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">


            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Compras</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects" id="proj">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Nombre</th>
                                <th>Nombre</th>
                                <th>Monto</th>
                                @role('admin')
                                    <th>Nombre del Gimnacio</th>
                                    <th>Ciudad</th>
                                @endrole
                                @role('cityManager')
                                    <th>Nombre del Gimnacio</th>
                                @endrole

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($revenues as $revenue)
                                <tr>
                                    <td>{{ $revenue->user->id }}</td>
                                    <td>{{ $revenue->user->email }}</td>
                                    <td> {{ $revenue->user->name }}</td>
                                    @if ($revenue->trainingPackage->name == null)
                                        <td>there is no training Package name </td>
                                    @else
                                        <td> {{ $revenue->trainingPackage->name }}</td>
                                    @endif
                                    <td> {{ $revenue->price / 100 }} $</td>
                                    @role('admin')
                                        <td>{{ $revenue->user->gym->name }}</td>
                                        <td>{{ $revenue->user->city->name }}</td>
                                    @endrole
                                    @role('cityManager')
                                        <td>{{ $revenue->user->gym->name }}</td>
                                    @endrole
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
    </div>
    <!-- /.content-wrapper -->
@endsection
