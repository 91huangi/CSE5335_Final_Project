
<?php
	include_once 'header_login.php';
	include_once 'background/dbh.php';
?>


  <div class="main-container">
    <div id='sidebar'>
      <center>
         <?php echo("{$_SESSION['u_first']}")?> <?php echo("{$_SESSION['u_last']}")?><br /><br />
        <?php echo("{$_SESSION['u_email']}")?><br /><br />
        <a href="edit_recruiter_profile.php">Edit</a></center>
    </div>


    <div id='job-listings'>
      <table id='jobs'>
        <tr>
          <th>Job Title</th>
          <th>Company</th>
          <th>Location</th>
          <th></th>
        </tr>
				<?php
					$sql = "SELECT * FROM jobs WHERE rec_id=".$_SESSION['uid'].";";
					$result = mysqli_query($connection, $sql);
					if(mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_assoc($result)) {
							echo "<tr>\n";
							echo "<td>".$row['job_title']."</td>\n";
							echo "<td>".$row['company_name']."</td>\n";
							echo "<td>".$row['city'].", ".$row['state']."</td>\n";
							echo "<td><a href='edit_job.php?id=".$row[job_id]."'>Edit</a></td>\n";
							echo "</tr>";
						}
					}

				?>
				<!--
        <tr>
          <td>Entry Level Front End Developer</td>
          <td>PayPal</td>
          <td>Austin, TX</td>
          <td><a href="edit_job.php">Edit</a></td>
        </tr>
        <tr>
          <td>Social Media Marketer</td>
          <td>PayPal</td>
          <td>Austin, TX</td>
          <td><a href="edit_job.php">Edit</a></td>
        </tr>
        <tr>
          <td>Human Resources Internship</td>
          <td>American Airlines</td>
          <td>Dallas, TX</td>
          <td><a href="edit_job.php">Edit</a></td>
        </tr>
				-->
      </table>

    </div>
  </div>

  <?php include_once 'footer.php' ?>
