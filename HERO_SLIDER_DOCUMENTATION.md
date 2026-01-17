# Hero Slider Implementation Guide

## Overview
The hero banner slider has been created with full responsive design. It displays slider data from the database and adapts perfectly to different screen sizes.

## File Location
`resources/views/frontend/components/banner/banner-default.blade.php`

## Features

### ✅ Desktop & Tablet View (768px and above)
- Full image background with dark overlay
- Text content overlaid on image:
  - **Title** (h3 - 24px)
  - **Subtitle** (h2 - 48px) 
  - **Button** (white background, clickable)
- Text positioned at bottom-left with 60px padding
- Height: 420-520px depending on screen size

### ✅ Mobile View (Below 768px)
- Only image displayed (text and button hidden)
- Full responsive image using `<picture>` tag
- Height: 330px (optimized for mobile)
- No overlapping content box on mobile

### ✅ Responsive Images
Uses HTML5 `<picture>` element for optimal image loading:
- **Desktop (≥992px)**: Loads `img_desktop`
- **Tablet (768-991px)**: Loads `img_tablet` 
- **Mobile (<768px)**: Loads `img_mobile`

Falls back to previous size if specific image not provided:
```php
$desktop = $slider['img_desktop'] ?? $slider['img_path'];
$tablet = $slider['img_tablet'] ?? $desktop;
$mobile = $slider['img_mobile'] ?? $tablet;
```

## Database Structure Required

The slider data should be stored in `settings` table as JSON under `sliders['homepage']`:

```json
{
  "sliders": {
    "homepage": [
      {
        "status": 1,
        "title": "Premium Services",
        "sub_title": "Experience Excellence",
        "btn_text": "Learn More",
        "btn_link": "/services",
        "img_path": "path/to/fallback.jpg",
        "img_desktop": "path/to/desktop.jpg",
        "img_tablet": "path/to/tablet.jpg",
        "img_mobile": "path/to/mobile.jpg"
      }
    ]
  }
}
```

## Swiper Configuration

The slider uses Swiper.js with the following settings:
```javascript
{
  loop: true,
  effect: "fade",
  autoplay: {
    delay: 4500,
    disableOnInteraction: false
  }
}
```

### To Enable Navigation & Pagination
Uncomment these lines in the template:
```blade
<div class="swiper-button-prev hero-nav"></div>
<div class="swiper-button-next hero-nav"></div>
<div class="swiper-pagination"></div>
```

## CSS Breakpoints

| Breakpoint | Height | Behavior |
|-----------|--------|----------|
| Desktop (≥1200px) | 600px | Full text + image (fully visible) |
| Large Tablet (992-1199px) | 550px | Full text + image |
| Tablet (768-991px) | 500px | Full text + image |
| Mobile (<768px) | 70vh (min 380px) | Image only (reduced height for better UX) |

## Bootstrap Classes Used

- `d-none` / `d-md-block` - Hide text on mobile, show on tablet/desktop
- `gy-4` - Gutter spacing for overlap boxes
- `container` - Responsive container

## Styling Classes

| Class | Purpose |
|-------|---------|
| `.hero-wrapper` | Main container |
| `.hero-swiper` | Swiper container |
| `.hero-img` | Image element |
| `.hero-slide-inner` | Inner flex container |
| `.hero-caption` | Text content wrapper |
| `.hero-btn` | CTA button |
| `.overlap-box` | Bottom overlap cards |
| `.overlap-img` | Overlap images |

## Integration with Home Page

The hero slider is included in `resources/views/frontend/home/home.blade.php`:

```blade
@include('frontend.components.banner._engine', [
    'bannerType' => $banner,
    'products' => $featuredProducts,
    'sliders' => $sliders ?? [],
])
```

## Tips for Best Results

1. **Image Dimensions** (Your current setup):
   - Desktop (1920x1080px): Displays at 600px height, fully visible without cropping
   - Tablet (1200x600px): Displays at 500px height with proper aspect ratio
   - Mobile (750x1200px): Displays at 70vh height, optimized for mobile screens

2. **Image Display**:
   - `object-fit: cover` ensures images fill the entire slider without distortion
   - `object-position: center` keeps focus on image center
   - Images maintain aspect ratio and are cropped to fit the container
   - **Desktop images now fully visible** - no top/bottom cropping

3. **Layout Features**:
   - **Bottom Padding**: Extra bottom padding (80px on desktop, decreasing on smaller screens) ensures buttons stay within the slider
   - **Text & Button**: Positioned at bottom-left with proper spacing to avoid overlapping with the overlap-boxes section
   - **Mobile**: Content centered, text hidden, buttons hidden, showing only image

4. **Text & Typography**:
   - Desktop h2: 42px (main heading)
   - Desktop h3: 18px (subtitle)
   - Responsive sizing scales down on tablet and mobile
   - Keep text concise for better readability
   - Button text should be short (e.g., "Learn More", "Shop Now")

5. **Responsive Padding**:
   - Desktop: 60px top, 80px bottom, 80px sides (ensures button stays visible)
   - Tablet: 50px top, 70px bottom, 60px sides
   - Mobile: 30px all around (centered layout)

6. **Content Management**:
   - Store slider data in admin panel under Settings → Sliders
   - Mark inactive sliders with `status: 0` to hide them
   - Supports multiple sliders (will loop through all with status=1)
   - Ensure button link is provided in `btn_link` field

## Accessibility Features

- Proper semantic HTML with `<picture>` element
- Alt text for all images
- Keyboard accessible links and buttons
- High contrast text over dark overlay (rgba(0,0,0,0.45))

## Browser Support

- Chrome, Firefox, Safari, Edge (all modern versions)
- IE11 partial support (no fade effect)
- Mobile browsers (iOS Safari, Chrome Mobile)
