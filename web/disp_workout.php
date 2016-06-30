<?php
if(empty($_GET['plan'])) header('Location: /');
include('navbar.php');
$plan = $_GET['plan'];
//if(empty($_GET['plan'])) header('Location: /');
$day = ((!empty($_GET['day'])) ? $_GET['day'] : "1");

$query ="SELECT * FROM Workout_Plans WHERE PLAN = :plan ORDER BY DAY";
$sql = $PDO->prepare($query);
$sql->bindParam(':plan',$plan);
$sql->execute();
$vals = array();
$pills = "";
foreach($sql->fetchAll() as $row) {
	$vals[$row['DAY']][] = $row; 
}

foreach($vals as $workout_day => $workout_array) {
	$pills .=  "<li role='presentation' ".(($day == $workout_day)?'class="active"':'') ."><a href='#Day$workout_day' role='pill' data-toggle='pill'>Day $workout_day</a></li>";
}

?>
<div class="container">

<ul class="nav nav-pills">
	<?php echo $pills; ?>
</ul>
	<form id="StartForm" method="get" action="workout.php" class="center">
		<button type='submit' class="btn btn-primary btn-lg">Start Workout</button>
		<input type="hidden" name="WORKOUT" value="<?php echo $plan; ?>">
		<input type="hidden" name="DAY" value="<?php echo $day; ?>">
	</form>
	<div class="tab-content">
	<?php foreach($vals as $workout_day => $workout_array): ?>
		<div role="tabpanel" class="tab-pane <?php echo (($day == $workout_day)?'active':'');?> " id="Day<?php echo $workout_day; ?>">
			<div class='table-responsive'>
			  <table class='table table-striped table-sm'>
				<thead>
				  <tr>
					<th>Lift</th>
					<th>Sets</th>
					<th>Reps</th>
				  </tr>
				</thead>
				<tbody>
			<?php 
				foreach($workout_array as $row) {
					echo "<tr>";
					echo "<td>" . $row['LIFT'] . "</td>";
					echo "<td>" . $row['SETS'] . "</td>";
					echo "<td>";
					if (!empty($row['REPS_MIN'])) echo $row['REPS_MIN'] . "-";
					echo $row['REPS_MAX'] . "</td>";
					echo "</tr>";
				}
			?>
				</tbody>
			  </table>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>

<script>
$('#StartForm').submit(function () {
	var day = $('.tab-pane.active').attr('id').slice(-1);
	$('[name="DAY"]').val(day);
});
$('a[role="pill"]').on('click', function() {
	var day = $(this).attr('href').slice(-1);
	history.replaceState( {} , '', location.pathname+'?plan=<?php echo $plan; ?>&day='+day );
});
</script>

</div>
<?php include('footer.html');?>
