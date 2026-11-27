<?php
$base       = '';
$pageTitle  = 'about page';
$pageStyles = ['styles/stylesheet_about.css'];

require_once __DIR__ . '/../includes/db.inc';  

$rows = db()->query(
    "SELECT m.name, c.description
     FROM members m
     JOIN contributions c ON c.member_id = m.id
     ORDER BY m.id, c.id"
)->fetchAll();

$team = [];
foreach ($rows as $row) {
    $team[$row['name']][] = $row['description'];
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta name="keywords" content="Application, Vinggroup">
    <?php include __DIR__ . '/../includes/head.inc'; ?>
  </head>

  <body>
    <?php include __DIR__ . '/../includes/header.inc'; ?>

    <h1 style="border: solid 6px;background-color: #3d322a; margin-left: 20%; margin-right: 20%; margin-top: 10%; text-decoration: none; padding:0.2em 0.6em;">Ving-Group members</h1>
    <header><h1 style="border: solid 6px; background-color: #3d322a; margin-left: 25%; margin-right: 25%; text-decoration: none; padding:0.2em 0.6em;">ABOUT US</h1></header>
    <p class="aboutInfo">We are a student team exploring how digital technologies 
      can help build smarter, and more sustainable cities. 
      Our project combines web development, data management, 
      infrastructure planning, and accessible design to present a realistic 
      smart city consultancy.
    </p>
    <div class="grpphoto">
      <img src="images/groupphoto.png" alt="photo">
    </div>
    <div class="card-row">
  
      <div class="card">
        <div class="card-header">Student ID</div>
        <div class="avatar">NM</div>
        <h2>Đinh Hoàng Nhật Minh</h2>
        <p class="student-id">ID: SWH03729</p>
        <dl>
          <dt>1st Year Student</dt>
          <dd>"Cần cù bù thông minh."</dd>
          <dd>"Hard work makes up for a lack of intelligence."</dd>
        </dl>
      </div>
  
      <div class="card">
        <div class="card-header">Student ID</div>
        <div class="avatar">CA</div>
        <h2>Hoàng Châu Anh</h2>
        <p class="student-id">ID: SWH03852</p>
      <dl>
          <dt>1st Year Student</dt>
          <dd>"Có công mài sắt, có ngày nên kim."</dd>
          <dd>"Practice makes perfect."</dd>
      </dl>
      </div>
  
      <div class="card">
        <div class="card-header">Student ID</div>
        <div class="avatar">NA</div>
        <h2>Trần Nam Anh</h2>
        <p class="student-id">ID: SWH03574</p>
        <dl>
          <dt>1st Year Student</dt>
          <dd>"Tri thức là sức mạnh."</dd>
          <dd>"Intelligence is strength."</dd>
        </dl>
      </div>
  
      <div class="card">
        <div class="card-header">Student ID</div>
        <div class="avatar">TA</div>
        <h2>Lê Trung Tuấn Anh</h2>
        <p class="student-id">ID: SWH03911</p>
        <dl>
          <dt>1st Year Student</dt>
          <dd>"Học đi đôi với hành."</dd>
          <dd>"Theory and practice go hand in hand."</dd>
        </dl>
      </div>
    </div>
  <br>
  <br>
  <table class="tableFact">
    <tr class="infobar">
      <th>Name</th>
      <th>Contributions</th>
    </tr>
    <?php foreach ($team as $name => $lines): ?>
    <tr>
      <td><?= htmlspecialchars($name) ?></td>
      <td><?= implode('<br>', array_map('htmlspecialchars', $lines)) ?></td>
    </tr>
    <?php endforeach; ?>
  </table>

  <ol class="classtime">
      <li>COS10026/Class 2:
        <ul>
          <li> 8AM -&gt; 12PM on Fridays</li>
        </ul>
      </li>
  </ol> 
    <div class="acknowledge">
      <h1>Acknowledgement of Country</h1>
      <p>We acknowledge the Traditional Custodians of the lands on which we work, learn and collaborate, and pay our respects to Elders past and present. We recognise the continuing connection of Aboriginal and Torres Strait Islander peoples to Country, culture and community.
      <br>
      As a smart city infrastructure consultancy, we recognise that decisions about transport, energy and urban services affect communities in different ways. We are committed to listening to First Nations perspectives, supporting respectful community engagement, and encouraging inclusive employment opportunities. We aim to develop digital infrastructure that considers cultural heritage, community priorities and equitable access to services.
      </p>
    </div>

    <?php include __DIR__ . '/../includes/footer.inc'; ?>
  </body>
</html>