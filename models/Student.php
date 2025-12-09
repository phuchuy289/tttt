<?php
    class Student {
        private $id;
        private $name;
        private $sdt;
        private $address;

        function __construct($id, $name, $sdt, $address) {
            $this->id = $id;
            $this->name = $name;
            $this->sdt = $sdt;
            $this->address = $address;
        }
        public static function getAll() {
            $list = [];
            $db = DB::getInstance();
            $req = $db->query('SELECT * FROM sinhvien');

            foreach ($req->fetchAll() as $item) {
                $list[] = new Student($item['id'], $item['ten'], $item['sdt'], $item['diachi']);
            }

            return $list;
        }
    }

    // End of Student.php