				</div>
				<?php if(strstr($url, 'produtos.php')) { ?>
					<a href="cadastro-produto.php" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored btn-add-produto btnLogin">
				  		<i class="material-icons" style="color:#fff;">add</i>
					</a>
				<?php }elseif (strstr($url, 'eventos.php')) { ?>
					<a href="cadastro-evento.php" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored btn-add-produto btnLogin">
				  		<i class="material-icons" style="color:#fff;">add</i>
					</a>
					
				<?php }else{ /*Nada*/ }	?>
      		</main>
    	</div>
    	<script src="../style/mdl/material.min.js"></script>
  	</body>
</html>