<?php
class JsonData {
	protected $file = '';

	public function __construct($file=null) {
		if(!is_null($file)) $this->file = $file;
	}

	public function getAll() {
		return json_decode(file_get_contents($this->file), true);
	}

	public function update($data) {
		$data = json_encode($data, JSON_PRETTY_PRINT);
		return file_put_contents($this->file, $data);
	}

	public function deleteAll() {
		$data = json_encode([], JSON_PRETTY_PRINT);
		return file_put_contents($this->file, $data);
	}
}