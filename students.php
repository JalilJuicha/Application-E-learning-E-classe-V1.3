<?php
    include_once 'checkout.php';
    include_once 'logout.php';
    require_once 'configdata/config.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-LEARNING-APPLICATION /Students</title>
    <link rel="stylesheet" href="bootstrap5/css/bootstrap.css">
    <script src="bootstrap5/js/bootstrap.min.js"></script>
    <script src="bootstrap5/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section class="container-fluid">
        <div class="row flex-nowrap">
            <?php include "include/sideBar.php"  ?>

            <div class="col-10">

                <?php include "include/navBar.php" ?>


                <!-- ============================= -->
                <div class="row mt-5 flex-row">
                    <div class="col-10  d-flex flex-nowrap justify-content-between w-100">
                        <h2>Students List</h2>
                        <div style="font-size: 1.3rem;">
                            <i class="fa fa-chevron-up fs-6 " aria-hidden="true"></i>

                            <a href="studentsform.php" class="btn btn-primary text-uppercase">Add New Student</a>
                        </div>
                    </div>
                    <hr class="m-auto" style="width: 100%;">
                </div>

                

                    <div style="height:70vh;" class="row mt-2 px-5 table-responsive overflow-scroll">
                        <table class="table">
                            
                        <thead>
                                <tr class="">
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Enroll number</th>
                                    <th scope="col">Date of admission</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $results = mysqli_query($config, "SELECT id, name, email, phone, enroll_number, date_of_admission from students order by id DESC;"); 
                        while($Students = mysqli_fetch_array($results)) {?>
                                <tr class=" bg-white  mb-3 align-middle border-5 border-light ">
                                    <td><?php echo $Students['name']; ?></td>
                                    <td><?php echo $Students['email'] ;?></td>
                                    <td><?php echo $Students['phone'] ;?></td>
                                    <td><?php echo $Students['enroll_number']; ?></td>
                                    <td><?php echo $Students['date_of_admission'] ;?></td>
                                    
                                    <td class="d-flex fs-4 text-info border-0 text-end">
                                        <a href="editstudents.php?edit=<?php echo $Students['id'] ;?>"
                                            class="edit_btn"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a href="deletestudents.php?del=<?php echo $Students['id'] ;?>"
                                            class="del_btn"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    
            </div>
        </div>
        </div>
        </div>
    </section>
</body>

</html>