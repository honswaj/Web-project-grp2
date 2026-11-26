<?php
#__DIR__ Is the folder that the php is in
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/db.php';

$states = ['VIC', 'NSW', 'QLD', 'NT', 'WA', 'SA', 'TAS', 'ACT'];
$allSkills = ['communication', 'teamwork', 'problem-solving', 'first-aid', 'licence', 'computing'];
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $f = fn(string $k): string => is_string($_POST[$k] ?? null) ? trim($_POST[$k]) : '';

    $jobRef   = strtoupper($f('job_ref'));
    $first    = $f('first_name');
    $last     = $f('last_name');
    $dob      = $f('dob');
    $gender   = $f('gender');
    $street   = $f('street');
    $suburb   = $f('suburb');
    $state    = $f('state');
    $postcode = $f('postcode');
    $email    = $f('email');
    $phone    = $f('phone');
    $other    = $f('other_skills');
    $skills   = array_intersect($allSkills, (array)($_POST['skills'] ?? []));
    $dobDate  = DateTime::createFromFormat('d/m/Y', $dob);
// I have used ai for this part 
    $rules = [
    'job_ref'      => ['/^[A-Za-z0-9]{5}$/',   'Job reference must be exactly 5 letters or numbers.'],
    'first_name'   => ['/^[A-Za-z]{1,20}$/',   'First name must be letters only, up to 20 characters.'],
    'last_name'    => ['/^[A-Za-z]{1,20}$/',   'Last name must be letters only, up to 20 characters.'],
    'gender'       => ['/^(female|male|other)$/', 'Choose a gender.'],
    'street'       => ['/^.{1,40}$/u',         'Street address is required (up to 40 characters).'],
    'suburb'       => ['/^.{1,40}$/u',         'Suburb/Town is required (up to 40 characters).'],
    'state'        => ['/^(VIC|NSW|QLD|NT|WA|SA|TAS|ACT)$/', 'Choose a state from the list.'],
    'postcode'     => ['/^[0-9]{4}$/',         'Postcode must be exactly 4 digits.'],
    'phone'        => ['/^[0-9]{8,12}$/',      'Phone number must be 8 to 12 digits.'],
    'other_skills' => ['/^.{0,500}$/su',       'Other skills must be 500 characters or fewer.'],
];

foreach ($rules as $field => [$pattern, $message]) {
    if (!preg_match($pattern, $f($field))) { $errors[] = $message; }
}
if (!csrf_ok())                                      $errors[] = 'Your session expired. Please try again.';
if (!$dobDate || $dobDate->format('d/m/Y') !== $dob) $errors[] = 'Enter a real date of birth as dd/mm/yyyy.';
if (!filter_var($email, FILTER_VALIDATE_EMAIL))      $errors[] = 'Enter a valid email address.';
// This block runs only after every validation check has passed, It checks whether that the job exists, saves the application to the database, and sends the person to the thank-you page.
    if (!$errors) {
        try {
            $q = db()->prepare('SELECT id FROM jobs WHERE job_ref = ?');
            $q->execute([$jobRef]);
            $jobId = $q->fetchColumn();

            if ($jobId) {
                db()->prepare(
                    'INSERT INTO applications (job_id, first_name, last_name, dob, gender, street, suburb, state, postcode, email, phone, skills, other_skills)
                     VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)'
                )->execute([$jobId, $first, $last, $dobDate->format('Y-m-d'), $gender, $street, $suburb, $state, $postcode, $email, $phone, implode(', ', $skills), $other]);
                header('Location: confirmation.html');
                exit;
            }
            $errors[] = 'That job reference does not match any job.';
        } catch (PDOException $ex) {
            error_log($ex->getMessage());
            $errors[] = 'Sorry, we could not save your application. Please try again later.';
        }
    }
}

$pageTitle = 'Apply for Vinggroup';
$mainClass = 'wrap layout';
require __DIR__ . '/includes/header.php';
?>
    <?php include __DIR__ . '/includes/apply-summary.html'; ?>

    <form class="tablesInfo" action="apply.php" method="post">
      <?php if ($errors): ?>
        <div class="error">
          <ul>
            <?php foreach ($errors as $message): ?><li><?= e($message) ?></li><?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>
      <?= csrf_field() ?>

      <?php include __DIR__ . '/includes/apply-fields.html'; ?>

      <div class="buttons">
        <button type="submit">Send application</button>
        <button type="reset" class="secondary">Clear form</button>
      </div>
    </form>
  
<?php require __DIR__ . '/includes/footer.php'; ?>