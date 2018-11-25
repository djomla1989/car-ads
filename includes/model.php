<?php
// If it's going to need the database, then it's
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');
require_once(LIB_PATH.DS.'owner.php');

class CarModels {

    protected static $table='car_models';
    protected static $db_fields=array('car_model_id','car_makes_id','car_model_name');

     public $car_model_id;
     public $car_makes_id;
     public $car_model_name;



	// Common Database Methods
	public static function find_all() {
		return self::find_by_sql("SELECT * FROM ".self::$table);
  }

  public static function find_all_by_makes_id($makes_id)
  {
      return self::find_by_sql("SELECT * FROM ".self::$table." WHERE car_makes_id = {$makes_id}");
  }

        public static function find_by_id($id=0) {
    $result_array = self::find_by_sql("SELECT * FROM ".self::$table." WHERE car_model_id={$id} LIMIT 1");
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
	  $sql = "SELECT COUNT(*) FROM ".self::$table;
          $result_set = $database->query($sql);
	  $row = $database->fetch_array($result_set);
    return array_shift($row);
	}

	private static function instantiate($record) {
		// Could check that $record exists and is an array
    $object = new self;
		// Simple, long-form approach:
		// $object->id 				= $record['id'];
		// $object->username 	= $record['username'];
		// $object->password 	= $record['password'];
		// $object->first_name = $record['first_name'];
		// $object->last_name 	= $record['last_name'];

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

        
     public static function add_car_model($model_id,$name)
                    {
                        global $database;
                        $name=$database->escape_value($name);
                        $model_id=$database->escape_value($model_id);
                        $car_name_reg="/^[a-zA-Z0-9']{3,20}$/";
                        if(preg_match($car_name_reg,$name))
                                {
                                    $name=ucfirst($name);
                                    $sql="INSERT INTO ".self::$table." VALUES('','$model_id','$name')";
                                    $rez=$database->query($sql);
                                  if($rez)
                                      return true;
                                  else
                                      return false;
                                }
                                else
                                    return false;
                    }


	
	 
}
$fuel=new Fuel();

?>