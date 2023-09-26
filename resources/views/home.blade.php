@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>List Project</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('dashboard.create') }}" class="btn btn-primary">Tambah</a>

            </div>
        </div>
        <div class="section-body">
            <div class="row">
                @foreach ($project as $listProject)
                    <div class="col-12 col-md-4 col-lg-4">
                        <article class="article article-style-c">
                            <div class="article-header">
                                <div class="article-image"
                                    style="background-image: url('{{ Storage::url($listProject->foto) }}')">
                                </div>


                            </div>
                            <div class="article-details">
                                @if ($listProject->status == 'Selesai')
                                    <span class="badge badge-success">Selesai</span>
                                @else
                                    <span class="badge badge-warning">Belum Selesai</span>
                                @endif
                                <div class="article-title">
                                    <h2><a href="#">{{ $listProject->name }}</a></h2>
                                </div>
                                <p>Lokasi : {{ $listProject->lokasi }}</p>
                                <div class="flex">
                                    <div class="article-user d-flex justify-content-between align-items-center">
                                        <div class="container">
                                            <div class="row">
                                                <img alt="image" src="../assets/img/avatar/avatar-1.png">
                                                <div class="article-user-details">
                                                    <div class="user-detail-name">
                                                        <a href="#">{{ $listProject->pekerja_name }}</a>
                                                    </div>
                                                    <div class="text-job">{{ $listProject->role_pekerja_name }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" class="btn btn-primary">Cek</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>


        </div>
    </section>
@endsection
