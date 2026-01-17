{{-- resources/views/frontend/layouts/footer.blade.php --}}

<footer class="footer-wrapper bg-title footer-layout1"
        data-bg-src="{{ asset('assets/img/bg/dot-shape.png') }}"
        role="contentinfo">

    <div class="widget-area py-5">
        <div class="container">
            <div class="row justify-content-between">

                {{-- About / Logo --}}
                <div class="col-md-6 col-xxl-3 col-xl-4 mb-4">
                    <div class="widget footer-widget">
                        <div class="th-widget-about">

                            @if ($footer_logo)
                                <div class="about-logo mb-3">
                                    <a href="{{ url('/') }}">
                                        <img src="{{ asset('storage/'.$footer_logo) }}"
                                             alt="{{ $settings['general']['site_name'] }}"
                                             style="height: 55px;">
                                    </a>
                                </div>
                            @endif

                            @if ($footer_about)
                                <p class="about-text">{{ $footer_about }}</p>
                            @endif

                            {{-- Social Icons --}}
                            @include('frontend.layouts.partials.social-icons', ['social_links' => $social_links])

                        </div>
                    </div>
                </div>

                {{-- Menu Grid 2 --}}
                @if (!empty($footer_menu_2['menus']))
                <div class="col-md-6 col-xl-auto mb-4">
                    @include('frontend.layouts.partials.footer-menu', [
                        'title' => $footer_menu_2['title'] ?? '',
                        'menus' => $footer_menu_2['menus']
                    ])
                </div>
                @endif

                {{-- Menu Grid 3 --}}
                @if (!empty($footer_menu_3['menus']))
                <div class="col-md-6 col-xl-auto mb-4">
                    @include('frontend.layouts.partials.footer-menu', [
                        'title' => $footer_menu_3['title'] ?? '',
                        'menus' => $footer_menu_3['menus']
                    ])
                </div>
                @endif

                {{-- Contact Info --}}
                <div class="col-md-6 col-xl-auto mb-4">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">Contact Us</h3>

                        <div class="th-widget-about">

                            <h4 class="footer-info-title">Address</h4>
                            <p class="footer-info">
                                <i class="fas fa-map-marker-alt me-2"></i>
                                {{ $footer_address }}
                            </p>

                            <h4 class="footer-info-title">Phone</h4>
                            <p class="footer-info">
                                <i class="fa-sharp fa-solid fa-phone me-2"></i>
                                <a class="text-inherit"
                                   href="tel:{{ $settings['general']['site_phone'] }}">
                                    {{ $settings['general']['site_phone'] }}
                                </a>
                            </p>

                            <h4 class="footer-info-title">Email</h4>
                            <p class="footer-info">
                                <i class="fa-sharp fa-solid fa-envelope me-2"></i>
                                <a class="text-inherit"
                                   href="mailto:{{ $settings['general']['site_email'] }}">
                                    {{ $settings['general']['site_email'] }}
                                </a>
                            </p>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Copyright --}}
    <div class="copyright-wrap text-center py-3">
        <p class="copyright-text m-0">
            {{ $footer_copy }}
        </p>
    </div>

</footer>

{{-- Back-to-top circular progress --}}
<div class="scroll-top">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
    </svg>
</div>
