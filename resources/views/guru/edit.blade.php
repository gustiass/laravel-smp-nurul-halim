@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Guru</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('informasi.index') }}">Guru</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class=" d-flex align-items-center justify-content-between">

                            <a href="{{ route('informasi.index')}}" class="btn">
                                <i class="fas fa-arrow-left  text-purple  "></i>
                            </a>

                            <span>Form Edit Guru</span>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" >
                        <form method="POST" action="{{ route('guru.update', $guru->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5 px-5">
                                <div class="form-group">
                                    <label for="foto">Photo</label>
                                    <input type="file" class="form-control foto @error('foto') is-invalid @enderror" name="foto" id="foto" value="{{ $guru->foto }}" data-default-file="{{ asset('/img/gambar/'.$guru->foto) }}" data-height="282">
                                    @error('foto')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.col-md -->

                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                    <label for="nama">Nomor Lengkap</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ $guru->nama}}"  placeholder="Nama Lengkap" autofocus>
                                    @error('nama')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <textarea class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Nama" rows="5">{{ $guru->nama }}</textarea>
                                    @error('nama')
                                          <div class="text-danger small mt-1">{{ $message }}</div>
                                      @enderror
                                  </div> --}}

                                  <div class="form-group">
                                      <label for="jabatan">Jabatan</label>
                                      <select name="jenis" id="jenis" class="form-control">
                                          <option value="0" disabled>- Pilih Jabatan-</option>
                                          <option value="Guru"  @if ($guru->jabatan == 'Guru') {{ "selected" }} @endif>Guru</option>
                                          <option value="Guru-BK" @if ($guru->jabatan == 'Guru-BK') {{ "selected" }} @endif>Guru-BK</option>
                                          {{-- <option value="Kepstaff-TU" @if ($guru->jabatan == 'Kepstaff-TU') {{ "selected" }} @endif>Kepala Staff TU</option>
                                          <option value="Staff-TU" @if ($guru->jabatan == 'Staff-TU') {{ "selected" }} @endif>Staff TU</option>
                                          <option value="Staff-Perpus" @if ($guru->jabatan == 'Staff-Perpus') {{ "selected" }} @endif>Staff Perpustakaan</option> --}}
                                        </select>
                                  </div>

                                  <div class="form-group">
                                        <label for="mapel">Mata Pelajaran</label>
                                        <input type="text" class="form-control @error('mapel') is-invalid @enderror" name="mapel" id="mapel" value="{{ old('mapel') }}"  placeholder="mapel" autofocus>
                                        @error('mapel')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                  <div class="form-group d-flex justify-content-end">
                                    <a class="btn btn-default " href="{{ route('guru.index') }}">Batal</a>
                                    <button type="submit" class="btn btn-primary ml-2">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                            <!-- /.col-md -->
                            <div class="col-md-1"></div>
                        </div>
                        <div class="row">
                            <div class="col-12">


                            </div>
                        </div>
                    </form>
                    </div>
                    <!-- /.card-body -->
                    {{-- <div class="card-footer clearfix">
                        tes
                    </div> --}}
                </div>
                <!-- /.card -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
@endsection

@section('scripts')
<script>

        $(document).ready(function () {

            $('.foto').dropify({
                messages: {
                    'default': '',
                    'replace': 'Drag and drop or click to replace',
                    'remove':  'Remove',
                    'error':   'Ooops, something wrong happended.'
                }
            });

        });

</script>

@endsection
