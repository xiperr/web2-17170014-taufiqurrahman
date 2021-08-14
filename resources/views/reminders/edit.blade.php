@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Reminder</div>
                <div class="card-body">
                    <form action="{{ url('reminders', $reminder) }}" method="POST">
                        <input type="hidden" name="_method" value="PUT">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('label')? 'has-error' : '' }}">
                            <label>Label</label>
                            <input type="text" name="label" class="form-control" value="{{$reminder->label}}">
                            {{ $errors->has('label')? $errors->first('label') : '' }}
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description">{{ $reminder->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Due Date</label>
                            <input type="date" name="due_date" class="form-control" value="{{ $reminder->due_date }}">
                        </div>
                        <div class="form-group">
                            <label>Interval</label>
                            @if(isset($interval))
                            <select class="form-control" name="time_unit">
                                <option value="0">Choose one</option>    
                                @foreach($interval as $key => $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>D-day <code>(Number)</code></label>
                            <input type="number" name="d_day" class="form-control" value="{{ $reminder->d_day }}">
                        </div>
                        <div class="form-group">
                            <div class="text-right">
                                <button class="btn btn-primary">
                                    <i class="fa fa-save"></i>&nbsp;
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
