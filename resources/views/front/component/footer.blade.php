
<!-- START CLIENTS -->
<div id="clients" class="light-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Carousel -->
                <div class="clientscarousel row">
                    <div>
                        <h4>Subsidiary Of :</h4>
                    </div>
                    <div>
                        <a href="javascript:void(0)"><img src="../img/logo-ias.png" alt="" width="400px" /></a>
                    </div>
                    {{-- <div>
                        <a href="javascript:void(0)"><img src="../img/logo-ap1-hotels.png" alt="" width="400px" /></a>
                    </div>
                    <div>
                        <a href="javascript:void(0)"><img src="../img/logo-ap1-logistics.png" alt="" width="400px"/></a>
                    </div>
                    <div>
                        <a href="javascript:void(0)"><img src="../img/logo-ap1-retail.png" alt="" width="400px"/></a>
                    </div>
                    <div>
                        <a href="javascript:void(0)"><img src="../img/logo-ap1-support.png" alt="" width="400px"/></a>
                    </div> --}}
                </div>
            </div>

        </div>
    </div>
</div>
<!-- END CLIENTS -->

 <!-- START FOOTER -->
 <div id="footer" class="footer-bg">
    <div class="container">
        <div class="row">

            <!-- Footer -->
            <div class="col-lg-6 mb-3">
                <h3 class="head-after">Tentang Kami</h3>
                <div class="mt-4">
                    {{-- <div class="mb-4"> --}}
                        <img src="{{ url('data_file/'.$pref->image) }}"  height="100px" alt="" />
                    {{-- </div> --}}
                    <p style="text-align: justify">PT IAS Property Indonesia merupakan anak perusahaan dari PT Angkasa Pura I (Persero) yang beroperasi secara efektif pada 6 Januari 2012.
                        Pendirian IAS Property Indonesia merupakan pengembangan lini bisnis Angkasa Pura I yang awalnya hanya memperoleh pendapatan dari kegiatan aeronautika.</p>
                    <ul class="social-icons">
                        <li><a href="https://www.instagram.com/ap.property/?hl=en" target="__blank"><i class="mdi mdi-instagram"></i></a></li>
                        <li><a href="https://www.linkedin.com/company/pt-angkasa-pura-properti" target="__blank"><i class="mdi mdi-linkedin"></i></a></li>
                        <li><a href="https://www.youtube.com/channel/UC1QicNsSMsI7nsxZ9F_lWLQ" target="__blank"><i class="mdi mdi-youtube"></i></a></li>
                    </ul>
                </div>
            </div>

            {{-- <div class="col-lg-3 mb-3">
                <h3 class="head-after">Quick Links</h3>
                <div class="mt-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Projects</a></li>
                                <li><a href="#">Packages</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul>
                                <li><a href="#">Building</a></li>
                                <li><a href="#">Architecture</a></li>
                                <li><a href="#">Interior</a></li>
                                <li><a href="#">Renovation</a></li>
                                <li><a href="#">Plan &amp; Design</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="col-lg-6 mb-3">
                <h3 class="head-after">Kontak Kami</h3>
                <div class="mt-4 footer-contact">
                    <h5><i class="mdi mdi-map-marker mdi-24px color-primary"></i> Alamat</h5>
                    <p>{{ $pref->address }}</p>
                    <h5><i class="mdi mdi-phone mdi-24px color-primary"></i> Telephone</h5>
                    <p>{{ $pref->phone }}</p>
                    <h5><i class="mdi mdi-email-open mdi-24px color-primary"></i> Email</h5>
                    <p>{{ $pref->email }}</p>
                </div>
            </div>

            {{-- <div class="col-lg-3 mb-3">
                <h3 class="head-after">Completed Projects</h3>
                <div class="mt-4">
                    <div class="row">
                        <div class="col-sm-4">
                            <img class="mb-4" src="assets/images/icons/icon-1.png" alt="" />
                        </div>
                        <div class="col-sm-8">
                            <p class="mb-4"><a href="#">Contrary to popular belief, Lorem Ipsum is not simply
                                    random.</a></p>
                        </div>
                        <div class="col-sm-4">
                            <img class="mb-4" src="assets/images/icons/icon-2.png" alt="" />
                        </div>
                        <div class="col-sm-8">
                            <p class="mb-4"><a href="#">Contrary to popular belief, Lorem Ipsum is not simply
                                    random.</a></p>
                        </div>
                        <div class="col-sm-4">
                            <img class="mb-4" src="assets/images/icons/icon-3.png" alt="" />
                        </div>
                        <div class="col-sm-8">
                            <p class="mb-4"><a href="#">Contrary to popular belief, Lorem Ipsum is not simply
                                    random.</a></p>
                        </div>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>
</div>
<!-- END FOOTER -->

<!-- START SUB FOOTER -->
<div id="sub-footer" class="primary-bg">
    <div class="container">
        <div class="row">

            <!-- Left Side -->
            <div class="col-lg-8">
                <div class="sub-foot-left">
                    <ul>
                        <li>PT IAS Property Indonesia - EPROC  &copy; 2022 {{ $pref->nama_perusahaam }}. All Right Reserved.</li>
                    </ul>
                </div>
            </div>

            <!-- Right Side -->
            <div class="col-lg-4">
                <div class="sub-foot-right">
                    <ul>
                        <li>&copy; <a href="https://approperti.co.id">approperti.co.id</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- END SUB FOOTER -->
