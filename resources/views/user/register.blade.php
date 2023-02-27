@extends('app')
@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-md-6">
        @if($errors-> any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }} </p>
        @endforeach
        @endif
        <div class="card">
            <div class="card-body">
             <form method="POST" action="{{ route('register.action') }}">
                @csrf
                <div class="mb-3">
                    <label> Nama <span class="text-danger">*</span></label>
                    <input class="form-control" style="text-transform:capitalize" type="text" name="name" value="{{ old('name') }}" />
                </div>
                <div class="mb-3">
                    <label> Username <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="username" value="{{ old('username') }}" maxlength="10" />
                </div>
                <div class="form-group">
                    <label for="gender"> Jenis Kelamin <span class="text-danger">*</span></label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="genderM" value="Laki-laki">
                        <label class="form-check-label" for="genderM">
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="genderF" value="Perempuan">
                        <label class="form-check-label" for="genderF">
                            Perempuan
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="hobby"> Hobi <span class="text-danger">*</span></label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hobby[]" id="hobby1" value="Olahraga">
                        <label class="form-check-label" for="hobby1">
                            Olahraga
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hobby[]" id="hobby2" value="Membaca Buku">
                        <label class="form-check-label" for="hobby2">
                            Membaca Buku
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hobby[]" id="hobby3" value="Menonton Film">
                        <label class="form-check-label" for="hobby3">
                            Menonton Film
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hobby[]" id="hobby4" value="Memasak">
                        <label class="form-check-label" for="hobby4">
                            Memasak
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label> Email <span class="text-danger">*</span></label>
                    <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="name@example.com"/>
                </div>
                <div class="mb-3">
                    <label> No. Handphone <span class="text-danger">*</span></label>
                    <input class="form-control" type="number" name="telp" value="{{ old('telp') }}" />
                </div>
                <div class="mb-3">
                    <label> Password <span class="text-danger">*</span></label>
                    <input class="form-control" type="password" name="password" minlength="7"/>
                </div>
                <div class="mb-3">
                    <label> Password Confirmation<span class="text-danger">*</span></label>
                    <input class="form-control" type="password" name="password_confirmation" minlength="7"/>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Daftar</button>
                    <input class="btn btn-warning" type="reset" value="Reset">
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <div class="container mt-3">
        <div class="col-md-10 ms-5">
            @if(session('success'))
            <p class="alert alert-success">{{ session('success') }} </p>
            @endif
            <form method="GET">
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">
                        <b> Cari Data </b>
                    </label>
                    <div class="col-sm-10">
                        <input type="search" name="cari" id="cari" class="form-control" placeholder="Cari data berdasarkan Nama/Username" autofocus="true" value="{{$cari}}">
                    </div>
                </div>
            </form>
            <div class="row mt-3">
            <table class="table table-striped">
            <thead>
            <tr class="table-warning">
            <th scope="col">#</th>
            <th scope="col">@sortablelink('name', 'Nama')</th>
            <th scope="col">@sortablelink('gender', 'Jenis Kelamin')</th>
            <th scope="col">@sortablelink('hobby', 'Hobi')</th>
            <th scope="col">@sortablelink('email', 'Email')</th>
            <th scope="col">@sortablelink('telp', 'No Telepon')</th>
            <th scope="col">@sortablelink('username', 'Username')</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach($datauser as $index => $row)
            <tr>
                <th scope="row">{{ $index + $datauser->firstItem() }}</th>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->gender }}</td>
                    <td>{{ $row->hobby }}</td>
                    <td>{{ $row->email }}</td>
                    <td>0{{ $row->telp }}</td>
                    <td>{{ $row->username }}</td>
                    <td>
                <a href="/delete/{{ $row->user_id }}" class="btn btn-danger">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        <!-- {{ $datauser->links() }} -->
        {!! $datauser->appends(Request::except('page'))->render() !!}
            </div>
            </div>
            </div>
        </div>
@endsection