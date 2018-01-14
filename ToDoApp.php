<?php
include('SQLFunctions.php')
?>
<html>
    <head>
        <style>
        table, th, td { border: 1px solid black;
                        border-collapse: collapse; }
        table th { background-color: black;
                   color: white; }    
        table tr:nth-child(even) { background-color: #eee; }
        table tr:nth-child(odd)  { background-color: #fff; }
        </style>
    </head>
<body>
    <h1>To-Do App Main View</h1>
    <a href="CreateToDo.php"><button class="btn btn-lg">New To Do</button></a>  
<?php
    /*Set Up the SQL statement*/
    $sql = "SELECT ToDoTitle
                    , ToDoDescription
                    , DATE_FORMAT(ToDueDate, '%m-%d-%Y')
                    , ToDoID
                FROM ToDos;";
                // echo '<br>sql: '.$sql. '<br>We Will Comment this shit out after testing<br>';
    $link = connectDB();

    /*Exectute the statement, and write the results*/
    if ($result = mysqli_query($link, $sql)) {
        
        echo "<table class='table table-striped' >";
        // header
            echo "<tr>";
                echo "<th>Title</td>";
                echo "<th>Description</td>";
                echo "<th>DueDate</td>";
                echo "<th>Action</td>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>{$row[0]}</td>";
                echo "<td>{$row[1]}</td>";
                echo "<td>{$row[2]}</td>";
                echo "<td>Link to update page for <br> ToDoID {$row[3]}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } 
    
  mysqli_close ( $link );
?>
</body>
</html>