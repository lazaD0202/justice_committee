<!DOCTYPE html>
<html>
  <head>
    <title>Admin Panel - Reports</title>
    <style>
      /* CSS styling for the table */
      body {
        background-color: #f2f2f2;
        font-family: Arial, sans-serif;
      }

      table {
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        padding: 20px;
        width: 800px;
        margin: auto;
        margin-top: 50px;
        border-collapse: collapse;
      }

      th,
      td {
        padding: 10px;
        text-align: center;
        border: 1px solid #ddd;
      }

      th {
        background-color: #4CAF50;
        color: white;
        font-weight: bold;
      }
    </style>
  </head>
  <body>
    <h1>Admin Panel - Reports</h1>
    <table>
      <thead>
        <tr>
          <th>UserID</th>
          <th>Username</th>
          <th>Date</th>
          <th>Reason</th>
          <th>Evidence</th>
          <th>Agent</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // PHP code to display data from the reports table
        $servername = "localhost";
        $username = "root";
        $password = "password";
        $dbname = "admin_panel_db";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve data from the reports table
        $sql = "SELECT id, username, date, reason, evidence, agent FROM reports";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // Output data of each row
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["date"] . "</td>";
            echo "<td>" . $row["reason"] . "</td>";
            echo "<td>" . $row["evidence"] . "</td>";
            echo "<td>" . $row["agent"] . "</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='6'>No reports found</td></tr>";
        }

        // Close connection
        $conn->close();
        ?>
      </tbody>
    </table>
  </body>
</html>
