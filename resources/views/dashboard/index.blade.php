@extends('dashboard.admin')
@section('title', 'Akun')

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
    <h1>Selamat datang di halaman beranda</h1>
    <p>Ini adalah konten halaman beranda.</p>
@endsection
