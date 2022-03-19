@extends('admin.layouts.app')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
@endpush

@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Students</h1>

                <a class="btn btn-primary" href="{{ url('admin/student/create') }}">
                    Create Student
                </a>

                <div class="card mb-4">
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>School</th>
                                <th>Orders</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $k => $i)
                                    <tr>
                                        <td>
                                            {{ ($students->currentpage(1)-1) * $students->perpage() + $k +1 }}
                                        </td>
                                        <td>
                                            {{ $i->name }}
                                        </td>
                                        <td>
                                            {{ $i->schools->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $i->order }}
                                        </td>
                                        <td>


                                            <a class="btn btn-warning" href="{{ url('admin/student/'.$i->id.'/edit') }}">
                                                Edit
                                            </a>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal_{{$i->id}}">
                                                Delete
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal_{{$i->id}}" tabindex="-1"
                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are You Sure ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            {!! Form::open(['method' => 'DELETE','route' => ['student.destroy', $i->id]]) !!}
                                                            <button type="submit" class="btn btn-outline-danger">Approved</button>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </main>

    </div>

@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{ asset('design/js/datatables-simple-demo.js') }}"></script>
@endpush
