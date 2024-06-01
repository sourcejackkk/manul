<?php
session_start();
$message = '';

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']); // Удаляем сообщение после его отображения
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Manul CRM</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <script src="js/jquery-3.7.1.min.js"></script>
    </head>
    <body id="page-top">
      <!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#page-top">CRM Manul</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#about">О проекте</a></li>
                <li class="nav-item"><a class="nav-link" href="#projects">Возможности</a></li>
                <li class="nav-item"><a class="nav-link" href="#signup">Контакты</a></li>
                <?php if (isset($_SESSION['login'])): ?>
                    <li class="nav-item"><a class="nav-link" href="#"><?php echo $_SESSION['login']; ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Выйти</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal">Войти</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

                <!-- Модальное окно -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Вход</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    
                    
                    
                    <form action="login.php" method="post">

                        <div class="input mb-3">
                            <input type="text" class="form-control" aria-label="Small" placeholder="login" name="login">
                          </div>

                          <div class="input mb-3">
                            <input type="password" class="form-control" aria-label="Small" placeholder="Password" name="pass">
                          </div>
                        
                        
                        <button type="submit" class="btnn btn-primary btn-sm">Войти</button>
                        <button type="button" class="btnn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal2">У меня нет аккаунта</button>    
                    </form>
                </div>
            </div>
            </div>
        </div>
  
        <!-- Модальное окно 2 -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Регистрация</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    
                    <form action="register.php" method="post">

                        <div class="input mb-3">
                        <input type="text" class="form-control" aria-label="Small" placeholder="login" name="login">
                        </div>

                        <div class="input mb-3">
                        <input type="password" class="form-control" aria-label="Small" placeholder="Password" name="pass">
                        </div>

                        <div class="input mb-3">
                        <input type="password" class="form-control" aria-label="Small" placeholder="Repeat password" name="repeatpass">
                        </div>

                        <div class="input mb-3">
                        <input type="text" class="form-control" aria-label="Small" placeholder="email" name="email">
                        </div>

                        <div class="input mb-3">
                        <button type="submit" class="btnn btn-primary btn-sm">Зрегистрироваться</button>
                        </div>
                        
                    </form>

                </div>
                
            </div>
            </div>
        </div>

        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <h1 class="mx-auto my-0 text-uppercase">MANUL</h1>
                        <h2 class="text-white-50 mx-auto mt-2 mb-5">Open-source современная CRM система работающая на c#</h2>
                        <a class="btn btn-primary" href="#about">Скачать</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <!-- Модальное окно для неавторизованного пользователя -->
<div id="authorizationModal" class="modal">
            <div class="modal-dialog modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Вход</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                <p>Необходимо авторизоваться, чтобы скачать файл.</p>
                    </form>
                </div>
            </div>
            </div>
</div>

<!-- HTML раздел сайта -->
<section class="about-section text-center" id="about">
  <div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
      <div class="col-lg-8">
        <h2 class="text-white mb-4">Open-source</h2>
        <p class="text-white-50">
          Manul CRM абсолютно бесплатна и отлично оптимизирована. Вы можете
          <a href="download.php" id="downloadLink">Click here to download</a>. Свяжитесь с нами, если вам нужна помощь во внедрении в ваш бизнес-проект.
        </p>
      </div>
    </div>
    <img class="img-fluid" src="assets/img/ipad.png" alt="..." />
  </div>
</section>


        <!-- Projects-->
        <section class="projects-section bg-light" id="projects">
            <div class="container px-4 px-lg-5">
                <!-- Featured Project Row-->
                <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                    <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="assets/img/bg-masthead.jpg" alt="..." /></div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="featured-text text-center text-lg-left">
                            <h4>Функция</h4>
                            <p class="text-black-50 mb-0">Какая то особенная функция системы</p>
                        </div>
                    </div>
                </div>
                <!-- Project One Row-->
                <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="assets/img/demo-image-01.jpg" alt="..." /></div>
                    <div class="col-lg-6">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                    <h4 class="text-white">Преимущество 1</h4>
                                    <p class="mb-0 text-white-50">Какое то преимущество 1</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Project Two Row-->
                <div class="row gx-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="assets/img/demo-image-02.jpg" alt="..." /></div>
                    <div class="col-lg-6 order-lg-first">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-right">
                                    <h4 class="text-white">Преимущество 2</h4>
                                    <p class="mb-0 text-white-50">Какое то преимущество 2</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Signup-->
        <section class="signup-section" id="signup">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-10 col-lg-8 mx-auto text-center">
                        <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                        <h2 class="text-white mb-5">Подпишитесь чтобы быть в курсе!</h2>
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form class="form-signup" id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Email address input-->
                            <div class="row input-group-newsletter">
                                <div class="col"><input class="form-control" id="emailAddress" type="email" placeholder="Введите свой email..." aria-label="Введите свой email..." data-sb-validations="required,email" /></div>
                                <div class="col-auto"><button class="btn btn-primary disabled" id="submitButton" type="submit">Подписаться</button></div>
                            </div>
                            <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:required">An email is required.</div>
                            <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:email">Email is not valid.</div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3 mt-2 text-white">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br />
                                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3 mt-2">Error sending message!</div></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact-->
        <section class="contact-section bg-black">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Наш адрес</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">Город Оренбург, Ногина 90</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Email</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50"><a href="#!">georgyz1234@gmail.com</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Телефон</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">+7 (800) 555-35-35</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="social d-flex justify-content-center">
                    <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                    <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a class="mx-2" href="#!"><i class="fab fa-github"></i></a>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5"></div></footer>
        <!-- Bootstrap core JS-->

       
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        

        <?php if ($message): ?>
<div id="messageModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Сообщение</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <p><?php echo $message; ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var messageModal = document.getElementById('messageModal');
    if (messageModal) {
        var modal = new bootstrap.Modal(messageModal);
        modal.show();
    }
});
</script>


    </body>
</html>
