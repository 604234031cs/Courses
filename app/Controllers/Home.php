<?php

namespace App\Controllers;

use App\Models\CategoryGroup;
use App\Models\CourseCategory;
use App\Models\Group;
use App\Models\Listvdo;
use App\Models\Logvideo;
use App\Models\Score;
use App\Models\Subcourses;

class Home extends BaseController
{

	// public function test()
	// {
	// 	$encrypter  = \Config\Services::encrypter();
	// 	$k = $encrypter->encrypt('1.1.1.mp4');
	// 	// echo "encrypt : " . $k . "<br>";
	// 	// echo $encrypter->decrypt($k);
	// 	$data['key'] = $k;
	// 	echo view('test', $data);
	// }

	// public function uoloadtest()
	// {
	// }

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
		$data = [];
		// $session = session();
		// $db = \Config\Database::connect();
		$model_data =  new CourseCategory();
		// $model_sscore  = new Score();
		$data['courses'] = $model_data->findAll();

		// $id_user = $session->get('id');

		// $query = $db->query("SELECT courses_category.id,courses_category.name,score.score
		// FROM courses_category
		// LEFT JOIN score
		// ON courses_category.id = score.id_courses
		// and score.id_user = '$id_user'");
		// $data['courses'] = $query->getResult();


		// $data['score'] = $model_sscore->where("id_user", $id_user)->findAll();
		echo view('template/head');
		echo view('index', $data);
		echo view('template/footer');
		// echo json_encode($data);


	}


	public function category($id = null)
	{
		$data = [];

		$modle_group = new Group();
		$model_courses = new CourseCategory();
		$model_category = new CategoryGroup();

		$data['category']  = $model_category->findAll();

		$data['group'] = $modle_group->where('id', $id)->first();

		$data['courses'] =  $model_courses->where('gc_id', $id)->findAll();
		// echo json_encode($data);

		echo view('template/head');
		echo view('index_category', $data);
		echo view('template/footer');
	}

	public function listvdo($id = null)
	{
		$db = \Config\Database::connect();
		$session = session();
		$id_user = $session->get('id');

		$model_category = new CourseCategory();
		$model_documents  = new Documents();
		$data['category'] = $model_category->where('id', $id)->first();

		$model_subcoruses = new Subcourses();
		$data['sub'] = $model_subcoruses->where('id_category', $id)->findAll();
		// $data['doc'] = $model_documents->where('')->findAll();

		$query = $db->query("SELECT courses_vdo.name ,courses_vdo.url,courses_vdo.id_subcourses,courses_vdo.id
								FROM courses_vdo,subcourses
								WHERE courses_vdo.id_subcourses = subcourses.id
								and subcourses.id_category = '$id'");
		$data['list'] = $query->getResult();

		$query = $db->query("SELECT documents.name ,documents.url,documents.id_subcourses,documents.id
		FROM documents,subcourses
		WHERE documents.id_subcourses = subcourses.id
		and subcourses.id_category = '$id'");

		$data['docs'] = $query->getResult();
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

	public function document($id = null)
	{
		$data = [];
		echo $id;
		// echo view('template/head');
		// echo view('document', $data);
		// echo view('template/footer');
	}



	public function calculatelist($id_user, $id_category)
	{
		$model_video = new Listvdo();
		$model_logvideo = new Logvideo();
		$check = [
			"id_user" => $id_user,
			"category" => $id_category,
			"status" => 1
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
		// echo json_encode($data);
		echo view('template/head');
		echo view('videoplay', $data);
		echo view('template/footer');
	}


	public function progress_course()
	{
		$data = [];
		$session = session();
		$id_user = $session->get('id');
		$db = \Config\Database::connect();
		// $model_data =  new CourseCategory();
		// $model_logvideo = new Logvideo();
		// $model_sscore = new Score();

		// $data['log'] = $model_logvideo->where('id_user', $id_user)->findAll();
		// $data['score'] = $model_sscore->where('id_user', $id_user)->first();


		$query = $db->query("SELECT courses_category.id,courses_category.name,score.score
				FROM courses_category,score
				where courses_category.id = score.id_courses
				and score.id_user = '$id_user'");
		$data['courses'] = $query->getResult();

		// echo json_encode($data);

		echo view('template/head');
		echo view('progress_course', $data);
		echo view('template/footer');
	}
	//--------------------------------------------------------------------

}
