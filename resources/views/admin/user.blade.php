@extends('layouts.app')

@section('content')
<br>
<br>
<br>
<section>
    <div class="container">
        <h1 class="text-center my-4">User Management Dashboard</h1>
        <!-- Button trigger modal -->
        <div class="mb-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Pengguna
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                        <!-- Form for Adding and Editing User -->
        <div id="newUserForm">
            <form method="POST" action="{{ route('admin.store') }}">
                @csrf
                <div class="form-group">
                    <label for="nik">NIK User:</label>
                    <input type="text" id="nik" name="nik" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="name">Nama User:</label>
                    <input type="text" id="name" name="name" class="form-control" readonly required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" readonly required>
                </div>
                <div class="form-group">
                    <label for="phone">No. Hp:</label>
                    <input type="text" id="phone" name="phone" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
            </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Users Table -->
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->nik }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role ? $user->role->name : 'No Role' }}</td>
                        <td>
                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editUserModal-{{ $user->id }}">Edit</button>
                            <!-- Modal -->
                            <div class="modal fade" id="editUserModal-{{ $user->id }}" tabindex="-1" aria-labelledby="editUserModalLabel-{{ $user->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editUserModalLabel-{{ $user->id }}">Edit User Role</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.updateUserRole', $user->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <div class="form-group">
                                                    <label for="nik-{{ $user->id }}">NIK</label>
                                                    <input type="text" class="form-control" id="nik-{{ $user->id }}" name="nik" value="{{ $user->nik }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="role_id-{{ $user->id }}">Role</label>
                                                    <select class="form-control" id="role_id-{{ $user->id }}" name="role_id">
                                                        @foreach ($roles as $role)
                                                            <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('admin.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <h1 class="text-center my-4">Admin Management</h1>
        <!-- Admin Table -->
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($petugas as $petugas)
                    <tr>
                        <td>{{ $petugas->name }}</td>
                        <td>{{ $petugas->nik }}</td>
                        <td>{{ $petugas->email }}</td>
                        <td>{{ $petugas->role ? $petugas->role->name : 'No Role' }}</td>
                        <td>
                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editUserModal-{{ $petugas->id }}">Edit</button>
                            <!-- Modal -->
                            <div class="modal fade" id="editUserModal-{{ $petugas->id }}" tabindex="-1" aria-labelledby="editUserModalLabel-{{ $petugas->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editUserModalLabel-{{ $petugas->id }}">Edit User Role</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.updateUserRole', $petugas->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <div class="form-group">
                                                    <label for="nik-{{ $petugas->id }}">NIK</label>
                                                    <input type="text" class="form-control" id="nik-{{ $petugas->id }}" name="nik" value="{{ $petugas->nik }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="role_id-{{ $petugas->id }}">Role</label>
                                                    <select class="form-control" id="role_id-{{ $petugas->id }}" name="role_id">
                                                        @foreach ($roles as $role)
                                                            <option value="{{ $role->id }}" {{ $petugas->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('admin.destroy', $petugas->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</section>

<script>
    document.getElementById('nik').addEventListener('change', function() {
        var nik = this.value;
        fetch(`/get-pelanggan/${nik}`, {
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(handleData)
        .catch(handleError);
    });

    document.getElementById('nik').addEventListener('change', function() {
        var nik = this.value;
        fetch(`/get-pelanggan/${nik}`)
            .then(response => response.json())
            .then(data => {
                if(data.status === 'success') {
                    document.getElementById('name').value = data.data.nama;
                    document.getElementById('email').value = data.data.email;
                } else {
                    alert(data.message); // Tampilkan pesan error
                    document.getElementById('name').value = '';
                    document.getElementById('email').value = '';
                }
            })
    });

    document.addEventListener('DOMContentLoaded', function () {
        // Mendapatkan referensi button yang memicu modal
        const addButton = document.querySelector('[data-bs-toggle="modal"]');

        // Mendapatkan referensi modal
        const exampleModal = new bootstrap.Modal(document.getElementById('exampleModal'));

        // Event listener untuk membuka modal
        addButton.addEventListener('click', function () {
            exampleModal.show();
        });

        // Event listener untuk menutup modal menggunakan button close
        document.querySelectorAll('[data-bs-dismiss="modal"]').forEach(button => {
            button.addEventListener('click', function () {
                exampleModal.hide();
            });
        });

        document.querySelector('form').addEventListener('submit', function (e) {
        });
    });
</script>
<br>
<br>
@endsection
