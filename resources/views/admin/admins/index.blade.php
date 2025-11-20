@extends('layouts.admin')

@section('title', 'Kelola Admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Admin</h1>
        <a href="{{ route('admin.admins.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Admin
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th>Nama</th>
                            <th>Email</th> <!-- ← TAMBAH KOLOM EMAIL -->
                            <th>Dibuat</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($admins as $admin)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td> <!-- ← TAMPILKAN EMAIL -->
                            <td>{{ $admin->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('admin.admins.edit', $admin) }}" 
                                   class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.admins.destroy', $admin) }}" 
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" 
                                            onclick="return confirm('Yakin hapus admin ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data admin</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            {{ $admins->links() }}
        </div>
    </div>
</div>
@endsection