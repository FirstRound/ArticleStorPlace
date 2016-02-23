<section id="home">
            <!-- Carousel -->

            <div id="main-slide" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#main-slide" data-slide-to="0" class="active"></li>
                    <li data-target="#main-slide" data-slide-to="1"></li>
                    <li data-target="#main-slide" data-slide-to="2"></li>
                </ol>
                <!--/ Indicators end-->

                <!-- Carousel inner -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img class="img-responsive" src="images/slider/bg1.jpg" alt="slider">
                        <div class="slider-content">
                            <div class="col-md-12 text-center">
                                <h2 class="animated2">
                              <span>Добро пожаловать в <strong>OEC</strong></span>
                              </h2>
                                <h3 class="animated3">
                                <span>Онлайн образование для каждого</span>
                              </h3>
                              <?php
                              if (!User::IsLogin()) {
                                echo '<p class="animated4"><a href="index.php?page=registration" class="slider btn btn-primary">Регистрация</a></p>';  
                             }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!--/ Carousel item end -->
                    <div class="item">
                        <img class="img-responsive" src="images/slider/bg2.jpg" alt="slider">
                        <div class="slider-content">
                            <div class="col-md-12 text-center">
                                <h2 class="animated4">
                                <span><strong>Курсы</strong> OEC</span> 
                            </h2>
                                <h3 class="animated5">
                              <span>Ключ к успеху</span> 
                            </h3> 
                                <p class="animated6"><a href="index.php?page=subjects" class="slider btn btn-primary">Перейти к списку курсов</a> 
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--/ Carousel item end -->
                    <div class="item">
                        <img class="img-responsive" src="images/slider/bg3.jpg" alt="slider">
                        <div class="slider-content">
                            <div class="col-md-12 text-center">
                                <h2 class="animated7 white">
                                <span>Успешный <strong>человек</strong></span>
                            </h2>
                                <h3 class="animated8 white">
                              <span>учится всю жизнь</span>
                            </h3> 
                            </div>
                        </div>
                    </div>
                    <!--/ Carousel item end -->
                </div>
                <!-- Carousel inner end-->

                <!-- Controls -->
                <a class="left carousel-control" href="#main-slide" data-slide="prev">
                    <span><i class="fa fa-angle-left"></i></span>
                </a>
                <a class="right carousel-control" href="#main-slide" data-slide="next">
                    <span><i class="fa fa-angle-right"></i></span>
                </a> 
            </div>
            <!-- /carousel -->
        </section>
        <!-- End Home Page Slider -->
        
        
        <!-- Start Services Section -->
        <div class="section service">
            <div class="container">
                <div class="row">
                    
                    <!-- Start Service Icon 1 -->
                    <div class="col-md-3 col-sm-6 service-box service-center" data-animation="fadeIn" data-animation-delay="001">
                        <div class="service-icon">
                            <i class="fa fa-desktop icon-large"></i>
                        </div>
                        <div class="service-content">
                            <h4>Удобство</h4>
                            <p>Онлайн курсы имеют ряд преимуществ – обучение в индивидуальном темпе, свобода и гибкость, доступность.</p>
                        </div>
                    </div>
                    <!-- End Service Icon 1 -->

                    <!-- Start Service Icon 2 -->
                    <div class="col-md-3 col-sm-6 service-box service-center">
                        <div class="service-icon">
                            <i class="fa fa-eye icon-large"></i>
                        </div>
                        <div class="service-content">
                            <h4>Наглядность</h4>
                            <p>Материал часто сопровождается презентациями или демонстрациями, что редко можно увидеть на лекциях.</p>
                        </div>
                    </div>
                    <!-- End Service Icon 2 -->

                    <!-- Start Service Icon 3 -->
                    <div class="col-md-3 col-sm-6 service-box service-center">
                        <div class="service-icon">
                            <i class="fa fa-code icon-large"></i>
                        </div>
                        <div class="service-content">
                            <h4>Современность</h4>
                            <p>Получайте только актуальную информацию, становясь более конкурентноспособными.</p> 
                        </div> 
                    </div>
                    <!-- End Service Icon 3 -->

                     <!-- Start Service Icon 4 -->
                    <div class="col-md-3 col-sm-6 service-box service-center">
                        <div class="service-icon">
                            <i class="fa fa-rocket icon-large"></i>
                        </div>
                        <div class="service-content">

                            <h4>Свобода</h4>
                            <p>Вы можете изучить те языки, технологии или предметы,которых нет в вашем университете.</p>
                        </div>
                    </div>
                    <!-- End Service Icon 4 -->
 

                </div><!-- .row -->
            </div><!-- .container -->
        </div>
        <!-- End Services Section -->