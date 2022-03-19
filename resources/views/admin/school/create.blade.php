@extends('admin.layouts.app')


@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Create School</h1>

                <div class="card mb-4">
                    <div class="card-body">

                        @include('admin.layouts.message')

                        <form method="post" action="{{ url('admin/school') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control" name="name" value="{{ old('name') }}"/>
                                <label for="inputPassword">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <button type="submit" class="btn btn-success">
                                    Save
                                </button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </main>

    </div>

@endsection
