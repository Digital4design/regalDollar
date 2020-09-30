
@include('homeheader')

<div class="content">
    <!--SERVICES SECTION START-->
    <section class="thumb-with-text">
        <div class="inner_page_banner">
            <div class="overlay"></div>
            <div class="container">
                <div class="banner_content">
                    <h2>{{ $pageData->name }}</h2>
                    <!--p>We’re open for any suggestion or just to have a chat.</p-->
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                </div>
            </div>
        </div>
</div>

<div class="container">
{!! $pageData->content !!}
 

</div>


	@include('homefooter')

	@include('homescripts')

