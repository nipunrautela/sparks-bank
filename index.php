<?php
    include("partials/header.php");
?>
<link rel="stylesheet" href="css/home.css">
<?php
    include("partials/nav.php");
?>

<main>
    <section id="cover">
        <div class="row">
            <div class="col-lg-6">
                <img src="assets/images/bank.jpg" class="img-fluid d-none d-md-block" alt="Bank Image">
            </div>
            <div class="col-lg-6 my-auto">
                <span class="titleHeader">Welcome to</span>
                <h1 id="coverHeading">
                    Sparks Bank
                </h1>
                <p class="coverText">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure autem rem fugiat quisquam dignissimos
                    quam. Inventore dolores nihil eius quae nulla ipsa ipsum asperiores maiores quibusdam! Incidunt,
                    laboriosam id. Soluta.
                </p>
            </div>
        </div>
    </section>

    <section id="about">
        <div class="row justify-content-around">
            <div class="col-xl-6 aboutLeftContent">
                <div class="row">
                    <span class="titleHeader">About Us</span>
                    <h2 class="col-12 aboutTitle">
                        A Bank catering to all your needs. We transform your money into benefits.
                    </h2>
                    <div class="col-12">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Placeat, sapiente! Ipsa incidunt
                        pariatur perspiciatis repellendus illum doloremque hic ex? Commodi, facilis. Accusantium
                        recusandae delectus laudantium nobis facilis, nihil ullam cumque quia blanditiis, accusamus
                        similique, repellat dolor ducimus maiores numquam. Accusamus enim at facilis. Ad et ab optio
                        illo vel amet.
                    </div>
                    <div class="col-12">

                    </div>
                </div>
            </div>
            <div class="col-xl-6 aboutRightContent">
                <div class="row justify-content-around justify-content-xl-end">
                    <div class="col-12 col-md-5 aboutPanel">
                        <i class="fa-solid fa-computer panelIcon"></i>
                        <h3>Panel 1</h3>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam, ex?
                    </div>
                    <div class="col-12 col-md-5 aboutPanel">
                        <i class="fa-solid fa-rocket panelIcon"></i>
                        <h3>Panel 2</h3>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, nulla!
                    </div>
                </div>

                <div class="row justify-content-around justify-content-xl-start">
                    <div class="col-12 col-md-5 aboutPanel">
                        <i class="fa-solid fa-cash-register panelIcon"></i>
                        <h3>Panel 3</h3>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, eos.
                    </div>
                    <div class="col-12 col-md-5 aboutPanel">
                        <i class="fa-solid fa-people-group panelIcon"></i>
                        <h3>Panel 4</h3>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, porro?
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section id="features">
        <h2 class="featuresTitle">We Help Manage Your Money</h2>
        <p class="featuresText">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Error tenetur quis, quisquam provident amet eius
            voluptate fuga? Adipisci, quis. Molestias hic quasi tempora ipsum dolorum vitae dicta sunt, alias laborum?
        </p>
        <div class="row justify-content-around">
            <div class="col-12 col-sm-6 col-lg-4 py-2 feature">
                <div class="card">
                    <img src="assets/images/make_transaction.jpg" class="card-img-top" alt="make transaction image">
                    <div class="card-body">
                        <h5 class="card-title">Make Transactions</h5>
                        <p class="card-text">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque, quod.
                        </p>
                        <a href="/make_transaction.php" class="btn btn-primary">Proceed</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 py-2 feature">
                <div class="card">
                    <img src="assets/images/transaction_history.jpg" class="card-img-top"
                        alt="transaction history image">
                    <div class="card-body">
                        <h5 class="card-title">Transaction History</h5>
                        <p class="card-text">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque, quod.
                        </p>
                        <a href="/transactions.php" class="btn btn-primary">View Transaction History</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 py-2 feature">
                <div class="card">
                    <img src="assets/images/customers.jpg" class="card-img-top" alt="customers image">
                    <div class="card-body">
                        <h5 class="card-title">Customers</h5>
                        <p class="card-text">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque, quod.
                        </p>
                        <a href="/customers.php" class="btn btn-primary">View Customer</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="row justify-content-around">
            <div class="col-12 col-md-6 col-xl-4 contactContent">
                <h2 class="contactTitle">Contact Us</h2>
                <p class="contactText">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque veniam quo eveniet fugiat ab, vitae
                    pariatur quam inventore blanditiis? Voluptates culpa perspiciatis omnis voluptate et reiciendis,
                    dicta illo vitae voluptatum.
                </p>
            </div>
            <div class="col-6 col-xl-4 d-none d-xl-inline-block">
                <img src="assets/images/contact.jpg" class="img-fluid py-5" alt="contact image">
            </div>
            <div class="col-12 col-md-6 col-xl-4 py-4">
                <form id="contactForm">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Your Name" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Your Email" required>
                    </div>
                    <div class="mb-3">
                        <textarea name="message" id="" class="form-control" rows="5" placeholder="Enter your message"
                            required></textarea>
                    </div>
                    <button class="btn btn-outline-light">Submit</button>
                </form>
            </div>
        </div>
    </section>
</main>


<?php
    include("partials/footer.php");
?>