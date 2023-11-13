@extends('layouts.user-layout')
@section('content')
    <div class="content-wrapper pb-4">
        <div class="container-fluid pt-5">
            <div class="row">
                {{-- # ======================================= # Total Revenue # ======================================= # --}}
                @role('admin|cityManager|gymManager')
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $revenueInDollars }}</h3>
                                <p>Ingresos Totales</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-dollar-sign text-white" style="font-size: 50px !important"></i>
                            </div>
                        </div>
                    </div>
                @endrole
                {{-- # ======================================= # Cities # ======================================= # --}}
                @role('admin')
                    <div class="col-lg-3 col-6">
                        <a href="{{ route('city.list') }}">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $cities }}</h3>
                                    <p>Ciudades</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-city text-white" style="font-size: 50px !important"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- # ======================================= # Cities Managers # ======================================= # --}}
                    <div class="col-lg-3 col-6">
                        <a href="{{ route('cityManager.list') }}">
                            <div class="small-box bg-secondary">
                                <div class="inner">
                                    <h3>{{ $citiesManagers }}<sup style="font-size: 20px"></sup></h3>
                                    <p>Gerente de ciudad</p>
                                </div>
                                <div class="icon">
                                    {{-- <i class="fas fa-user-tie"></i> --}}
                                    <i class="fas fa-user-tie text-white" style="font-size: 50px !important"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                @endrole
                {{-- # ======================================= # Gyms # ======================================= # --}}
                @role('admin|cityManager')
                    <div class="col-lg-3 col-6">
                        <a href="{{ route('gym.list') }}">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $gyms }}</h3>
                                    <p>Gimnacios</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-dumbbell text-white" style="font-size: 50px !important"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- # ======================================= # Gyms Managers # ======================================= # --}}
                    <div class="col-lg-3 col-6">

                        <a href="{{ route('gymManager.list') }}">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ $gymsManagers }}<sup style="font-size: 20px"></sup></h3>
                                    <p>Administrador del gimnacio</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user text-dark" style="font-size: 50px !important"></i>


                                </div>
                            </div>
                        </a>
                    </div>
                @endrole
                {{-- # ======================================= # Coaches # ======================================= # --}}
                @role('admin|cityManager|gymManager')
                    <div class="col-lg-3 col-6">
                        <a href="{{ route('coach.list') }}">
                            <div class="small-box bg-light">
                                <div class="inner">
                                    <h3>{{ $coaches }}<sup style="font-size: 20px"></sup></h3>
                                    <p>Entrenadores</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-ninja text-dark" style="font-size: 50px !important"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- # ======================================= # Users # ======================================= # --}}
                    <div class="col-lg-3 col-6">
                        <a href="{{ route('allUsers.list') }}">
                            <div class="small-box bg-dark">
                                <div class="inner">
                                    <h3>{{ $users }}</h3>
                                    <p>Usuarios</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users text-white" style="font-size: 50px !important"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                @endrole
                {{-- # ======================================= # if login Coaches  # ======================================= # --}}
                <div class="row justify-content-center">
                    @role('coach')
                        @foreach ($trainingSessions as $session)
                            <div class="col-lg-3 col-6 card mx-2">
                                <div class="card-header border-0 text-center font-weight-bold">{{ $session->name }}</div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                        <p class="d-flex flex-column text-center font-weight-bold">
                                            Inicio en
                                            <span class="text-muted">{{ $session->starts_at }}</span>
                                        </p>
                                        <p class="d-flex flex-column text-center font-weight-bold">
                                            Termino en
                                            <span class="text-muted">{{ $session->finishes_at }}</span>
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center mb-0">
                                        {{ $session->day }}</div>
                                </div>
                            </div>
                        @endforeach
                    @endrole
                </div>
            </div>
        </div>
    </div>
@endsection
