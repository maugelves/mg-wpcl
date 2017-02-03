<?php
namespace MGWPCL\Models;

class Log
{
    // Variables
    private $date_created = "";
    private $description = "";
    private $ID = 0;
    private $IP = "";
    private $user_id = 0;

    // Getters and Setters
    /**
     * @return string
     */
    public function get_date_created()
    {
        return $this->date_created;
    }

    /**
     * @param string $date_created
     */
    public function set_date_created($date_created)
    {
        $this->date_created = $date_created;
    }

    /**
     * @return string
     */
    public function get_description()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function set_description($description)
    {
        $this->description = $description;
    }

    /**
     * @param int $ID
     */
    private function set_ID($ID)
    {
        $this->ID = $ID;
    }

    /**
     * @return int
     */
    public function get_ID()
    {
        return $this->ID;
    }

    /**
     * @return string
     */
    public function get_IP()
    {
        return $this->IP;
    }

    /**
     * @param string $IP
     */
    public function set_IP($IP)
    {
        $this->IP = $IP;
    }

    /**
     * @return int
     */
    public function get_user_id()
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function set_user_id($user_id)
    {
        $this->user_id = $user_id;
    }



    // METHODS
    /**
     * Saves or update a log
     *
     * @author  Mauricio Gelves
     * @return  bool true in case of success, false in case of error.
     * @since   1.0
     */
    public function save(){

        global $wpdb;
        $args = array(
            "user_id"           => $this->get_user_id(),
            "description"       => $this->get_description(),
            "IP"                => $this->get_IP(),
            "ID"                => $this->get_ID()
        );


        $result = $wpdb->insert( $wpdb->prefix."mgwpcl", $args);

        if ( $result )
            // Save the ID
            $this->set_ID( $wpdb->insert_id );


        return ($result > 0);
    }

}

?>