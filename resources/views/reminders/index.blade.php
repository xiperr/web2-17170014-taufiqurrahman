@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">List Reminders</div>

                <div class="card-body">
                    @if(Session::has('success'))
                    {{ Session::get('success') }}
                    @endif

                    <a href="{{ url('reminders/create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>&nbsp;
                        Tambah Reminder
                    </a>
                    <hr/>
                    <table  id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Label</th>
                                <th>D Day</th>
                                <th>Due date</th>
                                <th>Interval</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($reminders))
                            @foreach($reminders as $key => $value)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $value->label }}</td>
                                <td>{{ $value->d_day }}</td>
                                <td>{{ $value->due_date }}</td>
                                <td>{{ $value->time_unit }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <form action="{{ url('reminders/'.$value->id) }}" method="post">
                                            <input type="hidden" name="_method" value="DELETE">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger confirm">
                                                <i class="fa fa-trash"></i>&nbsp;
                                                Hapus
                                            </button>
                                        </form>
                                        <a href="{{ url('reminders/'.$value->id.'/edit') }}" class="btn btn-primary">
                                            <i class="fa fa-pencil"></i>&nbsp;
                                            Edit
                                        </a>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Label</th>
                                <th>D Day</th>
                                <th>Due date</th>
                                <th>Interval</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
