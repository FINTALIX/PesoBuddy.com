<?php

class CategoryManager
{
    // Properties
    public $defaultCategoryID;
    public $defaultCategoryName;
    public $defaultCategoryType;

    // Create Default Category
    public function createCategory($defaultCategoryName, $defaultCategoryType)
    {
        $query = "INSERT INTO defaultcategories (defaultCategoryName, defaultCategoryType) VALUES ('$defaultCategoryName', '$defaultCategoryType')";
        return $this->executeQuery($query);
    }

    // Read Default Categories
    public function getDefaultCategories()
    {
        $query = "SELECT * FROM defaultcategories";
        $result = $this->executeQuery($query);
        return $result;
    }

    // Update Default Category
    public function updateDefaultCategory($defaultCategoryID, $defaultCategoryName, $defaultCategoryType)
    {
        $query = "UPDATE defaultcategories SET defaultCategoryName = '$defaultCategoryName', defaultCategoryType = '$defaultCategoryType' WHERE defaultCategoryID = $defaultCategoryID";
        return $this->executeQuery($query);
    }

    // Delete Default Category
    public function deleteDefaultCategory($defaultCategoryID)
    {
        $query = "DELETE FROM defaultcategories WHERE defaultCategoryID = $defaultCategoryID";
        return $this->executeQuery($query);
    }

    // Read User's Categories
    public function getUserCategories()
    {
        $query = "SELECT DISTINCT(categoryName) FROM categories";
        $result = $this->executeQuery($query);
        return $result;
    }

    // Display Default Categories 
    public function displayDefaultCategories()
    {
        $defaultCategories = $this->getDefaultCategories();
        $defaultCategoryRows = '';

        while ($row = mysqli_fetch_assoc($defaultCategories)) {

            // Default Categories Row
            $defaultCategoryRows .= '
            <tr class="text-center align-middle">
                <td scope="row">' . $row['defaultCategoryID'] . '</td>
                <td>' . $row['defaultCategoryName'] . '</td>
                <td>' . $row['defaultCategoryType'] . '</td>
                <td class="text-end">
                    <div class="dropdown dropstart">
                        <button class="btn options-btn p-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item option-dropdown" data-bs-toggle="modal" data-bs-target="#editCategory-' . $row['defaultCategoryID'] . '">
                                    <i class="bi bi-pencil-square px-1"></i> Edit
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item option-dropdown" data-bs-toggle="modal" data-bs-target="#deleteCategory-' . $row['defaultCategoryID'] . '">
                                    <i class="bi bi-trash3 px-1"></i> Delete
                                </a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>';

            // Default Categories Edit Modal
            $defaultCategoryRows .= '
             <form method="POST">
                <div class="modal fade" id="editCategory-' . $row['defaultCategoryID'] . '" tabindex="-1"
                    aria-labelledby="editCategoryLabel-' . $row['defaultCategoryID'] . '" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content py-4 px-2"
                            style="border-radius: 15px; background-color: white; border: none;">
                            <div class="modal-body">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <p class="heading" style="margin: 0;">EDIT CATEGORY</p>
                                    <!-- Close button -->
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <input type="hidden" name="defaultCategoryID" value="' . $row['defaultCategoryID'] . '">
                                <div class="mb-3">
                                    <input type="text" class="form-control"
                                        id="adminEditCategoryType-' . $row['defaultCategoryID'] . '"
                                        name="defaultCategoryType" placeholder="Type"
                                        value="' . $row['defaultCategoryType'] . '">
                                </div>
                                <div class="mb-4">
                                    <input type="text" class="form-control"
                                        id="adminEditCategoryName-' . $row['defaultCategoryID'] . '"
                                        name="defaultCategoryName" placeholder="Category"
                                        value="' . $row['defaultCategoryName'] . '">
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <button type="button" class="btn btn-primary me-2"
                                                style="background-color: var(--borderColor); color: white; font-weight: bold; border: none; padding: 0.5rem 1rem;"
                                                data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close">
                                                CANCEL
                                            </button>
                                            <button type="button" class="btn btn-primary"
                                                style="background-color: var(--primaryColor); color: white; font-weight: bold; border: none; padding: 0.5rem 1.5rem;"
                                                data-bs-target="#editSuccessModal-' . $row['defaultCategoryID'] . '" data-bs-toggle="modal"
                                                data-bs-dismiss="modal">
                                                EDIT
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="editSuccessModal-' . $row['defaultCategoryID'] . '" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content"
                            style="border-radius: 15px; background-color: var(--primaryColor); color: white; text-align: center; border: none;">
                            <div class="modal-body p-4">
                                <h5 class="subheading text-uppercase">Category successfully edited!</h5>
                                <button type="submit" class="btn mt-3" name="editCategory"
                                    style="background-color: white; color: var(--primaryColor); font-weight: bold; padding: 0.5rem 1.5rem; border-radius: 5px; border: none;"
                                    data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>';

            // Default Categories Delete Modal
            $defaultCategoryRows .= '
            <form method="POST">
                <div class="modal fade" id="deleteCategory-' . $row['defaultCategoryID'] . '" tabindex="-1"
                    aria-labelledby="deleteCategoryLabel-' . $row['defaultCategoryID'] . '" aria-hidden="true"
                    data-bs-backdrop="static" data-bs-keyboard="false">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="border-radius: 15px; background-color: white;">
                            <div style="position: relative; padding: 1rem;">
                                <!-- Title -->
                                <h4 class="modal-title heading text-black"
                                    id="deleteCategoryLabel-' . $row['defaultCategoryID'] . '"
                                    style="margin: 0; font-size: 26px;">
                                    DELETE CATEGORY
                                </h4>

                                <!-- Close button -->
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    style="position: absolute; top: 26px; right: 40px; transform: translateX(26px);">
                                </button>

                                <!-- Card content -->
                                <div class="card"
                                    style="border: 2px solid red; background-color: rgba(255, 0, 0, 0.1); border-radius: 10px; padding: 1rem; margin-top: 1rem;">
                                    <p class="paragraph" style="margin: 0;">Are you sure you want to delete this category
                                        <strong>' . htmlspecialchars($row['defaultCategoryName']) . '</strong>?
                                    </p>
                                    <p class="paragraph" style="color: red; margin: 0.5rem 0 0 0;">
                                        Once deleted, it cannot be retrieve anymore.
                                    </p>
                                </div>

                                <!-- Footer buttons -->
                                <div class="modal-footer d-flex justify-content-end" style="border: none;">
                                    <button type="button" class="btn paragraph" data-bs-dismiss="modal"
                                        style="background-color: var(--linkHoverColor); color: var(--primaryColor);">
                                        Cancel
                                    </button>
                                    <button type="button" class="btn btn-danger paragraph" data-bs-toggle="modal"
                                        data-bs-target="#confirmDeleteAccountModal-' . $row['defaultCategoryID'] . '"
                                        style="color: white; margin-left: 0.5rem;">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="confirmDeleteAccountModal-' . $row['defaultCategoryID'] . '" tabindex="-1"
                    aria-labelledby="confirmDeleteAccountLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content"
                            style="border-radius: 15px; background-color:rgb(141, 26, 37); color: white; border: none;">
                            <div class="modal-header" style="border: none;">
                                <h4 class="modal-title heading text-center w-100" id="confirmDeleteModalLabel"
                                    style="margin: 0;"> Category Deleted
                                </h4>
                            </div>
                            <div class="modal-body text-center">The category has been successfully
                                deleted.
                            </div>
                            <div class="modal-footer d-flex justify-content-center" style="border: none;">
                                <input type="hidden" name="defaultCategoryID" value="' . $row['defaultCategoryID'] . '">
                                <button type="submit" name="deleteCategory" class="btn btn-light paragraph">
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>';
        }
        return $defaultCategoryRows;
    }

    // Display User's Categories 
    public function displayCategories()
    {
        $userCategories = $this->getUserCategories();
        $userCategoryRows = '';

        while ($row = mysqli_fetch_assoc($userCategories)) {
            $userCategoryRows .= '
            <ul class="list-unstyled">
                        <li>' . $row['categoryName'] . '</li>
                    </ul>';
        }
        return $userCategoryRows;
    }
    private function executeQuery($query)
    {
        $conn = $GLOBALS['conn'];
        return mysqli_query($conn, $query);
    }

}

$categoryManager = new CategoryManager();

// Create, Edit, and Delete 
if (isset($_POST['addCategory'])) {
    $categoryManager->createCategory($_POST['defaultCategoryName'], $_POST['defaultCategoryType']);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if (isset($_POST['editCategory'])) {
    $categoryManager->updateDefaultCategory($_POST['defaultCategoryID'], $_POST['defaultCategoryName'], $_POST['defaultCategoryType']);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if (isset($_POST['deleteCategory'])) {
    $categoryManager->deleteDefaultCategory($_POST['defaultCategoryID']);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

?>