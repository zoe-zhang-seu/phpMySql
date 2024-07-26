<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use MyProject\Controller\StaffDetailController;

$controller = new StaffDetailController();
$data = $controller->handleRequest();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff Details</title>
    <link rel="stylesheet" href="css/staffDetail.css"> <!-- Link to external CSS file -->
</head>
<body>
    <?php include 'sharedComponents/header.php'; ?>

    <h1>Staff Details</h1>

    <?php if (!empty($data['error'])): ?>
        <p style="color: red;"><?php echo htmlspecialchars($data['error']); ?></p>
    <?php endif; ?>

    <form action="" method="post">
        <div class="form-field">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($data['staffDetail']->getFirstName() ?? ''); ?>" readonly>
        </div>

        <div class="form-field">
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($data['staffDetail']->getLastName() ?? ''); ?>" readonly>
        </div>

        <div class="form-field">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($data['staffDetail']->getEmail() ?? ''); ?>" readonly>
        </div>

        <div class="form-field">
            <label for="comment">Comment:</label>
            <textarea id="comment" name="comment" rows="4" readonly><?php echo htmlspecialchars($data['staffDetail']->getComment() ?? ''); ?></textarea>
        </div>

        <button type="button" id="editButton" onclick="enableEditing()">Edit</button>
        <button type="submit" class="hidden" id="submitButton">Update</button>
    </form>

    <?php if (!empty($data['success'])): ?>
        <div class="modal" id="successModal">
            <div class="modal-content">
                <p><?php echo htmlspecialchars($data['success']); ?></p>
            </div>
        </div>
    <?php endif; ?>

    <?php include 'sharedComponents/footer.php'; ?>

    <script>
        function enableEditing() {
            document.querySelectorAll('input, textarea').forEach(function(element) {
                element.removeAttribute('readonly');
            });
            document.getElementById('editButton').classList.add('hidden');
            document.getElementById('submitButton').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('successModal').style.display = 'none';
        }

        // Show modal if success message is present
        <?php if (!empty($data['success'])): ?>
            document.getElementById('successModal').style.display = 'flex';
        <?php endif; ?>
    </script>
</body>
</html>
