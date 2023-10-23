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
                    <li class="menu-item active">
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
@endsection

@section('content')
    <div style="margin-top: 4%" class="card">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h5 class="card-header">List Mobil</h5>
        <button style="margin-left: 1%;" type="button" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#modalCenter">+ Tambah Mobil</button>

        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Plat Mobil</th>
                        <th>Jenis Mobil</th>
                        <th>Warna Mobil</th>
                        <th>Status Mobil</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($mobils as $user)
                        <tr>
                            <td>{{ $loop->iteration }}.</td>
                            <td>{{ $user->plat_nomor }}</td>
                            <td>{{ $user->jenis_mobil }}</td>
                            <td>{{ $user->warna_mobil }}</td>
                            <td>
                                <span
                                    class="{{ $user->status_mobil == 1 ? 'badge rounded-pill bg-label-danger me-1' : 'badge rounded-pill bg-label-success me-1' }}">{{ $user->status_mobil == 1 ? 'Tidak Tersedia' : 'Tersedia' }}</span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a type="button" class="dropdown-item" href="javascript:void(0);"
                                            data-bs-toggle="modal" data-bs-target="#modalEdit{{ $user->id }}">
                                            <i class="mdi mdi-pencil-outline me-2"></i> Edit
                                        </a>
                                        <a type="button" class="dropdown-item" href="javascript:void(0);"
                                            data-bs-toggle="modal" data-bs-target="#modalDelete{{ $user->id }}">
                                            <i class="mdi mdi-trash-can-outline me-2"></i> Delete
                                        </a>
                                        <a type="button" class="dropdown-item" href="javascript:void(0);"
                                            data-bs-toggle="modal" data-bs-target="#modalDetail{{ $user->id }}">
                                            <i class="mdi mdi-alert-circle-outline me-2"></i> Detail
                                        </a>

                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="mt-3">
                                        <div class="modal fade" id="modalDelete{{ $user->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="modalCenterTitle">Hapus Mobil</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-xl">
                                                                <div class="card-body">
                                                                    <form
                                                                        action="{{ route('mobil.delete', ['id' => $user->id]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-outline-secondary"
                                                                                data-bs-dismiss="modal">
                                                                                Tutup
                                                                            </button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Hapus</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-4 mb-3">
                                    <div class="mt-3">
                                        <div class="modal fade" id="modalDetail{{ $user->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="card h-100">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Jenis Mobil : {{ $user->jenis_mobil }}
                                                            </h5>
                                                            <h6 class="card-subtitle text-muted">Plat Nomor :
                                                                {{ $user->plat_nomor }}
                                                            </h6>
                                                            <img class="img-fluid d-flex mx-auto my-4 rounded"
                                                                src="{{ asset('gambar_mobil/' . $user->gambar_mobil) }}"
                                                                alt="Card image cap" />
                                                            <h6 class="card-subtitle text-muted">Warna :
                                                                {{ $user->warna_mobil }}
                                                            </h6>
                                                            <span
                                                                class="{{ $user->status_mobil == 1 ? 'badge rounded-pill bg-label-danger me-2' : 'badge rounded-pill bg-label-success me-2' }}">{{ $user->status_mobil == 1 ? 'Tidak Tersedia' : 'Tersedia' }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-lg-4 col-md-6">
                                    <div class="mt-3">
                                        <div class="modal fade" id="modalEdit{{ $user->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="modalCenterTitle">Pengguna</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-xl">
                                                                <div class="card-body">
                                                                    <form
                                                                        action="{{ route('mobil.update', ['id' => $user->id]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div
                                                                            class="form-floating form-floating-outline mb-4">
                                                                            <input type="text" class="form-control"
                                                                                id="basic-default-fullname"
                                                                                name="plat_mobil" placeholder="#M111"
                                                                                value={{ $user->plat_nomor }} />
                                                                            <label for="basic-default-fullname">Plat
                                                                                Mobil</label>
                                                                        </div>
                                                                        <div
                                                                            class="form-floating form-floating-outline mb-4">
                                                                            <input type="text" class="form-control"
                                                                                id="basic-default-company"
                                                                                name="jenis_mobil" placeholder="Sedan"
                                                                                value={{ $user->jenis_mobil }} />
                                                                            <label for="basic-default-company">Jenis
                                                                                Mobil</label>
                                                                        </div>
                                                                        <div
                                                                            class="form-floating form-floating-outline mb-4">
                                                                            <input type="text"
                                                                                id="basic-default-username"
                                                                                class="form-control" name="warna_mobil"
                                                                                placeholder="kuning"
                                                                                value={{ $user->warna_mobil }} />
                                                                            <label for="basic-default-username">Warna
                                                                                Mobil</label>
                                                                        </div>
                                                                        <div class="form-text">Status Mobil</div>
                                                                        <div
                                                                            class="form-floating form-floating-outline mb-4">
                                                                            <select id="basic-default-role"
                                                                                class="form-select" name="status_mobil">
                                                                                <option value="0"
                                                                                    {{ $user->status_mobil == '0' ? 'selected' : '' }}>
                                                                                    Tersedia</option>
                                                                                <option value="1"
                                                                                    {{ $user->status_mobil == '1' ? 'selected' : '' }}>
                                                                                    Tidak Tersedia</option>
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="formFile" class="form-label">Pilih
                                                                                file gambar (.png, .jpg,
                                                                                .jpeg)</label>
                                                                            <input name="gambar_mobil"
                                                                                class="form-control" type="file"
                                                                                id="formFile"
                                                                                accept=".png, .jpg, .jpeg" />
                                                                        </div>
                                                                        <div class="mb-4"></div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-outline-secondary"
                                                                                data-bs-dismiss="modal">Tutup</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Simpan
                                                                                Perubahan</button>
                                                                        </div>
                                                                    </form>
                                                                    <script>
                                                                        function validateForm() {
                                                                            var platMobil = document.querySelector('input[name="plat_mobil"]').value;
                                                                            var jenisMobil = document.querySelector('input[name="jenis_mobil"]').value;
                                                                            var warnaMobil = document.querySelector('input[name="warna_mobil"]').value;

                                                                            var successWarning = document.getElementById("success-warning");

                                                                            if (platMobil.trim() === "" || jenisMobil.trim() === "" || warnaMobil.trim() === "") {
                                                                                successWarning.style.display = "block";
                                                                                return false;
                                                                            }

                                                                            return true;
                                                                        }
                                                                    </script>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="mt-3">
            <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modalCenterTitle">Mobil</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xl">
                                    <div class="card-body">
                                        <form onsubmit="return validateFormTambah()" id="formCreateAccount"
                                            action="{{ route('mobil.create') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-floating form-floating-outline mb-4">
                                                <input type="text" class="form-control" id="basic-default-fullname"
                                                    name="plat_mobil_tambah" placeholder="#M111" />
                                                <label for="basic-default-fullname">Plat Mobil</label>
                                            </div>
                                            <div class="form-floating form-floating-outline mb-4">
                                                <input type="text" class="form-control" id="basic-default-company"
                                                    name="jenis_mobil_tambah" placeholder="Sedan" />
                                                <label for="basic-default-company">Jenis Mobil</label>
                                            </div>
                                            <div class="form-floating form-floating-outline mb-4">
                                                <input type="text" id="basic-default-username" class="form-control"
                                                    name="warna_mobil_tambah" placeholder="kuning" />
                                                <label for="basic-default-username">Warna Mobil</label>
                                            </div>
                                            <div class="form-text">Status Mobil</div>
                                            <div class="form-floating form-floating-outline mb-4">
                                                <select id="basic-default-role" class="form-select" name="status_mobil_tambah">
                                                    <option value="0">Tersedia</option>
                                                    <option value="1">Tidak Tersedia</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Pilih file gambar (.png, .jpg,
                                                    .jpeg)</label>
                                                <input name="gambar_mobil_tambah" class="form-control" type="file"
                                                    id="formFile" accept=".png, .jpg, .jpeg" />
                                            </div>
                                            <div class="mb-4"></div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Tambah Mobil</button>
                                            </div>
                                        </form>
                                        <div id="success-warning" class="alert alert-warning alert-dismissible"
                                            role="alert" style="display: none;">
                                            Harap Mengisi Semua Data Yang Ada Dengan Benar
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            function validateFormTambah() {
                                var platMobil = document.querySelector('input[name="plat_mobil_tambah"]').value;
                                var jenisMobil = document.querySelector('input[name="jenis_mobil_tambah"]').value;
                                var warnaMobil = document.querySelector('input[name="warna_mobil_tambah"]').value;
                                var image = document.querySelector('input[name="gambar_mobil_tambah"]');

                                var successWarning = document.getElementById("success-warning");

                                if (platMobil.trim() === "" || jenisMobil.trim() === "" || warnaMobil.trim() === "" || image.files.length ===
                                    0) {
                                    successWarning.style.display = "block";
                                    return false;
                                }

                                return true;
                            }
                        </script>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>


    <!-- Basic Layout -->

@endsection
