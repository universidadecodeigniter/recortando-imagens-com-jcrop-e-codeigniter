$(document).ready(function(){
  $("#seleciona-imagem").change(function(){
    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#visualizacao_img').attr('src', e.target.result);
            $('#visualizacao_img').removeClass('hidden');
            $('#recortar-imagem').removeClass('hidden');
            $('#texto-informativo').html('Arraste o cursor sobre a imagem para selecionar a área de corte.');
            $('#texto-informativo').removeClass('alert-info').addClass('alert-success');
            $('#visualizacao_img').Jcrop({
              aspectRatio: 1,
              onSelect: atualizaCoordenadas,
              onChange: atualizaCoordenadas
            });

            defineTamanhoImagem(e.target.result,$('#visualizacao_img'));
        }

        reader.readAsDataURL(this.files[0]);
    }
  });

  $('#recortar-imagem').click(function(){
    if (parseInt($('#wcrop').val())) return true;
    alert('Selecione a área de corte para continuar.');
    return false;
  });
})

function atualizaCoordenadas(c)
{
  $('#x').val(c.x);
  $('#y').val(c.y);
  $('#wcrop').val(c.w);
  $('#hcrop').val(c.h);
};

function defineTamanhoImagem(imgOriginal, imgVisualizacao) {
  var image = new Image();
  image.src = imgOriginal;

  image.onload = function() {
    $('#wvisualizacao').val(imgVisualizacao.width());
    $('#hvisualizacao').val(imgVisualizacao.height());
    $('#woriginal').val(this.width);
    $('#horiginal').val(this.height);
  };
}
