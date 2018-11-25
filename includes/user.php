<?php
// If it's going to need the database, then it's
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class User {

    protected static $table='user';
    protected static $db_fields=array('user_id','username','password','user_email','user_status');

    public $user_id;
    public $username;
    public $password;
    public $user_email;
    public $user_status;

  public function full_name() {
    if(isset($this->first_name) && isset($this->last_name)) {
      return $this->first_name . " " . $this->last_name;
    } else {
      return "";
    }
  }

	public static function authenticate($username="", $password="") {
    global $database;
    $username = $database->escape_value($username);
    $password = $database->escape_value($password);

    $sql  = "SELECT * FROM user ";
    $sql .= "WHERE username = '{$username}' ";
    $sql .= "AND password = '{$password}' ";
    $sql .= "LIMIT 1";
    $result_array = self::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
	}

	// Common Database Methods
	public static function find_all() {
		return self::find_by_sql("SELECT * FROM ".self::$table);
  }

  public static function find_by_id($id=0) {
    $result_array = self::find_by_sql("SELECT * FROM ".self::$table." WHERE user_id={$id} LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
  }
public function echoo($id)
  {
    echo "SELECT * FROM ".self::$table." WHERE user_id={$id} LIMIT 1";
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
		$sql .= " WHERE user_id=". $database->escape_value($this->id);
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
	  $sql .= " WHERE user_id=". $database->escape_value($this->id);
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
     public function provera($re_password)
        {
         $done=true;
         $ime_reg="/^[a-zA-Z]{3,15}( [a-zA-Z]{3,15})?$/";
         $user_reg="/^[a-zA-Z0-9']{5,15}$/";
	 $mail_reg="/^[_A-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
         $pass_reg="/^[a-zA-Z0-9]{5,15}$/";
         $phone_reg="/^(\+?[0-9]{3,5}\-?)?[0-9]{3,4}\-?[0-9]{3,4}$/";
            global $database;

            $sql="SELECT * FROM ".self::$table;
            $sql.=" WHERE username='" . $database->escape_value($this->username);
            $sql.="' LIMIT 1";

#checking email in db
             $sql_mail="SELECT * FROM ".self::$table;
             $sql_mail.=" WHERE user_email=' ". $database->escape_value($this->user_email);
             $sql_mail.="' LIMIT 1";

             #preg first name
          if(!preg_match($pass_reg,$this->username))
                            {
                                return "Username moze sadrzati samo slova i brojeve";
                               return $done=FALSE;
                            }

                #is password are diferent
                    elseif($this->password != $re_password)
                        {
                            return "Passwordi se ne podudaraju. Pokusajte ponovo";
                            
                            return $done=FALSE;
                        }
                #preg password
                    elseif(!preg_match($pass_reg,$this->password))
                        {
                            return "Password moze sadzati samo slova i brojeve";
                          return $done=FALSE;
                        }
               
                 #preg email
                    elseif(!preg_match( $mail_reg,$this->user_email))
                        {
                            return "Neispravan format e-maila";
                           return $done=FALSE;
                        }
                   #username exist in db
                        else
                            {
                                $rez=$database->query($sql);
                               if($database->num_rows($rez) > 0)
                                {
                                 return "Username vec postoji u bazi";
                              return $done=FALSE;
                                }
                            
                    #email exist in db
                            else
                                {
                                    $rez2=$database->query($sql_mail);
                                   if($database->num_rows($rez2) > 0)
                                     {
                                         return "E-mail vec postoji u bazi";
                                        return $done=FALSE;
                                     }
                                      if($done=true && $this->create())
                                              return "Uspesno ste se registrovali";
                                          else {
                                              return "Greska pri registraciji, pokusajte kasnije";
                                          }
                                }
                       


                             }
                   }
}

?>