<div class="row">
    <div class="col-lg-4 col-xs-6">

        <div class="small-box bg-aqua">
            <div class="inner">
                <h3 class="articles_total">0</h3>
                <p>Total Articles</p>
            </div>
            <div class="icon">
                <i class="fa fa-sticky-note-o"></i>
            </div>
            {{--<a href="{{ url('admin/articles') }}" class="small-box-footer">View All<i class="fa fa-arrow-circle-right"></i></a>--}}
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3 class="articles_published">0</h3>
                <p>Published Articles</p>
            </div>
            <div class="icon">
                <i class="fa fa-sticky-note-o"></i>
            </div>
            {{--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3 class="articles_unpublished">0</h3>
                <p>Unpublished Articles</p>
            </div>
            <div class="icon">
                <i class="fa fa-sticky-note-o"></i>
            </div>
            {{--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
        </div>
    </div>
    <!-- ./col -->
    {{--<div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>--}}
    <!-- ./col -->
</div>

@push('scripts')

<script>
    $(document).ready(function () {

        var countUrl = "{{ url('admin/dashboard/count') }}";

        $.getJSON(countUrl, function(result){
            $('.articles_total').text(result.articles_total);
            $('.articles_unpublished').text(result.articles_unpublished);
            $('.articles_published').text(result.articles_published);
        });

    });
</script>

@endpush