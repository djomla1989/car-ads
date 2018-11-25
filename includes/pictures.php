<?php
// If it's going to need the database, then it's
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class Pictures {

	protected static $table_name="car_pictures";
	protected static $db_fields=array('picture_id', 'picture_car_id','picture_caption');
	public $picture_id;
	public $picture_car_id;
	public $picture_caption;


  private $temp_path;
  protected $upload_dir="images";
  public $errors=array();
  public $name_array=array();

  protected $upload_errors = array(
		// http://www.php.net/manual/en/features.file-upload.errors.php
          UPLOAD_ERR_OK 				=> "No errors.",
      	  UPLOAD_ERR_INI_SIZE  	=> "Larger than upload_max_filesize.",
	  UPLOAD_ERR_FORM_SIZE 	=> "Larger than form MAX_FILE_SIZE.",
	  UPLOAD_ERR_PARTIAL 		=> "Partial upload.",
	  UPLOAD_ERR_NO_FILE 		=> "No file.",
	  UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
	  UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
	  UPLOAD_ERR_EXTENSION 	=> "File upload stopped by extension."
	);

	// Pass in $_FILE(['uploaded_file']) as an argument and last car id
  public function attach_file($file, $car_make, $car_model, $last_car_id) {
   
		// Perform error checking on the form parameters
                $active_keys = array();
              
                foreach($file['name'] as $key => $filename)
                    {
                           if(!empty($filename))
                               {
                                      $active_keys[] = $key;
                               }
                             
                    }
                    if(count($active_keys)==0)
                                    {
                                        $this->errors="No picture has been selected";
                                        return FALSE;
                                    }
                   foreach ($active_keys as $key)
                        {
                     
                          if($file['error'][$key] != 0)
                             {
                              // error: report what PHP says went wrong
                              $this->errors[] = $this->upload_errors[$file['error']];
                              continue;
                             }
                             else if($file['type'][$key]!='image/jpeg' && $file['type'][$key]!='image/gif' && $file['type'][$key]!='image/jpg')
                                 {
                                 $this->errors[]="Mozete ubaciti samo jpeg/gif format slike:";
                                  continue;
                                 }
                           else {
                                    // Set object attributes to the form parameters.
                              $tip=explode("/",$file['type'][$key]);
                              $this->temp_path  = $file['tmp_name'][$key];                          
                              $this->picture_caption  = $car_make."_".$car_model.$last_car_id."_".$key.".".$tip[1];
                              $this->picture_car_id=$last_car_id;

                                    // Don't worry about saving anything to the database yet.
                               $this->save();
                               
                                }
                               
                        }
                        foreach ($this->errors as $key => $errorr)
                                {
                                    echo $errorr;
                                }
		
              
	}

 public function save() {
		// A new record won't have an id yet.
		if(isset($this->picture_id)) {
			// Really just to update the caption
			$this->update();
		} else {
			// Make sure there are no errors

			// Can't save if there are pre-existing errors
		  if(!empty($this->errors)) { return false; }

			// Make sure the caption is not too long for the DB
		  if(strlen($this->picture_caption) > 255) {
				$this->errors[] = "The caption can only be 255 characters long.";
				return false;
			}

		  // Can't save without filename and temp location
		  if(empty($this->picture_caption) || empty($this->temp_path)) {
		    $this->errors[] = "The file location was not available.";
		    return false;
		  }

			// Determine the target_path
		  $target_path = SITE_ROOT .DS. 'public' .DS. $this->upload_dir .DS. $this->picture_caption;

		  // Make sure a file doesn't already exist in the target location
		  if(file_exists($target_path)) {
		    $this->errors[] = "The file {$this->picture_caption} already exists.";
		    return false;
		  }

			// Attempt to move the file
			if(move_uploaded_file($this->temp_path, $target_path)) {
		  	// Success
				// Save a corresponding entry to the database
				if($this->create()) {
					// We are done with temp_path, the file isn't there anymore
					unset($this->temp_path);
					return true;
				}
			} else {
				// File was not moved.
		    $this->errors[] = "The file upload failed, possibly due to incorrect permissions on the upload folder.";
		    return false;
			}
		}
	}

	public function destroy() {
		// First remove the database entry
		if($this->delete()) {
			// then remove the file
		  // Note that even though the database entry is gone, this object
			// is still around (which lets us use $this->image_path()).
			$target_path = SITE_ROOT.DS.'public'.DS.$this->image_path();
			return unlink($target_path) ? true : false;
		} else {
			// database delete failed
			return false;
		}
	}    

        public function image_path() {
	  return $this->upload_dir.DS.$this->filename;
	}
     
	public function size_as_text() {
		if($this->size < 1024) {
			return "{$this->size} bytes";
		} elseif($this->size < 1048576) {
			$size_kb = round($this->size/1024);
			return "{$size_kb} KB";
		} else {
			$size_mb = round($this->size/1048576, 1);
			return "{$size_mb} MB";
		}
	}

	public function comments() {
		return Comment::find_comments_on($this->id);
	}


	// Common Database Methods
	public static function find_all() {
		return self::find_by_sql("SELECT * FROM ".self::$table_name);
  }

  public static function find_by_id($id=0) {
	  global $database;
    $result_array = self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE picture_id=".$database->escape_value($id)." LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
  }

  public static function find_by_sql($sql="") {
    global $database;
    $result_set = $database->query($sql);
    $object_array = array();
    while ($row = $database->fetch_array($result_set)) {
      $object_array[] = self::instantiate($row);
    }
    return $object_array;
  }

	public static function count_all() {
	  global $database;
	  $sql = "SELECT COUNT(*) FROM ".self::$table_name;
    $result_set = $database->query($sql);
	  $row = $database->fetch_array($result_set);
    return array_shift($row);
	}

	private static function instantiate($record) {
		// Could check that $record exists and is an array
                 $object = new self;

		// More dynamic, short-form approach:
		foreach($record as $attribute=>$value){
		  if($object->has_attribute($attribute)) {
		    $object->$attribute = $value;
		  }
		}
		return $object;
	}

	private function has_attribute($attribute) {
	  // We don't care about the value, we just want to know if the key exists
	  // Will return true or false
	  return array_key_exists($attribute, $this->attributes());
	}

	protected function attributes() {
		// return an array of attribute names and their values
	  $attributes = array();
	  foreach(self::$db_fields as $field) {
	    if(property_exists($this, $field)) {
	      $attributes[$field] = $this->$field;
	    }
	  }
	  return $attributes;
	}

	protected function sanitized_attributes() {
	  global $database;
	  $clean_attributes = array();
	  // sanitize the values before submitting
	  // Note: does not alter the actual value of each attribute
	  foreach($this->attributes() as $key => $value){
	    $clean_attributes[$key] = $database->escape_value($value);
	  }
	  return $clean_attributes;
	}

	// replaced with a custom save()
	// public function save() {
	//   // A new record won't have an id yet.
	//   return isset($this->id) ? $this->update() : $this->create();
	// }

	public function create() {
		global $database;
		// Don't forget your SQL syntax and good habits:
		// - INSERT INTO table (key, key) VALUES ('value', 'value')
		// - single-quotes around all values
		// - escape all values to prevent SQL injection
		$attributes = $this->sanitized_attributes();
	  $sql = "INSERT INTO ".self::$table_name." (";
		$sql .= join(", ", array_keys($attributes));
	  $sql .= ") VALUES ('";
		$sql .= join("', '", array_values($attributes));
		$sql .= "')";
	  if($database->query($sql)) {
	 
	    return true;
	  } else {
	    return false;
	  }
	}

	public function update() {
	  global $database;
		// Don't forget your SQL syntax and good habits:
		// - UPDATE table SET key='value', key='value' WHERE condition
		// - single-quotes around all values
		// - escape all values to prevent SQL injection
		$attributes = $this->sanitized_attributes();
		$attribute_pairs = array();
		foreach($attributes as $key => $value) {
		  $attribute_pairs[] = "{$key}='{$value}'";
		}
		$sql = "UPDATE ".self::$table_name." SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE picture_id=". $database->escape_value($this->picture_id);
	  $database->query($sql);
	  return ($database->affected_rows() == 1) ? true : false;
	}

	public function delete() {
		global $database;
		// Don't forget your SQL syntax and good habits:
		// - DELETE FROM table WHERE condition LIMIT 1
		// - escape all values to prevent SQL injection
		// - use LIMIT 1
	  $sql = "DELETE FROM ".self::$table_name;
	  $sql .= " WHERE picture_id=". $database->escape_value($this->picture_id);
	  $sql .= " LIMIT 1";
	  $database->query($sql);
	  return ($database->affected_rows() == 1) ? true : false;

		// NB: After deleting, the instance of User still
		// exists, even though the database entry does not.
		// This can be useful, as in:
		//   echo $user->first_name . " was deleted";
		// but, for example, we can't call $user->update()
		// after calling $user->delete().
	}

        #unlink and delete multiple pictures related with car id
        public static function destroy_with_car_id($car_id) //doradi na ovome, da ti samo salje 'image_path_with_car_id'
        {//mislim da ne radi zato sto nece da prihvati vracen niz i da ga ubaci u novi niz
            //	// First remove the database entry
		
			// then remove the file
		  // Note that even though the database entry is gone, this object
			// is still around (which lets us use $this->image_path()).
                         $picture_names=array();
                         $rez=Pictures::image_path_with_car_id($car_id);
                         while($a=mysql_fetch_array($rez))
                         {
                             $picture_names[]=$a[0];
                          }
                        if(Pictures::delete_with_car($car_id))
                    {
                            foreach ($picture_names as $key =>$value)
                                    {
                                    $target_path = SITE_ROOT.DS.'public'.DS.'image'.DS.$value;
                                unlink($target_path);
                                    }
                    }
                            
		 else {
			// database delete failed
			return false;
		}
	}
        public static function picture_names_for_car_id($car_id)
        {
            $picture_names=array();
            $rez=Pictures::image_path_with_car_id($car_id);
            while($a=mysql_fetch_array($rez))
                {
                $picture_names[]=$a[0];
                }
                return $picture_names;
        }
        public static function delete_with_car($car_id)

        {
            	global $database;
		// Don't forget your SQL syntax and good habits:
		// - DELETE FROM table WHERE condition LIMIT 1
		// - escape all values to prevent SQL injection
		// - use LIMIT 1
	  $sql = "DELETE FROM ".self::$table_name;
	  $sql .= " WHERE picture_car_id=". $database->escape_value($car_id);
	  $sql .= "";
	  $database->query($sql);
	  return ($database->affected_rows() > 0) ? true : false;

        }
         public static function image_path_with_car_id($car_id) {
            global $database;
         $result=$database->query("SELECT picture_caption FROM ".self::$table_name." WHERE picture_car_id=".$database->escape_value($car_id)."");
         return $result;

	}
          public static function find_by_car_id($id) {
	  global $database;
          $result_array = self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE picture_car_id=".$database->escape_value($id)."");
		return $result_array;
  }
}

?>