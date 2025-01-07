@extends('template.layout')

@section('title', 'Dashboard - Admin Perpustakaan')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
    <div id="layoutSidenav">
        @include('template.sidebar_admin')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Pengaturan Akun Admin</h1>
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item active">Nama</li>
                    </ol>
                    <div class="container-fluid p-0">
                        <form>
                            <div class="form-group row m-0">
                                <label for="inputText" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-105 p-0">
                                    <input type="text" class="form-control" id="inputText" placeholder="">
                                </div>
                            </div>
                            <br>
                        </form>
                        <div class="container-fluid px-1">
                            <ol class="breadcrumb mb-1">
                                <li class="breadcrumb-item active">Username</li>
                            </ol>
                            <div class="container-fluid p-0">
                                <form>
                                    <div class="form-group row m-0">
                                        <label for="inputText" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-105 p-0">
                                            <input type="text" class="form-control" id="inputText" placeholder="">
                                        </div>
                                    </div>
                                    <br>
                                </form>
                        <div class="container-fluid px-1">
                            <ol class="breadcrumb mb-1">
                                <li class="breadcrumb-item active">Alamat</li>
                            </ol>
                            <form>
                                <div class="mb-1 mt-3">
                                    <textarea class="form-control" rows="5" id="comment" name="text"></textarea>
                                </div>
                        </div>
                        </form>
                        <div class="container-fluid px-1">
                            <ol class="breadcrumb mb-1">
                                <li class="breadcrumb-item active">Email</li>
                            </ol>
                            <div class="container-fluid p-0">
                                <form>
                                    <div class="form-group row m-0">
                                        <label for="inputText" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-105 p-0">
                                            <input type="text" class="form-control" id="inputText"
                                                placeholder="">
                                        </div>
                                    </div>
                                    <br>
                                </form>
                                <div class="container-fluid px-1">
                                    <ol class="breadcrumb mb-1">
                                        <li class="breadcrumb-item active">No telepon</li>
                                    </ol>
                                    <div class="container-fluid p-0">
                                        <form>
                                            <div class="form-group row m-0">
                                                <label for="inputText" class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-105 p-0">
                                                    <input type="text" class="form-control" id="inputText" placeholder="">
                                                </div>
                                            </div>
                                            <br>
                                        </form>
                                        <div class="container-fluid px-1">
                                            <ol class="breadcrumb mb-1">
                                                <li class="breadcrumb-item active">Password</li>
                                            </ol>
                                            <div class="container-fluid p-0">
                                                <form>
                                                    <div class="form-group row m-0">
                                                        <label for="inputText" class="col-sm-2 col-form-label"></label>
                                                        <div class="col-sm-105 p-0">
                                                            <input type="text" class="form-control" id="inputText" placeholder="">
                                                        </div>
                                                    </div>
                                                    <br>
                                                </form>
                                                <p>Kosongkan jika tidak ingin merubah password</p>
                                    </div>
                                    <br>
                                    <div class="d-flex justify-content-start">
                                        <a href="#" class="mr-2">
                                            <button class="btn btn-warning mb-1">Update Data</button>
                                        </a>
                                    </div>
            </main>
            <footer class="custom-footer bg-light py-3">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Web Perpustakaan 2023</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection

