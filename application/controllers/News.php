<?php

class News extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['news'] = $this->news_model->get_news();
        $data['title'] = 'News Archive';

        $this->load->view('templates/header', $data);
        $this->load->view('news/index',$data);
        $this->load->view('templates/footer');

    }

    public function view($slug = NULL)
    {
        $data['news_item'] = $this->news_model->get_news($slug);

        if (empty($data['news_item']))
        {
            show_404();
        }

        $data['title'] = $data['news_item']['title'];

        $this->load->view('templates/header',$data);
        $this->load->view('news/view',$data);
        $this->load->view('templates/footer',$data);
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a News Item';

        $this->form_validation->set_rules('title','Title','Required');
        $this->form_validation->set_rules('text','Text','Required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('news/create');
            $this->load->view('templates/footer');
        }
        else
        {
            $this->news_model->set_news();
            $this->load->view('news/success');
        }
    }

    public function delete($slug = NULL)
    {
        $data['news_item'] = $this->news_model->get_news($slug);

        if (empty($data['news_item']))
        {
            show_404();
        }

        $this->news_model->del_news($slug);

        redirect($_SERVER['HTTP_REFERER']);

    }

    public function update($slug = NULL)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title','Title','Required');
        $this->form_validation->set_rules('text','Text','Required');

        if ($this->form_validation->run() == FALSE)
        {
            $data['news_item'] = $this->news_model->get_news($slug);

            $data['title'] = 'Update News Item';

            $data['update_url'] = 'news/update/'.$slug;
            $this->load->view('templates/header', $data);
            $this->load->view('news/create',$data);
            $this->load->view('templates/footer',$data);
        }
        else
        {
            $this->news_model->save_news($slug);
            redirect(site_url('news'));
        }
    }
}