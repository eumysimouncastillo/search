<?php
require_once 'models.php';

if (isset($_POST['insertApplicantBtn'])) {
    $response = insertNewApplicant($pdo, $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['phone_number'], $_POST['address'], $_POST['city'], $_POST['state'], $_POST['country'], $_POST['job_position']);
    $_SESSION['message'] = $response['message'];
    header("Location: ../index.php");
}

if (isset($_POST['editApplicantBtn'])) {
    $response = editApplicant($pdo, $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['phone_number'], $_POST['address'], $_POST['city'], $_POST['state'], $_POST['country'], $_POST['job_position'], $_GET['id']);
    $_SESSION['message'] = $response['message'];
    header("Location: ../index.php");
}

if (isset($_POST['deleteApplicantBtn'])) {
    $response = deleteApplicant($pdo, $_GET['id']);
    $_SESSION['message'] = $response['message'];
    header("Location: ../index.php");
}

/*
if (isset($_GET['searchBtn'])) {
    $searchQuery = $_GET['searchInput'];
    $response = searchApplicants($pdo, $searchQuery);
    // Handle search results
    foreach ($response['querySet'] as $row) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['first_name']}</td>
            <td>{$row['last_name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['phone_number']}</td>
            <td>{$row['address']}</td>
            <td>{$row['city']}</td>
            <td>{$row['state']}</td>
            <td>{$row['country']}</td>
            <td>{$row['job_position']}</td>
        </tr>";
    }
}
*/
?>
