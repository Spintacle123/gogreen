<?php
include 'action.php';
include 'config.php';
// if(empty($_SESSION['ID'])){
// 	header("location: index.php");
// 	exit();
// }

error_reporting(0);

if (isset($_GET['details'])) {
    $id = $_GET['details'];
    $query = "SELECT * FROM orders WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $cid = $row['id'];
    $cname = $row['name'];
    $cproducts = $row['products'];
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Transactions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container">
		<br>
        <?php

        $query = "SELECT * FROM orders WHERE id =" . $cid;
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $str = $row['products'];
            $newStr = explode("<br>", $str);

            for ($i = 0; $i < count($newStr); $i++) {
                $name = explode(" (", $newStr[$i]);
                $query = "SELECT * FROM products WHERE name = '" . $name[0] . "'";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $result = $stmt->get_result();

                while ($row = $result->fetch_assoc()) :
                    $cid = $row['id'];
        ?>
                    <div class="card">
                        <div class="card-header"><h1><?= $row['name'] ?></h1></div>
                        <div class="card-body">
							<div class="col-sm-4"> 
							<img src="<?= $row['image']; ?>" id="ProductImg">
							</div>
                            <div class="row">
                                <div class="col-sm-4 text-center">
                                    <h3 class="mt-4 mb-3">Write Review Here</h3>
                                    <!-- <button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button> -->
                                    <button data-id="<?= $row['id'] ?>" onclick="$('#product_id').val($(this).data('id')); $('#review_modal').modal('show');">click me</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5" id="review_content"></div>


        <?php endwhile;
            }
        } ?>


    </div>

</body>

</html>

<div id="review_modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Submit Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="text-center mt-2 mb-4">
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                </h4>
                <div class="form-group">
                    <input type="text" name="product_id" id="product_id" value="" />
                    <input type="text" name="name" id="name" value="<?php echo $_SESSION['name'] ?>" />
                </div>
                <div class="form-group">
                    <textarea name="review" id="review" class="form-control" placeholder="Type Review Here"></textarea>
                </div>
                <div class="form-group text-center mt-4">
                    <button type="button" class="btn btn-primary" id="save_review">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var rating = 0;

        $('#save_review').click(function() {

            var product_id = $('#product_id').val();
            var name = $('#name').val();
            var review = $('#review').val();

            if (review == '') {
                alert("Please add text");
                return false;
            } else {
                $.ajax({
                    url: "submit_rating.php",
                    method: "POST",
                    data: {
                        product_id: product_id,
                        rating: rating,
                        name: name,
                        review: review
                    },
                    success: function(data) {
                        $('#review_modal').modal('hide');

                        alert(data);
                    }
                })
            }
        });

        $(document).on('mouseenter', '.submit_star', function() {

            var rating = $(this).data('rating');

            reset_background();

            for (var count = 1; count <= rating; count++) {

                $('#submit_star_' + count).addClass('text-warning');

            }

        });

        function reset_background() {
            for (var count = 1; count <= 5; count++) {

                $('#submit_star_' + count).addClass('star-light');

                $('#submit_star_' + count).removeClass('text-warning');

            }
        }

        $(document).on('mouseleave', '.submit_star', function() {

            reset_background();

            for (var count = 1; count <= rating; count++) {

                $('#submit_star_' + count).removeClass('star-light');

                $('#submit_star_' + count).addClass('text-warning');
            }

        });

        $(document).on('click', '.submit_star', function() {

            rating = $(this).data('rating');

        });

        load_rating_data();

        function load_rating_data() {
            var cid = <?= $cid ?>;
            console.log(cid);
            $.ajax({
                url: "submit_rating.php",
                method: "POST",
                data: {
                    cid: cid,
                    action: 'load_data'
                },
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                    $('#average_rating').text(data.average_rating);
                    $('#total_review').text(data.total_review);

                    var count_star = 0;
                    $('.main_star').each(function() {
                        count_star++;
                        if (Math.ceil(data.average_rating) >= count_star) {
                            $(this).addClass('text-warning');
                            $(this).addClass('star-light');
                        }
                    });

                    $('#total_five_star_review').text(data.five_star_review);

                    $('#total_four_star_review').text(data.four_star_review);

                    $('#total_three_star_review').text(data.three_star_review);

                    $('#total_two_star_review').text(data.two_star_review);

                    $('#total_one_star_review').text(data.one_star_review);

                    $('#five_star_progress').css('width', (data.five_star_review / data.total_review) * 100 + '%');

                    $('#four_star_progress').css('width', (data.four_star_review / data.total_review) * 100 + '%');

                    $('#three_star_progress').css('width', (data.three_star_review / data.total_review) * 100 + '%');

                    $('#two_star_progress').css('width', (data.two_star_review / data.total_review) * 100 + '%');

                    $('#one_star_progress').css('width', (data.one_star_review / data.total_review) * 100 + '%');

                    if (data.review_data.length > 0) {
                        var html = '';

                        for (var count = 0; count < data.review_data.length; count++) {
                            html += '<div class="row mb-3">';

                            html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">' + data.review_data[count].name.charAt(0) + '</h3></div></div>';

                            html += '<div class="col-sm-11">';

                            html += '<div class="card">';

                            html += '<div class="card-header"><b>' + data.review_data[count].name + '</b></div>';

                            html += '<div class="card-body">';

                            for (var star = 1; star <= 5; star++) {
                                var class_name = '';

                                if (data.review_data[count].rating >= star) {
                                    class_name = 'text-warning';
                                } else {
                                    class_name = 'star-light';
                                }

                                html += '<i class="fas fa-star ' + class_name + ' mr-1"></i>';
                            }

                            html += '<br />';

                            html += data.review_data[count].review;

                            html += '</div>';

                            html += '<div class="card-footer text-right">On ' + data.review_data[count].datetime + '</div>';

                            html += '</div>';

                            html += '</div>';

                            html += '</div>';
                        }

                        $('#review_content').html(html);
                    }
                }
            })
        }

    });
</script>