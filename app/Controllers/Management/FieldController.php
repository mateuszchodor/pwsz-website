<?php

namespace PWSZ\Controllers\Management;

class FieldController extends Controller {

	protected $repository_name = "fields";

	public function getTableTitle(): string {
		return "Kierunki i specjalności";
	}
	public function getTableColumnHeaders(): array {
		return [
			"index" => "skrótowiec", 
			"name" => "nazwa",
		];
	}

	public function getFormTitle(): string {
		return "Edytujesz kierunek/specjalność: " . $this->model->name;
	}

	public function getFormInputs(): array {
		return [
			[	"type" => "disabled-input",
				"label" => "ID",
				"name" => "id",
				"value" => $this->model->id
			],
			[	"type" => "text-input",
				"label" => "Skrótowiec",
				"name" => "index",
				"value" => $this->model->index
			],
			[	"type" => "text-input",
				"label" => "Nazwa",
				"name" => "name",
				"value" => $this->model->name
			],
		];
	}

}
