<?php

  function getScores($id) {
    global $dbConn;
    
    try {
      $currStudentQuery = $dbConn->prepare("SELECT * FROM `Students` WHERE `user_id` = ?;");
      $currStudentQuery->execute(array($id));
      $currStudent = $currStudentQuery->fetchAll()[0];
      
      $studentsQuery = $dbConn->prepare("SELECT * FROM `Students`");
      $studentsQuery->execute();
      $students = $studentsQuery->fetchAll();
      
      $courseQuery1 = $dbConn->prepare("SELECT * FROM `Courses` WHERE `course_id` IN (SELECT `course_id` FROM `Sc_relation` WHERE `student_id` = ?);");
      $courseQuery1->execute(array($id));
      $courses1 = $courseQuery1->fetchAll();
      
      $scores = array();
      
      // Loop through each student and determine their score with the currently logged in user
      foreach ($students as $student) {
        $score = 0;
        
        $studentId = $student['user_id'];
        $matchQuery = $dbConn->prepare("SELECT * FROM `Matches` WHERE (`student_id1` = ? AND `student_id2` = ?) OR (`student_id1` = ? AND `student_id2` = ?);");
        $matchQuery->execute(array($id, $studentId, $studentId, $id));
        if ($studentId === $id || $matchQuery->rowCount() > 0) {
          continue;
        }
        
        $courseQuery2 = $dbConn->prepare("SELECT * FROM `Courses` WHERE `course_id` IN (SELECT `course_id` FROM `Sc_relation` WHERE `student_id` = ?);");
        $courseQuery2->execute(array($studentId));
        
        // Add one to score if the students will be graduating together
        if ($currStudent['graduation_year'] === $student['graduation_year'] && $currStudent['graduation_semester'] === $student['graduation_semester']) {
          $score++;
        }
        
        // Add two to the score if the students are in the same major
        if ($currStudent['major'] === $student['major']) {
          $score += 2;
        }
        
        $courses2 = $courseQuery2->fetchAll();
        
        // Add the current student's priority for a course if they are also in the course
        foreach ($courses1 as $course1) {
          foreach ($courses2 as $course2) {
            if ($course1['course_id'] === $course2['course_id']) {
              $courseId = $course1['course_id'];
              $scQuery = $dbConn->prepare("SELECT * FROM `Sc_relation` WHERE `student_id` = ? AND `course_id` = ?;");
              $scQuery->execute(array($id, $courseId));
              $sc = $scQuery->fetchAll()[0];
              
              $score += $sc['priority'];
            }
          }
        }
        
        // Add the score to the array
        $scores[$studentId] = $score;
      }
      
      arsort($scores);
      return $scores;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return null;
    }
  }
  
  function getStudentInfo($id) {
    global $dbConn;
    
    try {
      $query = $dbConn->prepare("SELECT * FROM `Students` WHERE user_id = ?;");
      $query->execute(array($id));
      
      return $query->fetchAll()[0];
    } catch (PDOException $e) {
      echo $e->getMessage();
      return null;
    }
  }
  
  function getStudentCourses($id) {
    global $dbConn;
    
    try {
      $query = $dbConn->prepare("SELECT * FROM `Courses` WHERE `course_id` IN (SELECT course_id FROM `Sc_relation` WHERE `student_id` = ?);");
      $query->execute(array($id));
      
      return $query->fetchAll();
    } catch (PDOException $e) {
      echo $e->getMessage();
      return null;
    }
  }