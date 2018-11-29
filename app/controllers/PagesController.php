<?php

namespace Simple\App\Controllers;

class PagesController extends Controller
{
  /**
   * Show the homepage
   * @return mixed
   */
  public function home()
  {
    $page = 'Homepage';
    return $this->render('pages.home', compact('page'));
  }

  /**
   * Show the about page
   * @return mixed
   */
  public function about()
  {
    $page = 'About';
    return $this->render('pages.about', compact('page'));
  }

  /**
   * Show the contact page
   * @return mixed
   */
  public function contact()
  {
    $page = 'Contact';
    return $this->render('pages.contact', compact('page'));
  }

  /**
   * Show the 404 page
   * @return mixed
   */
  public function error()
  {
    $page = 'Page not found';
    return view('pages.error', compact('page'));
  }
}
