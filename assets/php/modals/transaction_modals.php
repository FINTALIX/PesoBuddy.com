<!-- EDIT TRANSACTION -->
<form method="POST" action="#transaction-history">
    <input type="hidden" value="<?php echo $transactionHistory->transactionID ?>" name="transactionID">

    <!-- Edit Transaction Modal -->
    <div class="modal fade" id="editTransaction<?php echo $transactionHistory->transactionID ?>" tabindex="-1"
        aria-labelledby="editTransactionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4" style="border-radius: 15px; background-color: white; border: none;">
                <div class="modal-body">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="heading" style="margin: 0; font-size: 1.8rem;">
                            Edit Transaction
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="mb-3">
                        <div class="row g-3">

                            <!-- Transaction Type -->
                            <div class="col-md-7">
                                <select class="form-select" id="editTransactionType" name="transactionType"
                                    onchange="filterEditCategory()">
                                    <?php
                                    $transactionsTypeResults = queryTransactionTypes();

                                    if (mysqli_num_rows($transactionsTypeResults) > 0) {
                                        while ($transactionsTypeRows = mysqli_fetch_assoc($transactionsTypeResults)) {
                                            $selected = ($transactionHistory->transactionType == ucfirst($transactionsTypeRows['defaultCategoryType'])) ? "selected" : "";
                                            ?>
                                            <option value="<?php echo $transactionsTypeRows['defaultCategoryType'] ?>" <?php echo $selected; ?>>
                                                <?php echo ucfirst($transactionsTypeRows['defaultCategoryType']) ?>
                                            </option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- Category -->
                            <div class="col-md-5">
                                <select class="form-select" id="editCategoryType" name="transactionCategory"
                                    onchange="selectEditType()">
                                    <?php
                                    // Default Categories
                                    $defaultCategoriesResults = queryDefaultCategories();

                                    if (mysqli_num_rows($defaultCategoriesResults) > 0) {
                                        while ($defaultCategoriesRows = mysqli_fetch_assoc($defaultCategoriesResults)) {
                                            $selected = ($transactionHistory->transactionCategory == $defaultCategoriesRows['defaultCategoryName']) ? "selected" : "";
                                            ?>
                                            <option value="default_<?php echo ($defaultCategoriesRows['defaultCategoryID']); ?>"
                                                data-type="<?php echo ($defaultCategoriesRows['defaultCategoryType']); ?>" <?php echo $selected; ?>>
                                                <?php echo ($defaultCategoriesRows['defaultCategoryName']); ?>
                                            </option>
                                            <?php
                                        }
                                    }

                                    // User Categories
                                    $categoriesResults = queryCategories();

                                    if (mysqli_num_rows($categoriesResults) > 0) {
                                        while ($categoriesRows = mysqli_fetch_assoc($categoriesResults)) {
                                            $selected = ($transactionHistory->transactionCategory == $categoriesRows['categoryName']) ? "selected" : "";
                                            ?>
                                            <option value="custom_<?php echo ($categoriesRows['categoryID']); ?>"
                                                data-type="<?php echo ($categoriesRows['categoryType']); ?>" <?php echo $selected; ?>>
                                                <?php echo ($categoriesRows['categoryName']); ?>
                                            </option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Date -->
                    <div class="mb-3">
                        <input value="<?php echo date('Y-m-d', strtotime($transactionHistory->transactionDate)); ?>"
                            class="form-control" type="date" name="transactionDate" placeholder="Date" required>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <textarea class="form-control" name="transactionDescription" id="editDescriptionMesssage"
                            placeholder="Description"><?php echo $transactionHistory->transactionDescription ?></textarea>
                    </div>

                    <div class="mb-3">
                        <div class="row g-3 align-items-center">
                            <!-- Amount -->
                            <div class="col-12 col-md-9">
                                <input type="number" min="1" class="form-control" name="transactionAmount"
                                    id="editAmount" placeholder="Amount"
                                    value="<?php echo $transactionHistory->transactionAmount ?>" required>
                            </div>

                            <!-- Save -->
                            <div class="col-12 col-md-3">
                                <button type="button" class="btn btn-primary"
                                    style="background-color: var(--primaryColor); color: white; font-weight: bold; border: none; padding: 0.5rem 1.5rem;"
                                    data-bs-target="#transactionEditSuccessModal" data-bs-toggle="modal"
                                    data-bs-dismiss="modal" aria-label="Save changes and open success modal">
                                    SAVE
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Transaction Success Modal -->
    <div class="modal fade" id="transactionEditSuccessModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content"
                style="border-radius: 15px; background-color: var(--primaryColor); color: white; text-align: center; border: none;">
                <div class="modal-body p-4">
                    <h5 class="text-uppercase"><b>Transaction successfully edited!</b>
                    </h5>
                    <button type="submit" name="btnEditTransaction" class="btn mt-3"
                        style="background-color: white; color: var(--primaryColor); font-weight: bold; padding: 0.5rem 1.5rem; border-radius: 5px; border: none;"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- DELETE TRANSACTION -->
<form method="POST" action="#transaction-history">
    <input type="hidden" value="<?php echo $transactionHistory->transactionID ?>" name="transactionID">

    <!-- Delete Transaction Modal -->
    <div class="modal fade" id="deleteTransaction<?php echo $transactionHistory->transactionID ?>" tabindex="-1" aria-labelledby="deleteTransactionModalLabel"
        aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 15px; background-color: white;">
                <div style="position: relative; padding: 1rem;">
                    <!-- Title -->
                    <h4 class="modal-title heading text-black" id="deleteCategoryModalLabel"
                        style="margin: 0; font-size: 26px;">
                        Delete Transaction
                    </h4>

                    <!-- Close button -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="position: absolute; top: 26px; right: 40px; transform: translateX(26px);">
                    </button>

                    <!-- Card content -->
                    <div class="card"
                        style="border: 2px solid red; background-color: rgba(255, 0, 0, 0.1); border-radius: 10px; padding: 1rem; margin-top: 1rem;">
                        <p class="paragraph" style="margin: 0;">Are you
                            sure you want to delete this
                            transaction?</p>
                        <p class="paragraph" style="color: red; margin: 0.5rem 0 0 0;">
                            Once deleted, it cannot be retrieved
                            anymore.
                        </p>
                    </div>

                    <!-- Footer buttons -->
                    <div class="modal-footer d-flex justify-content-end" style="border: none;">
                        <button type="button" class="btn paragraph" data-bs-dismiss="modal"
                            style="background-color: var(--linkHoverColor); color: var(--primaryColor);">
                            Cancel
                        </button>
                        <button type="button" class="btn btn-danger paragraph" data-bs-toggle="modal"
                            data-bs-target="#confirmTransactionDeleteModal<?php echo $transactionHistory->transactionID ?>" style="color: white; margin-left: 0.5rem;">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirm the deletion -->
    <div class="modal fade" id="confirmTransactionDeleteModal<?php echo $transactionHistory->transactionID ?>" tabindex="-1" aria-labelledby="confirmTransactionDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content"
                style="border-radius: 15px; background-color:rgb(141, 26, 37); color: white; border: none;">
                <div class="modal-header" style="border: none;">
                    <h4 class="modal-title heading text-center w-100" id="confirmDeleteModalLabel" style="margin: 0;">
                        Transaction Deleted</h4>
                </div>
                <div class="modal-body text-center">
                    The transaction has been successfully
                    deleted.
                </div>
                <div class="modal-footer d-flex justify-content-center" style="border: none;">
                    <button type="submit" class="btn btn-light paragraph" data-bs-dismiss="modal" name="btnDeleteTransaction">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>