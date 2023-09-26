@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Table</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Tambah User</h2>

            <div class="card">
                <div class="card-header">
                    <h4>Validasi Tambah Data</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Project</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" placeholder="Masukkan Nama Project">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi"
                                name="lokasi" placeholder="Masukkan Lokasi" value="{{ old('lokasi') }}">
                            @error('lokasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Total Pekerja">Total Pekerja</label>
                            <div class="input-group">
                                <input type="number" class="form-control  @error('total_pekerja') is-invalid @enderror"
                                    id="total_pekerja" name="total_pekerja" placeholder="Masukkan Total Pekerja">
                                @error('total_pekerja')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group" style="display: none">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Masukkan Nama">
                        </div>
                        <div class="form-group">
                            <label for="nama_mandor">Nama Mandor</label>
                            <select id="nama_mandor" name="nama_mandor"
                                class="form-control select2 @error('nama_mandor') is-invalid @enderror">
                                <option value="">Pilih Nama Mandor</option>
                                @foreach ($listPekerja as $listPekerjaSemua)
                                    <option value="{{ $listPekerjaSemua->id }}">{{ $listPekerjaSemua->name }}</option>
                                @endforeach
                                <option value="0">Tambahkan Pengguna Baru</option>
                            </select>
                            @error('nama_mandor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nilai_project">Nilai Project</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="number" class="form-control  @error('nilai_project') is-invalid @enderror"
                                    id="nilai_project" name="nilai_project" placeholder="Masukkan Nilai Project">
                                @error('nilai_project')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control select2 @error('status') is-invalid @enderror" id="status"
                                name="status">
                                <option value="">Pilih Status</option>
                                <option value="Belum Selesai">Belum Selesai</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="waktu_mulai">Waktu Mulai</label>
                            <input type="date" class="form-control @error('waktu_mulai') is-invalid @enderror"
                                id="waktu_mulai" name="waktu_mulai">
                            @error('waktu_mulai')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="waktu_selesai">Waktu Selesai</label>
                            <input type="date" class="form-control @error('waktu_selesai') is-invalid @enderror"
                                id="waktu_selesai" name="waktu_selesai">
                            @error('waktu_selesai')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group gambar-form-group">
                            <label>Foto</label>
                            <input type="file" class="form-control file @error('foto') is-invalid @enderror"
                                id="foto" name="foto" data-id="foto">
                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                    <a class="btn btn-secondary" href="{{ route('dashboard.index') }}">Cancel</a>
                </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('customScript')
    <script src="/assets/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Inisialisasi elemen select2
            $('#nama_mandor').select2({
                placeholder: 'Pilih Nama Mandor',
                allowClear: true
            });

            // Event handler untuk opsi "Tambahkan Pengguna Baru"
            $('#nama_mandor').on('select2:select', function(e) {
                if (e.params.data.id === '0') {
                    // Tampilkan formulir "Nama" jika opsi "Tambahkan Pengguna Baru" dipilih
                    $('#nama').parent().show(); // Menampilkan parent div
                } else {
                    // Sembunyikan formulir "Nama" jika pengguna memilih pengguna yang ada
                    $('#nama').parent().hide(); // Menyembunyikan parent div
                }
            });

            // Inisialisasi tampilan awal berdasarkan opsi yang dipilih saat halaman dimuat
            if ($('#nama_mandor').val() === '0') {
                $('#nama').parent().show();
            } else {
                $('#nama').parent().hide();
            }
        });
    </script>
@endpush

@push('customStyle')
    <link rel="stylesheet" href="/assets/css/select2.min.css">
@endpush
