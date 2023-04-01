<!--nav bar-->
        
<nav>
    <a href="home.php"><div><img class="logo animated bounceInLeft" src="images/logo.gif"></div></a>

    <ul class="animated bounceInRight">
        <a href="home.php"><li>Home</li></a>
        <a href="gallery.php"><li>Gallery</li></a>

        <!--brands and cars list-->

        <li style="cursor: pointer;">

            <?php
                
                if(isset($_SESSION['username']) && $_SESSION['username'] == "admin")
                {
                    echo "Cars";
                    echo "<ul> <a href='add_brands.php'><li>New brand</li></a> <a href='add_cars.php'><li>New car</li></a> <a href='control.php'><li>Control</li></a></ul>";
                }
                else
                {
                    echo "Cars";
                }
            
            ?>
            
            <ul>
                <?php 

                    // database connection

                    $db = mysqli_connect('localhost', 'root', '', 'truecar(web)');

                    // select all brands from brands table

                    $results = mysqli_query($db, "SELECT * FROM brands ORDER BY name ASC");
                
                ?>

                <!--feach all brands to list-->

                <?php while($row = mysqli_fetch_array($results)) { ?>

                    <?php if(isset($_SESSION['username'])):?>

                    	<?php if($_SESSION['username'] != "admin"):?>

	                    	<a href="brands/<?php echo $row['name'];?>page.php"><li><?php echo $row['name']; ?>
		                    <ul>
		                        <?php 

		                            // select cars from tables

		                            $car_models = $row['name'];
		                            $results_cars = mysqli_query($db, "SELECT carname FROM $car_models ORDER BY carname ASC");
		                        
		                        ?>

		                        <!--feach all cars to its brands-->

		                        <?php while($row_cars = mysqli_fetch_array($results_cars)) { ?>

		                            <!--open car page-->

		                            <a href="models/<?php echo $row['name'];?>-<?php echo $row_cars['carname'];?>.php"><li><?php echo $row_cars['carname'];?></li></a>

		                        <?php } ?>
		                    </ul>
		                    </li></a>

		                    <?php endif ?>

		            <?php else : ?>

		            	<a href="brands/<?php echo $row['name'];?>page.php"><li><?php echo $row['name']; ?>
	                    <ul>
	                        <?php 

	                            // select cars from tables

	                            $car_models = $row['name'];
	                            $results_cars = mysqli_query($db, "SELECT carname FROM $car_models ORDER BY carname ASC");
	                        
	                        ?>

	                        <!--feach all cars to its brands-->

	                        <?php while($row_cars = mysqli_fetch_array($results_cars)) { ?>

	                            <!--open car page-->

	                            <a href="models/<?php echo $row['name'];?>-<?php echo $row_cars['carname'];?>.php"><li><?php echo $row_cars['carname'];?></li></a>

	                        <?php } ?>
	                    </ul>
	                    </li></a>

                    <?php endif ?>

                <?php } ?>
            </ul>
        </li>
        
        <a href="about.php"><li>About</li></a>
        <li>

            <?php
                
                if(isset($_SESSION['username']))
                {
                    echo "<a href='profile.php'>".ucfirst($_SESSION['username'])."</a>";
                    echo "<ul> <a href='edit.php'><li>Edit</li></a> <a href='options/logout.php'><li>Log out</li></a> </ul>";
                }
                else
                {
                    echo "<a class='account_control' href='login.php'>Login</a>";
                }
            
            ?>

        </li>
    </ul>
</nav>

<!--end-->