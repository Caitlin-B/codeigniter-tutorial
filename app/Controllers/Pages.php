<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Pages extends Controller
  {
    public function index()
    {
      return view('welcome_message');
    }

    //the second parameter in the view() function is used to pass values to the view. Each value in the $data array is assigned to a variable with the name of its key. So the value of $data['title'] in the controller is equiv to $title in the view.
    public function view($page = 'home')
    {
      if(! is_file(APPPATH."Views/pages/$page.php"))
      {
        //throw err if page doesnt exist
        throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
      }

      $data["title"] = ucfirst($page); //capitalise first letter

      echo view("templates/header", $data);
      echo view("pages/$page", $data);
      echo view("templates/footer", $data);
    }
  }

  //normal routing convention -> example.com/[controller-class]/[controller-method]/[arguments/page]