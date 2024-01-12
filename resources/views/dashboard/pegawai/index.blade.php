@extends('dashboard.master')
@section('title', 'Data Pegawai - PT. Shiddiq Sarana Mulya')

@section('custom-css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
@endsection
@section('content')

<style>
.marginCard {
    margin-bottom: 10px;
}

@media only screen and (min-width: 400px) and (max-width: 767px) {
    .marginResponsive {
        margin-top: 25px;
    }
}
</style>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin marginResponsive">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('Data Pegawai') }}</h4>
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif

                    <div class="table-responsive">
                        <table id="dataTable" class="table">
                            <thead>
                                <tr>
                                    <button type="button"
                                        class="btn btn-primary btn-sm btn-rounded btn-icon-text marginCard"
                                        data-toggle="modal" data-target="#create">
                                        <i class="ti-upload btn-icon-prepend"></i>Create</button>
                                </tr>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Tempat Tanggal Lahir</th>
                                    {{-- <th>Tanggal Lahir</th> --}}
                                    <th>Jenis Kelamin</th>
                                    <th>Pengalaman</th>
                                    <th>Bidang Keahlian</th>
                                    <th>Pendidikan</th>
                                    <th>Posisi Jabatan</th>
                                    <th>Usia</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach($data as $row)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$row->nama}}</td>
                                        {{-- <td>{{$row->tempat_lahir}}</td> --}}
                                        <td>{{$row->tempat_lahir}}, {{ \Carbon\Carbon::parse($row->tanggal_lahir)->format('d F Y') }}</td>
                                        <td>{{$row->jenis_kelamin}}</td>
                                        <td>{{$row->range_pengalaman}}</td>
                                        <td>{{$row->range_keahlian}}</td>
                                        <td>{{$row->range_pendidikan}}</td>
                                        <td>{{$row->range_posisi_jabatan}}</td>
                                        <td>{{$row->range_usia}}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-dark btn-sm btn-rounded btn-icon-prepend"
                                                data-toggle="modal" data-target="#edit{{$row->id}}">
                                                <i class="ti-reload btn-icon-prepend"></i>Edit</button>
                                            <a href="{{route('deletePegawai', ['id'=>$row->id])}}" 
                                                class="btn btn-danger btn-rounded btn-icon-text"
                                                onclick="return confirm('Apakah anda yakin ?')">Delete
                                                <i class="ti-trash btn-icon-append"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create Data Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('createPegawai')}}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" required style="text-transform: capitalize;">
                    </div>
                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" required style="text-transform: capitalize;">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select type="text" name="jenis_kelamin" class="form-control">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="pengalaman" class="form-label">Pengalaman</label>
                        <select type="text" name="pengalaman" class="form-control">
                            @foreach($pengalaman as $row)
                                <option value="{{$row->id}}">{{$row->range}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="bidang_keahlian" class="form-label">Bidang Keahlian</label>
                        <select type="text" name="bidang_keahlian" class="form-control">
                            @foreach($bidang_keahlian as $row)
                                <option value="{{$row->id}}">{{$row->range}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="pendidikan" class="form-label">Pendidikan</label>
                        <select type="text" name="pendidikan" class="form-control">
                            @foreach($pendidikan as $row)
                                <option value="{{$row->id}}">{{$row->range}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="posisi_jabatan" class="form-label">Posisi Jabatan</label>
                        <select type="text" name="posisi_jabatan" class="form-control">
                            @foreach($posisi_jabatan as $row)
                                <option value="{{$row->id}}">{{$row->range}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="usia" class="form-label">Usia</label>
                        <select type="text" name="usia" class="form-control">
                            @foreach($usia as $row)
                                <option value="{{$row->id}}">{{$row->range}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-rounded"
                        style="margin-left:5px; margin:auto;">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit -->
@foreach($data as $row)
    <div class="modal fade" id="edit{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle{{$row->id}}"
    aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle{{$row->id}}">Edit Data Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('updatePegawai', ['id'=>$row->id])}}" method="POST">
                    <div class="modal-body">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" required 
                            style="text-transform: capitalize;" value="{{$row->nama}}">
                        </div>
                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" required 
                            style="text-transform: capitalize;" value="{{$row->tempat_lahir}}">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" required
                            value="{{$row->tanggal_lahir}}">
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select type="text" name="jenis_kelamin" class="form-control">
                                <option value="Laki-laki" {{ $row->jenis_kelamin == "Laki-laki" ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ $row->jenis_kelamin == "Perempuan" ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="pengalaman" class="form-label">Pengalaman</label>
                            <select type="text" name="pengalaman" class="form-control">
                                @foreach($pengalaman as $rows)
                                    <option value="{{$rows->id}}" {{ $rows->id == $row->pengalaman_id ? 'selected' : '' }}>
                                        {{$rows->range}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="bidang_keahlian" class="form-label">Bidang Keahlian</label>
                            <select type="text" name="bidang_keahlian" class="form-control">
                                @foreach($bidang_keahlian as $rows)
                                    <option value="{{$rows->id}}" {{ $rows->id == $row->bidang_keahlian_id ? 'selected' : '' }}>
                                        {{$rows->range}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="pendidikan" class="form-label">Pendidikan</label>
                            <select type="text" name="pendidikan" class="form-control">
                                @foreach($pendidikan as $rows)
                                    <option value="{{$rows->id}}" {{ $rows->id == $row->pendidikan_id ? 'selected' : '' }}>
                                        {{$rows->range}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="posisi_jabatan" class="form-label">Posisi Jabatan</label>
                            <select type="text" name="posisi_jabatan" class="form-control">
                                @foreach($posisi_jabatan as $rows)
                                    <option value="{{$rows->id}}" {{ $rows->id == $row->posisi_jabatan_id ? 'selected' : '' }}>
                                        {{$rows->range}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="usia" class="form-label">Usia</label>
                            <select type="text" name="usia" class="form-control">
                                @foreach($usia as $rows)
                                    <option value="{{$rows->id}}" {{ $rows->id == $row->usia_id ? 'selected' : '' }}>
                                        {{$rows->range}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-rounded"
                            style="margin-left:5px; margin:auto;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">

</script>
<script>
$(document).ready(function() {
    $('#dataTable').DataTable();

});
</script>
@endsection