@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kegiatan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('kegiatan.index') }}">Kegiatan</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
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

                            <a href="{{ route('kegiatan.index')}}" class="btn">
                                <i class="fas fa-arrow-left  text-purple  "></i>
                            </a>

                            <span>Form Edit Kegiatan</span>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" >
                        <form method="POST" action="{{ route('kegiatan.update', $kegiatan->id) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-8 px-3">
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" value="{{ $kegiatan->judul }}"  placeholder="Judul" autofocus>
                                    @error('judul')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" placeholder="Deskripsi" rows="5">{{ $kegiatan->deskripsi }}</textarea>
                                    @error('deskripsi')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="jenis">Jenis</label>
                                    <select name="jenis" id="jenis" class="form-control">
                                        <option value="0" selected disabled>- Pilih Jenis -</option>
                                        <option value="Pengumuman" @if($kegiatan->jenis=='Pengumuman') selected='selected' @endif>Pengumuman</option>
                                        <option value="Agenda" @if($kegiatan->jenis=='Agenda') selected='selected' @endif>Agenda</option>
                                    </select>
                                </div>

                                <div>
                                    <div class="form-group" id="pengumuman" style="display: none">
                                        <label for="tanggal">Tanggal</label>
                                        <input type="date" name="tanggal_pengumuman" id="tanggal_pengumuman" class="form-control" readonly value="{{ date('Y-m-d') }}">
                                        @error('tanggal')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                         @enderror
                                    </div>
                                </div>

                                <div>
                                    <div class="form-group" id="agenda" style="display: none">
                                        <label for="tanggal">Tanggal</label>
                                        <input type="date" name="tanggal_agenda" id="tanggal_agenda" class="form-control" value="{{ $kegiatan->tanggal }}">
                                        @error('tanggal')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                  <div class="form-group d-flex justify-content-end">
                                    <a class="btn btn-default " href="{{ route('kegiatan.index') }}">Batal</a>
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

            $('.gambar').dropify({
                messages: {
                    'default': '',
                    'replace': 'Drag and drop or click to replace',
                    'remove':  'Remove',
                    'error':   'Ooops, something wrong happended.'
                }
            });

            $('#jenis').change(function(){
                let jenis = $(this).val();
                let tanggal = $('#tanggal').val()
                if(jenis == 'Pengumuman'){
                    $('#agenda').hide();
                    $('#tanggal_agenda').hide();
                    $('#pengumuman').show();
                    $('#tanggal_pengumuman').show();
                }else{
                    $('#pengumuman').hide();
                    $('#tanggal_pengumuman').hide();
                    $('#agenda').show();
                    $('#tanggal_agenda').show();
                }
            });

        });

</script>



@endsection
