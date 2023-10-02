@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Saldo Project</h4>
                        </div>
                        @if ($saldo->saldo_project == null)
                            <div class="card-body">
                                <h4>Rp. {{ number_format('0') }}</h4>
                            </div>
                        @else
                            <div class="card-body">
                                <h4>Rp. {{ number_format($saldo->saldo_project, 0, '.', '.') }}</h4>
                            </div>
                        @endif

                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Pengeluaran Pengusaha</h4>
                        </div>
                        @if ($saldo->piutang_pengusaha == null)
                            <div class="card-body">
                                <h4>Rp. {{ number_format(0) }}</h4>

                            </div>
                        @else
                            <div class="card-body">
                                <h4>Rp. {{ number_format($saldo->piutang_pengusaha, 0, '.', '.') }}</h4>

                            </div>
                        @endif

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Action Saldo</h4>
                        </div>
                        <div class="card-body">
                            <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal"
                                data-target="#addSaldoModal">
                                <i class="far fa-file"></i> Tambah Saldo
                            </a>

                            <a href="#" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i>
                                Lunasi Hutang</a>
                            <a href="#" class="btn btn-icon icon-left btn-primary"><i class="fas fa-dollar-sign"></i>
                                Histori Saldo</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-body">
        </div>
    </section>

    <div class="modal fade" id="addSaldoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Saldo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addSaldoForm" action="{{ route('saldo.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="saldo_type">Pilih Jenis Saldo</label>
                            <select class="form-control select2" name="saldo_type" id="saldo_type">
                                <option value="saldo_project">Saldo Project</option>
                                <option value="piutang_pengusaha">Piutang Pengusaha</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="amount">Jumlah Saldo</label>
                            <input type="number" class="form-control" name="amount" id="amount">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" rows="3"></textarea>
                        </div>
                        <input type="hidden" name="project_id" value="{{ $project->id }}" id="project_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('customScript')
    <script src="/assets/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#addSaldoForm').submit(function(e) {
                e.preventDefault();

                var saldo_type = $('#saldo_type').val();
                var amount = $('#amount').val();
                var keterangan = $('#keterangan').val();

                var isValid = true;

                if (saldo_type === '') {
                    $('#saldo_type').addClass('is-invalid');
                    isValid = false;
                } else {
                    $('#saldo_type').removeClass('is-invalid');
                }

                if (amount === '') {
                    $('#amount').addClass('is-invalid');
                    isValid = false;
                } else {
                    $('#amount').removeClass('is-invalid');
                }

                if (isValid) {
                    console.log('masuk');
                    this.submit();
                }
            });
        });
    </script>
@endpush

@push('customStyle')
    <link rel="stylesheet" href="/assets/css/select2.min.css">
@endpush