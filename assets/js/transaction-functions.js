// Function for filtering categories based on selected transaction type
function filterCategoryOptions() {
    var typeForm = document.getElementById("addtransactionType");
    var typeOptions = typeForm.options;
    var selectedType = typeForm.value;

    var categoryForm = document.getElementById("addcategoryType");
    var categoryOptions = categoryForm.options;

    for (var i = 0; i < categoryOptions.length; i++) {
        var categoryOption = categoryOptions[i];
        var categoryOptionType = categoryOption.getAttribute("data-type");

        categoryOption.style.display = (selectedType == categoryOptionType) ? "block" : "none";
    }
}

function filterEditCategory(transactionID) {
    var typeForm = document.getElementById("editTransactionType" + transactionID);
    var typeOptions = typeForm.options;
    var selectedType = typeForm.value;

    var categoryForm = document.getElementById("editCategoryType" + transactionID);
    var categoryOptions = categoryForm.options;

    for (var i = 0; i < categoryOptions.length; i++) {
        var categoryOption = categoryOptions[i];
        var categoryOptionType = categoryOption.getAttribute("data-type");

        categoryOption.style.display = (selectedType == categoryOptionType) ? "block" : "none";
    }
}

// Function for selecting type based on selected category
function selectType() {
    var typeForm = document.getElementById("addtransactionType");

    var categoryForm = document.getElementById("addcategoryType");
    var selectedCategory = categoryForm.options[categoryForm.selectedIndex];
    var categoryOptionType = selectedCategory.getAttribute("data-type");

    if (categoryOptionType) {
        typeForm.value = categoryOptionType;
    }
}

function selectEditType(transactionID) {
    var typeForm = document.getElementById("editTransactionType" + transactionID);

    var categoryForm = document.getElementById("editCategoryType" + transactionID);
    var selectedCategory = categoryForm.options[categoryForm.selectedIndex];
    var categoryOptionType = selectedCategory.getAttribute("data-type");

    if (categoryOptionType) {
        typeForm.value = categoryOptionType;
    }
}

// Prevent success modals from showing if amount is invalid
document.addEventListener("DOMContentLoaded", function () {
    var editSuccessModal = document.getElementById('transactionEditSuccessModal');
    if (editSuccessModal) {
        editSuccessModal.addEventListener('show.bs.modal', function (event) {
            var amount = document.getElementById("editAmount").value;
            if (amount <= 0) {
                alert("Please enter a valid amount.");
                return event.preventDefault();
            }
        });
    }

    var transactionSuccessModal = document.getElementById('transactionSuccessModal');
    if (transactionSuccessModal) {
        transactionSuccessModal.addEventListener('show.bs.modal', function (event) {
            var amount = document.getElementById("amount").value;
            if (amount <= 0) {
                alert("Please enter a valid amount.");
                return event.preventDefault();
            }
        });
    }
});