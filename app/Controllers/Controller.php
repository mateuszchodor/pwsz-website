<?php

namespace PWSZ\Controllers;

use Phalcon\Http\Response;
use Phalcon\Mvc\Controller as BaseController;
use PWSZ\Helpers\ResponseArray;

abstract class Controller extends BaseController {

	protected $responseArray;

	public function initialize() {
		$this->responseArray = new ResponseArray();
	}

	public function beforeExecuteRoute() {
		$this->responseArray = new ResponseArray();
	}

	public function renderResponse(): Response {
		$this->response->setJsonContent($this->responseArray);
		$this->response->setStatusCode($this->responseArray->getStatusCode());
		return $this->response;
	}

}
