@extends('layouts.dashboard-layout')
@section('title', 'Daftar Kompetisi')
@section('content')
    <div class="main-content">
        <div class="top-container">
            <div class="top-card all-card">
                <div class="card-icon">
                    <i class="bx bxs-grid-alt"></i>
                </div>
                <div class="card-content">
                    <h1>{{ $acaras->kompetisi->nama }} - {{ $acaras->nama }}</h1>
                </div>
            </div>
        </div>
        <div class="bottom-container">
            <section class="all-container all-card w100">
                <header class="divider flex">
                    <h1>Daftar Atlet</h1>
                </header>
                <div class="table-container">
                    <label for="entries">Tampilkan
                        <select id="entries" name="entries">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select> 
                        entri
                    </label>
                    <input type="text" id="search" placeholder="Cari...">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Umur</th>
                                <th>Jenis Kelamin</th>
                                <th>Club</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($atlets as $key => $peserta) 
                            @foreach ( $peserta->acara as $acara)
                            @if ($acara->id == $acara_id)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $peserta->name }}</td>
                                <td>{{ now()->diffInYears(\Carbon\Carbon::parse($peserta->umur)) }}</td>
                                <td>{{ $peserta->jenis_kelamin }}</td>
                                <td>{{ $acara->pivot->status_pembayaran }}</td>
                            </tr>
                            @endif   
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination">
                        <button class="prev" disabled>Sebelumnya</button>
                        <div class="page-numbers"></div>
                        <button class="next" disabled>Selanjutnya</button>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection