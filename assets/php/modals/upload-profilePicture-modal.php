<?php echo '<div class="modal fade" id="uploadProfilePic" tabindex="-1" aria-labelledby="uploadProfilePicModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-white rounded-4">
                    <div class="modal-header border-0 d-flex flex-column align-items-center">
                        <h5 class="modal-title subheading text-black text-uppercase" id="uploadProfileModalLabel"
                            style="text-align: right; margin-right: 20px;">
                            <b>Upload Profile
                                Picture
                            </b>
                        </h5>
                        <button type="button" class="btn-close position-absolute top-0 end-0 mt-2 me-2 bg-transparent"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form id="uploadProfile" enctype="multipart/form-data" method="POST">
                            <div class="d-flex flex-column align-items-center gap-3">
                                <div class="text-center">
                                    <div class="rounded-circle overflow-hidden bg-black"
                                        style="width: 120px; height: 120px;">
                                        <img id="profilePreview2" src="./assets/images/userProfile/'. $profilePicture.'"
                                            alt="Current Photo" class="w-100 h-100" style="object-fit: cover;">
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <input type="text" id="fileNameDisplay"
                                        class="form-control text-black bg-transparent rounded-2" value=""
                                        readonly style="max-width: 350px; width: 100%;">
                                    <label
                                        class="btn btn-primary rounded-2 d-inline-flex align-items-center justify-content-center"
                                        for="fileInput">
                                        Browse<i class="bi-upload ms-2"></i>
                                    </label>
                                    <input type="file" class="d-none" id="fileInput" accept="image/*" name="profilePic">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer border-0 justify-content-center mb-2">
                        <button type="submit" form="uploadProfile"
                            class="btn btn-primary text-uppercase align-self-center" name="btnUploadProfile">Upload</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const fileInput = document.getElementById(\'fileInput\');
            const fileNameDisplay = document.getElementById(\'fileNameDisplay\');
            const profilePreview = document.getElementById(\'profilePreview\');
            const profilePreview2 = document.getElementById(\'profilePreview2\');
            const uploadProfilePicModal = document.getElementById(\'uploadProfilePic\');

            // Handle file input changes
            fileInput.addEventListener(\'change\', function () {
                if (this.files && this.files.length > 0) {
                    fileNameDisplay.value = this.files[0].name;

                    const reader = new FileReader();
                    reader.onload = function (e) {
                        profilePreview.src = e.target.result;
                        profilePreview2.src = e.target.result;
                    };
                    reader.readAsDataURL(this.files[0]);
                }
            });

            // Reset file input when the modal is closed
            uploadProfilePicModal.addEventListener(\'hidden.bs.modal\', function () {
                fileInput.value = \'\';
                fileNameDisplay.value = \'\';
                profilePreview.src = "./assets/images/userProfile/'. $profilePicture .'";
                profilePreview2.src = "assets/images/userProfile/'. $profilePicture .'";
            });
        </script>';
?>