<?php
namespace app\admin\model;
use think\Db;
use think\Model;

class Cates extends Model {

	function sel_level($data, $id = 0) {
		static $arr = [];
		foreach ($data as $key => $val) {
			if ($val['pth'] == $id) {
				// unset($data[$key]);
				array_push($arr, $val);

				$this->sel_level($data, $val['id']);
			}
		}

		return $arr;
	}

	function sel_lst() {
		$sqlstr = "SELECT * FROM tbl_cates";
		$lst = db::query($sqlstr);
		// $lst = $this->select();
		$res = $this->sel_level($lst);
		return $res;
	}
}