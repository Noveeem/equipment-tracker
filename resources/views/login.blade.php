<x-app-layout title="Home">
    <div class="app">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-md-6">
                    <div class="text-center">
                        <h3 class="display-6 fw-bold text-aos">AWESOME OS</h3>
                    </div>
                    <div class="card">
                        <div class="card-header">Login your account</div>
                        <div class="card-body">
                            <form action="{{ route ('auth') }}" method="post">
                            @csrf
                            @if (session()->has('error'))
                                <div class="text-center mt-2 pb-4">
                                    <span class="alert alert-danger"> {{ session()->get('error') }}</span>
                                </div>
                            @endif
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
                                    <input type="submit" name="login" id="login" value="Login" class="btn btn-success btn-sm w-100">
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @vite(['resources/js/app.js']);

</x-app-layout>