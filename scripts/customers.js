const main = document.querySelector("main");

// FORM SETTINGS

const searchMethodButtons = document.querySelectorAll("a.searchMethod");

for (let button of searchMethodButtons) {
  button.addEventListener("click", function (e) {
    const searchDropdownButton = getSearchDropdownButton(this);
    // console.log(searchDropdownButton);
    const searchBy = document.querySelector(
      `${searchDropdownButton.getAttribute("target")}`
    );
    searchDropdownButton.textContent = this.textContent;
    searchBy.value = this.getAttribute("value");
  });
}

function getSearchDropdownButton(element) {
  while (element.className.search("input-group") === -1) {
    // console.log(element);
    element = element.parentElement;
  }
  const searchDropdownButton = document.querySelector(
    `#${element.getAttribute("id")} .dropdown-toggle`
  );
  return searchDropdownButton;
}

const customerSearchForms = document.querySelectorAll(".customerSearchForm");
// console.log(customerSearchForms);
for (let form of customerSearchForms) {
  form.addEventListener("submit", async function (e) {
    try {
      e.preventDefault();
      // console.log(this.id);
      const searchButton = document.querySelector(`#${this.id} .searchButton`);
      // console.log(searchButton);
      const target = document.querySelector(
        searchButton.getAttribute("target-table")
      );
      // console.log(target);
      const searchInput = document.querySelector(`#${this.id} .searchInput`);
      // console.log(this);
      await constructData(e, target, searchInput);
    } catch (e) {
      console.log(e);
    }
  });
}

const searchInputs = document.querySelectorAll(".searchInput");
for (let input of searchInputs) {
  input.addEventListener("keypress", async function (e) {
    try {
      e.stopPropagation();
      if (e.keyCode == 13) {
        // console.log(this.getAttribute("target"));
        const searchButton = document.querySelector(
          `${this.getAttribute("target")}`
        );
        // console.log(searchButton);
        const target = document.querySelector(
          searchButton.getAttribute("target-table")
        );
        // console.log(searchButton, target);
        await constructData(e, target, this);
        this.blur();
        let form = this;
        while (form.tagName !== "FORM") {
          // console.log(form, form.tagName);
          form = form.parentElement;
        }
        form.reset();
      }
    } catch (e) {
      console.log(e);
    }
  });
}

function createCustomerURL(params) {
  let url = "api/customers?";
  for (let key in params) {
    url += `${key}=${params[key]}&`;
  }

  return url;
}

async function constructData(e, parent, searchInput) {
  try {
    // const mainTable = document.querySelector(
    //   `${parent.getAttribute("target-id")}`
    // );
    // if (mainTable) mainTable.remove();
    // console.log(parent);
    parent.innerHTML = "";

    // console.log(searchInput.value);
    if (!searchInput.value) {
      return;
    }

    const searchDropdownButton = getSearchDropdownButton(searchInput);
    const searchBy = document.querySelector(
      `${searchDropdownButton.getAttribute("target")}`
    );

    let params = {};
    params[searchBy.name] = searchBy.value;
    params[searchBy.value] = searchInput.value;

    let url = createCustomerURL(params);

    let response = await fetch(url);
    let data = await response.json();
    // console.log(data);

    const id = `#${parent.mainTable}`;
    let table;
    if (data.statusCode == "404") {
      table = notFoundTable(id);
    } else {
      table = createCustomerTable(data, id);
    }
    parent.append(table);
  } catch (e) {
    console.log(e);
  }
}

// Table Creation

function createCustomerTable(data, id) {
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
    <th scope="col">User Id</th>
    <th scope="col">Name</th>
    <th scope="col">Email</th>
    <th scope="col">balance</th>
    <th scope="col">Mobile</th>
    <th scope="col">View</th>
  `;
  tableHead.append(tableHeadRow);

  const tableBody = document.createElement("tbody");
  for (let customer of data) {
    const tableBodyRow = document.createElement("tr");
    tableBodyRow.innerHTML = `
      <th scope="row">${customer["id"]}</th>
      <td>${customer["firstName"]} ${customer["lastName"]}</td>
      <td>${customer["email"]}</td>
      <td>&#8377; ${customer["balance"]}</td>
      <td>${customer["mobile"]}</td>
    `;
    const viewButtonData = document.createElement("td");
    const viewButton = document.createElement("button");
    viewButton.classList.add("btn", "btn-dark", "btn-sm");
    viewButton.innerHTML = `
      <i class="fa-solid fa-magnifying-glass"></i>
    `;
    viewButton.addEventListener("click", function () {
      const card = createCard(customer);
      const element = mainTable.parentElement;
      element.innerHTML = "";
      element.append(card);
    });
    viewButtonData.append(viewButton);
    tableBodyRow.append(viewButtonData);

    tableBody.append(tableBodyRow);
  }
  mainTable.append(tableHead, tableBody);

  return mainTable;
}

function notFoundTable(id) {
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
    <th scope="col">User Id</th>
    <th scope="col">Name</th>
    <th scope="col">Email</th>
    <th scope="col">balance</th>
    <th scope="col">Mobile</th>
    <th scope="col">View</th>
  `;
  tableHead.append(tableHeadRow);

  const tableBody = document.createElement("tbody");
  const row = document.createElement("tr");
  row.innerHTML = `
    <td colspan="6" class="text-center">No Entries Found</td>
  `;
  tableBody.append(row);

  mainTable.append(tableHead, tableBody);
  return mainTable;
}

// Cart Creation

function createCard(data) {
  const card = document.createElement("div");
  card.className = "card customerCard";
  card.innerHTML = `
    <div class="card-body" cid="${data.id}">
        <h2>${data.firstName} ${data.lastName}</h2>
        <p class="card-text">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure reprehenderit tempora est! Rem eveniet placeat,
            aliquam voluptas vel dicta sed.
        </p>
        
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            Balance: <span style="color: green; font-size: 1.5rem;">${data.balance}</span>
          </li>
          <li class="list-group-item">
            Mobile: <span style="font-size: 1.1rem;">${data.mobile}</span>
          </li>
          <li class="list-group-item">
            Email: <span style="font-size: 1.1rem;">${data.email}</span>
          </li>
        </ul>
    </div>
  `;
  return card;
}
