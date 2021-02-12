// Creates the dashbord table

fetch("././resources/employees.json").then(response => {
  return response.json();
}).then(data => {
  let employeesArr = data.map(item => [item["name"], item["lastName"], item["email"], item["phoneNumber"], item["streetAddress"], item["city"], item["state"],item["postalCode"]]);
  return employeesArr;
})

function createGrid(employeeArr) {
    new gridjs.Grid({
      columns: ["name", "lastName", "email", "phoneNumber", "streetAddress", "city", "postalCode"],
      data : [
        employeeArr
      ]
    }).render(document.getElementById("JsGrid"));
  }

createGrid(employeesArr);

const myUsers = [
  {
      "id": "1",
      "name": "Rack",
      "lastName": "Lei",
      "email": "jackon@network.com",
      "gender": "man",
      "city": "San Jone",
      "streetAddress": "126",
      "state": "CA",
      "age": "24",
      "postalCode": "394221",
      "phoneNumber": "7383627627"
  },
  {
      "id": "2",
      "name": "John",
      "lastName": "Doe",
      "email": "jhondoe@foo.com",
      "gender": "man",
      "city": "New York",
      "streetAddress": "89",
      "state": "WA",
      "age": "34",
      "postalCode": "09889",
      "phoneNumber": "1283645645"
  },
  {
      "id": "3",
      "name": "Leila",
      "lastName": "Mills",
      "email": "mills@leila.com",
      "gender": "woman",
      "city": "San Diego",
      "streetAddress": "55",
      "state": "CA",
      "age": "29",
      "postalCode": "098765",
      "phoneNumber": "9983632461"
  },
  {
      "id": "4",
      "name": "Richard",
      "lastName": "Desmond",
      "email": "dismond@foo.com",
      "gender": "man",
      "age": "30",
      "streetAddress": "90",
      "city": "Salt lake city",
      "state": "UT",
      "postalCode": "457320",
      "phoneNumber": "90876987654"
  },
  {
      "id": "5",
      "name": "Susan",
      "lastName": "Smith",
      "email": "susanmith@baz.com",
      "gender": "woman",
      "age": "28",
      "streetAddress": "43",
      "city": "Louisville",
      "state": "KNT",
      "postalCode": "445321",
      "phoneNumber": "224355488976"
  },
  {
      "id": "6",
      "name": "Brad",
      "lastName": "Simpson",
      "email": "brad@foo.com",
      "gender": "man",
      "age": "40",
      "streetAddress": "128",
      "city": "Atlanta",
      "state": "GEO",
      "postalCode": "394221",
      "phoneNumber": "6854634522"
  },
  {
      "id": "7",
      "name": "Neil",
      "lastName": "Walker",
      "email": "walkerneil@baz.com",
      "gender": "man",
      "age": "42",
      "streetAddress": "1",
      "city": "Nashville",
      "state": "TN",
      "postalCode": "90143",
      "phoneNumber": "45372788192"
  },
  {
      "id": "8",
      "name": "Robert",
      "lastName": "Thomson",
      "email": "jackon@network.com",
      "gender": "man",
      "age": "24",
      "streetAddress": "126",
      "city": "New Orleans",
      "state": "LU",
      "postalCode": "63281",
      "phoneNumber": "91232876454"
  }
]
console.log(myUsers);

const allUsers = myUsers.map(item => [item['name'], item['lastName'], item['email'], item['age']])
console.log(allUsers);