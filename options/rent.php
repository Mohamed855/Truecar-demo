<?php

if (isset($_POST['rent_car'])) 
{
	$full_name = $_POST['full_name'];
	$national_id = $_POST['national_id'];
	$phone_num = $_POST['phone_num'];
	$date = $_POST['date'];
	$rent_period = $_POST['rent_period'];

	if (is_numeric($national_id) == false) 
	{
		$national_id_error = "Check your national id";
		echo "<script type='text/javascript'> alert('$national_id_error'); </script>";
        include('ignore_access.php');
	}
	else
	{
		if (is_numeric($phone_num) == false) 
		{
			$phone_num_error = "Check your phone number";
			echo "<script type='text/javascript'> alert('$phone_num_error'); </script>";
	        include('ignore_access.php');
		}
		else 
		{
			if (is_numeric($rent_period) == false) 
			{
				$rent_period_error = "Check rent period";
				echo "<script type='text/javascript'> alert('$rent_period_error'); </script>";
		        include('ignore_access.php');
			}
			else
			{
				date_default_timezone_set('Africa/Cairo');
				$day = date("d");
				$month = date("m");
				$year = date("Y");

				$ch_date = strtotime($date);

				$ch_day = date('d', $ch_date);
				$ch_month = date('m', $ch_date);
				$ch_year = date('Y', $ch_date);
				if ($ch_year >= $year) 
				{
					if ($ch_month >= $month) 
					{
						if ($ch_day >= $day)
						{
							$carPriceQuery = mysqli_query($db,"SELECT rentalprice FROM $thisbrandname WHERE carname='$thismodelname'");
							$thisCarPrice = mysqli_fetch_array($carPriceQuery);
							$total_pay = $rent_period * $thisCarPrice['rentalprice'];

							mysqli_query($db, "INSERT INTO rent (full_name,national_id,phone_num,dateline,rent_period,total_pay) VALUES ('$full_name','$national_id','$phone_num','$date','$rent_period','$total_pay')");

							$successfull = "Request has done, you can recieve the car at ".$date.", you will pay ".$total_pay." $";
							echo "<script type='text/javascript'> alert('$successfull'); </script>";
					        include('ignore_access.php');								
						}
						else
						{
							$error_day = "This date is over";
							echo "<script type='text/javascript'> alert('$error_day'); </script>";
					        include('ignore_access.php');	
						}
					}
					else
					{
						$error_month = "This date is over";
						echo "<script type='text/javascript'> alert('$error_month'); </script>";
				        include('ignore_access.php');	
					}
				}
				else
				{
					$error_year = "This date is over";
					echo "<script type='text/javascript'> alert('$error_year'); </script>";
			        include('ignore_access.php');	
				}
			}
		}
	}
}

?>