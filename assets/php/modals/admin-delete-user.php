<?php
function loadDeleteUserModal($userID, $firstName, $lastName){
    return '<!-- Delete Account Modal -->
            <div class="modal fade" id="deleteUser'. $userID .'Modal" tabindex="-1" aria-labelledby="deleteUserModalLabel"
                        aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content" style="border-radius: 15px; background-color: white;">
                                <div style="position: relative; padding: 1rem;">
                                    <!-- Title -->
                                    <h4 class="modal-title heading text-black" id="deleteUserModalLabel"
                                        style="margin: 0; font-size: 26px;">
                                        DELETE THIS USER\'S ACCOUNT
                                    </h4>

                                    <!-- Close button -->
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                        style="position: absolute; top: 26px; right: 40px; transform: translateX(26px);">
                                    </button>

                                    <!-- Card content -->
                                    <div class="card"
                                        style="border: 2px solid red; background-color: rgba(255, 0, 0, 0.1); border-radius: 10px; padding: 1rem; margin-top: 1rem;">
                                        <p class="paragraph" style="margin: 0;">DANGER | CRITICAL WARNING!
                                        </p>
                                        <p class="paragraph" style="color: red; margin: 0.5rem 0 0 0;">
                                            Are you sure you wanted to delete '. $firstName . ' ' . $lastName .'\'s account? <br><br>If you decided to delete this user\'s account, all data related to it will also be deleted.
                                        </p>
                                    </div>

                                    <!-- Footer buttons -->
                                    <div class="modal-footer d-flex justify-content-end" style="border: none;">
                                        <button type="button" class="btn paragraph" data-bs-dismiss="modal"
                                            style="background-color: var(--linkHoverColor); color: var(--primaryColor);">
                                            Cancel
                                        </button>
                                        <button type="button" class="btn btn-danger paragraph" data-bs-toggle="modal"
                                            data-bs-target="#confirmDeleteUser'. $userID . 'Modal" style="color: white; margin-left: 0.5rem;">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Confirm Delete Account Modal -->
                    <div class="modal fade" id="confirmDeleteUser'. $userID .'Modal" tabindex="-1"
                        aria-labelledby="confirmDeleteUserModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content"
                                style="border-radius: 15px; background-color:rgb(141, 26, 37); color: white; border: none;">
                                <div class="modal-header" style="border: none;">
                                    <h4 class="modal-title heading text-center w-100" id="confirmDeleteUserModalLabel"
                                        style="margin: 0;"> USER DELETED
                                    </h4>
                                </div>
                                <div class="modal-body text-center">'. $firstName . ' ' . $lastName .'\'s account has been successfully deleted.
                                </div>
                                <div class="modal-footer d-flex justify-content-center" style="border: none;">
                                    <form method="POST">
                                    <input type="hidden" value="'. $userID .'" name="deletedUserID">
                                    <button type="submit" name="btnDeleteUser" class="btn btn-light paragraph" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>';
}
?>