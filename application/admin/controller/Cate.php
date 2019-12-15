<?php
namespace app\admin\controller;
use app\admin\model\Cates;
use think\Db;

class Cate {
	public function index() {
		$cate = new Cates();

		$res = $cate->sel_lst();

		$cates = [
			'cates' => $res,
		];

		return view('index', $cates);
	}

	public function get_list() {
		$sqlstr = "SELECT * FROM tbl_cates";
		$cts = Db::query($sqlstr);
		$scts = json_encode($cts);
		echo $scts;
	}
}
?>