@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                Dashboard
            </h1>
        </div>

        <div class="row row-cards">
            <div class="col-6 col-sm-4 col-lg-3">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        {{--<div class="text-right text-green">
                            6%
                            <i class="fe fe-chevron-up"></i>
                        </div>--}}
                        <div class="h1 m-0 articles_total"></div>
                        <div class="text-muted mb-4">New Posts</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-3">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        {{--<div class="text-right text-red">
                            -3%
                            <i class="fe fe-chevron-down"></i>
                        </div>--}}
                        <div class="h1 m-0 articles_published"></div>
                        <div class="text-muted mb-4">Published Posts</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-3">
                <div class="card">
                    <div class="card-body p-3 text-center">
                       {{-- <div class="text-right text-green">
                            9%
                            <i class="fe fe-chevron-up"></i>
                        </div>--}}
                        <div class="h1 m-0 articles_unpublished"></div>
                        <div class="text-muted mb-4">Unpublished Posts</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-3">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        {{--<div class="text-right text-green">
                            3%
                            <i class="fe fe-chevron-up"></i>
                        </div>--}}
                        <div class="h1 m-0 categories"></div>
                        <div class="text-muted mb-4">Categories</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')

    <script>
        $(document).ready(function () {

            var countUrl = "{{ url('admin/dashboard/count') }}";

            $.getJSON(countUrl, function(result){
                $('.articles_total').text(result.articles_total);
                $('.articles_unpublished').text(result.articles_unpublished);
                $('.articles_published').text(result.articles_published);
                $('.categories').text(result.categories);
            });

        });
    </script>

@endpush