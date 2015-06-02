<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url')?>/css/component.css" />
<script src="<?php bloginfo('template_url')?>/js/modernizr.custom.js"></script>
<section class="grid-wrap">
	<ul class="grid swipe-right" id="grid">
		<?php  
		    global $query_string;
		    $categoriaNoticias 	= get_category_by_slug('noticias');
		    $categoriaNoticias 	= $categoriaNoticias->term_id;
		        
		    $blog_query 		= new WP_Query('cat=' . $categoriaNoticias . '&post_type=post&posts_per_page=-1&order=DESC');//
		    $contador 			= 0;
		    
		    while (	$blog_query	-> have_posts() ):
		        $contador 	= 	$contador + 1;
		        $blog_query	->	the_post();
		        $wp_query 	->	in_the_loop = true;
		        
		        $obtiene_destacada = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
		        $imagen_destacada   = $obtiene_destacada[0];
		        $category = get_the_category(); 
				$category = $category[0]->cat_name;
		?>
		<li>
			<a href="#">
				<div class="divimageshare" id="<?php echo 'imgshare'.$contador; ?>">
					<?php if($category == "infografia"){ ?>
						<h3 class="tituloinfo"><span>#</span>PasaLaVoz<br><span> #</span>Comparte</h3>
						<button class="linkshare twetter" onclick="window.open('https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>','Comparir Veracruz Digital', 'toolbar=0, status=0, width=650, height=450');">Tweet</button>
						<button class="linkshare faceb" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>','Comparir Veracruz Digital', 'toolbar=0, status=0, width=650, height=450');">Compartir</button>
						<button class="linkshare pinte" onclick="window.open('https://www.pinterest.com/pin/create/button/?url=<?php echo $imagen_destacada; ?>','Comparir Veracruz Digital', 'toolbar=0, status=0, width=650, height=450');">Pin</button>
						<button class="linkshare plus" onclick="window.open('https://plus.google.com/share?url=<?php echo get_permalink(); ?>','Comparir Veracruz Digital', 'toolbar=0, status=0, width=650, height=450');">Compartir</button>
					<?php }else{ ?>
						<h3 class="titulover"><span>#</span>PasaLaVoz <span>#</span>Comparte</h3>
						<button class="share-btn twetter" onclick="window.open('https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>','Comparir Veracruz Digital', 'toolbar=0, status=0, width=650, height=450');"></button>
						<button class="share-btn faceb" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>','Comparir Veracruz Digital', 'toolbar=0, status=0, width=650, height=450');"></button>
						<button class="share-btn pinte" onclick="window.open('https://www.pinterest.com/pin/create/button/?url=<?php echo $imagen_destacada; ?>','Comparir Veracruz Digital', 'toolbar=0, status=0, width=650, height=450');"></button>
						<button class="share-btn plus" onclick="window.open('https://plus.google.com/share?url=<?php echo get_permalink(); ?>','Comparir Veracruz Digital', 'toolbar=0, status=0, width=650, height=450');"></button>
					<?php } ?>
				</div>
				<img class="full-img" src="<?php echo $imagen_destacada; ?>" alt="<?php echo the_title(); ?>">
			</a>
			<button class="share" id="<?php echo "share".$contador; ?>" onClick="mostrarHover('<?php echo "imgshare".$contador; ?>','<?php echo "share".$contador; ?>')"></button>
			<div class="container-text">
				<h3><?php echo the_title(); ?></h3>
				<?php
					if($category=="infografia"){ $titulo="Ver infografía"; }else if($category=="video"){ $titulo="Ver video";}else{ $titulo="Leer más";}
					if($category!="infografia"){ ?>
						<a target="_blank" href="http://<?php echo get_the_excerpt(); ?>"><?php echo the_excerpt(); ?></a>
					<?php }else{ ?>
						<p><?php echo get_the_excerpt(); ?></p>
					<?php } ?>		
			</div>
			<p class="leer-mas <?php echo $category; ?>"><?php echo $titulo; ?></p>
			<div class="separador"></div>
		</li>
		<?php 
		    endwhile;  //Terminar while de post dentro de BLOG
		    wp_reset_query();
		?>
	</ul>
</section>
<script src="<?php bloginfo('template_url')?>/js/masonry.pkgd.min.js"></script>
<script src="<?php bloginfo('template_url')?>/js/imagesloaded.pkgd.min.js"></script>
<script src="<?php bloginfo('template_url')?>/js/classie.js"></script>
<script src="<?php bloginfo('template_url')?>/js/colorfinder-1.1.js"></script>
<script src="<?php bloginfo('template_url')?>/js/gridScrollFx.js"></script>
<script>
	$( document ).ready(function() {
		new GridScrollFx( document.getElementById( 'grid' ), {
			viewportFactor : 0.2
		});
	});
	function mostrarHover(ident,btnident){
		var classe 		= '#'+ident;
		var classeDiv 	= '#'+btnident;
		var checkClass 	= $( classe ).hasClass( "shareback" );
		if(checkClass==false){
			$( classe ).addClass( "shareback" );
			$( classeDiv ).addClass( "changeback" );
		}else{
			$( classe ).removeClass( "shareback" );
			$( classeDiv ).removeClass( "changeback" );
		}
	}
</script>