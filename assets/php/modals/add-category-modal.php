<?php echo '<form method="POST" action="#manage-categories">
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4" style="border-radius: 15px; background-color: white; border: none;">
                <div class="modal-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h1 class="heading" style="margin: 0;">Add New Category</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="mb-3">
                        <label for="categoryType">Category Type</label>
                        <select class="form-control" id="categoryType" name="categoryType">
                            <option value="" disabled selected>Select a category</option>
                            <option value="Expense" <?php echo ($categoryType == \'expense\') ? \'selected\' : \'\'; ?>
                                Expense
                            </option>
                            <option value="Income" <?php echo ($categoryType == \'income\') ? \'selected\' : \'\'; ?>Income
                            </option>
                            <option value="Savings" <?php echo ($categoryType == \'savings\') ? \'selected\' : \'\'; ?>
                                Savings
                            </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="categoryName" class="form-label paragraph">Category Name</label>
                        <input type="text" class="form-control" id="categoryName" name="categoryName"
                            placeholder="Enter Category Name" required>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" id="saveButton" class="btn btn-primary"
                            style="background-color: var(--primaryColor); color: white; font-weight: bold; border: none; padding: 0.5rem 1.5rem;"
                            data-bs-toggle="modal" data-bs-target="#addCategorySuccessModal">
                            SAVE
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="addCategorySuccessModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content"
                style="border-radius: 15px; background-color: var(--primaryColor); color: white; text-align: center; border: none;">
                <div class="modal-body p-4">
                    <h5>Category successfully added!</h5>
                    <button type="submit" name="btnSaveCategory" class="btn mt-3"
                        style="background-color: white; color: var(--primaryColor); font-weight: bold; padding: 0.5rem 1.5rem; border-radius: 5px; border: none;"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    document.addEventListener(\'DOMContentLoaded\', function () {
        const categoryType = document.getElementById(\'categoryType\');
        const categoryName = document.getElementById(\'categoryName\');
        const saveButton = document.getElementById(\'saveButton\');

        saveButton.disabled = true;

        function toggleButton() {
            if (categoryType.value && categoryName.value) {
                saveButton.disabled = false;
            } else {
                saveButton.disabled = true;
            }
        }

        categoryType.addEventListener(\'change\', toggleButton);
        categoryName.addEventListener(\'input\', toggleButton);
    });
</script>';
?>