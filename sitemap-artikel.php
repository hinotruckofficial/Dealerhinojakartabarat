<?php
// ===== Error Handling (aman untuk XML) =====
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/sitemap_error.log');

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Header XML
header('Content-Type: application/xml; charset=utf-8');

// Output header XML
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

// Fungsi print URL
function printUrl($loc, $lastmod, $changefreq = 'monthly', $priority = '0.7') {
    $lastmod_clean = preg_match('/^\d{4}-\d{2}-\d{2}$/', $lastmod)
        ? $lastmod
        : date('Y-m-d');

    echo "  <url>\n";
    echo "    <loc>" . htmlspecialchars($loc, ENT_XML1, 'UTF-8') . "</loc>\n";
    echo "    <lastmod>$lastmod_clean</lastmod>\n";
    echo "    <changefreq>$changefreq</changefreq>\n";
    echo "    <priority>$priority</priority>\n";
    echo "  </url>\n";
}

// Base domain
$base_url = 'https://dealerhinojakartabarat.com';

// 1️⃣ Halaman index artikel
printUrl($base_url . '/artikel', date('Y-m-d'), 'weekly', '0.9');

try {
    // Koneksi database
    $conn = new mysqli(
        "localhost",
        "u868657420_hinobarat",
        "H1noB4arat456",
        "u868657420_hinobarat"
    );
    $conn->set_charset('utf8mb4');

    // Cek tabel artikel
    $res = $conn->query("SHOW TABLES LIKE 'artikel'");
    if ($res && $res->num_rows > 0) {

        $stmt = $conn->prepare("SELECT slug, tanggal FROM artikel ORDER BY id DESC");
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $slug = trim($row['slug']);
            if ($slug === '') continue;

            $lastmod = !empty($row['tanggal'])
                ? date('Y-m-d', strtotime($row['tanggal']))
                : date('Y-m-d');

            // ✅ URL SEO FRIENDLY /artikel/slug
            $encoded_slug = rawurlencode($slug);
            $url = $base_url . '/artikel/' . $encoded_slug;

            printUrl($url, $lastmod, 'weekly', '0.8');
        }

        $stmt->close();
    }

    $conn->close();

} catch (Throwable $e) {
    error_log("sitemap-artikel.php error: " . $e->getMessage());
}

// Tutup XML
echo "</urlset>\n";
exit;
