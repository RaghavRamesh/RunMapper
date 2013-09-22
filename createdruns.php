<table class="table table-hover">
  <thead>
    <tr>
      <th>Location</th>
      <th>Start Time</th>
      <th>Distance</th>
      <th>Duration</th>
      <th style="text-align:right;"></th>
    </tr>
  </thead>

<?php 
$dataResult = mysql_query("SELECT route.location,run.starttime,route.distance,run.duration FROM route,run where route.routeID = run.routeID and run.starttime>NOW() ORDER BY run.starttime");
while($row = mysql_fetch_array($dataResult))
		{
			$location = $row['location'];
			$starttime = $row['starttime'];
			$distance = $row['distance'];
			$duration = $row['duration']; ?>

   <tbody>
    <tr>
      <td><?php echo $location; ?></td>
      <td><?php echo $starttime; ?></td>
      <td><?php echo $distance; ?></td>
      <td><?php echo $duration; ?></td>
      <td style="text-align:right;"><button class="btn btn-small" type="button">View</button></td>
    </tr>
   <?php } ?> 
     </tbody>
</table>