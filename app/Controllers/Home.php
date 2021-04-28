<?php

namespace App\Controllers;

use App\Models\CategoryGroup;
use App\Models\CourseCategory;
use App\Models\Group;
use App\Models\Listvdo;
use App\Models\Logvideo;
use App\Models\Question;
use App\Models\Score;
use App\Models\Subcourses;
use App\Models\User_exam_quiz;

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

	public function video_has($key = null)
	{
		$model_video = new Listvdo();

		$video = $model_video->where('name_key', $key)->first();
			


		return redirect()->to(base_url() . '/upload/category' . $video['id_category'] . '/allvdo/' . $video['url']);
	}


	public function index()
	{
		// echo view('template/head');
		echo view('login');
		$session = session();
		$session->destroy();
		// echo view('responsivepage');
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
		// $model_documents  = new Documents();
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

		$query = $db->query("SELECT courses_vdo.name ,courses_vdo.url,courses_vdo.id_subcourses,courses_vdo.id,courses_vdo.name_key
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


		$query = $db->query("SELECT courses_category.id,courses_category.name,score.score,courses_category.img
				FROM courses_category,score
				where courses_category.id = score.id_courses
				and score.id_user = '$id_user'");
		$data['courses'] = $query->getResult();

		// echo json_encode($data);

		echo view('template/head');
		echo view('progress_course', $data);
		echo view('template/footer');
	}


	public function quiz($id)
	{

		$session = session();
		$model_score = new Score();



		// $model
		// echo $id;
		$feil = [
			"id_courses" => $id,
			"id_user" => $session->get('id'),
		];




		$data = $model_score->where($feil)->first();


		if ($data['score'] >= 50) {
			$modal_question = new Question();
			$modal_user_exam = new User_exam_quiz();

			$feil2 = [
				"courses_id" => $id,
				"id_user" => $session->get('id'),
			];
			$data['user_exam'] = $modal_user_exam->where($feil2)->first();
			$data['question'] = $modal_question->where('courses_id', $id)->findAll();


			$db = \Config\Database::connect();
			$query  = $db->query("SELECT question.q_id,question.q_name,
			GROUP_CONCAT(select_value.option_number) as option_number, 
			GROUP_CONCAT(select_value.sl_name) as option_title, 
			select_value.s_id
			FROM question LEFT JOIN select_value ON question.q_id = select_value.q_id 
			WHERE question.courses_id = $id
			GROUP BY question.q_id
			");
			$data['quiz'] = $query->getResult();
			// echo json_encode($data['quiz']);
			// $arr = array($data['quiz'][0]->option_number);
			$arr = array();
			// echo json_encode($data['quiz']);
			// echo count(explode(',', $data['quiz'][0]->option_number));
			foreach ($data['quiz'] as $get) {
				// $question = [
				// 	"question" => $get->q_name
				// ];
				// array_push($arr, $question);
				// $count = count(explode(',', $data['quiz'][0]->option_number));
				$a = explode(',', $get->option_number);
				$b = explode(',', $get->option_title);
				// for ($i = 0; $i < $count - 1; $i++) {
				$option = [
					"question" => $get->q_name,
					"q_id" => $get->q_id,
					"title" => $b,
					'option' => $a,
				];
				// }
				array_push($arr, $option);

				// array_push($arr, $b);
			}


			// echo json_encode($arr);
			// echo json_encode($arr[0]['title'][0]);
			// foreach($data['quiz'] as $get){


			// }
			// echo count($arr);
			// foreach ($arr as $get) {
			// 	echo $get['title'][0];
			// 	# code...
			// }


			// echo json_encode($arr);
			// echo $arr[0];

			$data['quiz'] = $arr;
			$data['id_courses'] = $id;
			// print_r(explode(",", $data['quiz'][0]->option_number));
			// echo json_encode($data['user_exam']);
			echo view('template/head');
			echo view('quiz', $data);
			echo view('template/footer');
		} else {
			return redirect()->to(base_url('/courses/' . $id));
		}

		// echo json_encode();
	}

	public function successquiz()
	{


		helper(['form']);
		$modal_question = new Question();
		$modal_user_exam = new User_exam_quiz();
		$session = session();
		$id_courses = $this->request->getVar('id_courses');
		$quiz_num = $this->request->getVar('quiz_num');
		$id_exam_quiz = $this->request->getVar('id_exam_quiz');
		$score_exam = $this->request->getVar('score_exam');
		$score_quize = 0;


		for ($i = 1; $i <= $quiz_num; $i++) {
			$dataset = [
				"courses_id" => $id_courses,
				"q_id" => $this->request->getVar('q_id' . $i),
				"answer" => $this->request->getVar('quetion' . $i)
			];

			$data = $modal_question->where($dataset)->first();
			if ($data != null) {
				$score_quize += 1;
			}
		}

		$dataset = [
			"courses_id" => $id_courses,
			"id_user" => $session->get('id'),
			"score_exam" => ($score_exam > ($score_quize * 100) / $quiz_num) ? $score_exam : ($score_quize * 100) / $quiz_num
		];
		// ($score_quize * 100) / $quiz_num
		// $exam_check = $modal_user_exam->where()->first();

		if ($id_exam_quiz != "" && $id_exam_quiz != null) {
			if ($modal_user_exam->update($id_exam_quiz, $dataset)) {
				$ses_data = [
					"score_quiz" => $score_quize,
					"quiz_num" => $quiz_num
				];
				$session->set($ses_data);
				return redirect()->to(base_url('/quzi_score'));
			} else {
				echo "RROR";
			}
		} else {

			if ($modal_user_exam->insert($dataset)) {
				$ses_data = [
					"score_quiz" => $score_quize,
					"quiz_num" => $quiz_num
				];
				$session->set($ses_data);
				return redirect()->to(base_url('/quzi_score'));
			} else {
				echo "RROR";
			}
		}
	}

	public function showscorepage()
	{
		$session = session();
		// $id_user = $session->get('id');
		$data['score'] = $session->get('score_quiz');
		$data['quiz_num'] = $session->get('quiz_num');
		$data['total'] = ($data['score'] * 100) / $data['quiz_num'];


		// echo (1 * 100) / 2;

		// $modal_user_exam = new User_exam_quiz();

		// $dataset = [
		// 	"courses_id" => $id_courses,
		// 	"id_user" => $id_user
		// ];
		// $data['user_exam'] = $modal_user_exam->where($dataset)->first();



		echo view('template/head');
		echo view('show_score_exam', $data);
		echo view('template/footer');
	}





	//--------------------------------------------------------------------

}
