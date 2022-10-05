@extends('layouts.admin.body')
@section('content')
    @include('layouts.admin.sidebarGestionClub')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Form Club</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('Admin.index') }}">Admin</a></li>
                    <li class="breadcrumb-item">Forms</li>
                    <li class="breadcrumb-item"><a href="{{ route('Admin.departement.index') }}">Departement</a></li>
                    <li class="breadcrumb-item active">Club</li>
                </ol>
            </nav>
        </div>

        <div class="card">
            <div class="card-body">
                <h1 class="card-title text-center text-capitalize" style="font-size:30px">Enregistrement d'un Nouveau Club
                </h1>

                <!-- Horizontal Form -->
                <!-- End Horizontal Form -->

            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <br>

                <!-- Multi Columns Form -->
                <form class="row g-3" method="POST" action="{{ route('Admin.club.store') }}">
                    @csrf
                    <input type="hidden" name="departement_id" value="{{ $id }}">
                    <div class="col-md-6 text-capitalize">
                        <label for="inputName5" class="form-label">Code du club</label>
                        <input type="text" class="form-control @error('code') is-invalid  @enderror"
                            value="{{ old('code') }}" id="inputName5" autocomplete="code" required name="code"
                            autofocus placeholder="Entrez le code du club">
                        @error('code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="col-md-6 text-capitalize">
                        <label for="textereadescription" class="form-label">Intitule du Club</label>
                        <input type="text" name="intitule" id="intitule" value="{{ old('intitule') }}" required autofocus
                            class="form-control @error('intitule') is-invalid  @enderror"
                            placeholder="Entrez l'intituler du club">
                        @error('intitule')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Enregistre</button>
                        <button type="reset" class="btn btn-secondary">Effacer</button>
                    </div>
                </form><!-- End Multi Columns Form -->

            </div>
    </main>
@endsection
