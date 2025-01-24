<?php
class User
{
    public $userResult;
    public $userID;
    public $firstName;
    public $lastName;
    public $username;
    public $birthday;
    public $email;
    public $recentLogin;
    public $status;
    public $profilePicture;

    public function queryAllUsers()
    {
        $userQuery = "SELECT users.*, logins.loginDate AS recentLogin FROM users
        LEFT JOIN logins ON users.userID = logins.userID
        WHERE users.role = 'user' AND logins.loginDate = (
            SELECT MAX(loginDate) 
            FROM logins 
            WHERE logins.userID = users.userID)";

        if (isset($_GET['searchUser']) && (!empty($_GET['searchUser']))) {
            $searchUser = $_GET['searchUser'];

            if (strcasecmp($searchUser, 'Clear') !== 0) // insert this
                $userQuery .= " AND ((username LIKE '%$searchUser%') OR (firstName LIKE '%$searchUser%') OR (lastName LIKE '%$searchUser%'))";
            else {
                header("Location: users.php");
                exit();
            }

        }

        $userQuery .= " ORDER BY ";

        if (isset($_GET['sortBy']) && (!empty($_GET['sortBy']))) {
            $sortOption = $_GET['sortBy'];
            $userQuery .= "$sortOption";
        } else {
            $userQuery .= "users.userID";
        }

        if (isset($_GET['orderBy'])) {
            $orderOption = $_GET['orderBy'];
            $userQuery .= " $orderOption;";
        }

        $this->userResult = executeQuery($userQuery);
    }

    public function queryUserInfo($userID)
    {
        $userQuery = "SELECT users.*, logins.loginDate AS recentLogin FROM users
        LEFT JOIN logins ON users.userID = logins.userID
        WHERE users.userID = '$userID' AND users.role = 'user' AND logins.loginDate = (
            SELECT MAX(loginDate) 
            FROM logins 
            WHERE logins.userID = users.userID)
        ORDER BY users.userID";

        $this->userResult = executeQuery($userQuery);
    }

    public function setAttributes($userRow)
    {
        $this->userID = $userRow['userID'];
        $this->firstName = $userRow['firstName'];
        $this->lastName = $userRow['lastName'];
        $this->username = $userRow['username'];
        $this->recentLogin = $userRow['recentLogin'];
        $this->birthday = $userRow['birthday'];
        $this->email = $userRow['email'];
        $this->profilePicture = ($userRow['profilePicture']) ? $userRow['profilePicture'] : "defaultProfile.png";
        $this->status = (strtotime($this->recentLogin) > strtotime('-30 days')) ? "Active" : "Inactive";
    }

    public function createRow($userRow)
    {
        $this->setAttributes($userRow);
        $willDisable = ($this->status == "Active") ? "disabled" : "";

        return '
        <tr>
            <td>' . $this->userID . '</td>
            <td>' . $this->firstName . '</td>
            <td>' . $this->lastName . '</td>
            <td>' . $this->username . '</td>
            <td>' . date('Y-m-d', strtotime($this->recentLogin)) . '</td>

            <!-- Action Buttons -->
            <td class="text-center">
                <!-- View -->
                <a class="btn btn-primary my-1" href="view.php?id=' . $this->userID . '">
                    View
                </a>

                <!-- Delete -->
                <a class="btn btn-danger my-1 '. $willDisable .'" data-bs-toggle="modal"
                    data-bs-target="#deleteUser'. $this->userID . 'Modal">
                    Delete
                </a>
            </td>
        </tr>
        '. loadDeleteUserModal($this->userID, $this->firstName, $this->lastName) . '
        ';
    }

    public function createCard()
    {
        return '
        <div class="card stat-card w-100">
            <div class="row py-2">
                <!-- Profile Picture -->
                <div class="col-12 col-md-2 p-2 d-flex justify-content-center align-items-center">
                    <img src="../assets/images/userProfile/' . $this->profilePicture . '" alt="Profile Picture"
                        class="rounded-circle img-fluid" width="150" height="140">
                </div>

                <!-- User Information -->
                <div class="col-12 col-md-10 pt-3 d-flex justify-content-start align-items-center">
                    <ul class="list-unstyled">
                        <li><b>' . $this->firstName . " " . $this->lastName . '</b></li>
                        <li><i>' . $this->username . '</i></li>
                        <br>
                        <li><b>Birthday:</b> ' . $this->birthday . '</li>
                        <li><b>Email:</b> ' . $this->email . '</li>
                        <li><b>Status:</b> ' . $this->status . '</li>
                    </ul>
                </div>
            </div>
        </div>
        ';
    }

    public function showRecentLogins($userID)
    {
        $loginsQuery = "SELECT * FROM logins WHERE userID = '$userID' AND loginDate >= NOW() - INTERVAL 30 DAY ORDER BY loginDate DESC";
        $loginsResult = executeQuery($loginsQuery);

        $loginRows = '';
        $loginNo = 1;

        if (mysqli_num_rows($loginsResult) > 0) {
            while ($loginRow = mysqli_fetch_assoc($loginsResult)) {
                $loginDate = date('F j, Y', strtotime($loginRow['loginDate']));
                $loginTime = date('h:i A', strtotime($loginRow['loginDate']));

                $loginRows .= '
                <tr class="text-center align-middle">
                    <td scope="row">' . $loginNo . '</td>
                    <td>' . $loginDate . '</td>
                    <td>' . $loginTime . '</td>
                </tr>
                ';
                $loginNo++;
            }
            return $loginRows;
        } else {
            return '
            <tr class="text-center align-middle">
                <td colspan="100%">No recent logins found.</td>
            </tr>
            ';
        }
    }
}
?>