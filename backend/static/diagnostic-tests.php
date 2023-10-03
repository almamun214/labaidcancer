<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Diagnostic Tests || Labaid Cancer Hospital and Super Specialty Center</title>
    <link rel="manifest" href="images/favicon/manifest.json">
    <link rel="stylesheet" href="css/all-styles.css">

</head>


<body>
    <div class="preloader"></div>
    <div class="page-wrapper">
        
        <?php include('header.php'); ?>


        <section class="diagnostic-tests">
            <div class="container">
                <div class="category-filter">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <select name="post-type" class="selectpicker">
                                <option>-- Select A Division --</option>
                                <option value="Barishal">Barishal</option>
                                <option value="Chittagong">Chittagong</option>
                                <option value="Dhaka">Dhaka</option>
                                <option value="Mymensingh">Mymensingh</option>
                                <option value="Khulna">Khulna</option>
                                <option value="Rajshahi">Rajshahi</option>
                                <option value="Rangpur">Rangpur</option>
                                <option value="Sylhet">Sylhet</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <select name="post-type" class="selectpicker">
                                <option>-- Select A Division First --</option>
                                <option>-- Select A Division First --</option>
                                <option>-- Select A Division First --</option>
                                <option>-- Select A Division First --</option>
                                <option>-- Select A Division First --</option>
                                <option>-- Select A Division First --</option>
                                <option>-- Select A Division First --</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <div class="category-filter__search">
                                <input type="text" name="search" placeholder="Type any test name....">
                                <button type="submit"><i class="material-icons">search</i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row low-gutters">
                    <div class="grid-test-col clearfix">
                        <div class="test-wrapper">
                            <div class="test-img">
                                <img class="img-responsive" src="images/test/1.jpg">
                                <div class="test-overlay">
                                    <div class="test-content">
                                        <div class="test-content-inner">
                                            <a href="diagnostic-tests-single.html"><i
                                                    class="fa  fa-share-square-o"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="test-name">
                                <h3><a href="diagnostic-tests-single.html">Test Name Here</a></h3>
                            </div>
                        </div>
                        <div class="test-wrapper">
                            <div class="test-img">
                                <img class="img-responsive" src="images/test/2.jpg">
                                <div class="test-overlay">
                                    <div class="test-content">
                                        <div class="test-content-inner">
                                            <a href="diagnostic-tests-single.html"><i
                                                    class="fa  fa-share-square-o"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="test-name">
                                <h3><a href="diagnostic-tests-single.html">Test Name Here</a></h3>
                            </div>
                        </div>
                        <div class="test-wrapper">
                            <div class="test-img">
                                <img class="img-responsive" src="images/test/3.jpg">
                                <div class="test-overlay">
                                    <div class="test-content">
                                        <div class="test-content-inner">
                                            <a href="diagnostic-tests-single.html"><i
                                                    class="fa  fa-share-square-o"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="test-name">
                                <h3><a href="diagnostic-tests-single.html">Test Name Here</a></h3>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="labaid-pagination text-center">
                    <a class="prev" href="#"><i class="fa fa-angle-left"></i></a>
                    <!--
                    --><a class="active" href="#">1</a>
                    <!--
                    --><a href="#">2</a>
                    <!--
                    --><a href="#">3</a>
                    <!--
                    --><a href="#">4</a>
                    <!--
                    --><a href="#">5</a>
                    <!--
                    --><a class="next" href="#"><i class="fa fa-angle-right"></i></a>
                </div><!-- /.post-pagination -->

            </div>
        </section>
    </div>




    <?php include('footer.php'); ?>