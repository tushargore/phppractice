<h1>Report</h1>

<h3>Student report</h3>
<form method=post action="index.php?menu=report">
    <input type="text" placeholder="Search..." name="studname">
    <input type="submit" value="Search" name="studsearch">
</form>

<table width="50%" align="center" class="table-bordered table-striped">
			
			<tr>
				<th> Roll </th>
				<th> Name </th>
				<th> Mobile </th>
				<th>Year</th>
				<th> Department </th>
			</tr>
				
				
			<?php
				$sql = "select * from student";
                if (isset($_POST["studsearch"])){
                    $sql = "SELECT * FROM `student` WHERE `name` LIKE '%".$_POST['studname']."%'";
                }


				$result = mysqli_query($conn,$sql);
				while ($row = mysqli_fetch_array($result)) {
					echo "<tr>";
					echo "<td>". $row['roll'] . "</td>";
					echo "<td>". $row['name'] . "</td>";
					echo "<td>". $row['mobile'] . "</td>";
					echo "<td>". $row['year'] . "</td>";
					echo "<td>". $row['dept'] . "</td>";
					
					echo "</tr>";
				}

			?>
		</table>

<hr>
<h3>Faculty report</h3>
<form method=post action="index.php?menu=report">
    <input type="text" placeholder="Search..." name="facultyname">
    <input type="submit" value="Search" name="facultysearch">
</form>
<table width="60%" align="center" class="table-bordered table-hover">
	<tr>
		<th>#ID</th>
		<th>Faculty Name</th>
		<th>Mobile</th>
		<th>Dept</th>
		<th>Designation</th>
	</tr>
	<?php 
		$sql = "select * from faculty";

        if(isset($_POST["facultysearch"])) {
            $sql = "SELECT * FROM `faculty` WHERE `facultyName` LIKE '%".$_POST['facultyname']."%'";
        }
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo '<td>'. $row['id']. '</td>';
			echo '<td>'. $row['facultyName']. '</td>';
			echo '<td>'. $row['mobile']. '</td>';
			echo '<td>'. $row['dept']. '</td>';
			echo '<td>'. $row['designation']. '</td>';
			echo '</tr>';
		}
	?>
	</table>
	