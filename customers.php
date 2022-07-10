<?php
    include("partials/header.php");
?>
<link rel="stylesheet" href="css/customers.css">
<?php
    include("partials/nav.php");
?>

<main class="d-flex flex-column justify-content-center">


    <h1 id="customerTitle">Customers</h1>

    <form class="customerSearchForm" id="customerSearchForm">
        <div class="input-group" id="searchInputGroup">
            <span class="input-group-text">Search by</span>
            <button id="searchDropdownButton" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown"
                target="#searchBy">Name</button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item searchMethod" value="name">Name</a></li>
                <li><a class="dropdown-item searchMethod" value="id">ID</a></li>
            </ul>
            <input type="hidden" id="searchBy" name="search_by" value="name">
            <input type="text" class="form-control searchInput" id="searchInput" target="#searchButton">
            <button class="btn btn-outline-dark searchButton" id="searchButton"
                target-table="#tableArea">Search</button>
        </div>
    </form>

    <div class="tableArea" id="tableArea" target-id="#mainTable"></div>
</main>

<script src="scripts/customers.js"></script>

<?php
    include("partials/footer.php");
?>