<!-- /*

filename: [index.html]

author: [Tran Nam Anh]

created: [21/10/2026]

last modified: [21/10/2026]

description: [index.html]

time pre edit: [5:42 PM]
*/ -->

<?php
$base       = '';
$pageTitle  = 'Home page';
$pageStyles = ['styles/index.css'];
$headerClass = 'indexHeader';
$logoClass = 'logo';
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="description" content="Home Page">
   <meta name="author" content="Tran Nam Anh - Elbosn">
   <?php include __DIR__ . '/../includes/head.inc'; ?>
   <!-- References to Stylesheet -->

   <style>
      .logo {
         margin-right: 2%;
      }
   </style>
</head>

<body>

   <?php include __DIR__ . '/../includes/header.inc'; ?>


   <section class="hero">

      <div class="hero-text">

         <p class="slogan">For Smarter Urban Infrastructure</p>

         <h1 class="hero-title">
            Connected cities. Brighter futures. Connected today, smarter tomorrows.
         </h1>

         <p class="description">
            Smart City Infrastructure Consultancy partners with local councils,
            government agencies and industry leaders to design and deliver digital
            solutions that improve the way cities operate. Our work connects
            transport systems, energy infrastructure and urban services through
            reliable data platforms and practical technology.
         </p>

      </div>

      <div class="hero-visual">

         <img src="images/homeimage.png"
              class="hero-image"
              alt="Home image">

         <!-- I use AI to generate the image -->

      </div>

   </section>


   <section class="services">

      <h2 class="section-title" style="margin-top: 0.1px;">OUR SERVICES</h2>

      <div class="service-content">

         <div class="the-service" id="smart-transport">

            <h3>Smart Transport</h3>

            <p>
               We develop digital transport platforms that support
               traffic monitoring, public transport coordination,
               mobility planning and safer urban journeys.
            </p>

         </div>


         <div class="the-service" id="energy-monitoring">

            <h3>Energy monitoring</h3>

            <p>
               We help organisations monitor energy consumption, identify
               inefficiencies and make informed decisions about
               sustainable infrastructure.
            </p>

         </div>


         <div class="the-service" id="urban-services">

            <h3>Urban services management</h3>

            <p>
               We integrate data from urban assets and services to improve
               maintenance planning, operational visibility and
               community service delivery.
            </p>

         </div>

      </div>

   </section>


   <hr>


   <section class="why">

      <h2 class="why-title">WHY CHOOSE US</h2>

      <div class="why-content">

         <ul class="why-list">

            <li>
               Practical innovation: Technology designed around real
               community needs.
            </li>

            <li>
               Connected solutions: Platforms that help different systems
               share useful information.
            </li>

            <li>
               Sustainability: Better data to support efficient resource
               use and long-term planning.
            </li>

            <li>
               Collaborative delivery: Close partnerships with councils,
               engineers and technology teams.
            </li>

         </ul>

      </div>

   </section>


   <hr>


   <section class="planning">

      <h2 class="planning-title">EXAMPLE INFRASTRUCTURE PLANNING</h2>

      <div class="table-wrap">

         <table class="planning-table">

            <thead>

               <tr class="first">
                  <th colspan="3">PLANNING</th>
               </tr>

               <tr class="latter">
                  <th>Infrastructure area</th>
                  <th>Digital solution</th>
                  <th>Intended outcome</th>
               </tr>

            </thead>

            <tbody>

               <tr>
                  <td>Transport</td>
                  <td>Traffic and fleet monitoring</td>
                  <td>Improved transport coordination</td>
               </tr>

               <tr>
                  <td>Energy</td>
                  <td>Consumption dashboards</td>
                  <td>Better energy efficiency</td>
               </tr>

               <tr>
                  <td>Urban assets</td>
                  <td>Maintenance tracking</td>
                  <td>More proactive maintenance</td>
               </tr>

               <tr>
                  <td>Community services</td>
                  <td>Integrated reporting</td>
                  <td>Improved service visibility</td>
               </tr>

            </tbody>

         </table>

      </div>

   </section>


   <hr>


   <section class="careers">

      <h2 class="careers-title">BUILD THE CITIES OF TOMORROW</h2>

      <p class="careers-text">
         Join a multidisciplinary team delivering digital infrastructure
         projects that help Australian communities become more connected,
         efficient and sustainable. We welcome people who enjoy solving
         complex problems, collaborating with industry partners and
         creating technology with real-world impact.
      </p>

   </section>


   <hr>


   <?php include __DIR__ . '/../includes/footer.inc'; ?>

</body>
</html>