<?php
    
    require "connection.php";
    
    $sqlCommand = "CREATE TABLE chartList (
    id int(11) NOT NULL auto_increment,
    product_id int(11) NOT NULL,
    custumer_name varchar(30) NOT NULL,
    custumer_email varcahr(50) NOT NULL,
    product_quantity int(20) NOT NULL,
    PRIMARY KEY (id),
    UNIQUE KEY product_name (custumer_name)
    ) ";
    if (mysqli_query($con,$sqlCommand)){
        echo "Your orders table has been created successfully!";
    } else {
        echo "CRITICAL ERROR: orders table has not been created.";
    }
    ?>