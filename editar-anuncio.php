<?php require 'pages/header-cliente.php'; ?>
<?php
if (empty($_SESSION['cLogin'])) {
    ?>
    <script type="text/javascript">
        window.location.href = "login.php";
    </script>
    <?php
    exit;
}
require 'classes/anuncios.class.php';
$a = new Anuncios();
if(isset($_POST['titulo']) && !empty($_POST['titulo'])){
    $titulo = addslashes($_POST['titulo']);
    $categoria = addslashes($_POST['categoria']);
    $telefone = addslashes($_POST['telefone']);
    $descricao = addslashes($_POST['descricao']);

    $a->editAnuncio($titulo, $categoria, $telefone, $descricao, $_GET['id']);

    ?>
    <div class="alert alert-success" role="alert">
                                Produto Editado com sucesso!
                            </div>
    <?php
}
if(isset($_GET['id']) && !empty($_GET['id'])){
$info = $a->getAnuncio($_GET['id']);
}else{

    ?>
    <script type="text/javascript">
        window.location.href = "anuncios.php";
    </script>
    <?php
    exit;

}


?>

<section class="post-area mt-5 ">
    <div class="container">
        <h1>Meus Anúncios -> Editar Anúncios</h1>
        <a href="add-anuncio.php" class="genric-btn default radius mt-5" style="border: 2px solid #eee;">Adicionar Anuncio</a>
        <div class="row justify-content-center d-flex mt-5">

            <div class="col-lg-8 post-list">
                <form method="POST" enctype="multipart/form-data">
                    <label for="categoria">Categorias</label>
                    <div class="default-select" id="default-select"">
                        <select name="categoria">
                            <?php 
                            require 'classes/categorias.class.php';
                            $c = new Categorias();
                            $cats = $c->getLista();
                            foreach($cats as $cat):
                            ?>
                            <option value="<?php echo $cat['id']; ?>" <?php echo ($info['id_categoria']==$cat['id'])?'selected="selected"':''; ?>><?php echo utf8_encode($cat['nome']);?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="mt-10">
                        <input type="text" name="titulo" value="<?php echo $info['titulo']; ?>" placeholder="Titulo" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Primary color'" required class="single-input-primary">
                    </div>
                    <div class="mt-10">
                        <input type="text" name="telefone" value="<?php echo $info['telefone']; ?>" placeholder="Telefone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Primary color'" required class="single-input-primary">
                    </div>
                    <div class="mt-10">
                        <textarea name="descricao"  placeholder="Descrição" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Primary color'" required class="single-input-primary"><?php echo $info['descricao']; ?></textarea>
                    </div>

                    <button type="submit" class="genric-btn primary e-large mt-10">Salvar</button>
                </form>

            </div>
            <div class="col-lg-4 sidebar">
                <div class="single-slidebar">
                    <h4>Jobs by Location</h4>
                    <ul class="cat-list">
                        <li><a class="justify-content-between d-flex" href="category.html">
                                <p>New York</p><span>37</span>
                            </a></li>
                        <li><a class="justify-content-between d-flex" href="category.html">
                                <p>Park Montana</p><span>57</span>
                            </a></li>
                        <li><a class="justify-content-between d-flex" href="category.html">
                                <p>Atlanta</p><span>33</span>
                            </a></li>
                        <li><a class="justify-content-between d-flex" href="category.html">
                                <p>Arizona</p><span>36</span>
                            </a></li>
                        <li><a class="justify-content-between d-flex" href="category.html">
                                <p>Florida</p><span>47</span>
                            </a></li>
                        <li><a class="justify-content-between d-flex" href="category.html">
                                <p>Rocky Beach</p><span>27</span>
                            </a></li>
                        <li><a class="justify-content-between d-flex" href="category.html">
                                <p>Chicago</p><span>17</span>
                            </a></li>
                    </ul>
                </div>

                <div class="single-slidebar">
                    <h4>Top rated job posts</h4>
                    <div class="active-relatedjob-carusel">
                        <div class="single-rated">
                            <img class="img-fluid" src="img/r1.jpg" alt="">
                            <a href="single.html">
                                <h4>Creative Art Designer</h4>
                            </a>
                            <h6>Premium Labels Limited</h6>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
                            </p>
                            <h5>Job Nature: Full time</h5>
                            <p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>
                            <p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
                            <a href="#" class="btns text-uppercase">Apply job</a>
                        </div>
                        <div class="single-rated">
                            <img class="img-fluid" src="img/r1.jpg" alt="">
                            <a href="single.html">
                                <h4>Creative Art Designer</h4>
                            </a>
                            <h6>Premium Labels Limited</h6>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
                            </p>
                            <h5>Job Nature: Full time</h5>
                            <p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>
                            <p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
                            <a href="#" class="btns text-uppercase">Apply job</a>
                        </div>
                        <div class="single-rated">
                            <img class="img-fluid" src="img/r1.jpg" alt="">
                            <a href="single.html">
                                <h4>Creative Art Designer</h4>
                            </a>
                            <h6>Premium Labels Limited</h6>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
                            </p>
                            <h5>Job Nature: Full time</h5>
                            <p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>
                            <p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
                            <a href="#" class="btns text-uppercase">Apply job</a>
                        </div>
                    </div>
                </div>

                <div class="single-slidebar">
                    <h4>Jobs by Category</h4>
                    <ul class="cat-list">
                        <li><a class="justify-content-between d-flex" href="category.html">
                                <p>Technology</p><span>37</span>
                            </a></li>
                        <li><a class="justify-content-between d-flex" href="category.html">
                                <p>Media & News</p><span>57</span>
                            </a></li>
                        <li><a class="justify-content-between d-flex" href="category.html">
                                <p>Goverment</p><span>33</span>
                            </a></li>
                        <li><a class="justify-content-between d-flex" href="category.html">
                                <p>Medical</p><span>36</span>
                            </a></li>
                        <li><a class="justify-content-between d-flex" href="category.html">
                                <p>Restaurants</p><span>47</span>
                            </a></li>
                        <li><a class="justify-content-between d-flex" href="category.html">
                                <p>Developer</p><span>27</span>
                            </a></li>
                        <li><a class="justify-content-between d-flex" href="category.html">
                                <p>Accounting</p><span>17</span>
                            </a></li>
                    </ul>
                </div>

                <div class="single-slidebar">
                    <h4>Carrer Advice Blog</h4>
                    <div class="blog-list">
                        <div class="single-blog " style="background:#000 url(img/blog1.jpg);">
                            <a href="single.html">
                                <h4>Home Audio Recording <br>
                                    For Everyone</h4>
                            </a>
                            <div class="meta justify-content-between d-flex">
                                <p>
                                    02 Hours ago
                                </p>
                                <p>
                                    <span class="lnr lnr-heart"></span>
                                    06
                                    <span class="lnr lnr-bubble"></span>
                                    02
                                </p>
                            </div>
                        </div>
                        <div class="single-blog " style="background:#000 url(img/blog2.jpg);">
                            <a href="single.html">
                                <h4>Home Audio Recording <br>
                                    For Everyone</h4>
                            </a>
                            <div class="meta justify-content-between d-flex">
                                <p>
                                    02 Hours ago
                                </p>
                                <p>
                                    <span class="lnr lnr-heart"></span>
                                    06
                                    <span class="lnr lnr-bubble"></span>
                                    02
                                </p>
                            </div>
                        </div>
                        <div class="single-blog " style="background:#000 url(img/blog1.jpg);">
                            <a href="single.html">
                                <h4>Home Audio Recording <br>
                                    For Everyone</h4>
                            </a>
                            <div class="meta justify-content-between d-flex">
                                <p>
                                    02 Hours ago
                                </p>
                                <p>
                                    <span class="lnr lnr-heart"></span>
                                    06
                                    <span class="lnr lnr-bubble"></span>
                                    02
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<?php require 'pages/footer.php'; ?>