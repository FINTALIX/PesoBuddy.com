<?php echo '<div class="modal fade" id="deleteCategoryModal" tabindex="-1"
    aria-labelledby="deleteCategoryModalLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered ms-auto">
        <div class="modal-content"
            style="border-radius: 15px; background-color: white;">
            <div style="position: relative; padding: 1rem;">
                <!-- Title -->
                <h4 class="modal-title heading text-black"
                    id="deleteCategoryModalLabel"
                    style="margin: 0; font-size: 26px;">
                    Delete Category
                </h4>

                <!-- Close button -->
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"
                    style="position: absolute; top: 26px; right: 0; transform: translateX(26px);">
                </button>

                <!-- Card content -->
                <div class="card"
                    style="border: 2px solid red; background-color: rgba(255, 0, 0, 0.1); border-radius: 10px; padding: 1rem; margin-top: 1rem;">
                    <p class="paragraph" style="margin: 0;">Are you sure you want to
                        delete this category?</p>
                    <p class="paragraph" style="color: red; margin: 0.5rem 0 0 0;">
                        Once deleted, it cannot be retrieved anymore.
                    </p>
                </div>

                <!-- Footer buttons -->
                <div class="d-flex justify-content-end" style="margin-top: 1rem;">
                    <button type="button" class="btn paragraph"
                        data-bs-dismiss="modal"
                        style="background-color: var(--linkHoverColor); color: var(--primaryColor);">
                        Cancel
                    </button>
                    
                        <button type="button"
                            class="btn btn-danger paragraph" data-bs-toggle="modal"
                            data-bs-target="#confirmDeleteModal"
                            style="color: white; margin-left: 0.5rem;">
                            Delete
                        </button>
                   
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Confirm the deletion -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1"
    aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content"
            style="border-radius: 15px; background-color:rgb(141, 26, 37); color: white; border: none;">
            <div class="modal-header" style="border: none;">
                <h4 class="modal-title heading text-center w-100"
                    id="confirmDeleteModalLabel" style="margin: 0;">Category
                    Deleted</h4>
            </div>
            <div class="modal-body text-center">
                The category has been successfully deleted.
            </div>
            <div class="modal-footer d-flex justify-content-center"
                style="border: none;">
                <form method="POST" action="#manage-categories">
                    <button type="submit" name="btnDeleteCategory"
                        class="btn btn-light paragraph" data-bs-dismiss="modal">
                        Close
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>'?>