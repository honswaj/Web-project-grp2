
<?php
// Job Openings Page
?>
<?php
$base       = '';
$pageTitle  = 'Job Openings';
$pageStyles = ['styles/jobs.css'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include __DIR__ . '/../includes/head.inc'; ?>

    <style>
    .cornerLogo {
      height: 60px;
      width: auto;
    }
    </style>
</head>

<body>
  <?php include __DIR__ . '/../includes/header.inc'; ?>
    <header>
        <section class="intro">
    <h1 id="job-openings">Job Openings</h1>

    <p class="job-subtitle">
        <b>Come join our team and help shape the future of smart cities!</b>
    </p>

    <div class="search_bar">
        <form action="jobs.php" method="GET">
            <input
                type="text"
                name="search"
                placeholder="search..."
            >
            <button type="submit">Search</button>
        </form>
    </div>
</section>
    </header>

    <main>
        <section class="job-listings">

        <div class="jo1_containter">
            <article class="box1">
                <div class="job-text">
                <h2 class="J">Job 1: Smart Transport Systems Analyst.</h2>

                 <aside class="job-aside">
        <img class="jo1_img" src="images/analysis_transport.jpg" alt="Transport analysis">
        <p>Melbourne, VIC<br>AUD $85,000 to $105,000</p>
    </aside>

                <p><strong class="bold">Reports to:</strong> Transport Solutions Manager</p>

                <p id="l">
                    The analyst supports the design and evaluation of digital
                    transport systems, using operational data to improve traffic
                    management, public transport coordination and mobility planning.
                </p>

                <h3>Responsibilities include:</h3>
                <ul>
                    <li>Analyse traffic, fleet and public transport datasets.</li>
                    <li>Develop and implement data-driven solutions to improve transport efficiency.</li>
                    <li>Work with councils and transport operators to identify operational issues.</li>
                    <li>Assist with system testing, data quality checks and project documentation.</li>
                </ul>

                <h3>Requirements:</h3>
                <ul>
                    <li>Degree in transport planning, data science, computer science or a related field.</li>
                    <li>Experience with data analysis tools (e.g., Python, R, SQL).</li>
                    <li>Strong problem-solving and communication skills.</li>
                    <li>Ability to work independently and as part of a team.</li>
                </ul>
                </div>
            </article>
        </div>

        <div class="jo2_container">
            <article class="box2">
                <div class="job-text">
                <h2 class="J">Job 2: Smart Energy Data Engineer.</h2>

                 <aside class="job-aside">
        <img class="jo2_img" src="images/engineer.jpg" alt="Data engineer">
        <p>Melbourne, VIC<br>AUD $100,000 to $125,000</p>
    </aside>

                <p><strong class="bold">Reports to:</strong> Digital Infrastructure Lead</p>

                <p>
                    The engineer develops data pipelines and monitoring integrations
                    that help councils and energy partners understand energy
                    consumption, monitor infrastructure performance and identify
                    opportunities to improve efficiency.
                </p>

                <h3>Responsibilities include:</h3>
                <ul>
                    <li>Build and maintain data pipelines for energy monitoring platforms.</li>
                    <li>Integrate data from meters, sensors and infrastructure systems.</li>
                    <li>Validate data quality, reliability and system performance.</li>
                    <li>Document technical designs and collaborate with software and infrastructure teams.</li>
                </ul>

                <h3>Requirements:</h3>
                <ul>
                    <li>Degree in computer science, data engineering or a related field.</li>
                    <li>Practical knowledge of SQL and Python or a comparable programming language.</li>
                    <li>Understanding of APIs, databases and data integration.</li>
                    <li>Strong troubleshooting, documentation and teamwork skills.</li>
                </ul>
                </div>
            </article>
        </div>

        </section>
    </main>

    <?php include __DIR__ . '/../includes/footer.inc'; ?>
</body>
</html>
