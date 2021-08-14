<?php
namespace App;
use Illuminate\Support\Facades\DB;


class CostumSql {

	protected $_table;

	public function __construct($table_name){
		$this->_table = $table_name;

	}
	public function getEnumValues($field=''){
		$type = DB::select( DB::raw('SHOW COLUMNS FROM '.$this->_table.' WHERE Field = "'.$field.'"') )[0]->Type;
		preg_match('/^enum\((.*)\)$/', $type, $matches);
		$enum = array();
		foreach (explode(',', $matches[1]) as $value) {
			$v = trim( $value,"'");
			$enum[] = $v;
		}
		return $enum;
	}
}
