<?php
//Including Database configuration file.
include "connection.php";
//Getting value of "search" variable from "script.js".
if (isset($_POST['search'])) {
//Search box value assigning to $Name variable.
   $Name = $_POST['search'];
//Search query.
   $Query = "SELECT * FROM goods WHERE goodsname LIKE '%$Name%' LIMIT 5";
//Query execution
   $ExecQuery = MySQLi_query($con, $Query);
//Creating unordered list to display result.https://zh-tw.facebook.com/
   echo '
<ul>
   ';
   //Fetching result from database.
   while ($Result = MySQLi_fetch_array($ExecQuery)) {
       ?>
   <!-- Creating unordered list items.
        Calling javascript function named as "fill" found in "script.js" file.
        By passing fetched result as parameter. -->
   <li onclick='fill("<?php echo $Result['goodsname']; ?>")'>
   <a>
   <!-- Assigning searched result in "Search box" in "search.php" file. -->
       <?php echo $Result['goodsname'] ?>
   </li></a>
   <!-- Below php code is just for closing parenthesis. Don't be confused. -->
   <?php
}}
?>
</ul>
<div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">Search</span>
     <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
    </div>
   </div>
   <br />
   <div id="result"></div>