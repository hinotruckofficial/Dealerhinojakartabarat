<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'admin/config.php';

// Ambil 3 artikel terbaru (SEO READY)
$sql = "
    SELECT 
        a.id,
        a.judul,
        a.slug,
        a.isi,
        a.gambar,
        a.tanggal,
        k.nama_kategori AS kategori
    FROM artikel a
    LEFT JOIN kategori k ON a.kategori_id = k.id
    ORDER BY a.tanggal DESC
    LIMIT 3
";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $artikelData = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Samakan format gambar seperti API
    foreach ($artikelData as &$row) {
        if (!empty($row['gambar'])) {
            $row['gambar'] = "https://dealerhinojakartabarat.com/admin/uploads/artikel/" . $row['gambar'];
        }
    }
    unset($row);

} catch (PDOException $e) {
    die("Gagal mengambil data artikel: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- ✅ Judul utama -->
    <title>Dealer Hino Jakarta | Harga Truk Hino Terbaru & Promo 2026</title>

    <!-- ✅ Deskripsi SEO -->
    <meta name="description" content="Dealer Hino Jakarta resmi. Jual truk Hino Dutro, Ranger, Harga terbaik, DP ringan, Hino resmi Jakarta, Bekasi & Tangerang. Jual truk dan bus Hino, harga terbaik, kredit mudah & servis resmi.">
    <meta name="keywords" content="dealer hino jakarta, dealer hino jakarta barat, harga truk hino jakarta, dealer hino resmi, promo truk hino">
    <meta name="author" content="Dealer Hino Jakarta">

    <!-- ✅ Canonical URL -->
    <link rel="canonical" href="https://dealerhinojakartabarat.com/" />

    <!-- ✅ Tambahkan ini agar judul 'Dealer Hino Jakarta' muncul di atas domain (seperti di Indomobil Hino) -->
    <meta name="application-name" content="Dealer Hino Jakarta">
<meta name="apple-mobile-web-app-title" content="Dealer Hino Jakarta">


    <!-- ✅ Open Graph untuk tampilan di Google / Facebook / WhatsApp -->
    <meta property="og:site_name" content="Dealer Hino Jakarta">
    <meta property="og:title" content="Dealer Hino Jakarta | Authorized Hino Dealer">
    <meta property="og:description" content="Dealer Hino Jakarta adalah Authorized Dealer Hino resmi Jakarta, Bekasi & Tangerang. Jual truk dan bus Hino, harga terbaik, kredit mudah & servis resmi.">
    <meta property="og:url" content="https://dealerhinojakartabarat.com/">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://dealerhinojakartabarat.com/img/hino.png">

    <!-- Favicon untuk semua browser modern -->
    <link rel="icon" type="image/png" sizes="512x512" href="/favicon_512.png">
    
    <!-- Favicon untuk browser lama -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    
    <!-- Apple Touch Icon (iPhone/iPad) -->
    <link rel="apple-touch-icon" href="/favicon_512.png">

    <!-- ✅ Fonts & CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/navbar.css" />
    <link rel="stylesheet" href="css/home_css/header.css" />
    <link rel="stylesheet" href="css/home_css/promoutama.css" />
    <link rel="stylesheet" href="css/home_css/layanan.css" />
    <link rel="stylesheet" href="css/home_css/produk.css" />
    <link rel="stylesheet" href="css/home_css/keunggulankami.css" />
    <link rel="stylesheet" href="css/home_css/contact.css" />
    <link rel="stylesheet" href="css/home_css/blogcard.css" />

    <!-- JSON -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "name": "Dealer Hino Jakarta",
      "alternateName": "Dealer Hino Resmi Jakarta",
      "url": "https://dealerhinojakartabarat.com"
    }
    </script>
    
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Dealer Hino Jakarta",
      "url": "https://dealerhinojakartabarat.com",
      "logo": "https://dealerhinojakartabarat.com/favicon_512.png"
    }
    </script>
    
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "AutoDealer",
      "@id": "https://dealerhinojakartabarat.com/#dealer",
      "name": "Dealer Hino Jakarta",
      "alternateName": "Dealer Hino Jakarta",
      "url": "https://dealerhinojakartabarat.com/",
      "image": "https://dealerhinojakartabarat.com/img/hino300produk.png",
      "logo": "https://dealerhinojakartabarat.com/img/hino300produk.png",
      "description": "Authorized Dealer Hino resmi Jakarta, Bekasi & Tangerang. Jual truk dan bus Hino, harga terbaik, kredit mudah & servis resmi.",
      "telephone": "+62-856-9291-1733",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Ruko Palm Crown HH4/19, Jl. Perumahan Taman Surya No.5, RT.7/RW.3, Pegadungan, Kec. Kalideres, Kota Jakarta Barat",
        "addressLocality": "Kota Jakarta Barat",
        "addressRegion": "Daerah Khusus Ibukota Jakarta",
        "postalCode": "11830",
        "addressCountry": "ID"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": -6.1318,
        "longitude": 106.7028
      },
      "openingHoursSpecification": [
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": [
            "Monday",
            "Tuesday",
            "Wednesday",
            "Thursday",
            "Friday",
            "Saturday"
          ],
          "opens": "08:00",
          "closes": "17:00"
        }
      ],
      "sameAs": [
        "https://www.facebook.com/hinotruckofficial",
        "https://www.instagram.com/hinotruckofficial",
        "https://www.tiktok.com/@hinotruckofficial"
      ]
    }
    </script>
    
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "name": "Beranda",
          "item": "https://dealerhinojakartabarat.com"
        },
        {
          "@type": "ListItem",
          "position": 2,
          "name": "Dealer Hino Jakarta"
        }
      ]
    }
    </script>
<!-- FAQ Schema -->
      <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "Apakah Dealer Hino Jakarta ini resmi?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Ya, kami adalah Authorized Dealer Hino resmi yang melayani wilayah Jakarta, Tangerang, Bekasi, dan Jabodetabek."
      }
    },
    {
      "@type": "Question",
      "name": "Apakah tersedia kredit truk Hino?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Tersedia berbagai pilihan kredit truk dan bus Hino dengan DP ringan dan proses cepat."
      }
    }
  ]
}
</script>

    <!-- ✅ Script -->
   <script src="/js/script.js" defer></script>
<script src="https://unpkg.com/feather-icons" defer></script>

        <!-- CSS Footer -->
    <link rel="stylesheet" href="css/footer.css" />
  </head>
  <body>
    <!-- Header -->
    <header>
      <div class="container header-content navbar">
        <div class="header-title">
          <a href="https://dealerhinojakartabarat.com">
            <img src="img/logo3.png" alt="Logo Hino" style="height: 60px" />
          </a>
        </div>

        <div class="hamburger-menu">&#9776;</div>

        <nav class="nav links">
          <a href="/">Home</a>
          <a href="/hino300">Hino 300 Series</a>
          <a href="/hino500">Hino 500 Series</a>
          <a href="/hinobus">Hino Bus Series</a>
          <a href="/artikel">Blog & Artikel</a>
          <a href="/contact">Contact</a>
        </nav>
      </div>
    </header>

    <!-- Hero -->
  <!-- Hero -->
<section class="hero">
  <h1>Dealer Hino Jakarta – Authorized Dealer Hino Jabodetabek</h1>

  <p class="hero-description">
    Dealer Hino Jakarta Barat merupakan <strong>dealer Hino resmi</strong> yang melayani penjualan 
    <strong>truk dan bus Hino</strong> untuk wilayah 
    <strong>Jakarta Barat, Jakarta Timur, Jakarta Selatan, Tangerang, Bekasi</strong>, 
    serta seluruh area <strong>Jabodetabek</strong>. 
    Kami menyediakan unit Hino terbaru, harga kompetitif, kemudahan kredit, dan layanan purna jual resmi.
  </p>

  <div class="slider">
    <img src="img/Euro 4 Hino 300.jpeg" 
         class="slide active" 
         alt="Dealer Hino Jakarta - Truk Hino 300 Euro 4" 
         loading="eager" />

    <img src="img/Euro 4 Hino 500.jpeg" 
         class="slide" 
         alt="Dealer Hino Jakarta - Truk Hino 500 Euro 4" 
         loading="lazy" />

    <img src="img/Euro 4 Hino Bus.jpeg" 
         class="slide" 
         alt="Dealer Hino Jakarta - Bus Hino Euro 4" 
         loading="lazy" />
  </div>
</section>


    <!-- Section: Promo Utama -->
    <section id="promo-utama" class="promo-section fade-element">
      <div class="promo-text">
        <h2>Dealer Hino Jakarta adalah Autorized Dealer Hino Terpercaya yang memberikan Harga terbaik.</h2>
        <ul>
          <li>Ingin harga terbaik untuk semua jenis truk Hino?</li>
          <li>Bingung memilih kendaraan yang tepat untuk bisnis Anda?</li>
          <li>Butuh pelayanan cepat, ramah, dan profesional?</li>
          <li>Hubungi Asdi sekarang juga dan dapatkan solusi terbaik!</li>
        </ul>
        <p>
          Asdi Hino sebagai <strong>Sales Dealer Hino Jakarta Authorized Dealer Resmi Hino</strong> siap membantu Anda mendapatkan
          <strong>truk dan bus Hino baru</strong> dengan harga kompetitif untuk seluruh Indonesia,
          khususnya wilayah <strong>Jakarta, Tangerang, dan Jabodetabek</strong>.
          Nikmati proses mudah, respon cepat, serta layanan purna jual resmi Hino.
        </p>
        <div class="promo-buttons">
          <a href="https://wa.me/6285692911733" class="btn-primary" target="_blank" rel="noopener noreferrer">Konsultasi Pembelian</a>
        </div>
      </div>
      <img src="img/hino.png" alt="Truk Hino Hijau" loading="lazy" class="promo-main-image" />
    </section>

    <!-- BAGIAN PRODUK & LAYANAN -->
    <section class="hino-section-produk fade-element">
      <div class="hino-container">
        <div class="hino-heading">
          <h5>PRODUK & LAYANAN</h5>
          <h2>HINO JAKARTA</h2>
          <p>Kami melayani jasa penyediaan unit Truk Hino Dutro, Hino Ranger & Bus, layanan service dan penjualan spare part merk Hino.</p>
        </div>

        <div class="hino-cards">
          <div class="hino-card">
            <img src="img/bannerpenjualan.jpg" alt="Penjualan Truk & Bis" />
            <h3>PENJUALAN TRUK & BUS</h3>
            <a href="#products-section" class="hino-btn">SELENGKAPNYA</a>
          </div>

          <div class="hino-card">
            <img src="img/bannerservice.jpg" alt="Layanan Service" />
            <h3>LAYANAN SERVICE</h3>
            <a href="/contact" class="hino-btn">SELENGKAPNYA</a>
          </div>

          <div class="hino-card">
            <img src="img/bannersparepart.jpg" alt="Spare Part" />
            <h3>SPARE PART</h3>
            <a href="/contact" class="hino-btn">SELENGKAPNYA</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Produk -->
    <section id="products-section" class="products-section fade-element">
      <h2 class="section-title">Produk Truk Hino Unggulan</h2>
      <div class="products">
        <div class="product">
          <img src="img/hino300produk.png" alt="Hino 300 Dutro" loading="lazy" />
          <h3>
            <a href="https://dealerhinojakartabarat.com/hino300" target="_blank" rel="noopener noreferrer">Hino 300 Series (Dutro)</a>
          </h3>
          <p>Truk ringan dan tangguh, cocok untuk usaha kecil dan menengah.</p>
        </div>

        <div class="product">
          <img src="img/hino500produk.png" alt="Hino 500 Ranger" loading="lazy" />
          <h3>
            <a href="https://dealerhinojakartabarat.com/hino500" target="_blank" rel="noopener noreferrer">Hino 500 Series (Ranger)</a>
          </h3>
          <p>Performa handal untuk pengangkutan berat dan jarak jauh.</p>
        </div>

        <div class="product">
          <img src="img/hinobusproduk.png" alt="Hino Bus Series" loading="lazy" />
          <h3>
            <a href="https://dealerhinojakartabarat.com/hinobus" target="_blank" rel="noopener noreferrer">Hino Bus Series</a>
          </h3>
          <p>Solusi transportasi penumpang dengan kenyamanan terbaik.</p>
        </div>
      </div>
    </section>

    <!-- Keunggulan Kami -->
    <section class="advantages fade-element">
      <div class="advantages-container">
        <div class="advantages-image">
          <img src="img/worker.png" alt="Worker Image" />
        </div>

        <div class="advantages-content">
          <h2>Program Purna Jual</h2>

          <div class="advantage-item">
            <svg xmlns="https://w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="#0a1950" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
            <div>
              <h4>Program Service</h4>
              <p>
                Nikmati layanan gratis biaya jasa service berkala untuk setiap pembelian unit Hino tertentu. Pemeriksaan dilakukan oleh teknisi bersertifikat menggunakan suku cadang asli Hino.
                Hemat biaya, kendaraan lebih terawat, performa maksimal.
              </p>
            </div>
          </div>

          <div class="advantage-item">
            <svg xmlns="https://w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="#0a1950" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6 5.87v-2a4 4 0 00-3-3.87M16 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <div>
              <h4>Program Suku Cadang</h4>
              <p>
                Dapatkan jaminan kualitas dan ketahanan terbaik untuk truk Anda dengan menggunakan suku cadang asli Hino. Kami menyediakan layanan lengkap untuk memastikan setiap komponen kendaraan Anda bekerja secara optimal dan tahan lama.
              </p>
            </div>
          </div>

          <div class="advantage-item">
            <svg xmlns="https://w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="#0a1950" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c1.657 0 3-1.343 3-3S13.657 2 12 2 9 3.343 9 5s1.343 3 3 3zm0 0v13m-3.5-3.5L12 21l3.5-3.5" />
            </svg>
            <div>
              <h4>Program On Site Service</h4>
              <p>
                Kini, perawatan dan perbaikan truk Hino menjadi lebih praktis dengan layanan On Site Service. Teknisi Hino yang profesional akan datang langsung ke lokasi operasional Anda — menghemat waktu, tenaga, dan biaya operasional.
              </p>
            </div>
          </div>

          <div class="advantage-item">
            <svg xmlns="https://w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="#0a1950" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 17H4a1 1 0 01-1-1V6a1 1 0 011-1h11a1 1 0 011 1v10a1 1 0 01-1 1h-1m5 0a2 2 0 100-4h-1m-4 4h6m-1 0a2 2 0 110 4 2 2 0 010-4zM6 17a2 2 0 100 4 2 2 0 000-4z" />
            </svg>
            <div>
              <h4>Pelatihan & Konsultasi</h4>
              <p>
                Hino tidak hanya menjual truk, tapi juga memastikan setiap pengguna memahami cara terbaik untuk mengoperasikan dan merawatnya. Melalui program Pelatihan & Konsultasi, kami membekali operator dan manajemen Anda dengan pengetahuan teknis, keselamatan, efisiensi pengoperasian, serta perawatan kendaraan.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

      <!-- ================= TESTIMONI ================= -->
<section class="testimonial-section fade-element">
  <div class="container">
    <h2 class="section-title">Testimoni Pelanggan Dealer Hino Jakarta Barat</h2>

    <div class="testimonial-slider">

      <div class="testimonial-item active">
        <p>
          "Proses pembelian Hino Dutro di Dealer Hino Jakarta Barat sangat cepat dan dibantu sampai ACC leasing. Unit dikirim tepat waktu dan sesuai spesifikasi."
        </p>
        <div class="stars">★★★★★</div>
        <h4>- PT Sumber Logistik, Jakarta</h4>
      </div>

      <div class="testimonial-item">
        <p>
          "Harga truk Hino Jakarta sangat kompetitif. Sales responsif dan membantu proses kredit sampai selesai."
        </p>
        <div class="stars">★★★★★</div>
        <h4>- CV Maju Jaya Transport</h4>
      </div>

      <div class="testimonial-item">
        <p>
          "Dealer Hino Jakarta Barat terpercaya untuk pembelian armada perusahaan. After sales service sangat memuaskan."
        </p>
        <div class="stars">★★★★★</div>
        <h4>- PT Trans Nusantara</h4>
      </div>

    </div>
  </div>
</section>
<!-- ================= END TESTIMONI ================= -->


    <!-- Contact Section -->
    <div class="contact-container fade-element">
      <div class="contact-tabs">
        <div class="tab active">Hubungi Kami</div>
      </div>

      <div class="contact-info">
        <div class="contact-item">
          <img src="img/cssupport.png" alt="WhatsApp" />
          <div>
            <strong>Whatsapp</strong><br />
            +62 856-9291-1733
          </div>
        </div>

        <div class="divider"></div>

        <div class="contact-item">
          <img src="https://img.icons8.com/ios-filled/50/000000/phone.png" alt="Phone" />
          <div>
            <strong>Phone Call</strong><br />
            +62 856-9291-1733
          </div>
        </div>

        <div class="divider"></div>

        <div class="contact-item">
          <img src="https://img.icons8.com/ios-filled/50/000000/new-post.png" alt="Email" />
          <div>
            <strong>Email</strong><br />
            hinotruckofficial@gmail.com
          </div>
        </div>
      </div>
    </div>

    <!-- Blog Section -->
    <section class="blog-section fade-element">
      <div class="container">
        <h2>Blog & Artikel</h2>
        <p>Dapatkan informasi terbaru seputar Truk Hino, perawatan, dan promo terbaik.</p>

        <div class="blog-grid">
          <?php if (!empty($artikelData)): ?>
            <?php foreach ($artikelData as $artikel): ?>
              <div class="blog-card">
                <img 
                  src="<?= htmlspecialchars($artikel['gambar']) ?>"
                  alt="<?= htmlspecialchars($artikel['judul']) ?>" 
                  loading="lazy"
                />
                <div class="blog-card-content">
                  <h3>
                    <a href="/artikel/<?= htmlspecialchars($artikel['slug']) ?>">
                      <?= htmlspecialchars($artikel['judul']) ?>
                    </a>
                  </h3>

                  <p><?= htmlspecialchars(mb_strimwidth(strip_tags($artikel['isi']), 0, 100, '...')) ?></p>

                  <a href="/artikel/<?= htmlspecialchars($artikel['slug']) ?>" class="read-more">
                    Baca Selengkapnya
                  </a>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <p>Tidak ada artikel ditemukan.</p>
          <?php endif; ?>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- WhatsApp Bubble Chat -->
<div class="wa-container">
  <div class="wa-bubble">
    Free GPS, Free Service Dan Spare Parts<br>
    <strong>Chat kami sekarang</strong>
  </div>

  <a href="https://wa.me/6285692911733?text=Halo%20saya%20tertarik%20dengan%20truk%20Hino.%20Mohon%20informasinya"
     target="_blank"
     class="wa-button"
     aria-label="Chat WhatsApp">
    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
  </a>
</div>

<style>
.wa-container {
    position: fixed;
    right: 20px;
    bottom: 20px;
    z-index: 999;
    display: flex;
    align-items: center;
    gap: 10px;
    font-family: Arial, sans-serif;
}

/* Bubble chat */
.wa-bubble {
    background: #ffffff;
    color: #333;
    padding: 10px 14px;
    border-radius: 10px;
    font-size: 13px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    animation: fadeIn 1s ease;
    position: relative;
}

/* Arrow bubble */
.wa-bubble::after {
    content: "";
    position: absolute;
    right: -6px;
    top: 50%;
    transform: translateY(-50%);
    border-width: 6px;
    border-style: solid;
    border-color: transparent transparent transparent #ffffff;
}

/* WhatsApp button */
.wa-button {
    width: 60px;
    height: 60px;
    background: #25D366;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 10px rgba(0,0,0,0.3);
}

.wa-button img {
    width: 34px;
    height: 34px;
}

.wa-button:hover {
    background: #1ebe5d;
}

/* Animation */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Mobile friendly */
@media (max-width: 768px) {
    .wa-bubble {
        display: none;
    }
}
</style>


  </body>
</html>
