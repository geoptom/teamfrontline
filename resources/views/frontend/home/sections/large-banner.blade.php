@if(isset($banners['banner_one']['status']) && $banners['banner_one']['status'] ==1)
    <section id="wsus__large_banner">
        <div class="container">
            <div class="row">
                <div class="cl-xl-12">
                        <a href="{{ $banners['banner_one']['banner_url'] }}">
                            <img class="img-gluid" src="{{ asset('storage/'.$banners['banner_one']['banner_image']) }}"
                                alt="">
                        </a>
                </div>
            </div>
        </div>
    </section>
@endif
