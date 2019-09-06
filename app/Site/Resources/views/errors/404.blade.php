@extends('site::layouts.master')


@section('content')

    <section class="section-error">
        <div class="container">
            <!-- <div class="row align-items-center content-height"> -->
            <div class="row align-items-center content-height">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    <h1 class="error-title">404</h1>
                    <h2>SORRY</h2>
                    <h6 class="content-gap">The Page You are Looking For Was Not Found</h6>
                    <a class="btn btn-danger" href="{{ url_localised('/') }}" role="button">
                        <i class="fas fa-chevron-circle-left"></i>
                        GO BACK TO HOME PAGE
                    </a>
                </div>
            </div>

        </div>
    </section>


@endsection