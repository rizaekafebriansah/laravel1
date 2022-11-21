@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>CRUD LARAVEL MAHASISWA</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('sisw.create') }}"> Input Siswa</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('succes'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>nim</th>
            <th>nama</th>
            <th width="20px"class="text-center">umur</th>
            <th width="280px"class="text-center">Alamat</th>
            <th width="180px"class="text-center">kota</th>
            <th width="180px"class="text-center">kelas</th>
            <th width="280px"class="text-center">jurusan</th>
            <th width="380px"class="text-center">Action</th>
        </tr>
        @foreach ($sisw as $siswa)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $siswa->nim }}</td>
            <td>{{ $siswa->nama }}</td>
            <td>{{ $siswa->umur }}</td>
            <td>{{ $siswa->Alamat }}</td>
            <td>{{ $siswa->kota }}</td>
            <td>{{ $siswa->kelas }}</td>
            <td>{{ $siswa->jurusan }}</td>
            <td class="text-center">
                <form action="{{ route('sisw.destroy',$siswa->nim) }}" method="POST">

                   <a class="btn btn-info btn-sm" href="{{ route('sisw.show',$siswa->nim) }}">Show</a>

                    <a class="btn btn-primary btn-sm" href="{{ route('sisw.edit',$siswa->nim) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $sisw->links() !!}

@endsection