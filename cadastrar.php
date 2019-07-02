<?php include("pages/header-cad-login.php"); ?>
<?php ?>
<section class="contact-page-area">
    <div class="container">
        <p class="text-black link-nav"><a href="index.html">Home </a> <span class="lnr lnr-arrow-right" style="color:#000;"></span> Cadastro</p>
        <div class="row  justify-content-center">
            <div class="menu-content pb-60 col-lg-12">
                <div class="title text-center">
                    <h1 class="mb-10">Cadastro</h1>
                    <p></p>
                </div>
            </div>
            <div class="col-lg-8">
                <?php
                require 'classes/usuarios.class.php';
                $u = new Usuarios();
                if (isset($_POST['nome']) && !empty($_POST['nome'])) {
                    $nome = addslashes($_POST['nome']);
                    $email = addslashes($_POST['email']);
                    $cep = addslashes($_POST['cep']);
                    $endereco = addslashes($_POST['endereco']);
                    $numero = addslashes($_POST['numero']);
                    $bairro = addslashes($_POST['bairro']);
                    $cidade = addslashes($_POST['cidade']);
                    $estado = addslashes($_POST['estado']);
                    $telefone = addslashes($_POST['telefone']);
                    $cpf = addslashes($_POST['cpf']);
                    $senha = $_POST['senha'];

                    if (!empty($nome) && !empty($email) && !empty($cep) && !empty($endereco) && !empty($numero) && !empty($bairro) && !empty($cidade) && !empty($estado) && !empty($telefone) && !empty($cpf) && !empty($senha)
                    ) {
                        if ($u->cadastrar($nome, $email, $cep, $endereco, $numero, $bairro, $cidade, $estado, $telefone, $cpf, $senha)) {
                            ?>
                            <div class="alert alert-success" role="alert">
                                <strong>Parabéns</strong> Cadastro realizado com sucesso. <a href="login.php" class="alert-link">Faça seu login agora</a>
                            </div>
                        <?php
                        } else {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                Este usuário já existe! <a href="login.php" class="alert-link">Faça seu login agora</a>
                            </div>
                        </div>
                    <?php

                    }
                } else {
                    ?>
                    <div class="alert alert-warning" role="alert">
                        Preencha todos os campos!
                    </div>
                <?php
                }
            }
            ?>
            <div class="card">
                <div class="card-body">
                    <form method="post" class="contact-form text-right form-area">
                        <div class="row">
                            <div class="col-6 form-group">

                                <input name="nome" id="nome" placeholder="Nome" class="common-input mb-20 form-control" type="text">
                                <input name="email" id="email" placeholder="E-mail" class="common-input mb-20 form-control" type="text">
                                <input name="cep" id="cep" placeholder="CEP" class="common-input mb-20 form-control" onblur="pesquisacep(this.value);" onkeydown="javascript: fMasc( this, mCEP );" type="text">
                                <input name="endereco" id="endereco" placeholder="Endereço" class="common-input mb-20 form-control" type="text">
                                <input name="numero" id="numero" placeholder="N°" class="common-input mb-20 form-control" type="number">
                                <input name="bairro" id="bairro" placeholder="Bairro" class="common-input mb-20 form-control" type="text">
                            </div>
                            <div class="col-6 form-group">


                                <input name="cidade" id="cidade" placeholder="Cidade" class="common-input mb-20 form-control" type="text">
                                <input name="estado" id="estado" placeholder="Estado" class="common-input mb-20 form-control" type="text">
                                <input name="telefone" id="tel" placeholder="Telefone" class="common-input mb-20 form-control" onkeydown="javascript: fMasc( this, mTel );" type="text">
                                <label id="cpfResponse" style="margin:0; padding:0;"></label>
                                <input name="cpf" id="cpf" placeholder="CPF" class="common-input mb-20 form-control" maxlength="18" autocomplete="off" onkeyup="cpfCheck(this)" onkeydown="javascript: fMasc( this, mCPF );" type="text">
                                <input name="senha" id="senha" placeholder="Senha" class="common-input mb-20 form-control" type="text">
                                <!-- <div class="switch_box box_4">
                                    <label class="descricheck" style="float:right; ">Aceito termo de compromisso.</label>
                                        <div class="input_wrapper">
                                            
                                            <input type="checkbox" name="termos" class="switch_4">
                                            <svg class="is_checked" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 426.67 426.67">
                                                <path d="M153.504 366.84c-8.657 0-17.323-3.303-23.927-9.912L9.914 237.265c-13.218-13.218-13.218-34.645 0-47.863 13.218-13.218 34.645-13.218 47.863 0l95.727 95.727 215.39-215.387c13.218-13.214 34.65-13.218 47.86 0 13.22 13.218 13.22 34.65 0 47.863L177.435 356.928c-6.61 6.605-15.27 9.91-23.932 9.91z" />
                                            </svg>
                                            <svg class="is_unchecked" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 212.982 212.982">
                                                <path d="M131.804 106.49l75.936-75.935c6.99-6.99 6.99-18.323 0-25.312-6.99-6.99-18.322-6.99-25.312 0L106.49 81.18 30.555 5.242c-6.99-6.99-18.322-6.99-25.312 0-6.99 6.99-6.99 18.323 0 25.312L81.18 106.49 5.24 182.427c-6.99 6.99-6.99 18.323 0 25.312 6.99 6.99 18.322 6.99 25.312 0L106.49 131.8l75.938 75.937c6.99 6.99 18.322 6.99 25.312 0 6.99-6.99 6.99-18.323 0-25.313l-75.936-75.936z" fill-rule="evenodd" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div> -->

                                <button type="submit" class="genric-btn primary e-large" style="float: right;">CADASTRAR </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<?php include("pages/footer.php"); ?>