<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once LIB_PATH.DS.'config.php';

class MySqlDatabase
{
    private $conncetion;
    private $magic_quotes_active;
    private $real_escape_string_exists;
    public $last_query;

    public $picture_array=array();

    function  __construct()
    {
        $this->magic_quotes_active = get_magic_quotes_gpc();
        $this->real_escape_string_exists = function_exists( "mysql_real_escape_string" );
         $this->conncetion = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
         if($this->conncetion)
                 {
                    $db_select = mysql_select_db(DB_NAME, $this->conncetion);
                     if(!$db_select)
                        echo "Neuspesno povezivanje na bazu ". mysql_error();
                       
                 }
                 else
                 die ("Nemoguce povezivanje na bazu".  mysql_error());
                 
    }

    public function close_connection()
    {
       if( isset ($this->conncetion))
          {
            mysql_close($this->conncetion);
            unset ($this->conncetion);
          }
    }
   public function query($sql)
    {
       $this->last_query=$sql;
       $result=mysql_query($sql,$this->conncetion);
       return $result;

    }
    public function num_rows($result_set)
    {
       return  mysql_num_rows($result_set);
    }
    public function affected_rows()
    {
        return mysql_affected_rows($this->conncetion);
    }

  public function fetch_array($result_set) {
    return mysql_fetch_array($result_set,MYSQL_BOTH);
  }
    public function last_id()
    {
        return mysql_insert_id($this->conncetion);
    }

 
    public function success_query($sql)
    {
        if(!sql)
            {
                $output="Database query faled ".mysql_error();
            }
           die($output);
    }
	public function escape_value( $value ) {
		if( $this->real_escape_string_exists ) { // PHP v4.3.0 or higher
			// undo any magic quote effects so mysql_real_escape_string can do the work
			if( $this->magic_quotes_active ) { $value = stripslashes( $value ); }
			$value = mysql_real_escape_string( $value );
		} else { // before PHP v4.3.0
			// if magic quotes aren't already on then add slashes manually
			if( !$this->magic_quotes_active ) { $value = addslashes( $value ); }
			// if magic quotes are active, then the slashes already exist
		}
		return $value;
	}

}
 $database=new MySqlDatabase();
?>
