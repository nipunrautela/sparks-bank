// TRANSACTION HISTORY

const transactionURL = "/api/transactions";

const tData = transactionData().then((data) => {
  const transactionTable = createTransactionTable(data, "transactionTable");

  const main = document.querySelector("main");
  if (main.id === "transactionHistory") {
    main.append(transactionTable);
  }
});

async function transactionData() {
  const res = await fetch(transactionURL);
  return res.json();
}

function createTransactionTable(data, id) {
  const mainTable = document.createElement("table");
  mainTable.setAttribute("id", id);
  mainTable.classList.add(
    "table",
    "table-striped",
    "table-hover",
    "table-bordered",
    "text-center"
  );

  const tableHead = document.createElement("thead");
  const tableHeadRow = document.createElement("tr");
  tableHeadRow.innerHTML = `
    <th scope="col">Transaction Id</th>
    <th scope="col">Sender</th>
    <th scope="col">Receiver</th>
    <th scope="col">Amount</th>
    <th scope="col">Date</th>
    <th scope="col">Time</th>
  `;
  tableHead.append(tableHeadRow);

  const tableBody = document.createElement("tbody");
  for (let transaction of data["data"]) {
    const tableBodyRow = document.createElement("tr");
    tableBodyRow.innerHTML = `
      <th scope="row">${transaction["id"]}</th>
      <td>${data["userData"][transaction["senderId"]]} (${
      transaction["senderId"]
    })</td>
      <td>${data["userData"][transaction["receiverId"]]} (${
      transaction["receiverId"]
    })</td>
      <td>&#8377; ${transaction["amount"]}</td>
      <td>${new Date(transaction["time"]).toLocaleDateString("en-in")}</td>
      <td>${new Date(transaction["time"]).toLocaleTimeString("en-in")}</td>
    `;

    tableBody.append(tableBodyRow);
  }
  mainTable.append(tableHead, tableBody);

  return mainTable;
}
