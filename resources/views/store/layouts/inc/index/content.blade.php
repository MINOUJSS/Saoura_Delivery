<!-- HOME -->
<div id="home">
    <!-- container -->
    <div class="container">
        <!-- home wrap -->
        <div class="row">
        <div class="col-xs-12 col-lg-9 home-wrap">
            <!-- home slick -->
            @include('store.layouts.inc.index.home-slick')
            <!-- /home slick -->
        </div>
        </div>
        <!-- /home wrap -->
    </div>
    <!-- /container -->
</div>
<!-- /HOME -->

<!-- section -->
{{-- @include('store.layouts.inc.index.section-new') --}}
<!-- /section -->

<!-- section -->
@include('store.layouts.inc.index.deals')
<!-- /section -->

<!-- section -->
{{-- @include('store.layouts.inc.index.new-collection') --}}
<!-- /section -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        @include('store.layouts.inc.index.latest-products')
        
        <!-- /row -->

        <!-- row -->
        @include('store.layouts.inc.index.picked-for-you')
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->