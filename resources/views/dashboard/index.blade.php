@extends('dashboard.admin')
@section('title', 'Akun')

@section('user')
    <div class="flex-grow-1">
        <h6 class="mb-0">John Doe</h6>
        <small class="text-muted">Admin</small>
    </div>
@endsection

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
            <li class="menu-item active">
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
            <li class="menu-item ">
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
                    <li class="menu-item">
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
    </aside>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">Laporan</h5>
            </div>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-3 col-6">
                    <div class="d-flex align-items-center">
                        <div class="avatar">
                            <div class="avatar-initial bg-primary rounded shadow">
                                <i class="mdi mdi-trending-up mdi-24px"></i>
                            </div>
                        </div>
                        <div class="ms-3">
                            <div class="small mb-1">Peminjaman Diproses</div>
                            <h5 class="mb-0">{{ $laporan['jumlah_peminjaman'] }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="d-flex align-items-center">
                        <div class="avatar">
                            <div class="avatar-initial bg-success rounded shadow">
                                <i class="mdi mdi-account-outline mdi-24px"></i>
                            </div>
                        </div>
                        <div class="ms-3">
                            <div class="small mb-1">Pengguna</div>
                            <h5 class="mb-0">{{ $laporan['jumlah_pengguna'] }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="d-flex align-items-center">
                        <div class="avatar">
                            <div class="avatar-initial bg-success rounded shadow">
                                <i class="mdi mdi-car-back mdi-24px"></i>
                            </div>
                        </div>
                        <div class="ms-3">
                            <div class="small mb-1">Mobil Tersedia</div>
                            <h5 class="mb-0">{{ $laporan['jumlah_mobil_tersedia'] }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="d-flex align-items-center">
                        <div class="avatar">
                            <div class="avatar-initial bg-danger rounded shadow">
                                <i class="mdi mdi-car-back mdi-24px"></i>
                            </div>
                        </div>
                        <div class="ms-3">
                            <div class="small mb-1">Mobil Tidak Tersedia</div>
                            <h5 class="mb-0">{{ $laporan['jumlah_mobil_tidak_tersedia'] }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
