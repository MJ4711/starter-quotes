<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
{

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Homepage for our app
	 */
	public function index()
	{
		// this is the view we want shown
		$this->data['pagebody'] = 'homepage';

		// build the list of authors, to pass on to our view
		$source = $this->quotes->all();
		$authors = array ();
		foreach ($source as $record)
		{
			$authors[] = array ('who' => $record['who'], 'mug' => $record['mug'], 'href' => $record['where'], 'what' => $record['what']);
		}
		$this->data['authors'] = $authors;

		$this->render();
	}

    /**
     * Not the homepage for our app?
     */
    public function random()
    {
        // this is the view we want shown
        $this->data['pagebody'] = 'homepage';

        // selects a random author to pass on to our view
        $this->data['authors'] = array($this->quotes->all()[mt_rand(0,count($this->quotes->all())-1)]);
        $this->render();
    }

}
