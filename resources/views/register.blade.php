<x-app-layout title="Register">
    <div class="app">
        <div class="container">
            
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-md-6">
                    <div class="text-center">
                        <h3 class="display-6 fw-bold">AWESOME OS</h3>
                    </div>
                    <div class="input-group flex-nowrap mb-3">
                        <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-sm">
                        <i class="fa-solid fa-arrow-left"></i>&nbsp; Back</a>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">Add New User</div>
                        <div class="card-body">
                            <form action="{{ route ('create') }}" method="post">
                            @csrf
                            {{-- Name --}}
                            <div class="row mb-3 mt-2">
                                <div class="col-md-7 mx-auto">
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                        <input type="text" name="name" id="name" placeholder="Name" class="form-control">
                                    </div>
                                    @error('name')
                                        <span class="text-danger fs-6 fw-bold">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Username --}}
                            <div class="row mb-3 mt-2">
                                <div class="col-md-7 mx-auto">
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                        <input type="text" name="username" id="username" placeholder="Username" class="form-control">
                                    </div>
                                    @error('username')
                                        <span class="text-danger fs-6 fw-bold">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Email --}}
                            <div class="row mb-3 mt-2">
                                <div class="col-md-7 mx-auto">
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                        <input type="email" name="email" id="email" placeholder="Email Address" class="form-control">
                                    </div>
                                    @error('email')
                                        <span class="text-danger fs-6 fw-bold">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Role --}}
                            <div class="row mb-3 mt-2">
                                <div class="col-md-7 mx-auto">
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                        <select name="role" id="role" class="form-select">
                                            <option value="0" selected>Select Role</option>
                                            <option value="Desktop Support">Desktop Support</option>
                                            <option value="Compliance">Compliance</option>
                                            <option value="System Admin">System Administrator</option>
                                            <option value="Network Support">Network Support</option>
                                        </select>
                                    </div>
                                    @error('role')
                                        <span class="text-danger fs-6 fw-bold">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Password --}}
                            <div class="row mb-3 mt-2">
                                <div class="col-md-7 mx-auto">
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                                        <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                                    </div>
                                    @error('password')
                                        <span class="text-danger fs-6 fw-bold">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Submit --}}
                            <div class="row mb-3 mt-2">
                                <div class="col-md-7 mx-auto">
                                    <input type="submit" name="login" id="login" value="Create New Account" class="btn btn-success btn-sm w-100">
                                </div>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>