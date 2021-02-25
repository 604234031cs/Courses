<?php

namespace App\Controllers;

use App\Models\CourseCategory;
use App\Models\Listvdo;
use App\Models\Logvideo;
use App\Models\Score;
use App\Models\Subcourses;

class Home extends BaseController
{
	public function index()
	{
		// echo view('template/head');
		echo view('login');
		// echo view('template/footer');
	}

	public function signup()
	{
		// echo view('template/head');
		echo view('signup');
		// echo view('template/footer');
	}


	public function homepage()
	{
		// $data = [];
		// $session = session();
		// $db = \Config\Database::connect();
		// $model_data =  new CourseCategory();
		// $model_sscore  = new Score();
		// $data['courses'] = $model_data->findAll();

		// $id_user = $session->get('id');

		// $query = $db->query("SELECT courses_category.id,courses_category.name,score.score
		// FROM courses_category
		// LEFT JOIN score
		// ON courses_category.id = score.id_courses
		// and score.id_user = '$id_user'");
		// $data['courses'] = $query->getResult();


		// $data['score'] = $model_sscore->where("id_user", $id_user)->findAll();
		echo view('template/head');
		echo view('index');
		echo view('template/footer');
		// echo json_encode($data);


	}

	public function listvdo($id = null)
	{
		$db = \Config\Database::connect();
		$session = session();
		$id_user = $session->get('id');

		$model_category = new CourseCategory();
		$data['category'] = $model_category->where('id', $id)->first();

		$model_subcoruses = new Subcourses();
		$data['sub'] = $model_subcoruses->where('id_category', $id)->findAll();

		$query = $db->query("SELECT courses_vdo.name ,courses_vdo.url,courses_vdo.id_subcourses,courses_vdo.id
								FROM courses_vdo,subcourses
								WHERE courses_vdo.id_subcourses = subcourses.id
								and subcourses.id_category = '$id'");
		$data['list'] = $query->getResult();
		// echo $id;
		// echo json_encode($data['list']);
		// if ($data['list'] != null) {
		$data['calculat'] = $this->calculatelist($id_user, $id);
		// } else {
		// $data['calculat'] = 0.00;
		// }

		// echo json_encode($data);
		echo view('template/head');
		echo view('courses', $data);
		echo view('template/footer');
	}

	public function calculatelist($id_user, $id_category)
	{
		$model_video = new Listvdo();
		$model_logvideo = new Logvideo();
		$check = [
			"id_user" => $id_user,
			"category" => $id_category
		];

		$data = $model_logvideo->where($check)->findAll();


		$countlog = count($data);

		$countList = $model_video->where('id_category', $id_category)->findAll();
		$count =  count($countList);

		// echo count($countList);
		if ($count <= 0) {
			$sum = 0;
		} else {
			$sum =  ($countlog * 100) / $count;
		}
		return number_format($sum, 2, '.', '');
	}



	public function showvideo($id_category = null, $id_video)
	{
		$db = \Config\Database::connect();
		$model_category = new CourseCategory();
		$model_courses = new Listvdo();
		$model_subcoruses = new Subcourses();
		$session = session();
		$id_user = $session->get('id');


		$data['sub'] = $model_subcoruses->where('id_category', $id_category)->findAll();
		$data['category'] = $model_category->where('id', $id_category)->first();
		$data['courses'] = $model_courses->where('id', $id_video)->first();

		$query = $db->query("SELECT courses_vdo.name ,courses_vdo.url,courses_vdo.id_subcourses,courses_vdo.id
		FROM courses_vdo,subcourses
		WHERE courses_vdo.id_subcourses = subcourses.id");
		$data['list'] = $query->getResult();

		$data['calculat'] = $this->calculatelist($id_user, $id_category);
		echo view('template/head');
		echo view('videoplay', $data);
		echo view('template/footer');
	}
	//--------------------------------------------------------------------

}
