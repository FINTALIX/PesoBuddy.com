<?php
header("Content-Type: application/json");
include("connect.php");

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'GET':
        handleGet($pdo);
        break;
    case 'POST':
        handlePost($pdo, $input);
        break;
    case 'PUT':
      handlePUT($pdo, $input);
      break;
    case 'DELETE':
        handleDelete($pdo, $input);
        break;
    default:
        echo json_encode(['message' => 'Invalid request method']);
        break;
}

function handleGet($pdo)
{
  $sql = "SELECT * FROM users";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($result);
}

function handlePost($pdo, $inputs)
{
  $sql = "INSERT INTO users (userName, email, password, firstName, lastName, birthday, dateCreated, role ) VALUES (:userName, :email, :password, :firstName, :lastName, :birthday, :dateCreated, :role)";
 
  foreach($inputs as $input){
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      'userName' => $input['userName'],
    'email' => $input['email'],
    'password' => $input['password'],
    'firstName' => $input['firstName'],
    'lastName' => $input['lastName'],
    'birthday' => $input['birthday'],
    'dateCreated' => date('Y-m-d H:i:s'), 
    'role' => $input['role']
    ]);
  }

  echo json_encode(['message' => 'User created successfully']);
}

function handlePUT($pdo)
{
    
    $data = json_decode(file_get_contents('php://input'), true);
    if (!isset($data['ids']) || !is_array($data['ids'])) {
        echo json_encode(['error' => 'Invalid input. Expected an array of IDs.']);
        http_response_code(400); 
        return;
    }

  
    $inputs = $data['ids'];
    $sql = "UPDATE users SET role='admin' WHERE userID = :id";

    
    foreach ($inputs as $input) {
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $input]); 
    }

    echo json_encode(['message' => 'Users updated successfully']);
}

function handleDelete($pdo)
{
    
    $data = json_decode(file_get_contents('php://input'), true);
    if (!isset($data['ids']) || !is_array($data['ids'])) {
        echo json_encode(['error' => 'Invalid input. Expected an array of IDs.']);
        http_response_code(400); 
        return;
    }

  
    $inputs = $data['ids'];
    $sql = "DELETE FROM users WHERE userID = :id";

    
    foreach ($inputs as $input) {
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $input]); 
    }

    echo json_encode(['message' => 'Users deleted successfully']);
}
?>