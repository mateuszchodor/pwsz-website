<?php

namespace PWSZ\Repositories;

use PWSZ\Interfaces\ModelInterface as Model;
use PWSZ\Models\SemesterCourseClass;

class ManagementGrades extends Grades {

	public function map(Model $student_group, array $class_ids = [], bool $show_full_names = false): array {
		$student = $student_group->student;
		$grades = [];

		$student_grades = $student_group->grades->toArray();

		foreach($class_ids as $class_id) {
			$grade = array_search($class_id, array_column($student_grades, "course_group_class_id"));

			$grades[] = [
				"course_group_student_id" => $grade !== false ? $student_grades[$grade]["course_group_student_id"] : null,
				"course_group_class_id" => $grade !== false ? $student_grades[$grade]["course_group_class_id"] : null,
				"was_present" => $grade !== false ? $student_grades[$grade]["was_present"] : null,
				"value" => $grade !== false ? $student_grades[$grade]["value"] : null,
				"id" => $grade !== false ? $student_grades[$grade]["id"] : null,
			];
		}

		return [
			"id" => $student->id,
			"number" => $student->student_no,
			"name" => $student->name,
			"classes" => $grades,
		];
	}

	protected function mapClasses(Model $class): array {
		return [
			"id" => $class->id,
			"name" => $class->name,
		];
	}

	protected function sortStudents(array $students): array {
		usort($students, function($a, $b) {
			return explode(" ", $a["name"])[1] > explode(" ", $b["name"])[1];
		});

		return $students;
	}

}