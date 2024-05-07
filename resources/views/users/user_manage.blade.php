@extends('products.layouts')

@section('title', 'Account Management')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/user_manage/user_manage.css') }}">
    <script src="{{ asset('js/user_manage/update_role.js') }}"></script>
    <script src="{{ asset('js/user_manage/user_manage.js') }}"></script>
@endsection

@section('content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" data-bg-class="bg-menu-theme"
                style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                <div class="app-brand demo ">
                    <a href="/home" class="app-brand-link">
                        <span class="img nav-link">
                            <img src="../img/logo-chu-p-dep-01.jpg" class="imagess" alt="L" width="25"
                                height="42">
                        </span>
                        <span class="app-brand-text demo menu-text fw-bold ms-2">lavashop</span>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1 ps ps--active-y">
                    <!-- Dashboards -->
                    <li class="menu-item open">
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="/home" class="menu-link">
                                    <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="/product-manage" class="menu-link">
                                    <div class="text-truncate" data-i18n="Product Manage">Product Manage</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="/purchase-manage" class="menu-link">
                                    <div class="text-truncate" data-i18n="Purchase Manage">Purchase Manage</div>
                                </a>
                            </li>
                            <li class="menu-item active">
                                <a href="/user-manage" class="menu-link">
                                    <div class="text-truncate" data-i18n="User Manage">User Manage</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="https://thumbs.dreamstime.com/b/cute-cat-avatar-vector-illustration-solid-icon-style-152373470.jpg"
                                            alt="Image User" class="w-px-40 h-auto rounded-circle">
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="pages-account-settings-account.html">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="https://thumbs.dreamstime.com/b/cute-cat-avatar-vector-illustration-solid-icon-style-152373470.jpg"
                                                            alt="" class="w-px-40 h-auto rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-medium d-block">{{ session('user_name') }}</span>
                                                    <small class="text-muted">Admin</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/logout">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="card">
                            {{-- <div class="card-header border-bottom">
                                <h5 class="card-title">Search Filter</h5>
                                <div class="d-flex justify-content-right align-items-center row py-3 gap-3 gap-md-0">
                                    <div class="col-md-4 user_role">
                                        <select id="UserRole" class="form-select text-capitalize">
                                            <option value=""> Select Role </option>
                                            <option value="Admin">Admin</option>
                                            <option value="Author">Customer</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                            <label><input type="search" class="form-control" placeholder="Search.."
                                                    aria-controls="DataTables_Table_0"></label>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="card-datatable table-responsive">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                    <div class="row mx-2 mb-3 mt-3">
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-10">
                                            <div
                                                class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">

                                                <div class="dt-buttons btn-group flex-wrap">
                                                    <div class="btn-group">
                                                    </div>
                                                    <button class="btn btn-secondary add-new btn-primary" tabindex="0"
                                                        aria-controls="DataTables_Table_0" type="button"
                                                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser">
                                                        <span>
                                                            <i class="bx bx-plus me-0 me-sm-1"></i>
                                                            <span class="d-none d-sm-inline-block">Add New User</span>
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="datatables-users table border-top dataTable no-footer dtr-column"
                                        id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info"
                                        style="width: 1209px;">
                                        <thead>
                                            <tr>
                                                <th class="control sorting_disabled dtr-hidden" rowspan="1"
                                                    colspan="1" style="width: 5px;" aria-label="">Stt
                                                </th>
                                                <th class="control sorting_disabled dtr-hidden" rowspan="1"
                                                    colspan="1" style="width: 5px;" aria-label="">Id
                                                </th>
                                                <th class="sorting sorting_desc" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    style="width: 200px;"
                                                    aria-label="User: activate to sort column ascending"
                                                    aria-sort="descending">User</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1" style="width: 240px;"
                                                    aria-label="Role: activate to sort column ascending">Email</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1" style="width: 140px;"
                                                    aria-label="Plan: activate to sort column ascending">Role</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1"
                                                    style="width: 121px;" aria-label="Actions">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr class="odd">
                                                    @php
                                                        $stt =
                                                            ($users->currentPage() - 1) * $users->perPage() +
                                                            $loop->index +
                                                            1;
                                                    @endphp
                                                    <td class="control" tabindex="0">{{ $stt }}</td>
                                                    <td>{{ $user->id }}</td>
                                                    <td class="sorting_1">
                                                        <div
                                                            class="d-flex justify-content-start align-items-center user-name">
                                                            <div class="avatar-wrapper">
                                                                <div class="avatar avatar-sm me-3"><img src=""
                                                                        alt="Avatar" class="rounded-circle"></div>
                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                <a class="text-body text-truncate">{{ $user->name }}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="text-truncate d-flex align-items-center">
                                                            {{ $user->email }}</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge badge-center rounded-pill bg-label-warning w-px-30 h-px-30 me-2">
                                                            <i class="bx bx-user bx-xs"></i>
                                                        </span>
                                                        <span class="fw-medium">{{ $user->roles->name_role }}</span>
                                                    </td>
                                                    <td>
                                                        <div class="d-inline-block text-nowrap">
                                                            <button class="btn btn-sm btn-icon" data-target="#user_delete"
                                                                data-toggle="modal" data-delete-id="{{ $user->id }}">
                                                                <i class="bx bx-trash"></i>
                                                            </button>
                                                            <button class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="bx bx-dots-vertical-rounded me-2"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end m-0"
                                                                style="">
                                                                <a href="{{ route('detail_user', ['id' => $user->id]) }}"
                                                                    class="dropdown-item">View</a>
                                                                <button class="dropdown-item" data-target="#update_role"
                                                                    data-toggle="modal"
                                                                    data-role-url="{{ route('update_role', ['id' => $user->id]) }}"
                                                                    data-user-name="{{ $user->name }}"
                                                                    data-user-email="{{ $user->email }}"
                                                                    data-user-role="{{ $user->roles->name_role }}">Update
                                                                    Role
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="row mx-2 mt-3">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_info" id="DataTables_Table_0_info" role="status"
                                                aria-live="polite">Showing {{ $users->firstItem() }} to
                                                {{ $users->lastItem() }} of {{ $users->total() }} users</div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_paginate paging_simple_numbers"
                                                id="DataTables_Table_0_paginate">
                                                <ul class="pagination justify-content-end">
                                                    @if ($users->currentPage() == 1)
                                                        <li class="paginate_button page-item disabled">
                                                            <a class="page-link">Previous</a>
                                                        </li>
                                                    @else
                                                        <li class="paginate_button page-item">
                                                            <a class="page-link"
                                                                href="{{ $users->previousPageUrl() }}">Previous</a>
                                                        </li>
                                                    @endif

                                                    @for ($page = 1; $page <= $users->lastPage(); $page++)
                                                        <li
                                                            class="page-item {{ $users->currentPage() == $page ? 'active' : '' }}">
                                                            <a class="page-link"
                                                                href="{{ $users->url($page) }}">{{ $page }}</a>
                                                        </li>
                                                    @endfor

                                                    @if ($users->currentPage() == $users->lastPage())
                                                        <li class="page-item disabled">
                                                            <span class="page-link">Next</span>
                                                        </li>
                                                    @else
                                                        <li class="page-item">
                                                            <a class="page-link"
                                                                href="{{ $users->nextPageUrl() }}">Next</a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Offcanvas to add new user -->
                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser"
                                aria-labelledby="offcanvasAddUserLabel">
                                <div class="offcanvas-header">
                                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add User</h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body mx-0 flex-grow-0">
                                    <form class="add-new-user pt-0 fv-plugins-bootstrap5 fv-plugins-framework"
                                        id="addNewUserForm" action="{{ route('add_user') }}" method="POST">
                                        @csrf
                                        <div class="mb-3 fv-plugins-icon-container">
                                            <label class="form-label" for="name">Full Name</label>
                                            <input type="text" class="form-control" id="name"
                                                placeholder="John Doe" name="name">
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                <span id="error-name" class="text-danger"></span>
                                                @error('name')
                                                    <div class="text-danger">*{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 fv-plugins-icon-container">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="text" id="email" class="form-control"
                                                placeholder="john.doe@example.com" name="email">
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                <span id="error-email" class="text-danger"></span>
                                                @error('email')
                                                    <div class="text-danger">*{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 fv-plugins-icon-container">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" id="password" class="form-control"
                                                placeholder="password" name="password">
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                <span id="error-password" class="text-danger"></span>
                                                @error('password')
                                                    <div class="text-danger">*{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 fv-plugins-icon-container">
                                            <label class="form-label" for="confirm_password">Confirm Password</label>
                                            <input type="password" id="confirm_password" class="form-control"
                                                placeholder="confirm password" name="confirm_password">
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                <span id="error-confirm_password" class="text-danger"></span>
                                                @error('confirm_password')
                                                    <div class="text-danger">*{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="user_role">User Role</label>
                                            <select id="user_role" class="form-select" name="user_role">
                                                <option value=""> Select Role </option>
                                                <option value="Administrator">Administrator</option>
                                                <option value="Customer">Customer</option>
                                            </select>
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                <span id="error-role" class="text-danger"></span>
                                                @error('user_role')
                                                    <div class="text-danger">*{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit"
                                            class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
                                        <button type="reset" class="btn btn-label-secondary"
                                            data-bs-dismiss="offcanvas">Cancel</button>
                                        <input type="hidden">
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- / Content -->
                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
    </div>
    @include('users.modal.delete_user')
    @include('users.modal.update_role')
@endsection
