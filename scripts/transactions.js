let errorModal = new bootstrap.Modal(document.getElementById("errorModal"), {});
let successModal = new bootstrap.Modal(
  document.getElementById("successModal"),
  {}
);

const transactionURL = "/api/transactions";

const transactionButton = document.querySelector("#transactionButton");
transactionButton.addEventListener("click", async function () {
  const customer1 = document.querySelector("#customer1 .card");
  const customer2 = document.querySelector("#customer2 .card");
  //   console.log(customer1, customer2);
  const transactionAmountInput = document.querySelector("#amount");
  if (!customer1 || !customer2 || !transactionAmountInput.value) {
    errorModal.show();
    return;
  }

  const sender = parseInt(customer1.getAttribute("cid"));
  const receiver = parseInt(customer2.getAttribute("cid"));
  const transactionAmount = parseInt(transactionAmountInput.value);

  let result = await makeTransaction(sender, receiver, transactionAmount);
  //   let result = await makeTransaction(3, 1, 5000);
  //   console.log(result);
  successModal.show();
  customer1.remove();
  customer2.remove();
  transactionAmountInput.value = "";
});

async function makeTransaction(sender, receiver, transactionAmount) {
  const data = {
    from: sender,
    to: receiver,
    amount: transactionAmount,
  };

  const params = {
    method: "PUT",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  };

  const res = await fetch(
    `${transactionURL}?from=${sender}&to=${receiver}&amount=${transactionAmount}`,
    params
  );
  //   console.log(res);
  return res.json();
}
