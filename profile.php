<?php
require 'includes/init.php';
if(isset($_SESSION['customer_id']) && isset($_SESSION['email'])){
    $user_data = $user_obj->find_user_by_id($_SESSION['customer_id']);
    if($user_data ===  false){
        header('Location: logout.php');
        exit;
    }
    // FETCH ALL VEHICLES
    $all_vehicles = $vehicle_obj->all_vehicles();
}
else{
    header('Location: logout.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo  $user_data->username;?></title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
</head>
<body>
	<h2>Easy Ride</h2>
    <div class="profile_container">
        <div class="inner_profile">
            <h1><?php echo  $user_data->customer_fname." ".$user_data->customer_lname;?></h1>
        </div>
        <nav>
            <ul>
                <li><a href="profile.php" rel="noopener noreferrer" class="active">Home</a></li>
                <li><a href="profile.php" rel="noopener noreferrer">Bookings</a></li>
                <li><a href="profile.php" rel="noopener noreferrer">Rental History</a></li>
                <li><a href="logout.php" rel="noopener noreferrer">Logout</a></li>
            </ul>
        </nav>
        <div class="all_vehicles">
            <h3>All Vehicles</h3>
            <div class="usersWrapper">
                <?php
                if($all_vehicles){
                    foreach($all_vehicles as $row){
                        echo '<div class="vehicle_box">
                                <div class="vehicle_info"><span>Manufacturer: '.$row->manufacturer.'</span>
                                <div class="vehicle_info"><span>Car Name: '.$row->c_name.'</span>
                                <div class="vehicle_info"><span>Type: '.$row->car_type_name.'</span>
                                <div class="vehicle_info"><span>Model Year: '.$row->model_year.'</span>
                                <div class="vehicle_info"><span>Seat Capacity: '.$row->seat_capacity.'</span>
                                <div class="vehicle_info"><span>Mileage: '.$row->mileage.'</span>
                                <div class="vehicle_info"><span>Rate: '.$row->rate.'</span>
                                <div class="vehicle_info"><span>Fuel Type: '.$row->fuel_type_name.'</span>
                                <div class="vehicle_info"><span>Description: '.$row->description.'</span>
                                <div class="vehicle_info"><span>Color: '.$row->color.'</span>
                                <span><a href="vehicle_profile.php?id='.$row->registration_num.'" class="see_profileBtn">See vehicle</a></div>
                                <br></br>
                            </div>';
                    }
                }
                else{
                    echo '<h4>There is no vehicles!</h4>';
                }
                ?>
            </div>
        </div>
        
    </div>
</body>
</html>