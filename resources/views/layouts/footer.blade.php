<footer class="bg-dark text-light pt-5 pb-4 mt-5">
    <div class="container">
        <div class="row">
            <!-- Recent Post -->
            <div class="col-md-4 mb-4">
                <h5 class="footer-heading">Recent Post</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-light text-decoration-none">Pelatihan Kalibrasi Alat Ukur</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Workshop Instrumental Kimia</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Sertifikasi Peserta</a></li>
                </ul>
                <div class="mt-2">
                   <img src="{{ asset('images/ISO-NEW-EDIT.png') }}"
                       alt="Logo ISO"
                       style="width: 150px; height: auto;">
               </div>

                <div class="mt-2">
                    <img src="{{ asset('images/logo-kan-kalibrasi.png') }}"
                        alt="Logo KAN"
                        style="width: 150px; height: auto;">
                </div>
            </div>

            <!-- Kontak Kami -->
            <div class="col-md-4 mb-4">
                <h5 class="footer-heading">Kontak Kami</h5>
                <p>Email: support@rsttools.com</p>
                <p>(+62)21-6281615, FAX : (+62)21-6265559</p>
                <p>Website: rukun.id</p>
            </div>


            <!-- Cabang Rukun -->
            <div class="col-md-4 mb-4">
                <h5 class="footer-heading">PT RUKUN SEJAHTERA TEKNIK</h5>
                <h7 class="footer-heading">HEAD OFFICE</h7>
                <p>KOMPLEK RUKO GLODOK NO.80-81 JL HAYAM WARUNK-JAKARTA 11180</p>
                <h7 class="footer-heading">BRANCH OFFICE</h7>
                <p>CIKARANG: JL.JABABEKA XVII BLOK W36-37 NO.B5-B6 CIKARANG, BEKASI</p>
                <p>KARAWANG: JL. RAYA TELUKJAMBE N0.8 KSB RAYA 8 KARAWANG, KARAWANG</p>
            </div>

            <!-- Alamat + Google Maps -->
            <div class="col-md-4 mb-4">
                <h5 class="footer-heading">Labolatorium</h5>
                <p>JL. RAYA TELUKJAMBE N0.8 KSB RAYA 8</p>
                <p>KARAWANG SENTRA BIZHUB, KARAWANG</p>
                <div class="map-container mt-2">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.485168493731!2d107.31211890869777!3d-6.331129893632!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6977c204e86b73%3A0x2aec1338aee4f290!2sPT.Rukun%20Sejahtera%20Teknik!5e0!3m2!1sid!2sid!4v1757320125682!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        
<!--Floating Whatsapp -->
        <div class="wa-container">
            <div class="wa-popup" id="waPopup">
                <div class="wa-header">
                    <i class="fa fa-whatsapp"></i>
                    <span>Butuh Bantuan?</span>
                    <button id="waClose">&times;</button>
            </div>

            <div class="wa-body">
                <p>Halo<br>Ada yang Bisa Kami Bantu?</p>
                      <a href="https://wa.me/6281234567890" target="_blank" class="wa-chat-btn">
        <i class="fa fa-whatsapp"></i> Chat via WhatsApp
      </a>
    </div>
  </div>

   <button class="wa-float" id="waButton">
  <img src="images/icon/icon-wa.png" alt="WhatsApp" class="wa-icon">
</button>
</div>

        <div class="text-center mt-4">
            <p class="mb-0">&copy; {{ date('Y') }} PT Rukun Sejahtera Teknik. All rights reserved.</p>
        </div>
    </div>
  <div class="visitor-stats">
    <div class="item">
        <span class="label">👥 Total Pengunjung:</span>
        <span id="total" class="value">0</span>
    </div>
    <div class="item">
        <span class="label">🟢 Pengunjung Online:</span>
        <span id="online" class="value">0</span>
    </div>
</div>

<script>
function updateStats() {
    fetch('/api/visitors')
        .then(res => res.json())
        .then(data => {
            document.getElementById('total').textContent = data.total;
            document.getElementById('online').textContent = data.online;
        });
}
updateStats();
setInterval(updateStats, 10000);
</script>
</footer>