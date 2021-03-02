<?php

namespace App\Controllers;

use App\Models\CategoryGroup;
use App\Models\Group;

class Category extends BaseController
{

    public function addcategory()
    {
        helper(['form']);
        $modal_main = new CategoryGroup();
        $dataset = [
            "name" => $this->request->getVar('name')
        ];

        $modal_main->insert($dataset);

        return redirect()->to('/admin/category');
    }

    public function addgroup()
    {
        helper(['form']);
        $model_group = new Group();
        $colum = $this->request->getVar('hdnCount');
        $id_category = $this->request->getVar('id_category');


        for ($i = 0; $i <= $colum; $i++) {
            if ($this->request->getVar('name-group' . $i)) {
                $dataset = [
                    "c_id" => $id_category,
                    "name" => $this->request->getVar('name-group' . $i)
                ];

                $model_group->insert($dataset);
            }
        }

        return redirect()->to('admin/category/' . $id_category);
    }

    public function updatecategory()
    {
        $modal_main = new CategoryGroup();

        $dataset = [
            "name" => $this->request->getVar('ca_name')
        ];

        $modal_main->update($this->request->getVar('id_category'), $dataset);

        return redirect()->to('admin/category');
    }

    public function updategroup()
    {
        helper(['form']);
        $model_group = new Group();
        $id_ca  = $this->request->getVar('ca_id');
        $dataset = [
            'name' => $this->request->getVar('gr_name'),
            'c_id' => $this->request->getVar('ca_id'),
        ];

        $model_group->update($this->request->getVar('gr_id'), $dataset);
        // echo $this->request->getVar('gr_id');
        // echo $this->request->getVar('gr_name');
        // echo $this->request->getVar('ca_id');

        return redirect()->to('admin/category/' . $id_ca);
    }
}
