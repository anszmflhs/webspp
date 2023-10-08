<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>

    <!-- AOS -->
    <link href="{{ asset('/styles/aos.css') }}" rel="stylesheet" />
    <script src="/js/aos.js"></script>

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/nice-select/css/nice-select.css') }}" />

    <!-- ICONSCOUT -->
    <link rel="stylesheet" href="{{ asset('https://unicons.iconscout.com/release/v4.0.0/css/line.css') }}" />
    <link rel="stylesheet" href="{{ asset('https://unicons.iconscout.com/release/v4.0.0/css/solid.css') }}" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('/styles/global.css') }}" />
    <link rel="stylesheet" href="{{ asset('/styles/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <!-- Menu -->
    <script defer src="/js/menu.js"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="{{ asset('https://fonts.googleapis.com') }}" />
    <link rel="preconnect" href="{{ asset('https://fonts.gstatic.com') }}" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />

</head>

<body>
    <!-- =============== HTML =============== -->

    <!-- Navbar -->
    <div class="nav_wrapper">
        <nav>
            <div class="logo">
                <img src="/assets/logo_sij.png" alt="logo_sij">
                {{-- <a class="logo_title text-dark" href="/">Sekolah Indonesia Jeddah<br><span>Berakhlak Mulia Berbudaya
                        Indonesia</span></a> --}}
            </div>
            <div>
                @guest
                    <a href="/login" role="button" class="btn btn-warning text-white">Login</a>
                @else
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Halo,
                                    {{ auth()->user()->name }}</span>
                            </a>
                            @if (auth()->user()->hasRole('admin'))
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/admin">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400">Dashboard</i>
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400">Logout</i>
                                </a>
                            </div>
                            @elseif (auth()->user()->hasRole('petugas'))
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/petugas">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400">Dashboard</i>
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400">Logout</i>
                                </a>
                            </div>
                            @elseif (auth()->user()->hasRole('siswa'))
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/bayarsekarang">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400">Dashboard</i>
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400">Logout</i>
                                </a>
                            </div>
                            @endif
                        </li>
                    </ul>
                @endguest
            </div>
        </nav>
    </div>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin untuk keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Klik Ya jika Anda yakin untuk logout.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-primary" type="submit">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Navbar -->

    <div class="container">
        <!-- Header -->
        <header>
            <div class="header_content">
                <div class="header_text">
                    <h1 class="header_title">Selamat datang<br>Di website</h1>
                </div>
                <div class="header_text">
                    <img src="/assets/title-2.svg" alt="Sekolah Indonesia Jeddah">
                </div>
                <div class="header_text">
                    <img src="/assets/gariskuning-header.png" alt="">
                </div>
            </div>
            <div class="image-header-wrapper">
                <img class="img_header" src="/assets/img-anaksij.png" alt="">
            </div>
            <a class="btn-berita-terbaru-wrapper" href="{{ route('bayarsekarang.create') }}">
                <button class="btn-berita-terbaru">
                    <span class="text-light d-flex align-items-center" style="font-size:1.5rem">Bayar Sekarang</span>
                </button>
            </a>
        </header>
        <!-- End Header -->

        <!-- Section 1 -->
        <section class="section-1">
            <div class="jenjang">
                <div class="title">
                    <h3>Jenjang</h3>
                    <img src="/assets/gariskuning.svg" alt="">
                </div>
                <div class="btn-wrapper-jenjang">
                    <a href="">TK</a>
                    <a href="">SD</a>
                    <a href="">SMP</a>
                    <a href="">SMA</a>
                </div>
            </div>
        </section>
        <!-- End Section 1 -->

        <!-- Section 2 -->
        <section class="section-2">
            <div class="peserta-didik-wrapper">
                <div class="title">
                    <h3>Peserta Didik</h3>
                    <h5 class="txt-tahun-ajaran">TA. 1443-1444 H/ 2022-2023 M</h5>
                    <img src="/assets/gariskuning.svg" alt="">
                </div>
                <div class="jumlah-peserta-didik-wrapper">
                    <div class="peserta-didik-item">
                        <h2 class="txt-peserta-didik-jenjang">TK</h2>
                        <div class="jumlah-peserta-wrapper">
                            <h2 class="txt-jumlah-siswa">230</h2>
                            <h2>Peserta Didik</h2>
                        </div>
                    </div>
                    <div class="peserta-didik-item">
                        <h2 class="txt-peserta-didik-jenjang">SD</h2>
                        <div class="jumlah-peserta-wrapper">
                            <h2 class="txt-jumlah-siswa">230</h2>
                            <h2>Peserta Didik</h2>
                        </div>
                    </div>
                    <div class="peserta-didik-item">
                        <h2 class="txt-peserta-didik-jenjang">SMP</h2>
                        <div class="jumlah-peserta-wrapper">
                            <h2 class="txt-jumlah-siswa">230</h2>
                            <h2>Peserta Didik</h2>
                        </div>
                    </div>
                    <div class="peserta-didik-item">
                        <h2 class="txt-peserta-didik-jenjang">SMA</h2>
                        <div class="jumlah-peserta-wrapper">
                            <h2 class="txt-jumlah-siswa">230</h2>
                            <h2>Peserta Didik</h2>
                        </div>
                    </div>
                </div>
                <div class="jumlah-total-peserta-didik-wrapper">
                    <h3>Total Jumlah Perserta Didik<br>Sekolah Indonesia Jeddah</h3>
                    <h1 class="txt-jumlah-total-peserta-didik">1250</h1>
                    <h3>Peserta Didik</h3>
                </div>
            </div>
        </section>
        <!-- End Section 2 -->

        <!-- Section 3 -->
        <section class="section-3">
            <div class="sambutan-kepsek-wrapper">
                <div class="title">
                    <h3>Sambutan Kepala Sekolah</h3>
                    <img src="/assets/gariskuning-2.svg" alt="">
                </div>
                <div class="sambutan-kepsek-content-wrapper">
                    <img src="/assets/kepala-sekolah-image-wrapper.png" alt="Kepala Sekolah SIJ">
                    <div class="content-sambutan">
                        <p class="txt-sambutan">Assalamu'alaikum Warahmatullahi Wabarakatuh, Saya ucapkan Selamat
                            Datang di situs web resmi Sekolah Indonesia Jeddah. Alhamdulillah, saya panjatkan puji
                            syukur kehadirat Allah SWT, yang telah memberikan karunia dan kenikmatan yang tak terhitung
                            banyaknya. Shalawat serta salam ditujukan kepada Nabi Muhammad Shallallahu 'alaihi wasallam
                            yang membawa dienul Islam sehingga kita bisa membedakan yang hak dan yang bathil.<br><br>
                            Di era global dan pesatnya Teknologi Informasi dan Komunikasi ini, tidak dipungkiri bahwa
                            keberadaan sebuah situs web untuk suatu organisasi, termasuk Sekolah Indonesia Jeddah,
                            sangatlah penting. Situs web dapat digunakan sebagai media penyebarluasan informasi dan
                            mempromosikan kegiatan-kegiatan di sekolah. Penerima manfaat dari penyebarluasan informasi
                            ini, tidak hanya sebagai langkah keterbukaan informasi bagi stake holder, namun bagi pihak
                            lain juga dapat mengetahui kegiatan, perkembangan dan prestasi sekolah dengan baik.<br><br>
                            Situs web ini tidak hanya menyajikan informasi Sekolah Indonesia Jeddah belaka. Ada berbagai
                            informasi seputar pendidikan dan keunikan-keunikan yang ada di Arab Saudi. Situs web SIJ
                            juga memuat media pembelajaran dan karya siswa. Semua civitas akdemika di SIJ dapat
                            berkontribusi dengan mengirim artikel, poster, video atau karya lainnya untuk dapat diunggah
                            di situs web. Semoga pengelolaan situs web Sekolah Indonesia Jeddah selanjutnya dapat lebih
                            enak dlilihat, enak dibaca dan mampu memberikan inspirasi bagi para peselancar. SIJ, Mumtaz.
                            Wassalamu'alaikum Warahmatullahi Wabarakatuh.
                        </p>
                        <div class="penulis-sambutan-wrapper">
                            <p>Sutikno, M.Pd</p>
                            <p>Kepala Sekolah Indonesia Jeddah</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Section 3 -->


        <!-- Img SIJ -->

        <div class="img-sij-wrapper">
            <img src="/assets/gedungsekolahindonesiajeddah.png" alt="">
        </div>

        <!-- End Img SIJ -->

        <!-- Section 4 -->
        <div class="scroll-to-berita"></div>
        <section class="section-4">
            <div class="berita-sekolah">
                <div class="banner-title">
                    <h3>Berita Sekolah</h3>
                </div>
                <div class="btn-wrapper-jenjang-berita">
                    <a href="">TK</a>
                    <a href="">SD</a>
                    <a href="">SMP</a>
                    <a href="">SMA</a>
                </div>
                <div class="berita_list">
                    <ul>
                        <li>
                            <a class="content-berita-wrapper" href="">
                                <img class="img-berita" src="/assets/gariskuning.svg" alt="">
                                <div class="berita_title_desc_wrapper">
                                    <div class="kategori-berita-wrapper">
                                        <p>Informasi</p>
                                    </div>
                                    <h2 class="txt-judul-berita">Judul Berita Sekolahan Judul Berita Sekolahan Judul
                                        Berita Sekolahan</h2>
                                    <p class="txt-desc-berita">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Quis eos iste porronconsequatur dignissimos quo dolores aliquam laborum, quas
                                        libero veniam eligendi voluptatem. Sintamet ut velit asperiores eveniet porro.
                                    </p>
                                    <h3 class="txt-post-date">12-Nov-2021</h3>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="content-berita-wrapper" href="">
                                <img class="img-berita" src="/assets/gariskuning.svg" alt="">
                                <div class="berita_title_desc_wrapper">
                                    <div class="kategori-berita-wrapper">
                                        <p>Informasi</p>
                                    </div>
                                    <h2 class="txt-judul-berita">Judul Berita Sekolahan Judul Berita Sekolahan Judul
                                        Berita Sekolahan</h2>
                                    <p class="txt-desc-berita">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Quis eos iste porronconsequatur dignissimos quo dolores aliquam laborum, quas
                                        libero veniam eligendi voluptatem. Sintamet ut velit asperiores eveniet porro.
                                    </p>
                                    <h3 class="txt-post-date">12-Nov-2021</h3>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="content-berita-wrapper" href="">
                                <img class="img-berita" src="/assets/gariskuning.svg" alt="">
                                <div class="berita_title_desc_wrapper">
                                    <div class="kategori-berita-wrapper">
                                        <p>Informasi</p>
                                    </div>
                                    <h2 class="txt-judul-berita">Judul Berita Sekolahan Judul Berita Sekolahan Judul
                                        Berita Sekolahan</h2>
                                    <p class="txt-desc-berita">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Quis eos iste porronconsequatur dignissimos quo dolores aliquam laborum, quas
                                        libero veniam eligendi voluptatem. Sintamet ut velit asperiores eveniet porro.
                                    </p>
                                    <h3 class="txt-post-date">12-Nov-2021</h3>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="content-berita-wrapper" href="">
                                <img class="img-berita" src="/assets/gariskuning.svg" alt="">
                                <div class="berita_title_desc_wrapper">
                                    <div class="kategori-berita-wrapper">
                                        <p>Informasi</p>
                                    </div>
                                    <h2 class="txt-judul-berita">Judul Berita Sekolahan Judul Berita Sekolahan Judul
                                        Berita Sekolahan</h2>
                                    <p class="txt-desc-berita">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Quis eos iste porronconsequatur dignissimos quo dolores aliquam laborum, quas
                                        libero veniam eligendi voluptatem. Sintamet ut velit asperiores eveniet porro.
                                    </p>
                                    <h3 class="txt-post-date">12-Nov-2021</h3>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="content-berita-wrapper" href="">
                                <img class="img-berita" src="/assets/gariskuning.svg" alt="">
                                <div class="berita_title_desc_wrapper">
                                    <div class="kategori-berita-wrapper">
                                        <p>Informasi</p>
                                    </div>
                                    <h2 class="txt-judul-berita">Judul Berita Sekolahan Judul Berita Sekolahan Judul
                                        Berita Sekolahan</h2>
                                    <p class="txt-desc-berita">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Quis eos iste porronconsequatur dignissimos quo dolores aliquam laborum, quas
                                        libero veniam eligendi voluptatem. Sintamet ut velit asperiores eveniet porro.
                                    </p>
                                    <h3 class="txt-post-date">12-Nov-2021</h3>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="content-berita-wrapper" href="">
                                <img class="img-berita" src="/assets/gariskuning.svg" alt="">
                                <div class="berita_title_desc_wrapper">
                                    <div class="kategori-berita-wrapper">
                                        <p>Informasi</p>
                                    </div>
                                    <h2 class="txt-judul-berita">Judul Berita Sekolahan Judul Berita Sekolahan Judul
                                        Berita Sekolahan</h2>
                                    <p class="txt-desc-berita">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Quis eos iste porronconsequatur dignissimos quo dolores aliquam laborum, quas
                                        libero veniam eligendi voluptatem. Sintamet ut velit asperiores eveniet porro.
                                    </p>
                                    <h3 class="txt-post-date">12-Nov-2021</h3>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Section 4 -->

        <!-- Section 5 -->
        <section class="section-5">
            <div class="kata-alumni-wrapper">
                <div class="banner-title">
                    <h3>Kata Alumni</h3>
                </div>
                <div class="kata-alumni-item-wrapper">
                    <div class="kata-alumni-item">
                        <img src="/assets/koma-svg.svg" alt="">
                        <p class="txt-kata-alumni">Suatu hal yang menarik dari sekolah SIJ merupakan salah satu SILN
                            dengan jumlah murid terbanyak dari SILN lainnya dan setiap jenjang pendidikan tergabung
                            dalam satu sekolah (TK,SD,SMP,dan SMA). Dengan berdirinya Sekolah Indonesia Jeddah ini, Saya
                            bisa terus menuntut ilmu sampai Saya bisa melanjutkan ke jenjang perguruan tinggi. Saya
                            bangga bisa menjadi murid di sekolah ini. SIJ JAYA..</p>
                        <div class="penulis-kata-alumni-wrapper">
                            <img class="img-alumni" src="/assets/khulud.jpeg" alt="Foto Alumni">
                            <div class="text-penulis-biodata-wrapper">
                                <h5 class="txt-nama-penulis-alumni">Khulud</h5>
                                <p class="txt-posisi-penulis-alumni">SNMPTN - Pend. FIsika UNY '20</p>
                            </div>
                        </div>
                    </div>
                    <div class="kata-alumni-item">
                        <img src="/assets/koma-svg.svg" alt="">
                        <p class="txt-kata-alumni">Suatu hal yang menarik dari sekolah SIJ merupakan salah satu SILN
                            dengan jumlah murid terbanyak dari SILN lainnya dan setiap jenjang pendidikan tergabung
                            dalam satu sekolah (TK,SD,SMP,dan SMA). Dengan berdirinya Sekolah Indonesia Jeddah ini, Saya
                            bisa terus menuntut ilmu sampai Saya bisa melanjutkan ke jenjang perguruan tinggi. Saya
                            bangga bisa menjadi murid di sekolah ini. SIJ JAYA..</p>
                        <div class="penulis-kata-alumni-wrapper">
                            <img class="img-alumni" src="/assets/khulud.jpeg" alt="Foto Alumni">
                            <div class="text-penulis-biodata-wrapper">
                                <h5 class="txt-nama-penulis-alumni">Khulud</h5>
                                <p class="txt-posisi-penulis-alumni">SNMPTN - Pend. FIsika UNY '20</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Section 5 -->
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-wrapper">
            <div class="logo">
                <img src="/assets/logo_sij.png" alt="logo_sij">
                <a class="logo_title" href="/">Sekolah Indonesia Jeddah<br><span>Berakhlak Mulia Berbudaya
                        Indonesia</span></a>
            </div>
            <div class="footer-nav-item-wrapper">
                <li>
                    <a class="footer-nav-item" href="index.html">Home</a>
                </li>
                <li>
                    <a class="footer-nav-item" href="/pages/about.html">PKBM</a>
                </li>
                <li>
                    <a class="footer-nav-item" href="/pages/experiences.html">Video Pelajaran</a>
                </li>
                <li>
                    <a class="footer-nav-item" href="/pages/works.html">Informasi</a>
                </li>
                <li>
                    <a class="footer-nav-item" href="/pages/achievements.html">More</a>
                </li>
            </div>
            <div class="footer-jenjang-wrapper">
                <li>
                    <a class="footer-jenjang-item" href="">TK</a>
                </li>
                <li>
                    <a class="footer-jenjang-item" href="">SD</a>
                </li>
                <li>
                    <a class="footer-jenjang-item" href="">SMP</a>
                </li>
                <li>
                    <a class="footer-jenjang-item" href="">SMA</a>
                </li>
            </div>
            <div class="footer-informasi-sekolah-wrapper">
                <div class="sosmed-wrapper">
                    <a href="">
                        <i class="uil uil-youtube"></i>
                    </a>
                    <a href="">
                        <i class="uil uil-facebook"></i>
                    </a>
                    <a href="">
                        <i class="uil uil-instagram"></i>
                    </a>
                </div>
                <div class="location-wrapper">
                    <a href="">
                        <i class="uil uil-location-point"></i>
                        <p>5421 Al Zalaq, 5421, AR Rihab District, 7155, Jeddah 23343, Saudi Arabia</p>
                    </a>
                </div>
                <div class="mail-wrapper">
                    <a href="mailto:sekolahindojeddah.gmail.com?subject= ">
                        <i class="uil uil-envelope"></i>
                        <p>sekolahindojeddah.gmail.com</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="footer-line"></div>
        <p class="copyright">©2023 Sekolah Indonesia Jeddah, All Rights Reserved.</p>
    </footer>
    <!-- End Footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/owl-carousel-thumb.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/mail-script.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/theme.js"></script>

    <!-- =============== HTML END =============== -->



    <!-- =============== JS =============== -->

    <!-- AOS JS -->
    <script>
        AOS.init();
    </script>

    <!-- =============== JS END =============== -->
</body>

</html>
