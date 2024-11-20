<?php  
require_once 'dbConfig.php';

// Get all applicants
function getAllApplicants($pdo) {
    $sql = "SELECT * FROM job_applicants ORDER BY date_applied DESC";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute()) {
        return ['message' => 'Applicants fetched successfully', 'statusCode' => 200, 'querySet' => $stmt->fetchAll()];
    }
    return ['message' => 'Query failed', 'statusCode' => 400];
}

// Get applicant by ID
function getApplicantByID($pdo, $id) {
    $sql = "SELECT * FROM job_applicants WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$id])) {
        return ['message' => 'Applicant fetched successfully', 'statusCode' => 200, 'querySet' => $stmt->fetch()];
    }
    return ['message' => 'Query failed', 'statusCode' => 400];
}

// Insert a new applicant
function insertNewApplicant($pdo, $first_name, $last_name, $email, $phone_number, $address, $city, $state, $country, $job_position) {
    $sql = "INSERT INTO job_applicants (first_name, last_name, email, phone_number, address, city, state, country, job_position) VALUES (?,?,?,?,?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$first_name, $last_name, $email, $phone_number, $address, $city, $state, $country, $job_position])) {
        return ['message' => 'Applicant added successfully', 'statusCode' => 200];
    }
    return ['message' => 'Query failed', 'statusCode' => 400];
}

// Edit an applicant
function editApplicant($pdo, $first_name, $last_name, $email, $phone_number, $address, $city, $state, $country, $job_position, $id) {
    $sql = "UPDATE job_applicants SET first_name = ?, last_name = ?, email = ?, phone_number = ?, address = ?, city = ?, state = ?, country = ?, job_position = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$first_name, $last_name, $email, $phone_number, $address, $city, $state, $country, $job_position, $id])) {
        return ['message' => 'Applicant updated successfully', 'statusCode' => 200];
    }
    return ['message' => 'Query failed', 'statusCode' => 400];
}

// Delete an applicant
function deleteApplicant($pdo, $id) {
    $sql = "DELETE FROM job_applicants WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$id])) {
        return ['message' => 'Applicant deleted successfully', 'statusCode' => 200];
    }
    return ['message' => 'Query failed', 'statusCode' => 400];
}

// Search for applicants
function searchApplicants($pdo, $searchQuery) {
    $sql = "SELECT * FROM job_applicants WHERE CONCAT(first_name, last_name, email, phone_number, address, city, state, country, job_position) LIKE ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute(["%$searchQuery%"])) {
        return ['message' => 'Search results fetched successfully', 'statusCode' => 200, 'querySet' => $stmt->fetchAll()];
    }
    return ['message' => 'Query failed', 'statusCode' => 400];
}



?>
