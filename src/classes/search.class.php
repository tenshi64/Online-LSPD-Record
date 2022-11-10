<?php
    class Search extends Database
    {
        private string $_firstName;
        private string $_lastName;
        private string $_reason;
        function __construct($firstName, $lastName, $reason)
        {
            parent::__construct();
            $this->_firstName = $firstName;
            $this->_lastName = $lastName; 
            $this->_reason = $reason; 
        }

        public function searchPerson()
        {
            $db = $this->base;
            $stmt = $db->prepare('SELECT imie, nazwisko, przewinienie, data FROM files WHERE imie like ? OR nazwisko LIKE ? OR przewinienie LIKE ?');
            $f = (!empty($this->_firstName)) ? str_replace(' ', '', $this->_firstName . '%') : $this->_firstName;
            $l = (!empty($this->_lastName)) ? str_replace(' ', '', $this->_lastName . '%') : $this->_lastName;
            $r = (!empty($this->_reason)) ? str_replace(' ', '', $this->_reason . '%') : $this->_reason;
            $stmt->bind_param('sss', $f, $l, $r);
            $stmt->execute();

            $result = $stmt->get_result();
            $quantity = $result->num_rows;

            if($quantity>0)
            {
                return $result;
            }
            return false;
        }

        function _destruct()
        {
            $db = $this->base;
            $db->close();
        }
    }
?>