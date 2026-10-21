<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ویرا؛ تبلیغات متحرک شهری با نمایشگر LED در تهران">
    <title>ویرا | Vira — تبلیغات متحرک شهری</title>
    <link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
    <link href="https://fonts.bunny.net/css?family=vazirmatn:400,500,600,700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="vira-home-header">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="vira-home-brand" href="#home">Vira <span>ویرا</span></a>
                <button
                    class="navbar-toggler vira-home-navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#viraHomeNav"
                    aria-controls="viraHomeNav"
                    aria-expanded="false"
                    aria-label="باز و بسته کردن منو"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="viraHomeNav">
                    <ul class="navbar-nav vira-home-nav mx-lg-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#home">خانه</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">درباره ما</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">خدمات</a></li>
                        <li class="nav-item"><a class="nav-link" href="#campaigns">نمونه تبلیغات</a></li>
                        <li class="nav-item"><a class="nav-link" href="#pricing">تعرفه‌ها</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">تماس با ما</a></li>
                    </ul>
                    <a class="vira-home-btn vira-home-btn-gold" href="#contact">درخواست مشاوره</a>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section class="vira-home-hero" id="home">
            <img
                class="vira-home-hero-media"
                src="{{ asset('assets/images/hero-vira.jpg') }}"
                alt="ون تبلیغاتی ویرا با نمایشگر LED در خیابان‌های تهران با برج میلاد در پس‌زمینه"
                width="1600"
                height="900"
                fetchpriority="high"
                decoding="async"
            >
            <div class="vira-home-hero-overlay" aria-hidden="true"></div>
            <div class="container vira-home-hero-content">
                <h1 class="vira-home-hero-title vira-home-fade-up">تبلیغات شما در حرکت، در قلب تهران</h1>
                <p class="vira-home-hero-text vira-home-fade-up vira-home-fade-up-delay">
                    ویرا برند شما را با نمایشگرهای LED متحرک در مسیرهای پرترافیک شهری به مخاطبان می‌رساند؛
                    حضوری مدرن، لوکس و قابل‌مشاهده در بافت شهر.
                </p>
                <div class="vira-home-hero-actions vira-home-fade-up vira-home-fade-up-delay">
                    <a class="vira-home-btn vira-home-btn-gold" href="#contact">درخواست مشاوره</a>
                    <a class="vira-home-btn vira-home-btn-light" href="#campaigns">مشاهده نمونه‌ها</a>
                </div>
            </div>
        </section>

        <section class="vira-home-section vira-home-benefits" id="benefits" aria-labelledby="benefits-title">
            <div class="container">
                <div class="vira-home-section-head">
                    <h2 class="vira-home-section-title" id="benefits-title">چرا تبلیغات متحرک؟</h2>
                    <p class="vira-home-section-lead">مزیت‌هایی که حضور برند شما را در شهر ملموس‌تر می‌کند.</p>
                </div>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-3">
                        <article class="vira-home-benefit">
                            <h3>دیده‌شدن در شهر</h3>
                            <p>حضور مداوم در فضاهای عمومی و مسیرهای پرتردد شهری.</p>
                        </article>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <article class="vira-home-benefit">
                            <h3>پوشش مسیرها</h3>
                            <p>امکان برنامه‌ریزی حرکت بر اساس مناطق و محورهای هدف.</p>
                        </article>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <article class="vira-home-benefit">
                            <h3>تبلیغات دیجیتال</h3>
                            <p>نمایش محتوای پویا و به‌روزرسانی‌پذیر روی نمایشگر LED.</p>
                        </article>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <article class="vira-home-benefit">
                            <h3>هدف‌گیری مخاطبان</h3>
                            <p>تمرکز روی زمان، مکان و بافت مخاطبانی که برای برند شما مهم‌اند.</p>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <section class="vira-home-section vira-home-about" id="about" aria-labelledby="about-title">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="vira-home-section-head mb-0">
                            <h2 class="vira-home-section-title" id="about-title">معرفی ویرا</h2>
                            <p class="vira-home-section-lead">
                                ویرا در حوزه تبلیغات متحرک شهری فعالیت می‌کند و با ون‌های مجهز به نمایشگر LED،
                                امکان اجرای کمپین‌های بصری در سطح تهران را فراهم می‌سازد. از طراحی محتوا تا برنامه‌ریزی مسیر،
                                تمرکز ما بر ارائه حضوری شفاف، حرفه‌ای و متناسب با هویت برند شماست.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="vira-home-stat">
                                    <span class="vira-home-stat-value">—</span>
                                    <p class="vira-home-stat-label">ون فعال</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="vira-home-stat">
                                    <span class="vira-home-stat-value">—</span>
                                    <p class="vira-home-stat-label">کمپین اجراشده</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="vira-home-stat">
                                    <span class="vira-home-stat-value">—</span>
                                    <p class="vira-home-stat-label">منطقه قابل پوشش</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="vira-home-stat">
                                    <span class="vira-home-stat-value">—</span>
                                    <p class="vira-home-stat-label">ساعت نمایش ماهانه</p>
                                </div>
                            </div>
                        </div>
                        <p class="vira-home-map-caption mb-0">اعداد آماری پس از نهایی‌شدن داده‌های واقعی قابل ویرایش هستند.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="vira-home-section vira-home-services" id="services" aria-labelledby="services-title">
            <div class="container">
                <div class="vira-home-section-head">
                    <h2 class="vira-home-section-title" id="services-title">خدمات</h2>
                    <p class="vira-home-section-lead">سه محور اصلی برای اجرای کمپین‌های تبلیغات متحرک.</p>
                </div>
                <div class="row g-4">
                    <div class="col-md-4">
                        <article class="vira-home-service">
                            <h3>نمایش محتوای دیجیتال</h3>
                            <p>پخش ویدیو، موشن و پیام‌های برند روی نمایشگرهای LED با کیفیت مناسب فضای شهری.</p>
                        </article>
                    </div>
                    <div class="col-md-4">
                        <article class="vira-home-service">
                            <h3>پوشش مسیرهای هدفمند</h3>
                            <p>طراحی حرکت در محورها و محدوده‌هایی که بیشترین هم‌خوانی را با مخاطب برند شما دارند.</p>
                        </article>
                    </div>
                    <div class="col-md-4">
                        <article class="vira-home-service">
                            <h3>کمپین‌های اختصاصی</h3>
                            <p>برنامه‌ریزی زمان‌بندی، محتوا و مسیر متناسب با اهداف هر کمپین.</p>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <section class="vira-home-section vira-home-coverage" id="coverage" aria-labelledby="coverage-title">
            <div class="container">
                <div class="vira-home-section-head">
                    <h2 class="vira-home-section-title" id="coverage-title">پوشش مسیرها</h2>
                    <p class="vira-home-section-lead">نمای مفهومی از برنامه‌ریزی مسیر در بافت تهران؛ نشانگرها صرفاً تزئینی هستند.</p>
                </div>
                <div class="vira-home-map" role="img" aria-label="نقشه مفهومی تهران با نشانگرهای تزئینی مسیر">
                    <div class="vira-home-map-grid" aria-hidden="true"></div>
                    <div class="vira-home-map-route vira-home-map-route-1" aria-hidden="true"></div>
                    <div class="vira-home-map-route vira-home-map-route-2" aria-hidden="true"></div>
                    <span class="vira-home-map-pin vira-home-map-pin-1" aria-hidden="true"></span>
                    <span class="vira-home-map-pin vira-home-map-pin-2" aria-hidden="true"></span>
                    <span class="vira-home-map-pin vira-home-map-pin-3" aria-hidden="true"></span>
                    <span class="vira-home-map-pin vira-home-map-pin-4" aria-hidden="true"></span>
                </div>
                <p class="vira-home-map-caption">این بخش ادعای پوشش قطعی یا مسیر تأییدشده ندارد و برای نمایش مفهومی طراحی شده است.</p>
            </div>
        </section>

        <section class="vira-home-section vira-home-campaigns" id="campaigns" aria-labelledby="campaigns-title">
            <div class="container">
                <div class="vira-home-section-head">
                    <h2 class="vira-home-section-title" id="campaigns-title">نمونه تبلیغات</h2>
                    <p class="vira-home-section-lead">گالری تصویری مفهومی از فضای تبلیغات متحرک؛ نمونه‌ها به‌عنوان کمپین واقعی اجراشده معرفی نمی‌شوند.</p>
                </div>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4">
                        <article class="vira-home-campaign-card">
                            <div class="vira-home-campaign-media" role="img" aria-label="نمونه مفهومی ون تبلیغاتی در فضای شهری"></div>
                            <div class="vira-home-campaign-body">
                                <h3>نمایش روز در محورهای مرکزی</h3>
                                <p>نمونه بصری از حضور نمایشگر LED در بافت شهری.</p>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <article class="vira-home-campaign-card">
                            <div class="vira-home-campaign-media" role="img" aria-label="نمونه مفهومی کمپین شبانه روی نمایشگر متحرک"></div>
                            <div class="vira-home-campaign-body">
                                <h3>نمایش شبانه و نورپردازی شهری</h3>
                                <p>نمای مفهومی از خوانایی محتوا در ساعات شب.</p>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <article class="vira-home-campaign-card">
                            <div class="vira-home-campaign-media" role="img" aria-label="نمونه مفهومی محتوای برند روی نمایشگر LED"></div>
                            <div class="vira-home-campaign-body">
                                <h3>محتوای برند روی LED</h3>
                                <p>نمونه چیدمان بصری برای پیام‌های کوتاه و واضح.</p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <section class="vira-home-section" id="pricing" aria-labelledby="pricing-title">
            <div class="container">
                <div class="vira-home-section-head text-center mx-auto" style="max-width: 40rem;">
                    <h2 class="vira-home-section-title" id="pricing-title">تعرفه‌ها</h2>
                    <p class="vira-home-section-lead mx-auto">
                        جزئیات تعرفه بر اساس مدت اجرا، مسیر و نوع محتوا تعیین می‌شود.
                        برای دریافت پیشنهاد متناسب با کمپین خود، درخواست مشاوره ثبت کنید.
                    </p>
                    <div class="mt-4">
                        <a class="vira-home-btn vira-home-btn-gold" href="#contact">دریافت پیشنهاد قیمت</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="vira-home-section vira-home-cta" aria-labelledby="cta-title">
            <div class="container">
                <h2 id="cta-title">آماده‌اید برند شما در حرکت دیده شود؟</h2>
                <a class="vira-home-btn vira-home-btn-gold" href="#contact">درخواست مشاوره</a>
            </div>
        </section>
    </main>

    <footer class="vira-home-footer" id="contact">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-5">
                    <h3 class="h5 mb-3">ویرا | Vira</h3>
                    <p class="mb-0">
                        شرکت تبلیغات متحرک شهری با تمرکز بر نمایش محتوای برند روی ون‌های مجهز به LED در تهران.
                    </p>
                </div>
                <div class="col-6 col-lg-3">
                    <h4 class="h6 mb-3">لینک‌ها</h4>
                    <ul class="vira-home-footer-links">
                        <li><a href="#home">خانه</a></li>
                        <li><a href="#about">درباره ما</a></li>
                        <li><a href="#services">خدمات</a></li>
                        <li><a href="#campaigns">نمونه تبلیغات</a></li>
                        <li><a href="#pricing">تعرفه‌ها</a></li>
                        <li><a href="#contact">تماس با ما</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-4">
                    <h4 class="h6 mb-3">اطلاعات تماس</h4>
                    <ul class="vira-home-footer-links">
                        <li>تلفن: قابل تکمیل</li>
                        <li>ایمیل: قابل تکمیل</li>
                        <li>آدرس: تهران — قابل تکمیل</li>
                    </ul>
                </div>
            </div>
            <div class="vira-home-footer-meta">
                <span>© {{ date('Y') }} ویرا. تمامی حقوق محفوظ است.</span>
            </div>
        </div>
    </footer>
</body>
</html>
