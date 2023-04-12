<x-app-layout title="Add New Equipment">
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                            <span data-feather="home"></span>
                            Dashboard
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="user-plus"></span>
                            Add New User
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="rotate-ccw"></span>
                            History
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="mail"></span>
                            Inbox
                        </a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Profile</span>
                        <a class="link-secondary" href="#" aria-label="Add a new report">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <span data-feather="log-out"></span>
                            Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>


            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <a class="btn btn-sm btn-warning" href="{{ url('dashboard') }}">
                        <span data-feather="arrow-left"></span>
                        Go Back
                    </a>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <h1 class="h3">Tracking Equipment</h1>
                        </div>
                    </div>
                </div>

                <div class="container">
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <strong>Error: </strong> {{ $errors->first() }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div> 
                    @endif   
                    <form action="{{ route('track') }}" method="post">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-md-4 me-auto">
                                <div class="flex-column mb-3">
                                    <span class="text-muted"><label for="date">Tracking Date</label></span>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text">
                                            <span data-feather="calendar"></span>
                                        </span>
                                        <input type="date" name="Date" id="Date" class="form-control form-control-sm" placeholder="Date" value="{{ old('Date') }}">
                                    </div>
                                </div>
                                <div class="flex-column mb-3">
                                    <span class="text-muted fs-6"><label for="AssetIdentificationNumber">Asset Identification Number</label></span>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text">
                                            <span data-feather="hash"></span>
                                        </span>
                                        <textarea name="AssetIdentificationNumber" id="AssetIdentificationNumber" class="form-control form-control-sm " rows="6" style="resize:none;">{{ old('AssetIdentificationNumber') }}</textarea>
                                    </div>
                                </div>
                                <div class="flex-column mb-3">
                                    <span class="text-muted fs-6"><label for="Description">Item Description</label></span>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text">
                                            <span data-feather="message-circle"></span>
                                        </span>
                                        <textarea name="Description" id="Description" class="form-control form-control-sm " rows="6" style="resize:none;">{{ old('Description') }}</textarea>
                                    </div>
                                </div>
                                <div class="flex-column mb-3">
                                    <span class="text-muted"><label for="User">User/s</label></span>
                                    <span class="input-group input-group-sm">
                                        <span class="input-group-text">
                                            <span data-feather="user"></span>
                                        </span>
                                        <input type="text" name="User" id="User" class="form-control form-control-sm text-sm" placeholder="User" value="{{ old('User') }}">
                                    </span>
                                </div>
                                <div class="flex-column mb-3">
                                    <span class="text-muted"><label for="Account">Account</label></span>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text">
                                            <span data-feather="flag"></span>
                                        </span>
                                        <input type="text" name="Account" id="Account" class="form-control form-control-sm text-sm" placeholder="Account" value="{{ old('Account') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 me-auto">
                                <div class="flex-column mb-3">
                                    <span class="text-muted"><label for="Quantity">Quantity</label></span>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text">
                                            <span data-feather="hash"></span>
                                        </span>
                                        <input type="number" name="Quantity" id="Quantity" class="form-control form-control-sm text-sm" placeholder="Quantity" value="{{ old('Quantity') }}">
                                    </div>
                                </div>
                                <div class="flex-column mb-3">
                                    <span class="text-muted fs-6"><label for="SerialNumber">Serial Number</label></span>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text">
                                            <span data-feather="tag"></span>
                                        </span>
                                        <textarea name="SerialNumber" id="SerialNumber" class="form-control form-control-sm " rows="6" style="resize:none;">{{ old('SerialNumber') }}</textarea>
                                    </div>
                                </div>
                                <div class="flex-column mb-3">
                                    <span class="text-muted fs-6"><label for="SerialNumber">Remarks</label></span>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text">
                                            <span data-feather="message-circle"></span>
                                        </span>
                                        <textarea name="Remarks" id="Remarks" class="form-control form-control-sm " rows="6" style="resize:none;">{{ old('Remarks') }}</textarea>
                                    </div>
                                </div>
                                <div class="flex-column mb-3">
                                    <span class="text-muted"><label for="Location">Station Number/Location</label></span>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text">
                                            <span data-feather="map-pin"></span>
                                        </span>
                                        <input type="text" name="Location" id="Location" class="form-control form-control-sm text-sm" placeholder="Station Number/Location" value="{{ old('Location') }}">
                                    </div>
                                </div>
                                <div class="flex-column mb-3">
                                    <span class="text-muted"><label for="Facilitate">Facilitated By</label></span>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text">
                                            <span data-feather="users"></span>
                                        </span>
                                        <input type="text" name="Facilitate" id="Facilitate" class="form-control form-control-sm text-sm" placeholder="Facilitated By" value="{{ old('Facilitate') }}">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success btn-sm">
                                <span data-feather="save"></span>
                                Save Equipment
                            </button>
                        </div>
                    </form>
                </div>

            </main>
        </div>
    </div>

    @vite(['resources/js/app.js'])
</x-app-layout>