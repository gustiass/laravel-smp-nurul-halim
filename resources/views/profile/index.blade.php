@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{ asset('/img/profile.png') }}"
                                alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{ $user->name }}</h3>

                        <p class="text-muted text-center">{{ $user->roles[0]->name }}</p>

                        {{-- <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Followers</b> <a class="float-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <b>Following</b> <a class="float-right">543</a>
                            </li>
                            <li class="list-group-item">
                                <b>Friends</b> <a class="float-right">13,287</a>
                            </li>
                        </ul>

                        <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">User</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#sekolah" data-toggle="tab">Sekolah</a>
                            </li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">


                            <div class="tab-pane active" id="profile">
                                <form class="form-horizontal" action="{{ route('profile.update', $user->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="profile" value="user">
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" value="{{ $user->name }}" class="form-control @error('stok') is-invalid @enderror" id="inputName" placeholder="Name">
                                            @error('name')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" name="email" value="{{ $user->email }}" class="form-control @error('stok') is-invalid @enderror" id="inputEmail"
                                                placeholder="Email">
                                                @error('email')
                                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-3 col-form-label">Ganti Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="inputName2" placeholder="Kosongkan jika tidak ingin mengganti password">
                                            @error('password')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-3 col-form-label">Konfirmasi Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="inputName2" placeholder="">
                                            @error('password_confirmation')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-3 col-sm-9">
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="sekolah">
                                <form class="form-horizontal" action="{{ route('profile.update', $user->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="profile" value="sekolah">
                                    <div class="form-group row">
                                        <label for="identitas_sekolah" class="col-sm-3 col-form-label">Identitas Sekolah</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="identitas_sekolah" value="{{ $profile->identitas_sekolah }}" class="form-control @error('identitas_sekolah') is-invalid @enderror" id="identitas_sekolah" placeholder="Name">
                                            @error('identitas_sekolah')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="visi_misi" class="col-sm-3 col-form-label">Visi dan Misi</label>
                                        <div class="col-sm-9">
                                            <textarea name="visi_misi" id="visi_misi" class="form-control summernote" placeholder="visi_misi">{{ $profile->visi_misi }}</textarea> 
                                            @error('visi_misi') is-invalid @enderror
                                                @error('visi_misi')
                                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="sejarah_singkat" class="col-sm-3 col-form-label">Sejarah Singkat</label>
                                        <div class="col-sm-9">
                                            <textarea name="sejarah_singkat" class="form-control summernote @error('sejarah_singkat') is-invalid @enderror" id="sejarah_singkat">{{ $profile->sejarah_singkat }}</textarea>
                                            @error('sejarah_singkat')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fasilitas" class="col-sm-3 col-form-label">Fasilitas</label>
                                        <div class="col-sm-9">
                                            <textarea name="fasilitas" class="form-control summernote @error('fasilitas') is-invalid @enderror" id="fasilitas">{{ $profile->fasilitas }}</textarea>
                                            @error('fasilitas')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="struktur_organisasi">Struktur Organisasi</label>
                                        <input type="file" class="form-control struktur_organisasi @error('struktur_organisasi') is-invalid @enderror" name="struktur_organisasi" id="struktur_organisasi" value="{{ old('struktur_organisasi') }}"  data-height="100" data-width="160" data-default-file="{{ asset('/img/'.$profile->struktur_organisasi) }}">
                                        @error('struktur_organisasi')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>

    </section>
    <!-- /.content -->
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('.dropify').dropify();
        $('.struktur_organisasi').dropify();
        // Summernote
        $('.summernote').summernote()
    });

</script>
@if(session()->has('success'))
    <script>
        $(document).ready(function () {
            toastr["success"]('{{ session()->get('success') }}')
        });

    </script>
@endif

@if(session()->has('error'))
    <script>
        $(document).ready(function () {
            toastr["info"]('{{ session()->get('error') }}')
        });
    </script>
@endif
@endsection
