<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Transaction</title>
    <link rel="stylesheet" href="assets/css/add.css">
</head>
<body>
    <div class="transaction-form">
        <h1>Add New Transaction</h1>
        <form>
            <div class="form-inline">
                <select id="transaction-type" name="transaction-type" class="placeholder-dropdown">
                    <option value="" disabled selected>Transaction Type</option>
                    <option value="income">Income</option>
                    <option value="expense">Expense</option>
                </select>
                <select id="category" name="category" class="placeholder-dropdown">
                    <option value="" disabled selected>Category</option>
                    <option value="food">Food</option>
                    <option value="transport">Transport</option>
                    <option value="bills">Bills</option>
                </select>
            </div>
            <input type="date" id="date" name="date" placeholder="Date">
            <textarea id="description" name="description" rows="2" placeholder="Description"></textarea>
            <input type="number" id="amount" name="amount" step="0.01" placeholder="Amount">
            <button type="submit" class="add-button">ADD</button>
        </form>
    </div>
</body>
</html>
