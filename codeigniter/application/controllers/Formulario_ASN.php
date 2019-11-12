<?php
class Formulario_ASN extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper("security");
        $this->load->library('form_validation');
        $this->load->model('users_model','users_formulario'); 
    }

    public function index()
    {
        $this->load->view('vista_formulario_ASN');
    }
    
    public function read() {
    	 $this->load->view('vista_formulario_ASN');
    }

    public function nuevo_usuario()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST') :
        $this->form_validation->set_rules('user_name', 'Username', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('user_email','Email','required|is_unique[users_formulario.email]');
        $this->form_validation->set_message('is_unique', 'Este email no se puede registrar porque ya se encuentra en nuestra BBDD');
        if ($this->form_validation->run() == FALSE):
       		$this->load->view('vista_formulario_ASN');
        else :
            $data = array(
                'name'=>$this->input->post('user_name',TRUE),
                'email'=>$this->input->post('user_email',TRUE),
            );
            $data = $this->security->xss_clean($data);
            if($this->security->xss_clean($data)){
                $this->db->insert('users_formulario',$data);
                echo 'Registrado correctamente.';
                $_POST = array();
            }
            else {
                 echo 'Su sitio no realizó la validación de seguridad XSS'; exit;
            }
       	endif;
        else :
        	show_404('No se ha realizado correctamente!!!');
        endif;
    }

}