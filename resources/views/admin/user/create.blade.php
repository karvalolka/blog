@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление пользователя</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.user.index')}}">Пользователи</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-5">
                        <form action="{{route('admin.user.store')}}" method="POST" class="w-50">
                            @csrf
                            <div class="card-body pl-0 pb-0 pt-0">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name"
                                           placeholder="Имя пользователя">
                                </div>
                                @error('name')
                                <div class="text-danger mb-3">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="card-body pl-0 pb-0 pt-0">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email"
                                           placeholder="email">
                                </div>
                                @error('email')
                                <div class="text-danger mb-3">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group w-50">
                                <label>Выберите роль</label>
                                <select name="role" class="form-control">
                                    @foreach($roles as $id => $role)
                                        <option value="{{$id}}"
                                            {{$id == old('role_id') ? 'selected' : ''}}>
                                            {{$role}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role')
                                <div class="text-danger mb-3">{{$message}}</div>
                                @enderror
                            </div>

                            <input type="submit" class="btn btn-primary" value="Добавить">
                        </form>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
