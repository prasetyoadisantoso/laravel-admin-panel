@extends('client.index')

@section('page')
<div class="container-fluid" style="margin-top: 100px;">
    <div class="container">
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

    </div>
</div>

@endsection
