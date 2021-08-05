@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Galeri</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('galeri.index') }}">Galeri</a></li>
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
                            
                            <a href="{{ route('galeri.index')}}" class="btn">
                                <i class="fas fa-arrow-left  text-purple  "></i>
                            </a>
                            
                            <span>Form Tambah Galeri</span>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" >
                        <form method="POST" action="{{ route('galeri.store') }}" enctype="multipart/form-data">
                            @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-8 px-5">
                                <div class="form-group">
                                    <label for="gambar">Media</label>
                                    <input type="file" class="form-control gambar @error('gambar') is-invalid @enderror" name="gambar" id="gambar" value="{{ old('gambar') }}" data-default-file="{{ old('gambar') }}"  data-height="282">
                                    @error('gambar')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group d-flex justify-content-end">
                                    <a class="btn btn-default " href="{{ route('informasi.index') }}">Batal</a>
                                    <button type="submit" class="btn btn-primary ml-2">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                            <!-- /.col-md -->
                        </form>
                            <!-- /.col-md -->
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

        });

</script>



@endsection
