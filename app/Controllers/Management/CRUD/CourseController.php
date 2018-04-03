<?php

namespace PWSZ\Controllers\Management\CRUD;

use PWSZ\Controllers\Management\CRUDController;
use PWSZ\Helpers\FormInput;
use PWSZ\Helpers\NumberToRoman;

class CourseController extends CRUDController {

	protected $repository_name = "courses";

	public function getTableTitle(): string {
		return "Kursy";
	}

	public function getTableColumnHeaders(): array {
		return [
			"index" => "#",
			"name" => "nazwa",
			"field" => "kier./spec.",
			"semester_no" => "semestr",
			"form" => "forma",
			"active" => "aktywny?",
		];
	}

	public function getFormTitle(): string {
		return "Edytujesz kurs: " . $this->model->name;
	}

	public function getFormInputs(): array {
		$model = $this->model;

		$fields = $this->buildFieldsValues($model->field_id);
		$forms = $this->buildFormsValues($model->form_id);
		$semesters = $this->buildSemestersValues($model->semester_no);

		return [
			FormInput::setType("disabled-input")
				->setLabel("ID")
				->setName("id")
				->setValue(function() use($model) { return $model->id; })
				->get(),
			FormInput::setType("text-input")
				->setLabel("Skrótowiec")
				->setName("index")
				->setValue(function() use($model) { return $model->index; })
				->get(),
			FormInput::setType("text-input")
				->setLabel("Nazwa")
				->setName("name")
				->setValue(function() use($model) { return $model->name; })
				->get(),
			FormInput::setType("boolean-input")
				->setLabel("Aktywny?")
				->setName("is_active")
				->setValue(function() use($model) { return $model->is_active; })
				->get(),
			FormInput::setType("select-input")
				->setLabel("Kierunek")
				->setName("field_id")
				->setValue(function() use($fields) { return $fields; })
				->get(),
			FormInput::setType("select-input")
				->setLabel("Semestr")
				->setName("semester_no")
				->setValue(function() use($semesters) { return $semesters; })
				->get(),
			FormInput::setType("select-input")
				->setLabel("Forma")
				->setName("form_id")
				->setValue(function() use($forms) { return $forms; })
				->get(),
			FormInput::setType("description-input")
				->setLabel("Zasady zaliczenia")
				->setName("rules")
				->setValue(function() use($model) { return $model->rules; })
				->get(),
		];
	}

	protected function buildSemestersValues(?int $semester_no): array {
		return array_map(function($value) use($semester_no) {
			return [
				"label" => NumberToRoman::transform($value),
				"value" => $value,
				"selected" => $value == $semester_no
			];
		}, range(1, 7));
	}

	protected function buildFormsValues(?int $form_id): array {
		return array_map(function($value) use($form_id) {
			return [
				"label" => "[" . $value["index"] . "] " . $value["name"],
				"value" => $value["id"],
				"selected" => $value["id"] == $form_id
			];
		}, $this->repository->get("forms")->getAll());
	}

	protected function buildFieldsValues(?int $field_id): array {
		return array_map(function($value) use($field_id) {
			return [
				"label" => "[" . $value["index"] . "] " . $value["name"],
				"value" => $value["id"],
				"selected" => $value["id"] == $field_id
			];
		}, $this->repository->get("fields")->getAll());
	}

}
