<?php
// Include the database connection file
 
include '../../db.connection/db_connection.php';
?>  



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> P.T.SCHOOL - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include 'sidebar.php';
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                include 'navbar.php';
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- Content Row -->

                    <!-- Content Row -->
                    <style>
                        .card-custom {
                            margin: 6px;
                            /* Reset margin to prevent extra space */
                        }
                    </style>
                    </head>

                    <body>
                        <div class="container">
                            <div class="row">
                                <!-- Inside the container-fluid div in your admin panel index page -->
                                <h2 class="h2 mb-0 text-info mx-2">Uploaded PDFs</h2>
                                <div class="row row-custom no-gutters">
                                    <?php
                                    // Database connection (replace with your actual database connection details)
                                   
                                    // Fetch PDF data
                                    $pdf_sql = "SELECT id, title, pdf_path FROM pdf_uploads";
                                    $pdf_result = $conn->query($pdf_sql);

                                    if ($pdf_result->num_rows > 0) {
                                        while ($pdf_row = $pdf_result->fetch_assoc()) {
                                            $pdf_path = $pdf_row['pdf_path'];
                                            echo "
            <div class='col-12 col-md-4 col-custom'>
                <div class='card card-custom'>
                    <div class='card-body'>
                        <h5 class='card-title'>{$pdf_row['title']}</h5>
                        <p class='card-text'>Uploaded PDF: <a href='{$pdf_path}' target='_blank'>View PDF</a></p>
                    </div>
                </div>
            </div>
            ";
                                        }
                                    } else {
                                        echo "<p>No PDFs found.</p>";
                                    }

                                    $conn->close();
                                    ?>
                                </div>

                            </div> <!-- Pie Chart -->

                        </div>
                        <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->
<!-- Script for handling PDF deletion -->
<script>
$(document).ready(function() {
    // Function to handle PDF deletion
    function deletePDF(pdfId) {
        $.ajax({
            url: 'delete_pdf.php?id=' + pdfId,
            type: 'GET',
            success: function() {
                // Remove the deleted PDF card from the DOM
                $('#pdfCard_' + pdfId).fadeOut('slow', function() {
                    $(this).remove();
                });
            },
            error: function(xhr, status, error) {
                console.error('Error deleting PDF:', error);
                // Show error message if needed
            }
        });
    }

    // Bind click event to delete buttons dynamically
    $(document).on('click', '.delete-pdf-btn', function(e) {
        e.preventDefault();
        var pdfId = $(this).data('pdf-id');
        if (confirm('Are you sure you want to delete this PDF?')) {
            deletePDF(pdfId);
        }
    });
});
</script>


                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <div class="footer-widget__copyright">
                                <p class="mini_text" style="color:black"> ©2024 P.T.SCHOOL . All Rights Reserved. Designed &
                                    Developed by <a href="https://bhavicreations.com/" target="_blank" style="text-decoration: none;color:black">Bhavi
                                        Creations</a></p>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>