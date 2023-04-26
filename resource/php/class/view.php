<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ourscholar/resource/php/class/core/init.php';
require_once 'config.php';

class view extends config{

        public function degreeCourseSP(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT * FROM `tbl_course`";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_OBJ);
                foreach ($rows as $row) {
                  echo '<option data-tokens=".'.$row->course.'." value="'.$row->id.'">'.$row->course.'</option>';
                }
        }
        public function degreeCollegeSP(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT * FROM `tbl_college`";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_OBJ);
                foreach ($rows as $row) {
                  echo '<option data-tokens=".'.$row->collegedept.'." value="'.$row->collegedept.'">'.$row->collegedept.'</option>';
                  }
        }

        public function degreeCourseSP2(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT * FROM `tbl_course`";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_OBJ);
                foreach ($rows as $row) {
		                if(mb_substr($row->course,0, 1) == "B" || strpos($row->course, "DMD")|| strpos($row->course, "OD")) {
		                     echo '<option data-tokens=".'.$row->course.'." value="'.$row->id.'">'.$row->course.'</option>';
                  }
              }
        }

        public function getdpSRA(){
            $user = new user();
            return $user->data()->dp;
        }

        public function getMmSRA(){
            $user = new user();
             return $user->data()->mm;
        }

}
