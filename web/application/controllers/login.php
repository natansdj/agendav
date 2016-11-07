<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/*
 * Copyright 2011-2012 Jorge López Pérez <jorge@adobo.org>
 *
 *  This file is part of AgenDAV.
 *
 *  AgenDAV is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  any later version.
 *
 *  AgenDAV is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with AgenDAV.  If not, see <http://www.gnu.org/licenses/>.
 */

class Login extends CI_Controller {

    public function index() {
        // Already authenticated?
        if ($this->auth->is_authenticated()) {
            redirect('/main');
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules(
                array(
                    array(
                        'field' => 'user',
                        'label' => $this->i18n->_('labels', 'username'),
                        'rules' => 'required',
                        ),
                    array(
                        'field' => 'passwd',
                        'label' => $this->i18n->_('labels', 'password'),
                        'rules' => 'required',
                        ),
                    ));

        // Required fields missing?
        $valid_auth = FALSE;
        $validation = $this->form_validation->run();
        $err = '';

        if ($validation !== FALSE) {
            // Check authentication against server
            $this->load->library('caldav');
            
            $user = $this->input->post('user');
            $passwd = $this->input->post('passwd');

            $valid_auth = $this->caldav->check_server_authentication($user, $passwd);
            if ($valid_auth !== FALSE) {
                // TODO load user prefs
                $data = array(
                        'user' => mb_strtolower($user),
                        'passwd' => $passwd,
                        'prefs' =>
                            $this->userpref->load_prefs($user)->getAll(),
                        );
                $this->auth->new_session($data);
                redirect("/main");
                $this->output->_display();
                die();
            } else {
                $err = $this->i18n->_('messages', 'error_auth');
            }
        } else {
            $err = validation_errors();
        }


        $page_components = array();

        $title = $this->config->item('site_title');

        $data_header = array(
                'title' => $title,
                'body_class' => array('loginpage'),
                );
        $page_components['header'] = $this->load->view('common_header',
                $data_header, TRUE);

        $data = array();
        if (!empty($err)) {
            $data['errors'] = $err;
        }

        $logoimg = $this->config->item('login_page_logo');
        $data['logo'] = custom_logo($logoimg, $title);
        $data['title'] = $title;

        $page_components['content'] = $this->load->view('login', $data, TRUE);
        $page_components['footer'] = $this->load->view('footer', array(),
                TRUE);

        $this->load->view('layouts/plain', $page_components);

    }
}

