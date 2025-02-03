@extends('layouts.app')

@section('content')
<br>
<br>
<br>
<br>

<!-- Start Complaint Submission Page -->
<section>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Laporan Pengaduan</h1>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="complaintTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="form-tab" data-toggle="tab" href="#form" role="tab" aria-controls="form" aria-selected="true">Formulir Pengaduan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="list-tab" data-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="false">Daftar Pengaduan</a>
            </li>
        </ul>

        <!-- Tab content -->
        <div class="tab-content" id="complaintTabsContent">
            <!-- Complaint Form Tab -->
            <div class="tab-pane fade show active" id="form" role="tabpanel" aria-labelledby="form-tab">
                <div class="complaint-form mt-3">
                    <form action="{{ route('pengaduan.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="complaintCategory">Kategori:</label>
                            <select class="form-control" id="complaintCategory" name="complaintCategory">
                                <option value="Penggunaan Air">Penggunaan Air</option>
                                <option value="Sistem Aplikasi PDAM">Permasalahan Sistem Aplikasi</option>
                                <option value="Layanan PDAM">Komplain Layanan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="complaintDetails">Uraian:</label>
                            <textarea class="form-control" id="complaintDetails" name="complaintDetails" rows="5" placeholder="Jelaskan Kronologis Aduan" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="complaintUrgency">Urgensi:</label>
                            <select class="form-control" id="complaintUrgency" name="complaintUrgency">
                                <option value="Rendah">Rendah</option>
                                <option value="Menengah">Menengah</option>
                                <option value="Penting">Tinggi</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-danger" style="margin-top: 40px;">Submit Pengaduan</button>
                    </form>
                    <br>
                    <br>
                </div>
            </div>

            <!-- Complaint List Tab -->
            <div class="tab-pane fade" id="list" role="tabpanel" aria-labelledby="list-tab">
                <div class="list-group mt-3">
                    @foreach ($complaints as $complaint)
                        <div class="list-group-item list-group-item-action">
                            <h5>{{ $complaint->kategori }} - {{ $complaint->urgensi }}</h5>
                            <p>{{ $complaint->isi_aduan }}</p>
                            <span class="badge badge-info">{{ $complaint->tindak_lanjut ? 'Ditindaklanjuti' : 'Belum ditindaklanjuti' }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Complaint Submission Page -->


    <style>
        .form-group {
            margin-bottom: 1rem;
        }

        .form-control {
            display: block;
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }

        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
        }

        .btn-danger {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }
    </style>

<br>
<br>
@endsection

