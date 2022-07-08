</head>

<body>
    <header class="sticky-top">
        <nav class="navbar navbar-expand-md bg-light px-5">
            <a href="#" class="navbar-brand">
                <img src="../assets/images/tsflogo.png" alt="TSF logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarLinks"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarLinks">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="/" class="nav-link <?php 
                        if (basename($_SERVER["SCRIPT_FILENAME"], ".php") == "index")
                            echo "active";
                    ?>">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle <?php 
                        $files = ["transactions", "make_transaction"];
                        if (in_array(basename($_SERVER["SCRIPT_FILENAME"], ".php"), $files))
                            echo "active";
                    ?>" id="transactionDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Transactions
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navigation item dropdown">
                            <li><a href="make_transaction.php" class="dropdown-item">Make Transaction</a></li>
                            <li><a href="transactions.php" class="dropdown-item">Transaction History</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="customers.php" class="nav-link  <?php 
                        if (basename($_SERVER["SCRIPT_FILENAME"], ".php") == "customers")
                            echo "active";
                    ?>">Customers</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact.php" class="nav-link  <?php 
                        if (basename($_SERVER["SCRIPT_FILENAME"], ".php") == "contact")
                            echo "active";
                    ?>">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>