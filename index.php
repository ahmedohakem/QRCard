<?php
if (!isset($_GET['cid'])){
$response_code[] = array("RESPONSE_CODE"=>"102");
echo json_encode($response_code);
die();
}
include('includefiles/conn_db.php');

$SelectQur = mysqli_query($conn, "SELECT card_id, card_name, phone_no, whatsapp_no, email, picture, record_timestamp, REPLACE(REPLACE(whatsapp_no,' ', ''), '+', '') AS for_whatsapp_api_link FROM cards WHERE card_id = '".$_GET['cid']."'");
if(mysqli_num_rows($SelectQur) == 0) {
//echo "<font color = 'red'> No Records Match Your Query!</font><br>";
}
else
{
while($row = mysqli_fetch_array($SelectQur))
  {
$card_id = $row['card_id'];
$card_name = $row['card_name'];
$phone_no = $row['phone_no'];
$whatsapp_no = $row['whatsapp_no'];
$email = $row['email'];
$picture = $row['picture'];
$record_timestamp = $row['record_timestamp'];
$for_whatsapp_api_link = $row['for_whatsapp_api_link'];
  }
  }

$myfile = fopen("vcf/".$card_id.".vcf", "w") or die("Unable to open file!");
$txt = "BEGIN:VCARD\n";
fwrite($myfile, $txt);
$txt = "VERSION:3.0\n";
fwrite($myfile, $txt);
$txt = "N:".$card_name."\n";
fwrite($myfile, $txt);
$txt = "TEL;TYPE=MOBILE,VOICE:".$phone_no."\n";
fwrite($myfile, $txt);
$txt = "EMAIL:".$email."\n";
fwrite($myfile, $txt);
$txt = "END:VCARD\n";
fwrite($myfile, $txt);
fclose($myfile);
?>
<!DOCTYPE html>
<html lang="en">

<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-KWTWV6PPBK"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-KWTWV6PPBK');
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
<?php echo "<title>".$card_name."</title>"; ?>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
<link rel="icon" type="image/x-icon" href="favicon.ico">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Moderna - v4.8.0
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <!-- ======= Header ======= -->

<!-- End Header -->

  <main id="main">


    <!-- ======= Tetstimonials Section ======= -->
    <section class="testimonials" data-aos="fade-up">
      <div class="container">



        <div class="testimonials-carousel">
            <div class="testimonial-item">
<?php
echo "<img src='assets/img/cards-pictures/".$picture."' class='testimonial-img' alt=''>";
echo "<h3>".$card_name."</h3>";
echo "<i class='bi bi-telephone'></i> <a href='https://www.do-sd.net/qrcard/vcf/".$card_id.".vcf'>".$phone_no."</a>";
echo "<br>";
echo "<i class='bi bi-whatsapp'></i> <a href='https://wa.me/".$for_whatsapp_api_link."'>".$whatsapp_no."</a>";
echo "<br>";
echo "<i class='bi bi-envelope'></i> <a href='mailto:".$email."'>".$email."</a>";
echo "<br><br>";
echo "<img src='https://qrcode.tec-it.com/API/QRCode?data=https://www.do-sd.net/qrcard/?cid=".$card_id."' width='150' height='150' />";
?>
            </div>

          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Ttstimonials Section -->
	

  </main><!-- End #main -->


  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>