<?php $this->load->view('commons/cabecalho'); ?>

<div class="container">
	<div class="page-header">
		<h1 class="text-center">Recortando Imagens com jCrop e CodeIgniter</h1>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-center">
			<h3>Imagem Recortada</h3>
			<hr />
				<div id="imagem-box">
					<img src="<?=$this->session->flashdata('urlImagem')?>" class="img-responsive"/>
				</div>
				<p><a href="<?=base_url()?>" class="btn btn-success">Nova Imagem</a></p>
		</div>
		<?php if($this->session->flashdata('dadosImagem') == TRUE): ?>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<h3>Informações da Imagem</h3>
			<hr />
			<ul>
				<?php foreach($this->session->flashdata('dadosImagem') as $key => $value): ?>
					<li><strong><?=$key?></strong> => <?=$value?></li>
				<?php endforeach; ?>
			</ul>
			<hr/>
			<h3>Informações do Recorte</h3>
			<hr />
			<ul>
				<?php foreach($this->session->flashdata('dadosCrop') as $key => $value): ?>
					<li><strong><?=$key?></strong> => <?=$value?></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php endif; ?>
	</div>
</div>

<?php $this->load->view('commons/rodape'); ?>
