<?php

	class Student
	{
		private $id_student;
		private $website;
		private $description
		private $twitter;
		private $facebook;
		private $hobbies;


		function __construct($id_student, $website, $description, $twitter, $facebook, $hobbies){
			$this->id_student = $id_student;
			$this->website = $website;
			$this->description = $description;
			$this->twitter = $twitter;
			$this->facebook = $facebook;
			$this->hobbies = $hobbies;
		}

		function insert(){
			$variable = $this->base->prepare(statement: "INSERT INTO student(website, description, twitter, facebook, hobbies) VALUES (:website, :description :twitter, :facebook, :hobbies");
			$variable = execute(array("website" => $this->website, "description" => $this->website, "twitter"=> $this->twitter, "facebook"=>$this->facebook, "hobbies"=>$this->hobbies));

		function update(){
			$variable = $this->base->prepare("UPDATE student SET website = :website, description = :description, twitter = :twitter, facebook = :facebook, hobbies = :hobbies");
        	$variable = execute(array("website" => $this->website, "description" => $this->website, "twitter"=> $this->twitter, "facebook"=>$this->facebook, "hobbies"=>$this->hobbies));
		}

		function show(){
			echo "<tr>
					<td>$this->id_student</td>
				  	<td>$this->website</td>
	                <td>$this->description</td>
	                <td>$this->twitter</td>
	                <td>$this->facebook</td>
	                <td>$this->hobbies</td>
	                <td>
	                    <i data-id = '$this->id_student' class='fa fa-edit update' style='cursor: pointer;margin-right:3%;'></i>
	                    <i data-id = '$this->id_student' class='fa fa-trash-alt delete' style='cursor: pointer;margin-left:3%;'></i>
                	</td>
				  </tr>"
		}

		function delete(){
			$variable = $this->base->prepare("DELETE FROM student WHERE id_student = :id_student");
        	$variable->execute(array('id_student'=> $this->id_student));
		}


		/**
	     * @return mixed
	     */
		public function getStudentID(){
			return $this->id_student;
		}

		/**
	     * @param mixed $id_user
	     */
		public function setStudentID(){
			$this->id_student = $id_student;
		}

		
		/**
	     * @param mixed $id_user
	     */
		public function setWebsite($website){
			if(preg_match( '/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}'.'((:[0-9]{1,5})?\\/.*)?$/i' ,$website)){
				$this->website = $website;
			}
		}

		/**
	     * @return mixed
	     */
		public function getWebsite(){
			return $this->website;
		}

		/**
	     * @param mixed $id_user
	     */
		public function setDescription(){
			$this->description = $description;
		}

		/**
	     * @return mixed
	     */
		public function getDescription(){
			return $this->description;
		}

		/**
	     * @param mixed $id_user
	     */
		public function setTwitter($twitter){
			if(preg_match('/http(?:s)?:\/\/(?:www\.)?twitter\.com\/([a-zA-Z0-9_]+)/',$twitter))
				$this->twitter = $twitter;
		}

		/**
	     * @return mixed
	     */
		public function getTwitter(){
			return $this->twitter;
		}

		/**
	     * @param mixed $id_user
	     */
		public function setFacebook($facebook){
			if(preg_match('#https?\://(?:www\.)?facebook\.com/(\d+|[A-Za-z0-9\.]+)/?#',$facebook))
				$this->facebook = $facebook;
		}

		/**
	     * @return mixed
	     */
		public function getFacebook(){
			return $this->facebook;
		}

		/**
	     * @param mixed $id_user
	     */
		public function setHobbies(){
			$this->hobbies = $hobbies;
		}

		/**
	     * @return mixed
	     */
		public function getHobbies(){
			return $this->hobbies;
		}
	}