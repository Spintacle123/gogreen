<?php
  include 'config.php';
  include 'ad_action_accounts.php';

  error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin Users-Profile</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.jpg" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <?php include("ad_header.php") ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php include("ad_sidebar.php") ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="ad_index.php">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <?php
                $query = 'SELECT * FROM users WHERE id = '.$_SESSION['ID'];
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $result = $stmt->get_result();
              ?>
              <?php if ($row = $result->fetch_assoc()) { ?>
                <img src="<?= $row['image']; ?>" alt="Profile" height="120px" class="rounded-circle" style="border: 3px solid grey"><br>
              <?php } ?>
              <h3><?php echo $_SESSION['name'] ?></h3>
              <h3><?php echo $_SESSION['role'] ?></h3>
              <div class="social-links mt-2">
                <!-- <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a> -->
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
            <?php if (isset($_SESSION['response'])) { ?>
            <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show alert-dismissible fade show col-sm-6" role="alert" style="padding: 8px; margin-left:auto">
              <b><?= $_SESSION['response']; ?></b>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close" style="padding: 10px"></button>
            </div>
          <?php } unset($_SESSION['response']); ?>
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <a href="users_profile.php?edit=<?= $row['id']; ?>" type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">
                    Edit Profile
                  </a>
                </li>

                <!-- <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li> -->

              </ul>
              
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name:</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['name'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Job:</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['role'] ?></div>
                  </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Cafe:</div>
                        <div class="col-lg-9 col-md-8">Street Taqueria and Cafe</div>
                    </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Country:</div>
                    <div class="col-lg-9 col-md-8">Philippines</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address:</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['address'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone:</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['phone'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email:</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['email'] ?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form action="ad_action_accounts.php" method="post"  enctype="multipart/form-data">
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image: </label>
                      <div class="col-md-8 col-lg-9">
                        <input class="form-control btn btn-primary btn-sm" type="file" name="images">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name:</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="id" type="hidden" class="form-control" value="<?= $id; ?>">
                        <input name="name" type="text" class="form-control" value="<?= $name; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Username:</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="username" type="text" class="form-control" value="<?= $username; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job:</label>
                      <div class="col-md-8 col-lg-9">
                        <select class="form-select" name="role" value="<?= $role; ?>" class="form-control" required>
                          <option selected>Select Role</option>
                          <option value="Admin">Admin</option>
                          <option value="Cashier">Cashier</option>
                          </select>
                        <input type="hidden" name="usertype" value="<?= $usertype; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address:</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="address" type="text" class="form-control" value="<?= $address; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone:</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" value="<?= $phone; ?>" pattern="[0-9]{11}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email:</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" value="<?= $email; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <!-- <label>Old Password: <?= $password; ?></label> -->
                      <label for="Password" class="col-md-4 col-lg-3 col-form-label">Password:</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="text" class="form-control" placeholder="Enter New Password">
                      </div>
                    </div>

                    <div class="text-center">
                      <?php if ($update == true) { ?>
                        <input type="submit" name="update" class="btn btn-primary" value="Update Account">
                      <?php } ?>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
    <?php 
				$date = date('Y');
				echo '<p class="copyright">Copyright '.$date.' - All Rights Reserved</p>';
			?>
    </div>
    <div class="credits">
      <a href="https://www.facebook.com/streettaqueriacafe/?ref=page_internal">Street Taqueria and Cafe</a>
    </div>
  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>