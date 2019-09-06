@extends('layouts.master')

@section('raindrops')

    <div class="row">
        <div class="col-md-12">
            <h3 class="mb15p">Database Backup</h3>
            <a type="button" class="btn btn-primary" download href="{{ url('admin/backup-db') }}">Download Database Backup</a>
        </div>
    </div>

@stop
