@push('head')
    <meta name="robots" content="noindex" />
    <link
          href="{{ route('platform.resource', ['orchid', 'favicon.svg']) }}"
          {{-- href="/favicon.ico" --}}
          sizes="any"
          type="image/svg+xml"
          id="favicon"
          rel="icon"
    >
@endpush

<div class="h2 fw-light d-flex align-items-center">
   <x-orchid-icon path="info" width="1.2em" height="1.2em"/>

    <p class="ms-3 my-0 d-none d-sm-block">
        ALIAS
        <small class="align-top opacity">Platform</small>
    </p>
</div>
