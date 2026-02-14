@extends('admin.layouts.master')
@section('title', 'Site Settings')
@section('content')
    <div class="container-fluid">
        <h4 class="mb-4">Site Settings</h4>
        <div class="row">
            <div class="col-md-3">
                <div class="list-group" id="settings-group-list" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="tab-general" data-bs-toggle="list"
                        href="#panel-general" role="tab">General</a>
                    <a class="list-group-item list-group-item-action" id="tab-appearance" data-bs-toggle="list"
                        href="#panel-appearance" role="tab">Appearance</a>
                    {{-- <a class="list-group-item list-group-item-action" id="tab-pusher" data-bs-toggle="list"
                        href="#panel-pusher" role="tab">Pusher</a> --}}
                    <a class="list-group-item list-group-item-action" id="tab-seo" data-bs-toggle="list" href="#panel-seo"
                        role="tab">SEO</a>
                    <a class="list-group-item list-group-item-action" id="tab-footer" data-bs-toggle="list"
                        href="#panel-footer" role="tab">Footer</a>
                    {{-- <a class="list-group-item list-group-item-action" id="tab-integrations" data-bs-toggle="list"
                        href="#panel-integrations" role="tab">Integrations</a> --}}
                    <a class="list-group-item list-group-item-action" id="tab-security" data-bs-toggle="list"
                        href="#panel-security" role="tab">Security</a>
                    <a class="list-group-item list-group-item-action" id="tab-analytics" data-bs-toggle="list"
                        href="#panel-analytics" role="tab">Analytics</a>
                    <a class="list-group-item list-group-item-action" id="tab-banners" data-bs-toggle="list"
                        href="#panel-banners" role="tab">Banners</a>
                    <a class="list-group-item list-group-item-action" id="tab-social" data-bs-toggle="list"
                        href="#panel-social" role="tab">Social</a>
                    <a class="list-group-item list-group-item-action" id="tab-smtp" data-bs-toggle="list"
                        href="#panel-smtp" role="tab">SMTP</a>
                    <a class="list-group-item list-group-item-action" id="tab-contact" data-bs-toggle="list"
                        href="#panel-contact" role="tab">Contact Form</a>
                    {{-- <a class="list-group-item list-group-item-action" id="tab-smtp" data-bs-toggle="list" href="#panel-smtp" role="tab">SMTP</a> --}}
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content" id="settings-group-content">
                    <div class="tab-pane fade show active" id="panel-general" role="tabpanel">
                        <form action="{{ route('admin.settings.update', 'general') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Site Name</label>
                                    <input type="text" name="site_name" class="form-control"
                                        value="{{ $settings['general']['site_name'] ?? '' }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Site Email</label>
                                    <input type="text" name="site_email" class="form-control"
                                        value="{{ $settings['general']['site_email'] ?? '' }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Site Phone</label>
                                    <input type="text" name="site_phone" class="form-control"
                                        value="{{ $settings['general']['site_phone'] ?? '' }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Address</label>
                                    <textarea name="address" class="form-control" rows="2">{{ $settings['general']['address'] ?? '' }}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Currency Icon</label>
                                    <input type="text" name="currency_icon" class="form-control"
                                        value="{{ $settings['general']['currency_icon'] ?? '' }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Time Zone</label>
                                    <input type="text" name="time_zone" class="form-control"
                                        value="{{ $settings['general']['time_zone'] ?? '' }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-theme">Save General Settings</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="panel-appearance" role="tabpanel">
                        <form action="{{ route('admin.settings.update', 'appearance') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="row g-3">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Theme Color 1</label>
                                        <div class="d-flex align-items-center gap-2">
                                            <input type="color" id="themeColor1Picker" name="theme_color"
                                                class="form-control form-control-color"
                                                value="{{ $settings['appearance']['theme_color'] ?? '#B60A6E' }}">
                                            <input type="text" id="themeColor1Hex" class="form-control"
                                                maxlength="7" pattern="#[a-fA-F0-9]{6}" placeholder="#B60A6E"
                                                value="{{ $settings['appearance']['theme_color'] ?? '#B60A6E' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Theme Color 2</label>
                                        <div class="d-flex align-items-center gap-2">
                                            <input type="color" id="themeColor2Picker" name="theme_color2"
                                                class="form-control form-control-color"
                                                value="{{ $settings['appearance']['theme_color2'] ?? '#FFB1DF' }}">
                                            <input type="text" id="themeColor2Hex" class="form-control"
                                                maxlength="7" pattern="#[a-fA-F0-9]{6}" placeholder="#FFB1DF"
                                                value="{{ $settings['appearance']['theme_color2'] ?? '#FFB1DF' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">BG Color 1 (title)</label>
                                        <div class="d-flex align-items-center gap-2">
                                            <input type="color" id="bgColor1Picker" name="bg_smoke"
                                                class="form-control form-control-color"
                                                value="{{ $settings['appearance']['bg_smoke'] ?? '#FFB1DF' }}">
                                            <input type="text" id="bgColor1Hex" class="form-control" maxlength="7"
                                                pattern="#[a-fA-F0-9]{6}" placeholder="#FFB1DF"
                                                value="{{ $settings['appearance']['bg_smoke'] ?? '#FFB1DF' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">BG Color 2</label>
                                        <div class="d-flex align-items-center gap-2">
                                            <input type="color" id="bgColor2Picker" name="bg_smoke2"
                                                class="form-control form-control-color"
                                                value="{{ $settings['appearance']['bg_smoke2'] ?? '#FFE9F5' }}">
                                            <input type="text" id="bgColor2Hex" class="form-control" maxlength="7"
                                                pattern="#[a-fA-F0-9]{6}" placeholder="#FFE9F5"
                                                value="{{ $settings['appearance']['bg_smoke2'] ?? '#FFE9F5' }}">
                                        </div>
                                    </div>
                                </div>

                                @push('scripts')
                                    <script>
                                        function setupColorSync(colorId, hexId) {
                                            const colorPicker = document.getElementById(colorId);
                                            const hexInput = document.getElementById(hexId);

                                            colorPicker.addEventListener('input', () => {
                                                hexInput.value = colorPicker.value.toUpperCase();
                                            });

                                            hexInput.addEventListener('input', () => {
                                                const val = hexInput.value.trim();
                                                if (/^#[0-9A-F]{6}$/i.test(val)) {
                                                    colorPicker.value = val;
                                                }
                                            });
                                        }

                                        document.addEventListener('DOMContentLoaded', function() {
                                            setupColorSync('themeColor1Picker', 'themeColor1Hex');
                                            setupColorSync('themeColor2Picker', 'themeColor2Hex');
                                            setupColorSync('bgColor1Picker', 'bgColor1Hex');
                                            setupColorSync('bgColor2Picker', 'bgColor2Hex');
                                        });
                                    </script>
                                @endpush

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Logo Light</label>
                                    <input type="file" name="logo_light" class="form-control">
                                    @if (!empty($settings['appearance']['logo_light']))
                                        <img src="{{ asset($settings['appearance']['logo_light']) }}" alt=""
                                            style="max-height:60px;" class="mt-2">
                                    @endif
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Logo Dark</label>
                                    <input type="file" name="logo_dark" class="form-control">
                                    @if (!empty($settings['appearance']['logo_dark']))
                                        <img src="{{ asset($settings['appearance']['logo_dark']) }}" alt=""
                                            style="max-height:60px;" class="mt-2">
                                    @endif
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Favicon</label>
                                    <input type="file" name="favicon" class="form-control">
                                    @if (!empty($settings['appearance']['favicon']))
                                        <img src="{{ asset($settings['appearance']['favicon']) }}" alt=""
                                            style="max-height:32px;" class="mt-2">
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-theme">Save Appearance Settings</button>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="panel-pusher" role="tabpanel">
                        <form action="{{ route('admin.settings.update', 'pusher') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Pusher Key</label>
                                    <input type="text" name="pusher_key" class="form-control"
                                        value="{{ $settings['pusher']['pusher_key'] ?? '' }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Pusher Secret</label>
                                    <input type="text" name="pusher_secret" class="form-control"
                                        value="{{ $settings['pusher']['pusher_secret'] ?? '' }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Pusher App ID</label>
                                    <input type="text" name="pusher_app_id" class="form-control"
                                        value="{{ $settings['pusher']['pusher_app_id'] ?? '' }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Pusher Cluster</label>
                                    <input type="text" name="pusher_cluster" class="form-control"
                                        value="{{ $settings['pusher']['pusher_cluster'] ?? '' }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-theme">Save Pusher Settings</button>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="panel-seo" role="tabpanel">
                        <form action="{{ route('admin.settings.update', 'seo') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control"
                                        value="{{ $settings['seo']['meta_title'] ?? '' }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Meta Author</label>
                                    <input type="text" name="meta_author" class="form-control"
                                        value="{{ $settings['seo']['meta_author'] ?? '' }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Meta Keywords</label>
                                    <input type="text" name="meta_keywords" class="form-control"
                                        value="{{ $settings['seo']['meta_keywords'] ?? '' }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Meta Description</label>
                                    <textarea name="meta_description" class="form-control" rows="2">{{ $settings['seo']['meta_description'] ?? '' }}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Meta Image</label>
                                    <input type="file" name="meta_image" class="form-control">
                                    @if (!empty($settings['seo']['meta_image']))
                                        <img src="{{ asset($settings['seo']['meta_image']) }}" alt=""
                                            style="max-height:60px;" class="mt-2">
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-theme">Save SEO Settings</button>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="panel-footer" role="tabpanel">
                        <form method="POST" action="{{ route('admin.settings.update', 'footer') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Footer About</label>
                                    <textarea name="about" class="form-control" rows="2">{{ $settings['footer']['about'] ?? '' }}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Footer Address</label>
                                    <textarea name="address" class="form-control" rows="2">{{ $settings['footer']['address'] ?? '' }}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Footer Copyright</label>
                                    <input type="text" name="copyright" class="form-control"
                                        value="{{ $settings['footer']['copyright'] ?? '' }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Footer Logo</label>
                                    <input type="file" name="logo" class="form-control">
                                    @if (!empty($settings['footer']['logo']))
                                        <img src="{{ asset('storage/' . $settings['footer']['logo']) }}" alt=""
                                            style="max-height:60px;" class="mt-2">
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <h5>Footer Grid 2 Menus</h5>
                            <div id="footer-grid-2-menus">
                                @php $grid2 = json_decode($settings['footer']['grid_2_menus'] ?? '[]', true); @endphp
                                <div class="mb-2">
                                    <label>Grid 2 Title</label>
                                    <input type="text" name="grid_2_title" class="form-control"
                                        value="{{ $grid2['title'] ?? '' }}" placeholder="Grid 2 Title">
                                </div>
                                @foreach ($grid2['menus'] ?? [] as $i => $menu)
                                    <div class="row mb-2">
                                        <div class="col">
                                            <input type="text" name="grid_2_menus[{{ $i }}][name]"
                                                value="{{ $menu['name'] }}" class="form-control" placeholder="Label">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="grid_2_menus[{{ $i }}][url]"
                                                value="{{ $menu['url'] }}" class="form-control" placeholder="Link">
                                        </div>
                                    </div>
                                @endforeach
                                <div class="row mb-2">
                                    <div class="col">
                                        <input type="text" name="grid_2_menus[new][name]" class="form-control"
                                            placeholder="Label">
                                    </div>
                                    <div class="col">
                                        <input type="text" name="grid_2_menus[new][url]" class="form-control"
                                            placeholder="Link">
                                    </div>
                                </div>
                            </div>
                            <h5>Footer Grid 3 Menus</h5>
                            <div id="footer-grid-3-menus">
                                @php $grid3 = json_decode($settings['footer']['grid_3_menus'] ?? '[]', true); @endphp
                                <div class="mb-2">
                                    <label>Grid 3 Title</label>
                                    <input type="text" name="grid_3_title" class="form-control"
                                        value="{{ $grid3['title'] ?? '' }}" placeholder="Grid 3 Title">
                                </div>
                                @foreach ($grid3['menus'] ?? [] as $i => $menu)
                                    <div class="row mb-2">
                                        <div class="col">
                                            <input type="text" name="grid_3_menus[{{ $i }}][name]"
                                                value="{{ $menu['name'] }}" class="form-control" placeholder="Label">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="grid_3_menus[{{ $i }}][url]"
                                                value="{{ $menu['url'] }}" class="form-control" placeholder="Link">
                                        </div>
                                    </div>
                                @endforeach
                                <div class="row mb-2">
                                    <div class="col">
                                        <input type="text" name="grid_3_menus[new][name]" class="form-control"
                                            placeholder="Label">
                                    </div>
                                    <div class="col">
                                        <input type="text" name="grid_3_menus[new][url]" class="form-control"
                                            placeholder="Link">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-theme">Save Footer Settings</button>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="panel-integrations" role="tabpanel">
                        <form action="{{ route('admin.settings.update', 'integrations') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Chat Widget Script</label>
                                    <textarea name="chat_widget" class="form-control" rows="2">{{ $settings['integrations']['chat_widget'] ?? '' }}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Payment Gateway Provider</label>
                                    <input type="text" name="payment_gateway" class="form-control"
                                        value="{{ $settings['integrations']['payment_gateway'] ?? '' }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-theme">Save Integrations Settings</button>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="panel-security" role="tabpanel">
                        <form action="{{ route('admin.settings.update', 'security') }}" method="POST">
                            @csrf

                            @php
                                // Recaptcha value is JSON stored under security.recaptcha
                                $recaptcha = isset($settings['security']['recaptcha'])
                                    ? json_decode($settings['security']['recaptcha'], true)
                                    : ['enabled' => false, 'site_key' => '', 'secret_key' => ''];
                            @endphp

                            <div class="row">

                                <!-- Enable/Disable -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Google reCAPTCHA</label>
                                    <select name="recaptcha_enabled" id="recaptcha_enabled" class="form-select">
                                        <option value="1" {{ $recaptcha['enabled'] ? 'selected' : '' }}>Enabled
                                        </option>
                                        <option value="0" {{ !$recaptcha['enabled'] ? 'selected' : '' }}>Disabled
                                        </option>
                                    </select>
                                    <small class="text-muted">Toggle to enable/disable reCAPTCHA for contact forms.</small>
                                </div>

                                <!-- Site Key -->
                                <div class="col-md-6 mb-3 recaptcha-field">
                                    <label class="form-label">Site Key</label>
                                    <input type="text" name="recaptcha_site_key" class="form-control"
                                        value="{{ $recaptcha['site_key'] ?? '' }}">
                                </div>

                                <!-- Secret Key -->
                                <div class="col-md-6 mb-3 recaptcha-field">
                                    <label class="form-label">Secret Key</label>
                                    <input type="text" name="recaptcha_secret_key" class="form-control"
                                        value="{{ $recaptcha['secret_key'] ?? '' }}">
                                </div>

                                <!-- Test Button -->
                                <div class="col-md-6 mb-3 recaptcha-field">
                                    <label class="form-label d-block">&nbsp;</label>
                                    <button type="button" id="btnTestRecaptcha" class="btn btn-info w-100">
                                        Test reCAPTCHA Keys
                                    </button>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-theme mt-3">Save Security Settings</button>

                            <div id="recaptcha-alert" class="mt-3"></div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="panel-analytics" role="tabpanel">
                        <form action="{{ route('admin.settings.update', 'analytics') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Google Analytics ID</label>
                                    <input type="text" name="google_analytics_id" class="form-control"
                                        value="{{ $settings['analytics']['google_analytics_id'] ?? '' }}">
                                </div>
                                {{-- <div class="col-md-6 mb-3">
                                    <label class="form-label">Google Tag Manager ID</label>
                                    <input type="text" name="google_tag_manager_id" class="form-control"
                                        value="{{ $settings['analytics']['google_tag_manager_id'] ?? '' }}">
                                </div> --}}
                            </div>
                            <button type="submit" class="btn btn-theme">Save Analytics Settings</button>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="panel-banners" role="tabpanel">
                        <form method="POST" action="{{ route('admin.settings.update', 'banners') }}"
                            enctype="multipart/form-data">
                            @csrf
                            @php $banners = json_decode($settings['banners']['homepage'] ?? '{}', true); @endphp
                            <h5>Banner 1</h5>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" name="banner_one_status" class="form-check-input"
                                            id="banner_one_status"
                                            {{ old('banner_one_status', $banners['banner_one']['status'] ?? 1) ? 'checked' : '' }}
                                            value="1">
                                        <label class="form-check-label" for="banner_one_status">Enable</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    @if (isset($banners['banner_one']['banner_image']))
                                        <img src="{{ asset('storage/' . $banners['banner_one']['banner_image']) }}"
                                            height="60">
                                    @endif
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Banner 1 Image</label>
                                    <input type="file" name="banner_one_image" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Banner 1 URL</label>
                                    <input type="text" name="banner_one_url" class="form-control"
                                        value="{{ $banners['banner_one']['banner_url'] ?? '' }}">
                                </div>
                            </div>
                            <hr>
                            <h5>Banner 2</h5>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" name="banner_two_status" class="form-check-input"
                                            id="banner_two_status"
                                            {{ old('banner_two_status', $banners['banner_two']['status'] ?? 1) ? 'checked' : '' }}
                                            value="1">
                                        <label class="form-check-label" for="banner_two_status">Enable</label>
                                    </div>
                                </div>
                                @for ($i = 0; $i < 2; $i++)
                                    <div class="col-md-6 mb-3">
                                        @if (isset($banners['banner_two']['banners'][$i]['banner_image']))
                                            <img src="{{ asset('storage/' . $banners['banner_two']['banners'][$i]['banner_image']) }}"
                                                height="60">
                                        @endif
                                    </div>
                                @endfor
                                @for ($i = 0; $i < 2; $i++)
                                    <div class="col-md-6 mb-3">
                                        <label> Image {{ $i + 1 }}</label>
                                        <input type="file" name="banner_two_image_{{ $i }}"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label> URL {{ $i + 1 }}</label>
                                        <input type="text" name="banner_two_url_{{ $i }}"
                                            class="form-control"
                                            value="{{ $banners['banner_two']['banners'][$i]['banner_url'] ?? '' }}">
                                    </div>
                                @endfor
                            </div>

                            <hr>
                            <h5>Banner 3</h5>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" name="banner_three_status" class="form-check-input"
                                            id="banner_three_status"
                                            {{ old('banner_three_status', $banners['banner_three']['status'] ?? 1) ? 'checked' : '' }}
                                            value="1">
                                        <label class="form-check-label" for="banner_three_status">Enable</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    @if (isset($banners['banner_three']['banner_image']))
                                        <img src="{{ asset('storage/' . $banners['banner_three']['banner_image']) }}"
                                            height="60">
                                    @endif
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Banner 1 Image</label>
                                    <input type="file" name="banner_three_image" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Banner 1 URL</label>
                                    <input type="text" name="banner_three_url" class="form-control"
                                        value="{{ $banners['banner_three']['banner_url'] ?? '' }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-theme">Save Banners</button>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="panel-social" role="tabpanel">
                        <form action="{{ route('admin.settings.update', 'social') }}" method="POST">
                            @csrf
                            @php
                                $socialLinks = json_decode($settings['social']['links'] ?? '[]', true);
                            @endphp
                            <div id="social-links-repeater">
                                @foreach ($socialLinks as $i => $social)
                                    <div class="row align-items-end mb-2 social-row">
                                        <div class="col-md-3">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="social_links[{{ $i }}][title]"
                                                class="form-control" value="{{ $social['title'] ?? '' }}"
                                                placeholder="Title">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Icon</label>
                                            <select name="social_links[{{ $i }}][icon]" class="form-select">
                                                <option value="fab fa-facebook-f"
                                                    @if (($social['icon'] ?? '') == 'fab fa-facebook-f') selected @endif>Facebook</option>
                                                <option value="fab fa-linkedin-in"
                                                    @if (($social['icon'] ?? '') == 'fab fa-linkedin-in') selected @endif>LinkedIn</option>
                                                <option value="fab fa-instagram"
                                                    @if (($social['icon'] ?? '') == 'fab fa-instagram') selected @endif>Instagram</option>
                                                <option value="fab fa-twitter"
                                                    @if (($social['icon'] ?? '') == 'fab fa-twitter') selected @endif>Twitter</option>
                                                <option value="fab fa-youtube"
                                                    @if (($social['icon'] ?? '') == 'fab fa-youtube') selected @endif>YouTube</option>
                                                <option value="fab fa-whatsapp"
                                                    @if (($social['icon'] ?? '') == 'fab fa-whatsapp') selected @endif>WhatsApp</option>
                                                <option value="fab fa-pinterest"
                                                    @if (($social['icon'] ?? '') == 'fab fa-pinterest') selected @endif>Pinterest</option>
                                                <option value="fab fa-telegram"
                                                    @if (($social['icon'] ?? '') == 'fab fa-telegram') selected @endif>Telegram</option>
                                                <option value="fab fa-github"
                                                    @if (($social['icon'] ?? '') == 'fab fa-github') selected @endif>GitHub</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">URL</label>
                                            <input type="text" name="social_links[{{ $i }}][url]"
                                                class="form-control" value="{{ $social['url'] ?? '' }}"
                                                placeholder="URL">
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button"
                                                class="btn btn-danger remove-social-row">Remove</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-success" id="add-social-row">Add Social
                                        Link</button>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-theme">Save Social Settings</button>
                        </form>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                var repeater = document.getElementById('social-links-repeater');
                                var addBtn = document.getElementById('add-social-row');
                                addBtn.addEventListener('click', function() {
                                    var index = repeater.querySelectorAll('.social-row').length;
                                    var row = document.createElement('div');
                                    row.className = 'row align-items-end mb-2 social-row';
                                    row.innerHTML = `
                                    <div class="col-md-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" name="social_links[${index}][title]" class="form-control" placeholder="Title">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Icon</label>
                                        <select name="social_links[${index}][icon]" class="form-select">
                                            <option value="fab fa-facebook-f">Facebook</option>
                                            <option value="fab fa-linkedin-in">LinkedIn</option>
                                            <option value="fab fa-instagram">Instagram</option>
                                            <option value="fab fa-twitter">Twitter</option>
                                            <option value="fab fa-youtube">YouTube</option>
                                            <option value="fab fa-whatsapp">WhatsApp</option>
                                            <option value="fab fa-pinterest">Pinterest</option>
                                            <option value="fab fa-telegram">Telegram</option>
                                            <option value="fab fa-github">GitHub</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">URL</label>
                                        <input type="text" name="social_links[${index}][url]" class="form-control" placeholder="URL">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger remove-social-row">Remove</button>
                                    </div>
                                `;
                                    repeater.appendChild(row);
                                });
                                repeater.addEventListener('click', function(e) {
                                    if (e.target.classList.contains('remove-social-row')) {
                                        e.target.closest('.social-row').remove();
                                    }
                                });
                            });
                        </script>
                    </div>


                    <div class="tab-pane fade" id="panel-smtp" role="tabpanel">
                        <form action="{{ route('admin.settings.update', 'mail') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Mailer</label>
                                    <input type="text" name="mail_mailer" class="form-control"
                                        value="{{ $settings['mail']['mail_mailer'] ?? '' }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Host</label>
                                    <input type="text" name="mail_host" class="form-control"
                                        value="{{ $settings['mail']['mail_host'] ?? '' }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Port</label>
                                    <input type="text" name="mail_port" class="form-control"
                                        value="{{ $settings['mail']['mail_port'] ?? '' }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="mail_username" class="form-control"
                                        value="{{ $settings['mail']['mail_username'] ?? '' }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="text" name="mail_password" class="form-control"
                                        value="{{ $settings['mail']['mail_password'] ?? '' }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Encryption</label>
                                    <input type="text" name="mail_encryption" class="form-control"
                                        value="{{ $settings['mail']['mail_encryption'] ?? '' }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">From Address</label>
                                    <input type="text" name="mail_from_address" class="form-control"
                                        value="{{ $settings['mail']['mail_from_address'] ?? '' }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">From Name</label>
                                    <input type="text" name="mail_from_name" class="form-control"
                                        value="{{ $settings['mail']['mail_from_name'] ?? '' }}">
                                </div>
                            </div>
                            <!-- Test SMTP -->
                            <div class="row">

                                <div class="col-md-5 mb-3">
                                    <button type="button" id="btnTestSmtp" class="btn btn-theme w-100">
                                        Send Test SMTP Email
                                    </button>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <button type="submit" class="btn btn-theme w-100">Save Mail Settings</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="panel-contact" role="tabpanel">
                        <form action="{{ route('admin.settings.update', 'contact') }}" method="POST">
                            @csrf

                            <div class="row">

                                <!-- Enable/Disable forwarding -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Forward Incoming Messages</label>
                                    <select name="forward_enabled" class="form-select">
                                        <option value="1"
                                            {{ ($settings['contact']['forward_enabled'] ?? 0) == 1 ? 'selected' : '' }}>
                                            Enabled</option>
                                        <option value="0"
                                            {{ ($settings['contact']['forward_enabled'] ?? 0) == 0 ? 'selected' : '' }}>
                                            Disabled</option>
                                    </select>
                                    <small class="text-muted">If enabled, all messages will be forwarded to selected
                                        email(s).</small>
                                </div>

                                <!-- Forward to -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Forward To Email(s)</label>
                                    <input type="text" name="forward_to" class="form-control"
                                        placeholder="Comma separated emails"
                                        value="{{ $settings['contact']['forward_to'] ?? '' }}">
                                    <small class="text-muted">Example: info@example.com, support@example.com</small>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-theme mt-3">Save Contact Settings</button>

                        </form>
                    </div>
                    <div id="contact-setting-alert" class="mt-3"></div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            document.getElementById('btnTestSmtp').addEventListener('click', function() {
                let payload = {
                    mail_host: document.querySelector('input[name="mail_host"]').value,
                    mail_port: document.querySelector('input[name="mail_port"]').value,
                    mail_username: document.querySelector('input[name="mail_username"]').value,
                    mail_password: document.querySelector('input[name="mail_password"]').value,
                    mail_encryption: document.querySelector('input[name="mail_encryption"]').value || ''
                };

                const alertBox = document.getElementById('contact-setting-alert');
                alertBox.innerHTML =
                    '<div class="alert alert-info">Testing SMTP (this may take a few seconds)...</div>';

                fetch("{{ route('admin.settings.test.smtp.advanced') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(payload)
                    })
                    .then(r => r.json().then(j => ({
                        ok: r.ok,
                        body: j
                    })))
                    .then(result => {
                        const data = result.body;
                        if (result.ok && data.status === 'success') {
                            alertBox.innerHTML =
                                `<div class="alert alert-success">${data.message}</div>`;
                        } else {
                            alertBox.innerHTML =
                                `<div class="alert alert-danger">${data.message || 'Unknown error'}</div>`;
                        }
                    })
                    .catch(err => {
                        alertBox.innerHTML =
                            `<div class="alert alert-danger">SMTP test failed: ${err.message}</div>`;
                    });
            });


            // TEST RECAPTCHA
            document.getElementById('btnTestRecaptcha').addEventListener('click', function() {

                let alertBox = document.getElementById('contact-setting-alert');
                alertBox.innerHTML = '<div class="alert alert-info">Testing reCAPTCHA keys...</div>';

                fetch("{{ route('admin.settings.test.recaptcha') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        alertBox.innerHTML = `<div class="alert alert-${data.status}">
                ${data.message}
            </div>`;
                    })
                    .catch(() => {
                        alertBox.innerHTML =
                            '<div class="alert alert-danger">reCAPTCHA test failed due to a server error.</div>';
                    });
            });

        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            function toggleRecaptchaFields() {
                const enabled = document.getElementById("recaptcha_enabled").value;
                const fields = document.querySelectorAll(".recaptcha-field");

                fields.forEach(f => {
                    f.style.display = enabled === "1" ? "block" : "none";
                });
            }

            document.getElementById("recaptcha_enabled")
                .addEventListener("change", toggleRecaptchaFields);

            toggleRecaptchaFields(); // run on page load

        });
    </script>
@endpush
