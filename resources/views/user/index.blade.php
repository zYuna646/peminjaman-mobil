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
        <li class="menu-item open">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-account-outline"></i>
                <div data-i18n="Account Settings">Pengaturan Akun</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item active">
                    <a href="{{ route('akun.index') }}" class="menu-link">
                        <div data-i18n="Account">Pengguna</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-item">
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

        <h5 class="card-header">List Akun Pengguna</h5>
        <button style="margin-left: 1%;" type="button" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#modalCenter">+ Tambah Pengguna</button>

        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pengguna</th>
                        <th>Unit/Divisi</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}.</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->unit }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span
                                    class="{{ $user->role === 'admin' ? 'badge rounded-pill bg-label-info me-1' : 'badge rounded-pill bg-label-success me-1' }}">{{ $user->role }}</span>
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
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="mt-3">
                                        <div class="modal fade" id="modalDelete{{ $user->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="modalCenterTitle">Hapus Pengguna</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-xl">
                                                                <div class="card-body">
                                                                    <form
                                                                        action="{{ route('akun.delete', ['id' => $user->id]) }}"
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
                                                                    <form action="{{ route('akun.update', ['id' => $user->id]) }}" method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div
                                                                            class="form-floating form-floating-outline mb-4">
                                                                            <input type="text" class="form-control"
                                                                                id="basic-default-fullname"
                                                                                name="name" placeholder="John Doe"
                                                                                value={{ $user->name }} />
                                                                            <label for="basic-default-fullname">Nama
                                                                                Lengkap</label>
                                                                        </div>
                                                                        <div
                                                                            class="form-floating form-floating-outline mb-4">
                                                                            <input type="text" class="form-control"
                                                                                id="basic-default-company" name="unit"
                                                                                placeholder="Divisi"
                                                                                value={{ $user->unit }} />
                                                                            <label for="basic-default-company">Unit Atau
                                                                                Divisi</label>
                                                                        </div>

                                                                        <div
                                                                            class="form-floating form-floating-outline mb-4">
                                                                            <input type="text"
                                                                                id="basic-default-username"
                                                                                class="form-control" name="username"
                                                                                placeholder="Username"
                                                                                value={{ $user->username }} />
                                                                            <label
                                                                                for="basic-default-username">Username</label>
                                                                        </div>
                                                                        <div class="form-text">Role</div>
                                                                        <div
                                                                            class="form-floating form-floating-outline mb-4">
                                                                            <select id="basic-default-role"
                                                                                class="form-select" name="role">
                                                                                <option value="Pengguna"
                                                                                    {{ $user->role === 'Pengguna' ? 'selected' : '' }}>
                                                                                    Pengguna</option>
                                                                                <option value="Admin"
                                                                                    {{ $user->role === 'Admin' ? 'selected' : '' }}>
                                                                                    Admin</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-4">
                                                                            <div class="input-group input-group-merge">
                                                                                <div
                                                                                    class="form-floating form-floating-outline">
                                                                                    <input type="text"
                                                                                        id="basic-default-email"
                                                                                        class="form-control"
                                                                                        name="email"
                                                                                        placeholder="john.doe"
                                                                                        aria-label="john.doe"
                                                                                        aria-describedby="basic-default-email2"
                                                                                        value={{$user->email }}  />
                                                                                    <label
                                                                                        for="basic-default-email">Email</label>
                                                                                </div>
                                                                                <span class="input-group-text"
                                                                                    id="basic-default-email2">@example.com</span>
                                                                            </div>
                                                                            <div class="form-text">You can use letters,
                                                                                numbers & periods</div>
                                                                        </div>
                                                                        <div class="form-password-toggle">
                                                                            <div class="input-group input-group-merge">
                                                                                <div
                                                                                    class="form-floating form-floating-outline">
                                                                                    <input type="password" id="password"
                                                                                        class="form-control"
                                                                                        name="password"
                                                                                        placeholder="********"
                                                                                        aria-describedby="password"
                                                                                         >
                                                                                    <label for="password">Password</label>
                                                                                </div>
                                                                                <span
                                                                                    class="input-group-text cursor-pointer"><i
                                                                                        class="mdi mdi-eye-off-outline"></i></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-4"></div>

                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-outline-secondary"
                                                                                data-bs-dismiss="modal">
                                                                                Tutup
                                                                            </button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Simpan Perubahan</button>
                                                                        </div>
                                                                    </form>
                                                                    <div id="success-warning"
                                                                        class="alert alert-warning alert-dismissible"
                                                                        role="alert" style="display: none;">
                                                                        Harap Mengisi Semua Data Yang Ada Dengan Benar
                                                                    </div>

                                                                    <script>
                                                                        function validateForm() {
                                                                            var fullname = document.querySelector('input[name="name"]').value;
                                                                            var company = document.querySelector('input[name="unit"]').value;
                                                                            var username = document.querySelector('input[name="username"]').value;
                                                                            var email = document.querySelector('input[name="email"]').value;
                                                                            var password = document.querySelector('input[name="password"]').value;

                                                                            var successWarning = document.getElementById("success-warning");
                                                                            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

                                                                            if (fullname.trim() === "" || company.trim() === "" || username.trim() === "" || email.trim() === "") {
                                                                                successWarning.style.display = "block";
                                                                                return false;
                                                                            }

                                                                            if (!email.match(emailPattern)) {
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
                            <h4 class="modal-title" id="modalCenterTitle">Pengguna</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xl">
                                    <div class="card-body">
                                        <form onsubmit="return validateForm()" id="formCreateAccount"
                                            action="{{ route('akun.create') }}" method="POST">
                                            @csrf
                                            <div class="form-floating form-floating-outline mb-4">
                                                <input type="text" class="form-control" id="basic-default-fullname"
                                                    name="fullname_tambah" placeholder="John Doe" />
                                                <label for="basic-default-fullname">Nama Lengkap</label>
                                            </div>
                                            <div class="form-floating form-floating-outline mb-4">
                                                <input type="text" class="form-control" id="basic-default-company"
                                                    name="company_tambah" placeholder="Divisi" />
                                                <label for="basic-default-company">Unit Atau Divisi</label>
                                            </div>

                                            <div class="form-floating form-floating-outline mb-4">
                                                <input type="text" id="basic-default-username" class="form-control"
                                                    name="username_tambah" placeholder="Username" />
                                                <label for="basic-default-username">Username</label>
                                            </div>
                                            <div class="form-text">Role</div>
                                            <div class="form-floating form-floating-outline mb-4">
                                                <select id="basic-default-role" class="form-select" name="role_tambah">
                                                    <option value="Pengguna">Pengguna</option>
                                                    <option value="Admin">Admin</option>
                                                </select>
                                            </div>
                                            <div class="mb-4">
                                                <div class="input-group input-group-merge">
                                                    <div class="form-floating form-floating-outline">
                                                        <input type="text" id="basic-default-email"
                                                            class="form-control" name="email_tambah" placeholder="john.doe"
                                                            aria-label="john.doe"
                                                            aria-describedby="basic-default-email2" />
                                                        <label for="basic-default-email">Email</label>
                                                    </div>
                                                    <span class="input-group-text"
                                                        id="basic-default-email2">@example.com</span>
                                                </div>
                                                <div class="form-text">You can use letters, numbers & periods</div>
                                            </div>
                                            <div class="form-password-toggle">
                                                <div class="input-group input-group-merge">
                                                    <div class="form-floating form-floating-outline">
                                                        <input type="password" id="password" class="form-control"
                                                            name="password_tambah" placeholder="12345"
                                                            aria-describedby="password">
                                                        <label for="password">Password</label>
                                                    </div>
                                                    <span class="input-group-text cursor-pointer"><i
                                                            class="mdi mdi-eye-off-outline"></i></span>
                                                </div>
                                            </div>
                                            <div class="mb-4"></div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">
                                                    Tutup
                                                </button>
                                                <button type="submit" class="btn btn-primary">Tambah Pengguna</button>
                                            </div>
                                        </form>
                                        <div id="success-warning" class="alert alert-warning alert-dismissible"
                                            role="alert" style="display: none;">
                                            Harap Mengisi Semua Data Yang Ada Dengan Benar
                                        </div>

                                        <script>
                                            function validateForm() {
                                                var fullname = document.querySelector('input[name="fullname_tambah"]').value;
                                                var company = document.querySelector('input[name="company"_tambah]').value;
                                                var username = document.querySelector('input[name="username_tambah"]').value;
                                                var email = document.querySelector('input[name="email_tambah"]').value;
                                                var password = document.querySelector('input[name="password_tambah"]').value;

                                                var successWarning = document.getElementById("success-warning");
                                                var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

                                                if (fullname.trim() === "" || company.trim() === "" || username.trim() === "" || email.trim() === "" || password
                                                    .trim() === "") {
                                                    successWarning.style.display = "block";
                                                    return false;
                                                }

                                                if (!email.match(emailPattern)) {
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
    </div>

    <!-- Basic Layout -->

@endsection
