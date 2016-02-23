<?php
class Lecture {

	private $name;
	private $video;
	private $description; 
	private $lecture_number;
	private $subject_id;
	private $id;

	// Геттеры и сеттеры свойств
	//BEGIN
	public function getName() {
		return $this->name;
	}
	public function setName($name) {
		$this->name = $name;
	}

	public function getVideo() {
		return $this->video;
	}
	public function setVideo($src) {
		$this->video = $src;
	}

	public function getDescription() {
		return $this->description;
	}
	public function setDescription($desc) {
		$this->description = $desc;
	}

	public function getNumber() {
		return $this->lecture_number;
	}
	public function setNumber($num) {
		$this->lecture_number = $num;
	}

	public function getSubjectId(){
		return $this->subject_id;
	}
	public function setSubjectId($i){
		$this->subject_id = $i;
	}

	public function getId(){
		return $this->id;
	}
	public function setId($i){
		$this->id = $i;
	}
	//END
}
?>