<?php

$connect = new PDO("mysql:host=localhost;dbname=stc", "root", "");

if (isset($_POST["rating"])) {

    $data = array(
        ':product_id'        =>    $_POST["product_id"],
        ':name'        =>    $_POST["name"],
        ':rating'        =>    $_POST["rating"],
        ':review'        =>    $_POST["review"],
        ':datetime'            =>    time()
    );

    $query = "
        INSERT INTO reviews
        (product_id, name, rating, review, datetime) 
        VALUES (:product_id, :name, :rating, :review, :datetime)
        ";

    $statement = $connect->prepare($query);

    $statement->execute($data);

    echo "Your Review & Rating Successfully Submitted";
}

if (isset($_POST["action"])) {
    $cid = $_POST["cid"];
    $average_rating = 0;
    $total_review = 0;
    $five_star_review = 0;
    $four_star_review = 0;
    $three_star_review = 0;
    $two_star_review = 0;
    $one_star_review = 0;
    $total_rating = 0;
    $review_content = array();

    $query = " SELECT * FROM reviews WHERE product_id = $cid ORDER BY id DESC ";

    $result = $connect->query($query, PDO::FETCH_ASSOC);

    foreach ($result as $row) {
        $review_content[] = array(
            'name'     =>  $row["name"],
            'review'   =>  $row["review"],
            'rating'        =>  $row["rating"],
            'datetime'      =>  date('l jS, F Y h:i:s A', $row["datetime"])
        );

        if ($row["rating"] == '5') {
            $five_star_review++;
        }

        if ($row["rating"] == '4') {
            $four_star_review++;
        }

        if ($row["rating"] == '3') {
            $three_star_review++;
        }

        if ($row["rating"] == '2') {
            $two_star_review++;
        }

        if ($row["rating"] == '1') {
            $one_star_review++;
        }

        $total_review++;

        $total_rating = $total_rating + $row["rating"];
    }

    $average_rating = $total_rating / $total_review;

    $output = array(
        'average_rating'    =>  number_format($average_rating, 1),
        'total_review'      =>  $total_review,
        'five_star_review'  =>  $five_star_review,
        'four_star_review'  =>  $four_star_review,
        'three_star_review' =>  $three_star_review,
        'two_star_review'   =>  $two_star_review,
        'one_star_review'   =>  $one_star_review,
        'review_data'       =>  $review_content
    );

    echo json_encode($output);
}