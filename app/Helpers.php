<?php
	function getChildrens($table, $column_parent_id, $id){
		$data = DB::select(DB::raw("SELECT * FROM $table WHERE $column_parent_id = $id"));
		return json_encode($data);
	}

	function getCount($table){
		$data = DB::table($table)->count();
		return $data;
	}

	function updateColumn($table,$column,$newVal,$id,$routeRedirect){
		DB::table($table)->where('id',$id)->update([$column=>$newVal]);
		updateChildren($table, $column, $id, $newVal);
		return redirect()->route($routeRedirect);
	}

	function updateChildren($table, $column, $id, $newVal){
		if($table == 'blocks' and $column == 'is_active'){
			DB::table("departments")->where('block_id',$id)->update([$column=>$newVal]);
			DB::table("controls")->where([
				['block_id','=',$id],
				['is_deactive','<>',0]
			])->update([$column=>$newVal]);
		}

		if($table == 'departments' and $column == 'is_active'){
			DB::table("controls")->where([
				['department_id','=',$id],
				['is_deactive','<>',0]
			])->update([$column=>$newVal]);
		}
	}