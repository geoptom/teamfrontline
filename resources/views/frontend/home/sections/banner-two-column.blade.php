@if (isset($banners['banner_two']['status']) && $banners['banner_two']['status'] == 1)
    <section id="wsus__single_banner" class="wsus__single_banner_2 ">
        <div class="container">
            <div class="row">
                @foreach ($banners['banner_two']['banners'] as $banner)
                    <div class="col-xl-6 col-lg-6">
                        <div class="wsus__single_banner_content">
                            <a href="{{ $banner['banner_url'] }}">
                                <img class="img-gluid" src="{{ asset('storage/' . $banner['banner_image']) }}"
                                    alt="">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
@if (isset($banners['banner_three']['status']) && $banners['banner_three']['status'] == 1)
    <section id="wsus__large_banner" class="pt-4">
        <div class="container">
            <div class="row">
                <div class="cl-xl-12">
                    <a href="{{ $banners['banner_three']['banner_url'] }}">
                        <img class="img-gluid" src="{{ asset('storage/' . $banners['banner_three']['banner_image']) }}"
                            alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>
@endif
