@extends('dashboard.admin')
@section('title', 'Mobil')

@section('aside')
    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
            <a href="" class="app-brand-link">
                <span class="app-brand-text demo menu-text fw-semibold ">Peminjaman Mobil</span>
            </a>

            <a href="{{ route('dashboard') }}" class="layout-menu-toggle menu-link text-large ms-auto">
                <i class="mdi menu-toggle-icon d-xl-block align-middle mdi-20px"></i>
            </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
            <!-- Dashboards -->
            <li class="menu-item">
                <a href="{{ route('dashboard') }}" class="menu-link">
                    <i class="menu-icon tf-icons mdi mdi-home-outline"></i>
                    <div data-i18n="Dashboards">Dashboard</div>
                    <div class="badge bg-danger rounded-pill ms-auto">5</div>
                </a>

            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Settings</span>
            </li>
            <!-- Apps -->
            <!-- Pages -->
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons mdi mdi-account-outline"></i>
                    <div data-i18n="Account Settings">Pengaturan Akun</div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('akun.index') }}" class="menu-link">
                            <div data-i18n="Account">Pengguna</div>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="menu-item open">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons mdi mdi-car"></i>
                    <div data-i18n="Authentications">Pengaturan Mobil</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('mobil.index') }}" class="menu-link">
                            <div data-i18n="Account">Mobil</div>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="{{ route('peminjaman.index') }}" class="menu-link">
                            <div data-i18n="Basic">Peminjaman Mobil</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('peminjaman.riwayat') }}" class="menu-link">
                            <div data-i18n="Basic">Riwayat Peminjaman</div>
                        </a>
                    </li>
                </ul>
            </li>
    </aside>
@endsection

@section('content')
    <div class="table-responsive text-nowrap">
        <div class="card">
            <h5 class="card-header">Riwayat Peminjaman</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Nama Peminjam</th>
                            <th>Plat Nomor</th>
                            <th>Awal Peminjaman</th>
                            <th>Akhir Peminjaman</th>
                            <th>Status</th>
                            <th>Aksi</th>
                            <th>Lainnya</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($riwayat as $history)
                            <tr
                                class="{{ $history->status === 'diproses' ? 'table-secondary' : ($history->status === 'diterima' ? 'table-success' : 'table-danger') }}">
                                <td>
                                    {{ $i }}
                                </td>
                                <td>{{ App\Models\User::find($history->user_id)->name }}</td>
                                <td>
                                <td>{{ App\Models\Mobil::find($history->mobil_id)->plat_nomor }}</td>
                                <td>
                                    {{ $history->awal_peminjaman }}
                                </td>
                                <td>{{ $history->akhir_peminjaman }}</td>
                                <td><span
                                        class="badge rounded-pill bg-label-{{ $history->status === 'diproses' ? 'secondary' : ($history->status === 'diterima' ? 'success' : 'danger') }} me-1">{{ $history->status }}</span>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('peminjaman.diterima', ['id' => $history->id, 'action' => 'diterima']) }}">
                                        @method('PUT')
                                        @csrf
                                        <button type="submit" class="btn rounded-pill btn-success">Terima</button>
                                    </form>
                                
                                    <form method="POST" action="{{ route('peminjaman.ditolak', ['id' => $history->id, 'action' => 'ditolak']) }}">
                                        @method('PUT')
                                        @csrf
                                        <button type="submit" class="btn rounded-pill btn-danger">Tolak</button>
                                    </form>
                                </td>
                                


                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a type="button" class="dropdown-item" href="javascript:void(0);"
                                                data-bs-toggle="modal" data-bs-target="#modalDetail{{ $history->id }}">
                                                <i class="mdi mdi-alert-circle-outline me-2"></i> Detail
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-4 mb-3">
                                        <div class="mt-3">
                                            <div class="modal fade" id="modalDetail{{ $history->id }}" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="card h-100">
                                                            <div class="card-body">
                                                                <img class="img-fluid d-flex mx-auto my-4 rounded"
                                                                    src="{{ asset('surat_ldp/' . $history->surat_LDP) }}"
                                                                    alt="Card image cap" />       
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
