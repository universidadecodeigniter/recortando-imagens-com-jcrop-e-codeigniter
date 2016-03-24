<?php $this->load->view('commons/cabecalho'); ?>

<div class="container">
	<div class="page-header">
		<h1 class="text-center">Recortando Imagens com jCrop e CodeIgniter</h1>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-md-offset-3">
			<?php if(isset($error)):?>
				<div class="alert alert-error"><?=$error?></div>
			<?php endif; ?>
			<form action="<?=base_url('recortar')?>" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label>Selecione uma imagem em formato jpg ou png</label>
					<input type="file" name="imagem" id="seleciona-imagem"/>
				</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-md-offset-3">
			<p class="alert alert-info" id="texto-informativo">Selecione uma imagem para recortar</p>
			<div id="imagem-box">
				<img src="" class="img-responsive hidden" id="visualizacao_img" />
			</div>
			<input type="hidden" id="x" name="x" />
			<input type="hidden" id="y" name="y" />
			<input type="hidden" id="wcrop" name="wcrop" />
			<input type="hidden" id="hcrop" name="hcrop" />
			<input type="hidden" id="wvisualizacao" name="wvisualizacao" />
			<input type="hidden" id="hvisualizacao" name="hvisualizacao" />
			<input type="hidden" id="woriginal" name="woriginal" />
			<input type="hidden" id="horiginal" name="horiginal" />
			<div class="form-group text-center">
				<input type="submit" class="btn btn-success hidden" value="Recortar" id="recortar-imagem"/>
			</div>
			</form>
		</div>
	</div>
</div>

<?php $this->load->view('commons/rodape'); ?>
