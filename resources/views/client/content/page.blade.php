@extends('client.index')

@section('page')
<div class="container-fluid" style="margin-top: 100px;">
    <div class="container">
        <div class="card">
            <div class="card-body">

                @if (isset($faq_page))
                {!!$site_faq!!}
                @endif

                @if (isset($terms_page))
                {!!$site_terms!!}
                @endif

                @if (isset($privacy_page))
                {!!$site_privacy!!}
                @endif

                @if (isset($disclaimer_page))
                {!!$site_disclaimer!!}
                @endif

                @if (isset($about_us_page))
                {!!$site_about_us!!}
                @endif

            </div>
        </div>
    </div>
</div>

@endsection
