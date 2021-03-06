<?php
// If it's going to need the database, then it's
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class Owner {

    protected static $table='car_owner';
    protected static $db_fields=array('owner_id','owner_name','owner_last_name','owner_address','owner_email','owner_phone','owner_city');

    public $owner_id;
    public $owner_name;
    public $owner_last_name;
     public $owner_address;
    public $owner_email;
    public $owner_phone;
      public $owner_city;
    
  public function full_name() {
    if(isset($this->owner_name) && isset($this->owner_last_name)) {
      return $this->owner_name . " " . $this->owner_last_name;
    } else {
      return "";
    }
  }


	// Common Database Methods
	public static function find_all() {
		return self::find_by_sql("SELECT * FROM ".self::$table);
  }

  public static function find_by_id($id=0) {
    $result_array = self::find_by_sql("SELECT * FROM ".self::$table." WHERE owner_id={$id} LIMIT 1");
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

	public function save() {
	  // A new record won't have an id yet.
	  return isset($this->id) ? $this->update() : $this->create();
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
	    $this->id = $database->last_id();
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
		$sql .= " WHERE owner_id=". $database->escape_value($this->id);
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
	  $sql .= " WHERE owner_id=". $database->escape_value($this->id);
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
        public  function owner_provera()
        {
            $done=true;
         $ime_reg="/^([a-zA-Z]{3,15}( [a-zA-Z]{3,15})?)$/";
         $user_reg="/^([a-zA-Z0-9]{5,15})$/";
	 $mail_reg="/^([_A-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3}))$/";
         $address_reg="/^(([a-zA-Z0-9 ]+){2,})$/";
         $phone_reg="/^((\+?[0-9]{3,5}\-?)?[0-9]{3,4}\-?[0-9]{3,4})$/";

            if(!preg_match($ime_reg,$this->owner_name))
                    {
                        echo "Ime mora sadrzati samo slova.";
                        return $done=FALSE;
                    }
                    #preg last name
                    elseif(!preg_match($ime_reg,$this->owner_last_name))
                            {
                               echo "Prezime mora sadrzati samo slova.";
                               return FALSE;
                            }
                               #preg address
                          elseif(!preg_match( $address_reg,$this->owner_address))
                        {
                            echo "Neispravan format adrese.";
                           return $done=FALSE;
                        }

                        #preg phone
                    elseif(!preg_match($phone_reg,$this->owner_phone))
                        {
                            echo "Neispravan format telefona.";
                           return $done=FALSE;
                        }
                 #preg email
                    elseif(!preg_match( $mail_reg,$this->owner_email))
                        {
                            echo "Neispravan format e-maila.";
                           return $done=FALSE;
                        }
                        return $done;
        }
}

?>