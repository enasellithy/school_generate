@extends('admin.layouts.app')


@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Edit School</h1>

                <div class="card mb-4">
                    <div class="card-body">

                        @include('admin.layouts.message')

                        <form action="{{url('admin/student/'.$students->id)}}" novalidate=""
                              enctype="multipart/form-data" class="form-horizontal form-row-seperated"
                              method="post" id="users">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="put">
                            <div class="form-floating mb-3">
                                <input class="form-control" name="name" value="{{ $students->name }}"/>
                                <label for="inputPassword">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select name="school_id" class="form-control">
                                    <option selected disabled>...</option>
                                    @foreach($schools as $v)
                                        <option value="{{ $v->id }}" {{ $students->school_id == $v->id  ? 'selected' : '' }} >
                                            {{ $v->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="inputPassword">School</label>
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
