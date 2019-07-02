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
?>
<!-- Start blog-posts Area -->
<section class="post-area mt-5">
	<div class="container">
		<h1>Meus Anuncios</h1>
		<?php
		require 'classes/usuarios.class.php';
		require 'classes/qtdanuncios.class.php';
		$a = new listAnunc();
		$user = new Usuarios();
		$listanuncios = $a->getLisAnuncios();

		foreach ($listanuncios as $lisanuncios):

		?>
		<?php endforeach;?>
		<span class="genric-btn default radius mt-5" style="border: 2px solid #eee;">Bem-Vindo (a) <?php echo "<strong>".$user->pegarDados($_SESSION['cLogin'], 'nome')."</strong>"; ?></span>
		<a href="add-anuncio.php" class="genric-btn default radius mt-5" style="border: 2px solid #eee;">Adicionar Anuncio</a>
		<span class="genric-btn default radius mt-5" style="border: 2px solid #eee;">Total de Anuncios <span class="badge badge-danger"><?php echo count($listanuncios); ?></span></span>


		<div class="row justify-content-center d-flex mt-5">
			<div class="col-lg-8 post-list">
				<?php
				require 'classes/anuncios.class.php';
				require 'classes/cadastros.class.php';
				$a = new Anuncios();

				$anuncios = $a->getMeusAnuncios();

				foreach ($anuncios as $anuncio):	


					$i = new infocad();
					$info = $i->getListaCad();

					foreach ($info as $infos);
					?>
				<?php var_dump($anuncio['url']); ?>
					<div class="single-post d-flex flex-row">
						<div class="thumb">
							<?php if(empty($anuncio['url'])): ?>
								<img src="img/anuncios/<?php echo $anuncio['url']; ?>" height="100" alt="">
							<?php else : ?>
							<img src="img/anuncios/" height="100" alt="">
							<?php endif; ?>
						</div>
						<div class="details" style="margin-left:30px;">
							<div class="title d-flex flex-row justify-content-between">
								<div class="titles">
									<a href="single.html">
										<h4><?php echo $anuncio['titulo']; ?></h4>
									</a>
									<h6>Premium Labels Limited</h6>
								</div>
								<ul class="btns" style="margin-left:150px;">
									<li><a href="editar-anuncio.php?id=<?php echo $anuncio['id']; ?>"><span class="lnr lnr-pencil"></span>  Editar</a></li>
									<li><a href="excluir-anuncio.php?id=<?php echo $anuncio['id']; ?>"><span class="lnr lnr-cross"></span> Excluir</a></li>
								</ul>
							</div>
							<p>
								<?php echo $anuncio['descricao']; ?>
							</p>
							<span class="badge badge-secondary" style="padding:8px; font-size:16px;">Tel: <?php echo $anuncio['telefone']; ?></span>
							<span class="badge badge-secondary" style="padding:8px; font-size:16px;">Caidade: <?php echo $infos['cidade']; ?></span>
							<span class="badge badge-secondary" style="padding:8px; font-size:16px;">Bairro: <?php echo $infos['bairro']; ?></span>

						</div>
					</div>
				<?php endforeach; ?>
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
<!-- End post Area -->

<?php require 'pages/footer.php'; ?>