<?php include("pages/header-cad-login.php"); ?>
<?php ?>
<section class="contact-page-area">
    <div class="container">
        <p class="text-black link-nav"><a href="index.html">Home </a> <span class="lnr lnr-arrow-right" style="color:#000;"></span> Cadastro</p>
        <div class="row  justify-content-center">
            <div class="menu-content pb-60 col-lg-12">
                <div class="title text-center">
                    <h1 class="mb-10">Recuperar Senha</h1>
                    <p></p>
                </div>
            </div>
            <div class="col-lg-8">
                <?php
                require 'classes/usuarios.class.php';
                $u = new Usuarios();
                if(!empty($_POST['email'])){

                    $email = $_POST['email'];

                    $token = md5(time(). rand(0, 99999) .rand(0, 99999));
                }

            ?>
            <form method="post" class="contact-form text-left form-area">
                <div class="card" style="width: 25rem; margin: 0 auto; float:none;">
                    <div class="card-body" >
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" name="email" class="common-input mb-20 form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Escrever seu e-mail">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <button type="submit" class="genric-btn primary e-large">Recuperar</button>
  <!-- <small id="emailHelp" class="form-text text-muted" style="float:right; font-size:14px; padding:10px;"><a href="">.</a></small>  -->
</form>
        </div>
    </div>
            <!-- <div class="card" style="width: 30rem; margin-left:120px;">
                <div class="card-body">
                    <form method="post" class="contact-form text-right form-area">
                        <div class="row justify-content-md-center">
                            <div class="col-8 form-group " >

                                <input name="nome" id="nome" placeholder="Nome" class="common-input mb-20 form-control" type="text">
                                <input name="email" id="email" placeholder="E-mail" class="common-input mb-20 form-control" type="text">
                                <button type="submit" class="genric-btn primary e-large" style="">CADASTRAR </button>
                            </div>
                           
                                

                        </div>
                    </form>
                </div>
            </div> -->
        </div>
    </div>
    </div>
</section>
<?php include("pages/footer.php"); ?>