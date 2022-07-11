<?php
    include("partials/header.php");
?>
<link rel="stylesheet" href="css/customers.css">
<?php
    include("partials/nav.php");
?>

<main>

    <div class="modal fade" id="successModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content border border-success border-3">
                <div class="modal-header">
                    <h5 class="modal-title">Missing Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Transaction made successfully</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Great!</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="errorModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Missing Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Please select sender, receiver and enter a valid amount.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <h1 class="text-center my-3">Make Transaction</h1>

    <div class="container-fluid">
        <div class="row justify-content-center mb-1">
            <div class="col-8 col-sm-4">
                <div class="input-group">
                    <label for="amount" class="input-group-text">Amount</label>
                    <input type="number" id="amount" class="form-control">
                </div>
            </div>
        </div>
        <div class="row justify-content-end justify-content-sm-center mb-3">
            <div class="col-8 col-sm-1">
                <button class="btn btn-primary" id="transactionButton">
                    Proceed
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6" id="customer1">
                <h3 class="text-center bg-dark text-light">From</h3>
                <form class="customerSearchForm" id="customerSearchForm1">
                    <div class="input-group" id="from">
                        <span class="input-group-text">Search by</span>
                        <button id="searchDropdownButton1" class="btn btn-outline-dark dropdown-toggle"
                            data-bs-toggle="dropdown" target="#searchBy1">Name</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item searchMethod" value="name">Name</a></li>
                            <li><a class="dropdown-item searchMethod" value="id">ID</a></li>
                        </ul>
                        <input type="hidden" id="searchBy1" name="search_by" value="name">
                        <input type="text" class="form-control searchInput" id="searchInput1" target="#searchButton1">
                        <button class="btn btn-outline-dark searchButton" id="searchButton1"
                            target-table="#tableArea1">Search</button>
                    </div>
                </form>

                <div class="tableArea" id="tableArea1" target-id="mainTable1"></div>
            </div>
            <div class="col-lg-6" id="customer2">
                <h3 class="text-center bg-dark text-light">To</h3>
                <form class="customerSearchForm" id="customerSearchForm2">
                    <div class="input-group" id="to">
                        <span class="input-group-text">Search by</span>
                        <button id="searchDropdownButton2" class="btn btn-outline-dark dropdown-toggle"
                            data-bs-toggle="dropdown" target="#searchBy2">Name</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item searchMethod" value="name">Name</a></li>
                            <li><a class="dropdown-item searchMethod" value="id">ID</a></li>
                        </ul>
                        <input type="hidden" id="searchBy2" name="search_by" value="name">
                        <input type="text" class="form-control searchInput" id="searchInput2" target="#searchButton2">
                        <button class="btn btn-outline-dark searchButton" id="searchButton2"
                            target-table="#tableArea2">Search</button>
                    </div>
                </form>

                <div class="tableArea" id="tableArea2" target-id="mainTable2"></div>
            </div>
        </div>
    </div>
</main>

<script src="scripts/customers.js"></script>
<script src="scripts/transactions.js" defer></script>

<?php
    include("partials/footer.php");
?>