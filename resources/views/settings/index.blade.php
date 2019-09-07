@extends('layouts.master')

@section('content')
    <form action="{{ route('settings.store') }}" method="POST">
        {{ csrf_field() }}
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                Settings
            </h1>
            <button type="submit" class="btn btn-primary btn-sm m-r-10">Save</button>
        </div>

        <div class="row">

            {{--<div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Active</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                </ul>
            </div>--}}

            <div class="col-lg-12 tab-wrap">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">SEO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Site</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Others</a>
                    </li>
                </ul>


                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card">
                            {{--<div class="card-header">
                                <h3 class="card-title">Panel with custom buttons</h3>
                                <div class="card-options">
                                    <a href="#" class="btn btn-primary btn-sm">Action 1</a>
                                    <a href="#" class="btn btn-secondary btn-sm ml-2">Action 2</a>
                                </div>
                            </div>--}}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Blog name</label>
                                            <input type="text" class="form-control" name="blog_name" value="{{ $data['blog_name'] ?? ''}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Blog tagline</label>
                                            <input type="text" class="form-control" name="blog_tagline" value="{{ $data['blog_tagline'] ?? ''}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">2</div>
                    <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">3</div>
                    <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">4</div>
                </div>
            </div>
            {{--<div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Active</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                </ul>
            </div>--}}
            {{--<ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
            </div>--}}
        </div>
    </div>
    </form>
@endsection

@push('scripts')

    <script>
        $(document).ready(function () {

            var countUrl = "{{ url('admin/dashboard/count') }}";


        });
    </script>

@endpush