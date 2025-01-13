<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaction</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/edit.css">
</head>
<body>
    <div class="transaction-form">
        <h1>Edit Transaction</h1>
        <form id="transactionForm">
            <div class="form-inline">
                <select id="transaction-type" name="transaction-type" class="form-control placeholder-dropdown">
                    <option value="" disabled selected>Transaction Type</option>
                    <option value="income">Income</option>
                    <option value="expense">Expense</option>
                </select>
                <select id="category" name="category" class="form-control placeholder-dropdown">
                    <option value="" disabled selected>Category</option>
                    <option value="food">Food</option>
                    <option value="transport">Transport</option>
                    <option value="bills">Bills</option>
                </select>
            </div>
            <input type="date" id="date" name="date" placeholder="Date" class="form-control">
            <textarea id="description" name="description" rows="2" placeholder="Description" class="form-control"></textarea>
            <div class="form-inline">
                <input type="number" id="amount" name="amount" step="0.01" placeholder="Amount" class="form-control amount-input">
                <button type="button" class="btn save-button" data-bs-toggle="modal" data-bs-target="#saveTransaction">SAVE</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap Modal -->
    <div class="modal fade" id="addTransaction" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Edit Transaction</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
