<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library(['session','upload','image_lib']);
	}

	public function Index()
	{
		$this->load->view('home');
	}

	public function Visualizacao()
	{
		$this->load->view('visualizacao');
	}

	public function Recortar(){

		$configUpload['upload_path']   = './uploads/';
		$configUpload['allowed_types'] = 'jpg|png';
		$configUpload['encrypt_name']  = TRUE;

		$this->upload->initialize($configUpload);

		if ( ! $this->upload->do_upload('imagem'))
		{
			$data= array('error' => $this->upload->display_errors());
			$this->load->view('home',$data);
		}
		else
		{
			$dadosImagem = $this->upload->data();

			$tamanhos = $this->CalculaPercetual($this->input->post());

			$configCrop['image_library'] = 'gd2';
			$configCrop['source_image']  = $dadosImagem['full_path'];
			$configCrop['new_image']     = './uploads/crops/';
			$configCrop['maintain_ratio']= FALSE;
			$configCrop['quality']			 = 100;
			$configCrop['width']         = $tamanhos['wcrop'];
			$configCrop['height']        = $tamanhos['hcrop'];
			$configCrop['x_axis']        = $tamanhos['x'];
			$configCrop['y_axis']        = $tamanhos['y'];

			$this->image_lib->initialize($configCrop);

			if ( ! $this->image_lib->crop())
			{
				$data = array('error' => $this->image_lib->display_errors());
				$this->load->view('home',$data);
			}
			else
			{
				$urlImagem = base_url('uploads/crops/'.$dadosImagem['file_name']);
				$this->session->set_flashdata('urlImagem', $urlImagem);
				$dadosImagem['dados_crop'] = $tamanhos;
				$this->session->set_flashdata('dadosImagem', $dadosImagem);
				redirect('visualizacao');
			}
		}

	}

	private function CalculaPercetual($dimensoes){
		if($dimensoes['woriginal'] > $dimensoes['wvisualizacao']){
			$percentual = $dimensoes['woriginal'] / $dimensoes['wvisualizacao'];

			$dimensoes['x'] = round($dimensoes['x'] * $percentual);
			$dimensoes['y'] = round($dimensoes['y'] * $percentual);
			$dimensoes['wcrop'] = round($dimensoes['wcrop'] * $percentual);
			$dimensoes['hcrop'] = round($dimensoes['hcrop'] * $percentual);
		}

		return $dimensoes;
	}
}
