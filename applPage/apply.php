<?php
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
# I have used ai for this part 
    if (!csrf_ok())                                         $errors[] = 'Your session expired. Please try again.';
    if (!preg_match('/^[A-Za-z0-9]{5}$/', $jobRef))         $errors[] = 'Job reference must be exactly 5 letters or numbers.';
    if (!preg_match('/^[A-Za-z]{1,20}$/', $first))          $errors[] = 'First name must be letters only, up to 20 characters.';
    if (!preg_match('/^[A-Za-z]{1,20}$/', $last))           $errors[] = 'Last name must be letters only, up to 20 characters.';
    if (!$dobDate || $dobDate->format('d/m/Y') !== $dob)    $errors[] = 'Enter a real date of birth as dd/mm/yyyy.';
    if (!in_array($gender, ['female', 'male', 'other']))    $errors[] = 'Choose a gender.';
    if ($street === '' || mb_strlen($street) > 40)          $errors[] = 'Street address is required (up to 40 characters).';
    if ($suburb === '' || mb_strlen($suburb) > 40)          $errors[] = 'Suburb/Town is required (up to 40 characters).';
    if (!in_array($state, $states))                         $errors[] = 'Choose a state from the list.';
    if (!preg_match('/^[0-9]{4}$/', $postcode))             $errors[] = 'Postcode must be exactly 4 digits.';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))         $errors[] = 'Enter a valid email address.';
    if (!preg_match('/^[0-9]{8,12}$/', $phone))             $errors[] = 'Phone number must be 8 to 12 digits.';
    if (mb_strlen($other) > 500)                            $errors[] = 'Other skills must be 500 characters or fewer.';

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
                header('Location: confirmation.php');
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