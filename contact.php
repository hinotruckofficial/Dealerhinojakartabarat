<?php
require_once 'admin/config.php'; // pastikan file ini memuat koneksi PDO

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ambil dan bersihkan input
    $name = trim($_POST['name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Validasi sederhana
    if ($name === '' || $phone === '' || $message === '') {
        echo "❌ Semua field wajib diisi.";
        exit;
    }

    // Simpan ke database (tabel messages)
    $sql = "INSERT INTO messages (name, phone, message) VALUES (:name, :phone, :message)";
    $params = [
        ':name' => $name,
        ':phone' => $phone,
        ':message' => $message
    ];

    try {
        $rowCount = execPrepared($pdo, $sql, $params);
        if ($rowCount > 0) {
            echo "✅ Pesan Anda berhasil dikirim.";
        } else {
            echo "❌ Gagal menyimpan pesan.";
        }
    } catch (Exception $e) {
        error_log("Gagal insert pesan: " . $e->getMessage());
        echo "❌ Terjadi kesalahan. Silakan coba lagi nanti.";
    }

    exit; // stop di sini agar tidak melanjutkan ke HTML
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- ✅ SEO Title -->
    <title>Kontak Dealer Hino Jabodetabek | Authorized Hino Dealer</title>

    <!-- ✅ Meta Description (CTA kuat) -->
    <meta
      name="description"
      content="Hubungi Dealer Hino Jabodetabek. Konsultasi harga truk Hino, promo terbaru, dan kredit mudah. Telepon & WhatsApp 0856-9291-1733."
    />

    <!-- ✅ Canonical -->
    <link rel="canonical" href="https://dealerhinojakartabarat.com/contact" />

    <!-- ✅ Meta Keywords (ringkas & lokal) -->
    <meta
      name="keywords"
      content="kontak Dealer Hino Jabodetabek, sales hino tangerang, alamat Dealer Hino Jabodetabek, hubungi dealer hino, dealer hino, hino dutro, hino ranger, dealer hino cikupa, dealer resmi hino tangerang, hino tangerang"
    />

    <!-- ✅ Open Graph -->
    <meta property="og:site_name" content="Dealer Hino Jabodetabek" />
    <meta property="og:title" content="Kontak Dealer Hino Jabodetabek" />
    <meta
      property="og:description"
      content="Hubungi Dealer Hino Jabodetabek untuk informasi harga, promo & kredit truk Hino. WA & Telp 0856-9291-1733."
    />
    <meta property="og:url" content="https://dealerhinojakartabarat.com/contact" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://dealerhinojakartabarat.com/img/hino.png" />

    <!-- ✅ Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Kontak Dealer Hino Jabodetabek" />
    <meta
      name="twitter:description"
      content="Sales Hino Jakarta. Hubungi sekarang untuk harga & promo truk Hino."
    />
    <meta name="twitter:image" content="https://dealerhinojakartabarat.com/img/hino.png" />

    <!-- JSON -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "AutoDealer",
      "@id": "https://dealerhinojakartabarat.com/contact#autodealer",
      "name": "Dealer Hino Jabodetabek",
      "alternateName": "Dealer Hino Jabodetabek Resmi",
      "url": "https://dealerhinojakartabarat.com/contact",
      "logo": "https://dealerhinojakartabarat.com/favicon_512.png",
      "image": "https://dealerhinojakartabarat.com/img/hino.png",
      "description": "Kontak Dealer Hino Jabodetabek resmi. Melayani penjualan truk Hino Dutro, Hino 300 & 500 Series dengan promo dan kredit terbaik.",
      "telephone": "+62-856-9291-1733",
      "priceRange": "$$",
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
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+62-856-9291-1733",
        "contactType": "Sales",
        "areaServed": "ID",
        "availableLanguage": ["id"]
      },
      "sameAs": [
        "https://www.facebook.com/hinotruckofficial",
        "https://www.instagram.com/hinotruckofficial",
        "https://www.tiktok.com/@hinotruckofficial"
      ]
    }
    </script>

    <meta name="robots" content="index, follow" />
    <link rel="icon" type="image/png" href="/img/favicon_512.png" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/navbar.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/contact_css/header_contact.css" />
    <link rel="stylesheet" href="css/contact_css/contact.css" />

    <!-- JS -->
    <script src="js/script.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
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

    <!-- Contact Hero -->
    <section class="about-hero" style="background-image: url('img/Euro 4 Hino 300.jpeg'); background-size: cover; background-position: center;">
      <div class="about-hero-overlay">
        <div class="about-hero-content container">
          <h1>Contact Us</h1>
          <p>Jika Anda membutuhkan bantuan atau informasi lebih lanjut, kami siap membantu Anda dengan solusi terbaik. Hubungi kami sekarang!.</p>
        </div>
      </div>
    </section>

    <!-- Contact Form -->
    <div class="wrapper">
      <h2>Contact Us</h2>
      <p>Fill out the form below to get in touch with us.</p>
      <div class="container">
        <div class="contact-form">
          <form id="contactForm">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required />

            <label for="phone">Your Phone Number:</label>
            <input type="tel" id="phone" name="phone" required />

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="6" required></textarea>

            <button type="submit"><strong>Submit</strong></button>
          </form>
        </div>

        <div class="map1">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.4165925685147!2d106.4925165!3d-6.2086551000000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e42014b1ba54cb5%3A0x8cbdfa3c0d9e5809!2sDealer%20Hino%20Cikupa!5e0!3m2!1sid!2sid!4v1761059143239!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- Feather Icons -->
    <script>feather.replace();</script>

    <!-- Form Handler JS -->
    <script>
      document.getElementById("contactForm").addEventListener("submit", function (e) {
        e.preventDefault();
        const form = e.target;
        const formData = new FormData(form);

        fetch("contact.php", {
          method: "POST",
          body: formData,
        })
        .then(res => res.text())
        .then(data => {
          alert(data);
          form.reset();
        })
        .catch(err => {
          alert("❌ Gagal mengirim pesan.");
          console.error(err);
        });
      });
    </script>
  </body>
</html>
