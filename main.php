<!DOCTYPE html>
<html>
<head>
  <title>Ajax Example</title>
  <script>
    function getEmployeeDetails() {
      var id = document.getElementById("employeeId").value;
      var xhr = new XMLHttpRequest();
      var url = "employees.xml";
      xhr.responseType = "document";
      xhr.onload = function() {
        var xml = xhr.responseXML;
        var employees = xml.getElementsByTagName("employee");
        for (var i = 0; i < employees.length; i++) {
          var employeeId = employees[i].getElementsByTagName("id")[0].textContent;
          if (employeeId == id) {
            var name = employees[i].getElementsByTagName("name")[0].textContent;
            var position = employees[i].getElementsByTagName("position")[0].textContent;
            var salary = employees[i].getElementsByTagName("salary")[0].textContent;
            document.getElementById("employeeName").innerHTML = name;
            document.getElementById("employeePosition").innerHTML = position;
            document.getElementById("employeeSalary").innerHTML = salary;
            break;
          }
        }
      };

      xhr.open("GET", url, true);
      xhr.send();
    }
  </script>
</head>
<body>
  <h2>Employee Details</h2>
  <label for="employeeId">Enter Employee ID:</label>
  <input type="text" id="employeeId">
  <button onclick="getEmployeeDetails()">Get Details</button>
  <br><br>
  <p>Name: <span id="employeeName"></span></p>
  <p>Position: <span id="employeePosition"></span></p>
  <p>Salary: <span id="employeeSalary"></span></p>
</body>
</html>
