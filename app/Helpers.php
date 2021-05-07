<?php
	function getChildrens($table, $column_parent_id, $id){
		$data = DB::select(DB::raw("SELECT * FROM $table WHERE $column_parent_id = $id"));
		return json_encode($data);
	}

	function getCount($table){
		$data = DB::table($table)->count();
		return $data;
	}