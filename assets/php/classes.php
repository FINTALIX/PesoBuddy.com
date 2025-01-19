<?php

// Handles displaying financial data, including transactions, categories, and charts in the dashboard.
class FinanceDashboard
{
    private $userID;
    private $year;
    private $type;
    private $transactionYears = array();
    private $categoryTypes = array();
    private $chartLabels = array();
    private $chartData = array();

    // Initializes the class properties
    public function __construct($userID)
    {
        $this->userID = $userID;
        $this->year = isset($_GET['year']) ? $_GET['year'] : date("Y");
        $this->type = isset($_GET['type']) ? $_GET['type'] : 'income';

        $this->loadTransactionYears();
        $this->loadCategoryTypes();
        $this->loadChartData();
    }

    // Function to load transaction years
    private function loadTransactionYears()
    {
        $transactionYearQuery = "SELECT DISTINCT YEAR(transactionDate) AS transactionYear FROM transactions WHERE userID = $this->userID ORDER BY transactionYear";
        $transactionYearResult = executeQuery($transactionYearQuery);
        while ($transactionYearRow = mysqli_fetch_assoc($transactionYearResult)) {
            $this->transactionYears[] = $transactionYearRow['transactionYear'];
        }
    }

    // Function to load category types
    private function loadCategoryTypes()
    {
        $categoryTypeQuery = "SELECT DISTINCT defaultCategoryType FROM defaultcategories";
        $categoryTypeResult = executeQuery($categoryTypeQuery);
        while ($categoryTypeRow = mysqli_fetch_assoc($categoryTypeResult)) {
            $this->categoryTypes[] = $categoryTypeRow['defaultCategoryType'];
        }
    }

    // Get and process chart data
    private function loadChartData()
    {
        $yearlyReportQuery = "
            SELECT 
                MONTH(t.transactionDate) AS month,
                SUM(t.amount) AS totals
            FROM 
                transactions t
            LEFT JOIN 
                categories c ON t.categoryID = c.categoryID
            LEFT JOIN 
                defaultcategories dc ON t.defaultCategoryID = dc.defaultCategoryID  
            WHERE 
                t.userID = $this->userID
                AND YEAR(t.transactionDate) = $this->year
                AND (
                    (c.categoryType = '$this->type' AND t.categoryID IS NOT NULL) 
                    OR 
                    (dc.defaultCategoryType = '$this->type' AND t.defaultCategoryID IS NOT NULL)  
                )
            GROUP BY 
                MONTH(t.transactionDate)
            ORDER BY 
                month";
        $yearlyReportResult = executeQuery($yearlyReportQuery);

        // Initialize arrays for chart data
        $chartLabels = array();
        $chartData = array();

        while ($yearlyReportRow = mysqli_fetch_assoc($yearlyReportResult)) {
            $monthName = DateTime::createFromFormat('!m', $yearlyReportRow['month'])->format('F');
            array_push($chartLabels, $monthName); // Add month name to chartLabels array
            array_push($chartData, $yearlyReportRow['totals']); // Add totals to chartData array
        }

        // Get transaction years
        $this->chartLabels = $chartLabels;
        $this->chartData = $chartData;
    }

    // Function to display year dropdown
    public function displayYearDropdown()
    {
        $dropdownItems = '';

        if (!empty($this->transactionYears)) {
            foreach ($this->transactionYears as $year) {
                $dropdownItems .= '
                  <li>
                    <a class="dropdown-item" href="?year=' . $year . '&type=' . $this->type . '">' . $year . '</a>
                  </li>
                ';
            }
        } else {
            $dropdownItems = '
              <li><a class="dropdown-item">No transactions yet</a></li>
            ';
        }

        return '
          <div class="subheading">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              YEAR
            </button>
            <ul class="dropdown-menu">
              ' . $dropdownItems . '
            </ul>
          </div>
        ';
    }

    // Function to display category type dropdown
    public function displayCategoryTypeDropdown()
    {
        $dropdownItems = '';

        if (!empty($this->categoryTypes)) {
            foreach ($this->categoryTypes as $type) {
                $dropdownItems .= '
                  <li>
                    <a class="dropdown-item" href="?year=' . $this->year . '&type=' . $type . '">' . $type . '</a>
                  </li>
                ';
            }
        } else {
            $dropdownItems = '
              <li><a class="dropdown-item">No category found</a></li>
            ';
        }

        return '
          <div class="subheading">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              CATEGORY TYPE
            </button>
            <ul class="dropdown-menu">
              ' . $dropdownItems . '
            </ul>
          </div>
        ';
    }

    // Function to get chart data
    public function getChartData()
    {
        return $this->chartData;
    }

    // Function to get chart labels
    public function getChartLabels()
    {
        return $this->chartLabels;
    }
}


?>