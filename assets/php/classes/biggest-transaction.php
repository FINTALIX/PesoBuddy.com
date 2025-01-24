<?php

class BiggestTransaction
{
    public $userID;
    public $categoryName;
    public $categoryType;
    public $maxTransactionAmount;

    public function __construct($userID)
    {
        $this->userID = $userID;
        $this->getBiggestTransaction();
    }

    public function getBiggestTransaction()
    {
        $maxTransactionAmountQuery = "
        SELECT 
            transactions.amount AS maxTransactionAmount,
            COALESCE(categories.categoryType, defaultcategories.defaultCategoryType) AS categoryType,
            COALESCE(categories.categoryName, defaultcategories.defaultCategoryName) AS categoryName
        FROM 
            transactions 
        LEFT JOIN 
            categories ON transactions.categoryID = categories.categoryID 
        LEFT JOIN 
            defaultcategories ON transactions.defaultCategoryID = defaultcategories.defaultCategoryID 
        WHERE 
            transactions.amount = (SELECT MAX(amount) FROM transactions WHERE userID = $this->userID)  
            AND transactions.userID = $this->userID
        ORDER BY 
            transactions.transactionDate DESC
        LIMIT 1";

        $maxTransactionAmountResult = executeQuery($maxTransactionAmountQuery);

        if (mysqli_num_rows($maxTransactionAmountResult) > 0) {
            $maxTransactionAmountRow = mysqli_fetch_assoc($maxTransactionAmountResult);

            $this->maxTransactionAmount = $maxTransactionAmountRow['maxTransactionAmount'];
            $this->categoryName = $maxTransactionAmountRow['categoryName'];
            $this->categoryType = $maxTransactionAmountRow['categoryType'];
        }
    }

    public function displayTransactionCard()
    {
        return '
        <div class="col-12 col-lg-4 py-4">
                <div class="card stat-card rounded-5">
                    <div class="d-flex flex-column align-items-end">
                        <div class="subheading pt-4 pb-4 pe-3 text-end">
                            <b>YOUR <span style="color: #1A7431;">BIGGEST TRANSACTIONS</span>, YET!</b>
                        </div>
                    </div>

                    <div class="text-center">
                        <p class="heading pt-3" style="text-transform: capitalize"> ' . $this->categoryName . '</p>
                        <p class="heading pb-3">₱ ' . number_format($this->maxTransactionAmount, 2, ".", ",") . '</p>
                        <p class="subheading ps-3 text-start" style="text-transform: uppercase"> ' . $this->categoryType . '</p>
                    </div>
                </div>
            </div>';
    }
}

?>