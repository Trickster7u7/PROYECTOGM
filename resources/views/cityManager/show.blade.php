@extends('layouts.user-layout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Mostrar número de administrador del gimnasio {{$singleUser->id}}</h4>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">

            <div class="card-body p-0">
                <table class="table table-striped projects">
                <thead>
                        <tr>
                            <th>ID</th>
                            <th>Gerente de zona</th>
                            <th>Email</th>
                            <th>Imagen de Perfil</th>
                            <th>CURP</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    
                        <tr>
                            <td>{{$singleUser->id}}</td>
                            <td>{{$singleUser->name}} </td>
                            <td>{{$singleUser->email}} </td>
                            <td><img alt="Avatar" class="table-avatar" src="{{$singleUser->profile_image}}"></td>
                            <td>{{ $singleUser->national_id }} </td>
                        </tr>
                    </tbody>
                    <tbody>

                       
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

