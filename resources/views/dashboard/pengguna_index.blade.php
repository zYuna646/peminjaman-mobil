@extends('dashboard.pengguna')
@section('title', 'dashboard')

@section('content')
    <div class="tab-content p-0">
        <div class="tab-pane fade active show" id="navs-tab-home" role="tabpanel">
            <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
                @foreach ($mobils as $mobil)
                    <div class="col">
                        <div class="card h-100">
                            <img class="card-img-top" src="{{ asset('gambar_mobil/' . $mobil->gambar_mobil) }}"
                                alt="Card image cap" />
                            <div class="card-body">
                                <h5 class="card-title">Plat Nomor : {{ $mobil->plat_nomor }}</h5>
                                <p class="card-text">
                                    Jenis Mobil : {{ $mobil->jenis_mobil }}
                                </p>
                                <p class="card-text">
                                    Warna Mobil : {{ $mobil->warna_mobil }}
                                </p>
                                <button type="button" class="btn btn-primary"
                                    onclick="selectOption('{{ $mobil->id }}');">
                                    <span class="tf-icons mdi mdi-checkbox-marked-circle-outline me-1"></span>Pinjam
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="tab-pane fade" id="navs-tab-profile" role="tabpanel">
            <div class="row" style="margin-top: 2.5%">
                <!-- Basic Layout -->
                <div class="col-xxl">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Peminjaman Mobil</h5>
                            <small class="text-muted float-end">Form Peminjaman</small>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('mobil.create') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-phone">Mobil</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" id="inputGroupSelect01" name="id_mobil" required>
                                            <option value="" selected disabled>Pilih Mobil</option>
                                            @foreach ($mobils as $mobil)
                                                <option value="{{ $mobil->id }}">{{ $mobil->plat_nomor }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-phone">Durasi
                                        Peminjaman</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="date" id="html5-date-input" name="durasi_peminjaman" required />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-email">Surat LDP</label>
                                    <div class="col-sm-10">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Surat LDP .pdf , .jpg</label>
                                            <input class="form-control" type="file" id="formFile" required name="surat_ldp" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-message">Perihal</label>
                                    <div class="col-sm-10">
                                        <textarea id="basic-default-message" class="form-control" placeholder="Hi, Do you have a moment to talk Joe?" required
                                            aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2" name="perihal"></textarea>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Pinjam</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function selectOption(optionValue) {
                const dropdown = document.getElementById('inputGroupSelect01');

                for (let i = 0; i < dropdown.options.length; i++) {
                    if (dropdown.options[i].value === optionValue) {
                        dropdown.selectedIndex = i;
                        const homeTab = document.getElementById('navs-tab-home');
                        homeTab.classList.remove('show', 'active');

                        const profileTab = document.getElementById('navs-tab-profile');
                        profileTab.classList.add('show', 'active');

                        break;
                    }
                }
            }
        </script>

        <div class="tab-pane fade" id="navs-tab-peminjam" role="tabpanel">
            <div class="card">
                <h5 class="card-header">Riwayat Peminjaman</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Plat Nomor</th>
                                <th>Awal Peminjaman</th>
                                <th>Akhir Peminjaman</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                            <tr class="table-secondary">
                                <td>
                                    <i class="mdi mdi-greenhouse mdi-20px text-success me-3"></i><span
                                        class="fw-medium">Greenhouse Project</span>
                                </td>
                                <td>Trevor Baker</td>
                                <td>
                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                            <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                            <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-xs pull-up" title="Christina Parker">
                                            <img src="../assets/img/avatars/7.png" alt="Avatar"
                                                class="rounded-circle" />
                                        </li>
                                    </ul>
                                </td>
                                <td><span class="badge rounded-pill bg-label-secondary me-1">Scheduled</span></td>
                                <td>ini</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="table-success">
                                <td>
                                    <i class="mdi mdi-bank mdi-20px text-primary me-3"></i><span class="fw-medium">Bank
                                        Project</span>
                                </td>
                                <td>Jerry Milton</td>
                                <td>
                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                            <img src="../assets/img/avatars/5.png" alt="Avatar"
                                                class="rounded-circle" />
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                            <img src="../assets/img/avatars/6.png" alt="Avatar"
                                                class="rounded-circle" />
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-xs pull-up" title="Christina Parker">
                                            <img src="../assets/img/avatars/7.png" alt="Avatar"
                                                class="rounded-circle" />
                                        </li>
                                    </ul>
                                </td>
                                <td><span class="badge rounded-pill bg-label-success me-1">Pending</span></td>
                                <td>ini</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="table-danger">
                                <td>
                                    <i class="mdi mdi-palette mdi-20px text-danger me-3"></i><span class="fw-medium">UI/UX
                                        Project</span>
                                </td>
                                <td>Sarah Banks</td>
                                <td>
                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                            <img src="../assets/img/avatars/5.png" alt="Avatar"
                                                class="rounded-circle" />
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                            <img src="../assets/img/avatars/6.png" alt="Avatar"
                                                class="rounded-circle" />
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-xs pull-up" title="Christina Parker">
                                            <img src="../assets/img/avatars/7.png" alt="Avatar"
                                                class="rounded-circle" />
                                        </li>
                                    </ul>
                                </td>
                                <td><span class="badge rounded-pill bg-label-danger me-1">Active</span></td>
                                <td>ini</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    @endsection
