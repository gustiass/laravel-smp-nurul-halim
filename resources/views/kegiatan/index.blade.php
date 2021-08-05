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
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Kegiatan</li>
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
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('kegiatan.create') }}" class="btn btn-primary">
                                <i class="fas fa-user-plus    "></i>
                                Tambah Data
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        
                        <form action="{{ route('kegiatan.index') }}" method="GET">
                            {{-- @csrf --}}
                            <div class="input-group input-group mb-3 float-right" style="width: 250px;">
                                <input type="text" name="keyword" class="form-control float-right"
                                placeholder="Search" value="{{request()->query('keyword')}}">
    
                                
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                                <div class="input-group-append">
                                    <a href="{{ route('kegiatan.index') }}" title="Refresh" class="btn btn-default"><i class="fas fa-circle-notch    "></i></a>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-head-fixed text-nowrap table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Judul</th>
                                        <th>Jenis</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($kegiatan as $row)
                                        <tr>
                                            <td style="width: 20px">
                                                <div class="btn-group">
                                                    <button type="button" class="btn" data-toggle="dropdown">
                                                        <i class="fas fa-ellipsis-v    "></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ route('kegiatan.edit', $row->id) }}">
                                                                <i class="fas fa-edit    "></i>
                                                                Edit
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="#"
                                                                onclick="handleDelete ({{ $row->id }})">
                                                                <i class="fas fa-trash    "></i>
                                                                Delete
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td style="width: 50px" class="text-center">{{ $loop->iteration + $kegiatan->firstItem() - 1 }}</td>
                                            <td>{{$row->tanggal }} {{ $row->jam }}</td>
                                            <td>{{$row->judul }}</td>
                                            <td>{{$row->jenis }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Data Tidak Ada</td>
                                        </tr>
                                    @endforelse
    
                                </tbody>
                            </table>
                            {{ $kegiatan->appends(['keyword' => request()->query('keyword')])->links() }}
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <span class="text-sm float-right">Total Entries : {{$kegiatan->total()}}</span>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>

<!-- Modal Delete-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Hapus Data kegiatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mt-3">Apakah kamu yakin menghapus Data kegiatan ?</p>
            </div>
            <div class="modal-footer">
                <form action="" method="POST" id="deleteForm">
                    @method('DELETE')
                    @csrf
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak, Kembali</button>
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function handleDelete(id) {
        let form = document.getElementById('deleteForm')
        form.action = `./kegiatan/${id}`
        console.log(form)
        $('#deleteModal').modal('show')
    }

</script>

@error('import_kegiatan')
    {{-- <div class="text-danger small mt-1">{{ $message }}</div> --}}
    <script>
        $(document).ready(function () {
            toastr["error"]('{{ $message }}')
        });
    </script>
@enderror

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
