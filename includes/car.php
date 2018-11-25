<?php
// If it's going to need the database, then it's
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');
require_once(LIB_PATH.DS.'owner.php');
require_once(LIB_PATH.DS.'fuel.php');
require_once(LIB_PATH.DS.'model.php');
require_once(LIB_PATH.DS.'makes.php');
require_once(LIB_PATH.DS.'pictures.php');

class Car {

    protected static $table='car';
    protected static $db_fields=array('car_id','car_owner_id','car_makes_id','car_model_id','car_fuel_id','car_type_id','car_age','car_price','car_mileage','car_kw','car_ccm','car_description','car_color','car_doors','car_transmission');

    public $car_id;
    public $car_owner_id;
    public $car_makes_id;
    public $car_model_id;
    public $car_fuel_id;
    public $car_type_id;
    public $car_age;
    public $car_price;
    public $car_mileage;
    public $car_kw;
    public $car_ccm;
    public $car_description;
    public $car_color;
    public $car_doors;
    public $car_transmission;
    public $owner_info;



    public $errors=array();
    public $car_fuel_name;
    public $car_model_name;
    public $car_makes_name;
    public $car_pictures=array();



    public function Car_name_and_type() {
    if(isset($this->first_name) && isset($this->last_name)) {
      return $this->first_name . " " . $this->last_name;
    } else {
      return "";
    }
  }



	// Common Database Methods
	public static function find_all() {
		return self::find_by_sql("SELECT * FROM ".self::$table." ORDER BY car_id DESC");
  }
  	public static function find_all_limit($limit) {
		return self::find_by_sql("SELECT * FROM ".self::$table." ORDER BY car_id LIMIT ".$limit." ");
  }

        public static function find_by_id($id=0) {
    $result_array = self::find_by_sql("SELECT * FROM ".self::$table." WHERE car_id={$id} LIMIT 1");
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
  	public static function find_all_pagination($per_page,$offset) {
		return self::find_by_sql("SELECT * FROM ".self::$table." ORDER BY car_id DESC LIMIT {$per_page} OFFSET {$offset}");
  }

	public static function count_all() {
	  global $database;
	  $sql = "SELECT COUNT(*) FROM ".self::$table;
          $result_set = $database->query($sql);
	  $row = $database->fetch_array($result_set);
    return array_shift($row);
	}
        
        public static function count_sql($makes="%",$model ="%",$year_from="1950",$year_to="2011") {
	  global $database;
          $database->escape_value($makes);
          $database->escape_value($model);
	  $sql = "SELECT * FROM ".self::$table." WHERE car_makes_id LIKE '{$makes}' AND car_model_id LIKE '{$model}' AND car_age BETWEEN '{$year_from}' AND '{$year_to}'";
          $result_set = $database->query($sql);          
	  $row = $database->num_rows($result_set);
        return $row;
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

	public function save() {
	  // A new record won't have an id yet.
	  return isset($this->car_id) ? $this->update() : $this->create();
	}

	private function create() {
		global $database;
		// Don't forget your SQL syntax and good habits:
		// - INSERT INTO table (key, key) VALUES ('value', 'value')
		// - single-quotes around all values
		// - escape all values to prevent SQL injection
		$attributes = $this->sanitized_attributes();
	  $sql = "INSERT INTO ".self::$table." (";
		$sql .= join(", ", array_keys($attributes));
	  $sql .= ") VALUES ('";
		$sql .= join("', '", array_values($attributes));
		$sql .= "')";
	  if($database->query($sql)) {
	    $this->car_id = $database->last_id();
	    return true;
	  } else {
	    
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
		$sql = "UPDATE ".self::$table." SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE car_id=". $database->escape_value($this->car_id);
	  $database->query($sql);
	  return ($database->affected_rows() == 1) ? true : false;
	}

	public function delete() {
		global $database;
		// Don't forget your SQL syntax and good habits:
		// - DELETE FROM table WHERE condition LIMIT 1
		// - escape all values to prevent SQL injection
		// - use LIMIT 1
	  $sql = "DELETE FROM ".self::$table;
	  $sql .= " WHERE car_id=". $database->escape_value($this->car_id);
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
        	public static function delete_on_car_id($id) {
		global $database;
		// Don't forget your SQL syntax and good habits:
		// - DELETE FROM table WHERE condition LIMIT 1
		// - escape all values to prevent SQL injection
		// - use LIMIT 1
	  $sql = "DELETE FROM ".self::$table;
	  $sql .= " WHERE car_id=". $database->escape_value($id);
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
        public function provera()
        {
            $numer_preg="/^(\d{1,})$/";
            $done=TRUE;
           if($this->car_makes_id==0)
                   {
                     $this->errors[]="Morate izabrati proizvodjaca vozila";
                     return $done=FALSE;
                   }
 elseif ($this->car_model_id==0) {
     $this->errors[]="Morate izabrati model vozila.";
     return $done=FALSE;
}
 elseif ($this->car_age==0) {
    $this->errors[]="Morate izabrati godinu proizvodnje.";
    return $done=FALSE;
}
 elseif (!preg_match($numer_preg,$this->car_price) || empty ($this->car_price)) {
     $this->errors[]="Morate ispravno uneti cenu.";
     return $done=FALSE;
}
 elseif (!preg_match($numer_preg,$this->car_mileage) || empty ($this->car_mileage)) {
    $this->errors[]="Morate ispravno upisati predjenu kilomtrazu.";
    return $done=FALSE;
}
 elseif (!preg_match($numer_preg,$this->car_kw) || empty ($this->car_kw)) {
 $this->errors[]="Morate ispravno upisati snagu motora.";
 return $done=FALSE;
}
 elseif (!preg_match($numer_preg,$this->car_ccm) || empty ($this->car_ccm)) {
 $this->errors[]="Morate ispravno upisati kubikazu.";
 return $done=FALSE;
}
 elseif ($this->car_color=="Izaberi") {
    $this->errors[]="Morate izabrati boju vozila.";
    return $done=FALSE;
}
 elseif ($this->car_doors==0) {
    $this->errors[]="Morate izabrati broj vrata.";
    return $done=FALSE;
}
 elseif (is_numeric ($this->car_transmission)) {
    $this->errors[]="Morate izabrati tip menjaca.";
    return $done=FALSE;
}
 elseif ($this->car_fuel_id==0) {
    $this->errors[]="Morate izabrati tip goriva.";
    return $done=FALSE;
}
 elseif (strlen($this->car_description)>500) {
    $this->errors[]="Opis vozila ne sme sadrzati vise od 500 karaktera.";
    return $done=FALSE;
}
 else {
     $this->errors[]="Uspesno ste dodali automobil.";
    return $done;
}

        }

            #Seting names for fuel, makes, models
         public function setNames()

       {
               if(isset ($this->car_fuel_id))
               {
                   $fuel=new Fuel();
                   $fuel=Fuel::find_by_id($this->car_fuel_id);
                   $this->car_fuel_name=$fuel->fuel_name;
               }
                if(isset ($this->car_makes_id))
               {
                   $makes=new CarMakes();
                   $makes=CarMakes::find_by_id($this->car_makes_id);
                   $this->car_makes_name=$makes->car_name;
               }
                if(isset($this->car_model_id))
               {
                   $model=new CarModels();
                   $model=CarModels::find_by_id($this->car_model_id);
                   $this->car_model_name=$model->car_model_name;
               }
               if(isset($this->car_owner_id))
                       {
                          $owner = Owner::find_by_id($this->car_owner_id);
                          $this->owner_info = $owner;
                       }
               if(isset($this->car_type_id))
                       {
                   global $database;
                   $sql= "SELECT type_name from type INNER JOIN car ON car.car_type_id = type.type_id WHERE car_id ={$this->car_id}";
                  
                  $result = $database->query($sql);
                  $result = mysql_fetch_object($result);
                   $this->type_name= $result->type_name;
                          
                       }
               
              $picture[]=Pictures::find_by_car_id($this->car_id);
               $i=0;
              foreach ($picture as $key => $values)
                  {                 
                 
                  if(!is_null($values))
                    {       foreach ($values as $vrednost)
                             $this->car_pictures[$i++]=$vrednost->picture_caption;
                    }
                    else
                        {
                            echo "Ne radi";
                        }
                  }

            }

            #simple search
            public static function simple_search_pagination($makes="%",$model="%",$year_from="1970",$year_to="2012",$per_page =5 ,$offset = 0)
                    {
                        global $database;
                        $database->escape_value($makes);
                        $database->escape_value($model);
                        $result_array = self::find_by_sql("SELECT * FROM ".self::$table." WHERE car_model_id LIKE '".$model."' and car_makes_id LIKE '".$makes."' AND car_age BETWEEN '".$year_from."' AND '".$year_to."' LIMIT {$per_page} OFFSET {$offset} ");
                        return $result_array;
                    }

                    public static function radomCar()
                    {
                        global $database;
                        $result_array = self::find_by_sql("SELECT * FROM ".self::$table." ORDER BY RAND() LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;

                    }
                    
//This is for makes and models
       
      
                 

}

?>